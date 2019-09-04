<?php

namespace Hl7v2\Meta\Generator\Segment;

use Memio\Model\Method;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Memio\Model\Phpdoc\ReturnTag;
use Twig_Environment;

use Hl7v2\Meta\Helper\DataTypeContext;
use Hl7v2\Meta\Helper\SegmentContext;
use Hl7v2\Meta\Helper\SegmentField;
use Hl7v2\Meta\Helper\Util;

class SegmentGenerator
{
    protected $constants = [];
    /**
     * @var \Hl7v2\Meta\Helper\DataTypeContext
     */
    protected $dataTypeContext;
    /**
     * @var \Hl7v2\Meta\Helper\SegmentContext
     */
    protected $segmentContext;
    /**
     * @var \Hl7v2\Meta\Helper\SegmentField[]
     */
    protected $fields;
    protected $lastRequiredFieldnum;
    protected $segmentId;
    protected $segmentName;
    protected $templating;

    public function __construct(
        SegmentContext $segmentContext,
        DataTypeContext $dataTypeContext,
        $segmentId,
        $segmentAttr,
        array $fields
    ) {
        $this->segmentContext = $segmentContext;
        $this->dataTypeContext = $dataTypeContext;
        $this->segmentId = $segmentId;
        $this->segmentName = $segmentAttr['name'];
        $this->fields = $fields;

        foreach ($this->fields as $f) {
            if ($f->required) {
                $this->lastRequiredFieldnum = $f->num;
            }
        }
    }

    public function setTemplating(Twig_Environment $templating)
    {
        $this->templating = $templating;
    }

    public function getConstants()
    {
        return $this->constants;
    }

    public function getClass()
    {
        return $this->segmentContext->segmentIdToClass($this->segmentId);
    }

    public function getDescription()
    {
        return "{$this->segmentName} ({$this->segmentId}).";
    }

    public function getInheritanceClass()
    {
        $namespace = $this->segmentContext->getNamespace();
        return "{$namespace}\\AbstractSegment";
    }

    public function getProperties()
    {
        $properties = [];

        foreach ($this->fields as $f) {
            $p = [
                $f->nameForProperty,
            ];
            if ($f->skipped) {
                $p[] = false;
                $p[] = false;
                $properties[] = $p;
                continue;
            }
            $type = '\\';
            if ($f->variable) {
                $type .= $this->dataTypeContext->interfaceClass();
            } else {
                $type .= $this->dataTypeContext->dataTypeIdToClass($f->type);
            }
            if ($f->repeated) {
                $type .= '[]';
            }
            $p[] = $type;
            $defaultValue = false;
            if (!$f->required && $f->repeated) {
                $defaultValue = '[]';
            } elseif (!$f->required) {
                $defaultValue = 'null';
            }
            $p[] = $defaultValue;
            $properties[] = $p;
        }

        return $properties;
    }

    public function getMutators()
    {
        $mutators = [];

        foreach ($this->fields as $f) {
            if ($f->skipped) {
                continue;
            }
            if (!$f->variable) {
                $mutators[] = $this->doMutator($f);
            } else {
                $f->rewindVariableTypes();
                for ($i=0; $i<sizeof($f->variableTypes); $i++) {
                    $f->currentVariableType();
                    $mutators[] = $this->doMutator($f);
                    $f->advanceVariableTypes();
                }
            }
        }

        return $mutators;
    }

    private function doMutator(SegmentField $f)
    {
        if ($f->isComponentType() && $f->repeated) {
            return $this->adderForRepeatedComponentType($f);
        } elseif ($f->isComponentType()) {
            return $this->setterForComponentType($f);
        } elseif ($f->repeated) {
            return $this->adderForRepeatedSimpleType($f);
        } else {
            return $this->setterForSimpleType($f);
        }
    }

