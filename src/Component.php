<?php

namespace Hl7v2;

//use Hl7v2\FieldInterface;

class Component
{
    private $ubcomponents = array();
    
    public function setComponent(SubComponent $subcomponent, $index)
    {
        $this->subcomponents[$index] = $subcomponent;
    }
    public function getSubComponent($index)
    {
        return $this->subcomponent[$index];
    }
    public function getSubComponents()
    {
        return $this->subcomponents;
    }
}
