<?php

namespace Hl7v2\DataType;

use Hl7v2\Factory\DataTypeFactory;

interface ComponentInterface
{
    public function setDataTypeFactory(DataTypeFactory $dataTypeFactory);

    public function getDataTypeFactory();
}
