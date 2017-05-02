<?php

namespace Hl7v2\Meta\Generator\Segment;

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
                $this->fieldNameToPropertyName($f->name),
            ];
            if ($f->reserved) {
                $p[] = false;
                $p[] = false;
                $properties[] = $p;
                continue;
            }
            $type = '\\' . $this->dataTypeContext->dataTypeIdToClass($f->type);
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
            if ($f->reserved) {
                continue;
            }
            if ($f->isComponentType() && $f->repeated) {
                $mutators[] = $this->adderForRepeatedComponentType($f);
            } elseif ($f->isComponentType()) {
                $mutators[] = $this->setterForComponentType($f);
            } elseif ($f->repeated) {
                $mutators[] = $this->adderForRepeatedSimpleType($f);
            } else {
                $mutators[] = $this->setterForSimpleType($f);
            }
        }

        return $mutators;
    }

    public function getAccessors()
    {
        $accessors = [];

        foreach ($this->fields as $f) {
            if ($f->reserved) {
                continue;
            }
            $propertyName = $this->fieldNameToPropertyName($f->name);
            $returnType = $this->dataTypeContext->dataTypeIdToClass($f->type);
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
            if ($f->reserved) {
                $b[] = "// {$f->id} (Skipped)";
            } else {
                $b[] = "// {$f->id}";
            }
            if ($this->segmentId === 'MSH' && ($f->num == 1 || $f->num == 2)) {
                $this->mshDatagramBody($b, $f);
                continue;
            }
            $b[] = 'if (false === $codec->advanceToField($data)) {';
            if ($this->lastRequiredFieldnum >= $f->num) {
                $b[] = '    throw new SegmentError(';
                $b[] = '        \'MSH Segment data contains too few required fields.\'';
                $b[] = '    );';
            } else {
                $b[] = '    return false;';
            }
            $b[] = '}';
            if ($f->reserved) {
                $b[]= '';
                continue;
            }
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
            if ($f->isComponentType() && $f->repeated) {
                $pCount = sizeof($properties);
                $b[] = "\$sequence = {$subcompSequenceAsString};";
                $b[] = "\$repetitions = [];";
                $b[] = "\$first = true;";
                $b[] = "while (\$first || false !== \$codec->advanceToRepetition(\$data)) {";
                if ($f->len) {
                    $b[] = "    \$this->checkRepetitionLength('{$f->name}', {$f->len}, \$data->getPositionalState());";
                }
                $b[] = "    \$repetitions[] = \$this->extractComponents(\$data, \$codec, \$sequence);";
                $b[] = "    \$first = false;";
                $b[] = "}";
                $b[] = "foreach (\$repetitions as \$components) {";
                $i = 0;
                $this->sequencedListUnpack($subcompSequence, $b, $i, 4, $properties);
                $b = array_slice($b, 0, -1);
                $b[] = "    ) = \$components;";
                $b[] = "    \$this->addField{$f->name}(";
                for ($i = 0; $i+1 < $pCount; $i++) {
                    $b[] = "        {$properties[$i]},";
                }
                $b[] = "        {$properties[$pCount-1]}";
                $b[] = "    );";
                $b[] = "}";
            } elseif ($f->isComponentType()) {
                if ($f->len) {
                    $b[] = "\$this->checkFieldLength('{$f->name}', {$f->len}, \$data->getPositionalState());";
                }
                $pCount = sizeof($properties);
                $b[] = "\$sequence = {$subcompSequenceAsString};";
                $i = 0;
                $this->sequencedListUnpack($subcompSequence, $b, $i, 0, $properties);
                $b = array_slice($b, 0, -1);
                $b[] = ") = \$this->extractComponents(\$data, \$codec, \$sequence);";
                $b[] = "\$this->setField{$f->name}(";
                for ($i = 0; $i+1 < $pCount; $i++) {
                    $b[] = "    {$properties[$i]},";
                }
                $b[] = "    {$properties[$pCount-1]}";
                $b[] = ");";
            } elseif ($f->repeated) {
                $b[] = "\$repetitions = [];";
                $b[] = "\$first = true;";
                $b[] = "while (\$first || false !== \$codec->advanceToRepetition(\$data)) {";
                if ($f->len) {
                    $b[] = "    \$this->checkRepetitionLength('{$f->name}', {$f->len}, \$data->getPositionalState());";
                }
                $b[] = "    \$repetitions[] = \$this->extractComponents(\$data, \$codec, [1]);";
                $b[] = "    \$first = false;";
                $b[] = "}";
                $b[] = "foreach (\$repetitions as list(\$value,)) {";
                $b[] = "    \$this->addField{$f->name}(\$value);";
                $b[] = '}';
            } else {
                if ($f->len) {
                    $b[] = "\$this->checkFieldLength('{$f->name}', {$f->len}, \$data->getPositionalState());";
                }
                $b[] = "\$this->setField{$f->name}(\$codec->extractComponent(\$data));";
            }
            $b[] = '';
        }

        return array_slice($b, 0, -1);
    }

    private function mshDatagramBody(&$b, SegmentField $f)
    {
        if ($f->num === 1) {
            $b[] = '$encodingParams = $data->getEncodingParameters();';
            $b[] = '$this->setFieldFieldSeparator($encodingParams->getFieldSep());';
            $b[] = '';
        } elseif ($f->num === 2) {
            $b[] = '$codec->advanceToField($data);';
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

    private function fieldNameToPropertyName($fieldName)
    {
        return lcfirst($fieldName);
    }

    private function adderForRepeatedComponentType(SegmentField $f)
    {
        $args = [];
        $methodName =  "addField{$f->name}";
        $propertyName = $this->fieldNameToPropertyName($f->name);
        $body = [
            "\${$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->characterEncoding)",
            ";",
            "\$this->{$propertyName}[] = \${$propertyName};",
        ];

        foreach ($f->getComponentInfo() as $componentMethod => $componentProperties) {
            foreach ($componentProperties as $componentName => list($type, $required)) {
                $args[] = ['string', $componentName, $required];
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
        $methodName =  "setField{$f->name}";
        $propertyName = $this->fieldNameToPropertyName($f->name);
        $body = [
            "\$this->{$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->characterEncoding)",
            ";",
        ];

        foreach ($f->getComponentInfo() as $componentMethod => $componentProperties) {
            foreach ($componentProperties as $componentName => list($type, $required)) {
                $args[] = ['string', $componentName, $required];
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
        $methodName =  "addField{$f->name}";
        $propertyName = $this->fieldNameToPropertyName($f->name);
        $body = [
            "\${$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->characterEncoding)",
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
        $methodName =  "setField{$f->name}";
        $propertyName = $this->fieldNameToPropertyName($f->name);
        $body = [
            "\$this->{$propertyName} = \$this",
            "    ->dataTypeFactory",
            "    ->create('{$f->type}', \$this->characterEncoding)",
            ";",
            "\$this->{$propertyName}->setValue(\$value);",
        ];

        return [$methodName, [['string', 'value', true]], $body];
    }
}
