<?php

namespace Hl7v2\Factory;

use Hl7v2\DataType\ComponentInterface;
use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Exception\DataTypeError;

class DataTypeFactory
{
    private $classmap = [];
    private $defaultVersion;

    /**
     * @param string $defaultVersion The version of DataType to create when a
     *                               version is not supplied to create().
     */
    public function __construct($defaultVersion = 'v251')
    {
        $this->defaultVersion = $defaultVersion;
    }

    /**
     * Create a Data Type.
     *
     * @param string $typeName
     * @param \Hl7v2\Encoding\EncodingParameters $encodingParameters
     * @param bool $isSubcomponent
     * @param string $version optional version of a DataType to create
     *
     * @return \Hl7v2\DataType\DataTypeInterface
     *
     * @throws \Hl7v2\Exception\DataTypeError
     */
    public function create(
        $typeName,
        EncodingParameters $encodingParameters,
        $isSubcomponent = false,
        $version = null
    ) {
        if (null === $version) {
            $version = $this->defaultVersion;
        }
        $class = $this->determineClassname($typeName, $version);
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

    private function determineClassname($typeName, $version)
    {
        $classMapKey = $typeName . $version;
        if (array_key_exists($classMapKey, $this->classmap)) {
            return $this->classmap[$classMapKey];
        }
        $name = ucfirst(strtolower($typeName));
        $versionSubNs = strtoupper($version);
        $class = "\\Hl7v2\\DataType\\{$versionSubNs}\\{$name}DataType";
        if (!class_exists($class)) {
            throw new DataTypeError("Unknown {$version} DataType \"{$typeName}\".");
        }
        $this->classmap[$classMapKey] = $class;

        return $class;
    }
}
