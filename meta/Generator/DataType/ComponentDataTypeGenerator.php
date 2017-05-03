<?php

namespace Hl7v2\Meta\Generator\DataType;

use Hl7v2\Meta\Helper\DataTypeContext;
use Hl7v2\Meta\Helper\DataTypeResolver;
use Hl7v2\Meta\Helper\Util;

class ComponentDataTypeGenerator extends AbstractDataTypeGenerator
{
    private $components;
    private $resolver;

    public function __construct(
        DataTypeResolver $resolver,
        DataTypeContext $context,
        $typeId,
        $typeInfo
    ) {
        $this->resolver = $resolver;
        if (! is_array($typeInfo['components'])) {
            $this->components = [];
        } else {
            $this->components = $typeInfo['components'];
        }
        parent::__construct($context, $typeId, $typeInfo);
    }

    public function getInheritanceClass()
    {
        $namespace = $this->context->getNamespace();
        return "{$namespace}\\ComponentDataType";
    }

    public function getEncapsulationMethods()
    {
        return [
            $this->getAccessorMethod(),
            $this->getMutatorMethod(),
        ];
    }

    public function getProperties()
    {
        $properties = [];

        foreach ($this->components as $component) {
            $properties[] = [
                $this->componentNameToPropertyName($component['name']),
                $this->context->dataTypeIdToClass($component['type'])
            ];
        }

        return $properties;
    }

    public function getAccessors()
    {
        $accessors = [];

        foreach ($this->components as $component) {
            if (array_key_exists('deprecated', $component) && true === $component['deprecated']) {
                # NoOp
            }
            $propertyName = $this->componentNameToPropertyName($component['name']);
            $accessors[] = [
                $this->componentNameToAccessorName($component['name']),
                $this->context->dataTypeIdToClass($component['type']),
                "        return \$this->{$propertyName};",
            ];
        }

        return $accessors;
    }

    public function getMutators()
    {
        $mutators = [];

        foreach ($this->components as $component) {
            if (array_key_exists('deprecated', $component) && true === $component['deprecated']) {
                # NoOp
            }
            $propertyName = $this->componentNameToPropertyName($component['name']);
            $methodName = $this->componentNameToMutatorName($component['name']);
            $args = [];
            $methodBody = null;

            # determine whether argType is simple or component
            # if component then we need to get the setter method names for the
            # setter body and we need to accept an assoc. array as setter arg
            if ($this->resolver->isComponentType($component['type'])) {
                $methodBody = [
                    "\$this->{$propertyName} = \$this",
                    "    ->dataTypeFactory",
                    "    ->create('{$component['type']}', \$this->characterEncoding)",
                    ";",
                ];
                $componentMutators = $this->resolver->getMutatorsForCalling($component['type']);
                foreach ($componentMutators as $mMethodName => $mArgInfo) {
                    foreach ($mArgInfo as $mArgName => list($mArgType, $mArgMandatory)) {
                        $args[] = [$propertyName . ucfirst($mArgName), $mArgType, $mArgMandatory];
                    }
                    $argsNamespaced = array_map(
                        function ($x) use ($propertyName) {
                            return "\${$propertyName}" . ucfirst($x);
                        },
                        array_keys($mArgInfo)
                    );
                    Util::addMethodCallToBody(
                        $methodBody,
                        "\$this->{$propertyName}->{$mMethodName}(",
                        $argsNamespaced
                    );
                }
            } else {
                $methodArg = [$propertyName, 'string', false];
                if (array_key_exists('required', $component)) {
                    $methodArg[2] = (bool) $component['required'];
                }
                $args[] = $methodArg;
                $methodBody = [
                    "\$this->{$propertyName} = \$this",
                    "    ->dataTypeFactory",
                    "    ->create('{$component['type']}', \$this->characterEncoding)",
                    ";",
                    "\$this->{$propertyName}->setValue(\${$propertyName});",
                ];
            }
            $mutators[] = [$methodName, $args, $methodBody];
        }

        return $mutators;
    }

    public function getArrayMutator()
    {
        $methodName = 'fromArray';
        $methodArg = ['array', 'values'];
        $body = [];
        foreach ($this->components as $component) {
            if (array_key_exists('deprecated', $component) && true === $component['deprecated']) {
                continue;
            }
            foreach ($this->resolver->getMutatorsForCalling($component['type']) as $mMethod => $mArgs) {
                $args = implode(
                    ', ',
                    array_map(
                        function ($x) {
                            return "\$values['{$x}']";
                        },
                        array_keys($args)
                    )
                );
                $body[] = "\$this->{$method}({$args});";
            }
        }
        return [$methodName, $methodArg, $body];
    }

    private function componentNameToPropertyName($componentName)
    {
        return lcfirst($componentName);
    }

    private function componentNameToAccessorName($componentName)
    {
        return "get{$componentName}";
    }

    private function componentNameToMutatorName($componentName)
    {
        return "set{$componentName}";
    }
}
