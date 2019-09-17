<?php

namespace Hl7v2\Meta\Generator\DataType;

use Memio\Model\Method;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Memio\Model\Phpdoc\ReturnTag;

class SimpleDataTypeGenerator extends AbstractDataTypeGenerator
{
    public function getInheritanceClass()
    {
        $namespace = $this->context->getRootNamespace();
        return "{$namespace}\\AbstractDataType";
    }

    public function getMethodToString(Method $method, MethodPhpdoc $doc)
    {
        return $method
            ->setPhpdoc($doc->setReturnTag(new ReturnTag('string')))
            ->setBody($this->templating->render('tostring_datatype_simple.twig'))
        ;
    }
}
