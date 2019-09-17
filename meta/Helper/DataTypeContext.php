<?php

namespace Hl7v2\Meta\Helper;

class DataTypeContext
{
    const CLASS_SUFFIX = 'DataType';
    const INTERFACE_NAME = 'DataTypeInterface';

    protected $rootNamespace;
    protected $versionedNamespace;

    public function __construct($rootNamespace, $versionedSubNamespace)
    {
        $this->rootNamespace = $rootNamespace;
        $this->versionedNamespace = $rootNamespace . '\\' . $versionedSubNamespace;
    }

    public function getRootNamespace()
    {
        return $this->rootNamespace;
    }

    public function interfaceClass()
    {
        return "{$this->rootNamespace}\\" . self::INTERFACE_NAME;
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
        return "{$this->versionedNamespace}\\{$className}";
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