    public function getAccessors()
    {
        $accessors = [];

        foreach ($this->fields as $f) {
            if ($f->skipped) {
                continue;
            }
            $propertyName = $f->nameForProperty;
            $returnType = null;
            if ($f->variable) {
                $returnType = $this->dataTypeContext->interfaceClass();
            } else {
                $returnType = $this->dataTypeContext->dataTypeIdToClass($f->type);
            }
            if ($f->repeated) {
                $returnType .= '[]';
            }
            $accessors[] = [
                "getField{$f->name}",
                $returnType,
                ["return \$this->{$propertyName};"]
            ];
        }

        return $accessors;
    }

    public function getFromDatagramBody()
    {
        $b = [];

        foreach ($this->fields as $f) {
            if ($f->skipped) {
                $b[] = "// {$f->id} (Skipped)";
            } else {
                $b[] = "// {$f->id}";
            }
            if ($this->segmentId === 'MSH' && ($f->num == 1 || $f->num == 2)) {
                $this->mshDatagramBody($b, $f);
                continue;
            }
            $b[] = 'if (false === $codec->advanceToField($datagram)) {';
            if ($this->lastRequiredFieldnum >= $f->num) {
                $b[] = '    throw new SegmentError(';
                $b[] = "        '{$this->segmentId} Segment data contains too few required fields.'";
                $b[] = '    );';
            } else {
                $b[] = '    return false;';
            }
            $b[] = '}';
            if ($f->skipped) {
                $b[]= '';
                continue;
            }
            if (!$f->variable) {
                $this->doDatagramExtraction($b, $f);
            } else {
                $f->rewindVariableTypes();
                $typeField = $this->fields[$f->variableTypesIndicatorFieldnum - 1]->name;
                for ($i=0; $i<sizeof($f->variableTypes); $i++) {
                    $f->currentVariableType();
                    $openCond = "if ('{$f->type}' === \$this->getField{$typeField}()->getValue()) {";
                    if ($i) {
                        $openCond = "} else{$openCond}";
                    }
                    $b[] = $openCond;
                    $this->doDatagramExtraction($b, $f, 4);
                    $f->advanceVariableTypes();
                }
                if (sizeof($f->variableTypes)) {
                    $b[] = '}';
                }
            }
            $b[] = '';
        }

        return array_slice($b, 0, -1);
    }

