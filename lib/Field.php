<?php

namespace Hl7v2;

//use Hl7v2\FieldInterface;

class Field
{
    private $components = array();
    
    public function setComponent(Component $component, $index)
    {
        $this->components[$index] = $component;
    }
    public function getComponent($index)
    {
        return $this->component[$index];
    }
    public function getComponents()
    {
        return $this->components;
    }
}
