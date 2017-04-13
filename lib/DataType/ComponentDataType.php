<?php

namespace Hl7v2\DataType;

use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Validation\StringLengthTrait;

abstract class ComponentDataType implements DataTypeInterface, ComponentInterface
{
    use StringLengthTrait;

    protected $dataTypeFactory;

    public function setDataTypeFactory(DataTypeFactory $dataTypeFactory)
    {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    public function getDataTypeFactory()
    {
        return $this->dataTypeFactory;
    }
}
