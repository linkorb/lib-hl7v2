<?php

namespace Hl7v2\Meta\Helper;

class DataTypeContext
{
    const CLASS_SUFFIX = 'DataType';
    const INTERFACE_NAME = 'DataTypeInterface';

    protected $namespace;

    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    public function getNamespace()
    {
        return $this->namespace;
    }

    public function interfaceClass()
    {
        return "{$this->namespace}\\" . self::INTERFACE_NAME;
    }

    /**
     * Fully qualified class name of the DataType with the specified typeId.
     *
     * @param string $typeId
     * @return string
     */
    public function dataTypeIdToClass($typeId)
    {
        $className = $this->dataTypeIdToClassName($typeId);
        return "{$this->namespace}\\{$className}";
    }

    /**
     * Class name of the DataType with the specified typeId.
     *
     * @param string $typeId
     * @return string
     */
    public function dataTypeIdToClassName($dataTypeId)
    {
        return ucfirst(strtolower($dataTypeId)) . self::CLASS_SUFFIX;
    }
}
