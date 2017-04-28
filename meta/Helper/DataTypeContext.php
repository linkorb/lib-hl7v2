<?php

namespace Hl7v2\Meta\Helper;

class DataTypeContext
{
    const CLASS_SUFFIX = 'DataType';

    protected $namespace;

    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    public function getNamespace()
    {
        return $this->namespace;
    }

    public function dataTypeIdToFQClassName($typeId)
    {
        $className = $this->dataTypeIdToClassName($typeId);
        return "{$this->namespace}\\{$className}";
    }

    public function dataTypeIdToClassName($dataTypeId)
    {
        return ucfirst(strtolower($dataTypeId)) . self::CLASS_SUFFIX;
    }
}
