<?php

namespace Hl7v2\Meta\Generator\DataType;

interface DataTypeGeneratorInterface
{
    public function getClass();
    public function getConstants();
    public function getDescription();
    public function getInheritanceClass();
}