    private function doDatagramExtraction(&$b, SegmentField $f, $indentLen = 0)
    {
        $properties = [];
        $subcompSequence = null;
        $subcompSequenceAsString = '';
        if ($f->isComponentType()) {
            $subcompSequence = $f->getSubcomponentInfo();
            $subcompSequenceAsString = $this->sequenceToString($subcompSequence);
            foreach ($f->getComponentInfo() as $componentMethod => $componentProperties) {
                foreach ($componentProperties as $componentName => $_) {
                    $properties[] = "\$$componentName";
                }
            }
        }
        $in1 = str_repeat(' ', $indentLen);
        $in2 = str_repeat(' ', $indentLen+4);
        $in3 = str_repeat(' ', $indentLen+8);
        if ($f->isComponentType() && $f->repeated) {
            $pCount = sizeof($properties);
            $b[] = "{$in1}\$sequence = {$subcompSequenceAsString};";
            $b[] = "{$in1}\$repetitions = [];";
            $b[] = "{$in1}\$first = true;";
            $b[] = "{$in1}while (\$first || false !== \$codec->advanceToRepetition(\$datagram)) {";
            if ($f->len) {
                $b[] = "{$in2}\$this->checkRepetitionLength('{$f->name}', {$f->len}, \$datagram->getPositionalState());";
            }
            $b[] = "{$in2}\$repetitions[] = \$this->extractComponents(\$datagram, \$codec, \$sequence);";
            $b[] = "{$in2}\$first = false;";
            $b[] = "{$in1}}";
            $b[] = "{$in1}foreach (\$repetitions as \$components) {";
            $i = 0;
            $this->sequencedListUnpack($subcompSequence, $b, $i, $indentLen+4, $properties);
            $b = array_slice($b, 0, -1);
            $b[] = "{$in2}) = \$components;";
            $b[] = "{$in2}\$this->addField{$f->name}{$f->suffixForMutator}(";
            for ($i = 0; $i+1 < $pCount; $i++) {
                $b[] = "{$in3}{$properties[$i]},";
            }
            $b[] = "{$in3}{$properties[$pCount-1]}";
            $b[] = "{$in2});";
            $b[] = "{$in1}}";
        } elseif ($f->isComponentType()) {
            if ($f->len) {
                $b[] = "{$in1}\$this->checkFieldLength('{$f->name}', {$f->len}, \$datagram->getPositionalState());";
            }
            $pCount = sizeof($properties);
            $b[] = "{$in1}\$sequence = {$subcompSequenceAsString};";
            $i = 0;
            $this->sequencedListUnpack($subcompSequence, $b, $i, $indentLen+0, $properties);
            $b = array_slice($b, 0, -1);
            $b[] = "{$in1}) = \$this->extractComponents(\$datagram, \$codec, \$sequence);";
            $b[] = "{$in1}\$this->setField{$f->name}{$f->suffixForMutator}(";
            for ($i = 0; $i+1 < $pCount; $i++) {
                $b[] = "{$in2}{$properties[$i]},";
            }
            $b[] = "{$in2}{$properties[$pCount-1]}";
            $b[] = "{$in1});";
        } elseif ($f->repeated) {
            $b[] = "{$in1}\$repetitions = [];";
            $b[] = "{$in1}\$first = true;";
            $b[] = "{$in1}while (\$first || false !== \$codec->advanceToRepetition(\$datagram)) {";
            if ($f->len) {
                $b[] = "{$in2}\$this->checkRepetitionLength('{$f->name}', {$f->len}, \$datagram->getPositionalState());";
            }
            $b[] = "{$in2}\$repetitions[] = \$this->extractComponents(\$datagram, \$codec, [1]);";
            $b[] = "{$in2}\$first = false;";
            $b[] = "{$in1}}";
            $b[] = "{$in1}foreach (\$repetitions as list(\$value,)) {";
            $b[] = "{$in2}\$this->addField{$f->name}{$f->suffixForMutator}(\$value);";
            $b[] = "{$in1}}";
        } else {
            if ($f->len) {
                $b[] = "{$in1}\$this->checkFieldLength('{$f->name}', {$f->len}, \$datagram->getPositionalState());";
            }
            $b[] = "{$in1}\$this->setField{$f->name}{$f->suffixForMutator}(\$codec->extractComponent(\$datagram));";
        }
    }

    private function mshDatagramBody(&$b, SegmentField $f)
    {
        if ($f->num === 1) {
            $b[] = '$encodingParams = $datagram->getEncodingParameters();';
            $b[] = '$this->setFieldFieldSeparator($encodingParams->getFieldSep());';
            $b[] = '';
        } elseif ($f->num === 2) {
            $b[] = '$codec->advanceToField($datagram);';
            $b[] = '$this->setFieldEncodingCharacters(';
            $b[] = '    $encodingParams->getComponentSep()';
            $b[] = '    . $encodingParams->getRepetitionSep()';
            $b[] = '    . $encodingParams->getEscapeChar()';
            $b[] = '    . $encodingParams->getSubcomponentSep()';
            $b[] = ');';
            $b[] = '';
        }
    }

    private function sequencedListUnpack($seq, &$b, &$ptr, $indent, $properties)
    {
        $b[] = str_repeat(' ', $indent) . "list(";
        foreach ($seq as $instruction) {
            if (is_array($instruction)) {
                $this->sequencedListUnpack($instruction, $b, $ptr, $indent+4, $properties);
            } else {
                $b[] = str_repeat(' ', $indent+4) . "{$properties[$ptr]},";
                $ptr++;
            }
        }
        $b[] = str_repeat(' ', $indent) . "),";
    }

    private function sequenceToString($seq)
    {
        $s = '[';
        foreach ($seq as $e) {
            if (is_array($e)) {
                $s .= $this->sequenceToString($e) . ',';
            } else {
                $s .= $e . ',';
            }
        }
        return substr($s, 0, -1) . ']';
    }

