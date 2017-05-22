<?php

namespace Hl7v2\DataType;

use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Validation\StringLengthTrait;

abstract class ComponentDataType implements DataTypeInterface, ComponentInterface
{
    use StringLengthTrait;

    /**
     * @var \Hl7v2\Factory\DataTypeFactory
     */
    protected $dataTypeFactory;
    /**
     * @var \Hl7v2\Encoding\EncodingParameters
     */
    protected $encodingParameters;

    public function setDataTypeFactory(DataTypeFactory $dataTypeFactory)
    {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    public function getDataTypeFactory()
    {
        return $this->dataTypeFactory;
    }

    public function setEncodingParameters(EncodingParameters $encodingParameters)
    {
        $this->encodingParameters = $encodingParameters;
    }
}
