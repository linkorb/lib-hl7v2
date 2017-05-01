<?php

namespace Hl7v2\Meta\Helper;

use ReflectionClass;
use ReflectionMethod;
use RuntimeException;

use Digilist\DependencyGraph\DependencyGraph;
use Digilist\DependencyGraph\DependencyNode;

use Hl7v2\DataType\ComponentInterface;

class DataTypeResolver
{
    private $cache = [
        'mutators' => [],
        'subcomponents' => [],
    ];
    private $context;
    private $typeConfig;
    private $types = [];

    public function __construct(DataTypeContext $context, $typeConfig)
    {
        $this->context = $context;
        $this->typeConfig = $typeConfig;
    }

    public function reseolveTypeDependencyGraph()
    {
        $graph = new DependencyGraph;

        $nodes = [];
        foreach ($this->typeConfig as $typeId => $typeInfo) {
            if (!array_key_exists($typeId, $nodes)) {
                $nodes[$typeId] = new DependencyNode($typeId);
            }
            if (array_key_exists('components', $typeInfo)) {
                foreach ($typeInfo['components'] as $component) {
                    $independantType = $component['type'];
                    if (!array_key_exists($independantType, $nodes)) {
                        $nodes[$independantType] = new DependencyNode($independantType);
                    }
                    $graph->addDependency($nodes[$typeId], $nodes[$independantType]);
                }
            }
        }

        $path = $graph->resolve();

        foreach (array_keys($nodes) as $element) {
            if (in_array($element, $path)) {
                continue;
            }
            array_push($path, $element);
        }

        return $path;
    }

    public function isComponentType($typeId)
    {
        return $this
            ->getReflectionClass($typeId)
            ->implementsInterface(ComponentInterface::class)
        ;
    }

    /**
     *
     * @param unknown $typeId
     * @throws RuntimeException
     * @return \ReflectionClass
     */
    public function getReflectionClass($typeId)
    {
        if (! array_key_exists($typeId, $this->types)) {
            $class = $this->context->dataTypeIdToFQClassName($typeId);
            if (!class_exists($class)) {
                throw new RuntimeException("Cannot perform Reflection of DataType {$typeId}; class cannot be loaded.");
            }
            $this->types[$typeId] = new ReflectionClass($class);
        }
        return $this->types[$typeId];
    }

    public function getMutatorsForCalling($typeId)
    {
        if (array_key_exists($typeId, $this->cache['mutators'])) {
            return $this->cache['mutators'][$typeId];
        }

        $m = [];

        $refl = $this->getReflectionClass($typeId);
        foreach ($refl->getMethods(ReflectionMethod::IS_PUBLIC) as $candidate) {
            if ($candidate->class !== $refl->name
                || 'set' !== substr($candidate->name, 0, 3)
            ) {
                continue;
            }
            $p = [];
            foreach ($candidate->getParameters() as $reflParam) {
                $p[$reflParam->name] = [
                    'string',
                    $reflParam->isDefaultValueAvailable() ? false : true,
                ];
            }
            $m[$candidate->name] = $p;
        }

        $this->cache['mutators'][$typeId] = $m;

        return $m;
    }

    public function getSubcomponentInfo($typeId)
    {
        if (array_key_exists($typeId, $this->cache['subcomponents'])) {
            return $this->cache['subcomponents'][$typeId];
        }

        $s = [];

        #dump($this->typeConfig[$typeId]);
        if (!isset($this->typeConfig[$typeId]['components'])
            || !is_array($this->typeConfig[$typeId]['components'])
        ) {
            return 1;
        } else {
            foreach ($this->typeConfig[$typeId]['components'] as $componentType) {
                $s[] = $this->getSubcomponentInfo($componentType['type']);
            }
        }
        #dump($s);

        $this->cache['subcomponents'][$typeId] = $s;

        return $s;
    }
}
