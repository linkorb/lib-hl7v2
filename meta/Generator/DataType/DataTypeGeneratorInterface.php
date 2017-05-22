<?php

namespace Hl7v2\Meta\Generator\DataType;

use Memio\Model\Method;
use Memio\Model\Phpdoc\MethodPhpdoc;

interface DataTypeGeneratorInterface
{
    public function getClass();
    public function getConstants();
    public function getDescription();
    public function getInheritanceClass();
    public function getMethodToString(Method $method, MethodPhpdoc $doc);
}
