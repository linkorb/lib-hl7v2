<?php

namespace Hl7v2\Meta\Generator\DataType;

class SimpleDataTypeGenerator extends AbstractDataTypeGenerator
{
    public function getInheritanceClass()
    {
        $namespace = $this->context->getNamespace();
        return "{$namespace}\\AbstractDataType";
    }
}
