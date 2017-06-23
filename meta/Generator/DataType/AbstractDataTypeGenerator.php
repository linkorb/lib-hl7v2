<?php

namespace Hl7v2\Meta\Generator\DataType;

use Memio\Model\Method;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Twig_Environment;

use Hl7v2\Meta\Helper\DataTypeContext;

abstract class AbstractDataTypeGenerator implements DataTypeGeneratorInterface
{
    protected $constants = [];
    protected $context;
    protected $maxLen;
    protected $templating;
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

    public function setTemplating(Twig_Environment $templating)
    {
        $this->templating = $templating;
    }

    public function getConstants()
    {
        return $this->constants;
    }

    public function getClass()
    {
        return $this->context->dataTypeIdToClass($this->typeId);
    }

    public function getDescription()
    {
        return "{$this->typeName} ({$this->typeId}).";
    }

    abstract public function getInheritanceClass();

    abstract public function getMethodToString(Method $method, MethodPhpdoc $doc);
}
