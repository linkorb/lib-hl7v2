<?php

namespace Hl7v2\Meta\Generator\DataType;

class InheritedDataTypeGenerator extends AbstractDataTypeGenerator
{
    private $parentDataTypeId;

    public function setParentDataTypeId($parentDataTypeId)
    {
        $this->parentDataTypeId = $parentDataTypeId;
    }

    public function getInheritanceClass()
    {
        return $this->context->dataTypeIdToFQClassName($this->parentDataTypeId);
    }
}