    private function adderForRepeatedComponentType(SegmentField $f)
    {
        $args = [];
        $methodName =  "addField{$f->name}{$f->suffixForMutator}";
        $propertyName = $f->nameForProperty;
        $body = [
            "\${$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->encodingParameters)",
            ";",
            "\$this->{$propertyName}[] = \${$propertyName};",
        ];

        foreach ($f->getComponentInfo() as $componentMethod => $componentProperties) {
            foreach ($componentProperties as $componentName => list($type, $required)) {
                $args[] = ['string', $componentName, false];
            }
            $params = array_map(
                function ($x) {
                    return "\${$x}";
                },
                array_keys($componentProperties)
            );
            Util::addMethodCallToBody(
                $body,
                "\${$propertyName}->{$componentMethod}(",
                $params
            );
        }
        if ($f->repeatedCount) {
            array_unshift(
                $body,
                "if ({$f->repeatedCount} <= sizeof(\$this->{$propertyName})) {",
                "    throw new SegmentError(",
                "        \"Maximum repetitions ({$f->repeatedCount}) of this Field would be exceeded.\"",
                "    );",
                "}"
            );
        }

        return [$methodName, $args, $body];
    }

    private function setterForComponentType(SegmentField $f)
    {
        $args = [];
        $methodName =  "setField{$f->name}{$f->suffixForMutator}";
        $propertyName = $f->nameForProperty;
        $body = [
            "\$this->{$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->encodingParameters)",
            ";",
        ];

        foreach ($f->getComponentInfo() as $componentMethod => $componentProperties) {
            foreach ($componentProperties as $componentName => list($type, $required)) {
                $args[] = ['string', $componentName, false];
            }
            $params = array_map(
                function ($x) {
                    return "\${$x}";
                },
                array_keys($componentProperties)
            );
            Util::addMethodCallToBody(
                $body,
                "\$this->{$propertyName}->{$componentMethod}(",
                $params
            );
        }

        return [$methodName, $args, $body];
    }

    private function adderForRepeatedSimpleType(SegmentField $f)
    {
        $methodName =  "addField{$f->name}{$f->suffixForMutator}";
        $propertyName = $f->nameForProperty;
        $body = [
            "\${$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->encodingParameters)",
            ";",
            "\${$propertyName}->setValue(\$value);",
            "\$this->{$propertyName}[] = \${$propertyName};",
        ];

        if ($f->repeatedCount) {
            array_unshift(
                $body,
                "if ({$f->repeatedCount} <= sizeof(\$this->{$propertyName})) {",
                "    throw new SegmentError(",
                "        \"Maximum repetitions ({$f->repeatedCount}) of this Field would be exceeded.\"",
                "    );",
                "}"
            );
        }

        return [$methodName, [['string', 'value', true]], $body];
    }

    private function setterForSimpleType(SegmentField $f)
    {
        $methodName =  "setField{$f->name}{$f->suffixForMutator}";
        $propertyName = $f->nameForProperty;
        $body = [
            "\$this->{$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->encodingParameters)",
            ";",
            "\$this->{$propertyName}->setValue(\$value);",
        ];

        return [$methodName, [['string', 'value', true]], $body];
    }

    public function getMethodToString(Method $method, MethodPhpdoc $doc, $segmentId)
    {
        $template = 'tostring_segment.twig';
        $context = ['segment_id' => $segmentId];

        $fields = [];
        foreach ($this->fields as $c) {
            $f = [
                'name' => $c->name,
                'skipped' => $c->skipped,
                'repeated' => $c->repeated,
            ];
            if (!$c->skipped) {
                $f['simple'] = !$c->isComponentType();
            }
            $fields[] = $f;
        }

        // handle MSH specially because MSH.1 is the field separator
        if ($segmentId == 'MSH') {
            $template = 'tostring_segment_msh.twig';
            $fields = array_slice($fields, 1);
        }

        $context['fields'] = $fields;
        return $method
            ->setPhpdoc($doc->setReturnTag(new ReturnTag('string')))
            ->setBody($this->templating->render($template, $context))
        ;
    }
}
