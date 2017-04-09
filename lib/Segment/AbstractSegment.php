<?php

namespace Hl7v2\Segment;

use InvalidArgumentException;

abstract class AbstractSegment
{
    protected $fields = array();
    
    public function __construct($name, $fields)
    {
        if ((!$name) || (strlen($name) != 3) || (strtoupper($name) != $name)) {
            throw new InvalidArgumentException("Name should be 3 characters, uppercase");
        }
        $this->fields[0] = $name;
        
        if (is_array($fields)) {
            for ($i = 0; $i < count($fields); $i++) {
                $this->setField($i + 1, $fields[$i]);
            }
        }
    }
    
    public function setField($index, $value = "")
    {
        if (!$index) {
            throw new InvalidArgumentException("No index or value");
        }

        // Fill in the blanks...
        for ($i = count($this->fields); $i < $index; $i++) {
            $this->fields[$i] = "";
        }
        $this->fields[$index] = $value;
        return $this;
    }
    
    public function getField($index)
    {
        if (!isset($this->fields[$index])) {
            return null;
        }
        return $this->fields[$index];
    }
    
    public function getName()
    {
        return $this->fields[0];
    }
}
