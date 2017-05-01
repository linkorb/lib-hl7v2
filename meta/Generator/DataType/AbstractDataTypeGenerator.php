<?php

namespace Hl7v2\Meta\Generator\DataType;

use Hl7v2\Meta\Helper\DataTypeContext;

abstract class AbstractDataTypeGenerator implements DataTypeGeneratorInterface
{
    protected $constants = [];
    protected $context;
    protected $maxLen;
    protected $typeId;
    protected $typeName;

    public function __construct(DataTypeContext $context, $typeId, $typeInfo)
    {
        $this->context = $context;
        $this->typeId = $typeId;
        $this->typeName = $typeInfo['name'];
        if (array_key_exists('len', $typeInfo)) {
            if (is_numeric($typeInfo['len'])) {
                $this->maxLen = (int) $typeInfo['len'];
                $this->constants[] = ['MAX_LEN', (string) $this->maxLen];
            } elseif (is_null($typeInfo['len'])) {
                $this->constants[] = ['MAX_LEN', 'null'];
            }
        }
    }

    public function getConstants()
    {
        return $this->constants;
    }

    public function getClass()
    {
        return $this->context->dataTypeIdToFQClassName($this->typeId);
    }

    public function getDescription()
    {
        return "{$this->typeName} ({$this->typeId}).";
    }

    abstract public function getInheritanceClass();
}
