<?php

class StType implements TypeInterface, ValueTypeInterface
{
    private $value;
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getValue()
    {
        return $this->value;
    }
}
