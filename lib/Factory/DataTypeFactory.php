<?php

namespace Hl7v2\Factory;

use Hl7v2\DataType\ComponentInterface;
use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Exception\DataTypeError;

class DataTypeFactory
{
    private $classmap = [];

    /**
     * Create a Data Type.
     *
     * @param string $typeName
     * @param \Hl7v2\Encoding\EncodingParameters $encodingParameters
     * @param bool $isSubcomponent
     * @return \Hl7v2\DataType\DataTypeInterface
     * @throws \Hl7v2\Exception\DataTypeError
     */
    public function create(
        $typeName,
        EncodingParameters $encodingParameters,
        $isSubcomponent = false
    ) {
        $class = $this->determineClassname($typeName);
        $type = new $class;

        if ($type instanceof ComponentInterface) {
            $type->setDataTypeFactory($this);
            $type->setEncodingParameters($encodingParameters);
            if ($isSubcomponent) {
                $type->beSubcomponent();
            }
        }

        $type->setCharacterEncoding($encodingParameters->getCharacterEncoding());

        return $type;
    }

    private function determineClassname($typeName)
    {
        if (array_key_exists($typeName, $this->classmap)) {
            return $this->classmap[$typeName];
        }
        $name = ucfirst(strtolower($typeName));
        $class = "\\Hl7v2\\DataType\\{$name}DataType";
        if (!class_exists($class)) {
            throw new DataTypeError("Unknown DataType \"{$typeName}\".");
        }
        $this->classmap[$typeName] = $class;

        return $class;
    }
}
