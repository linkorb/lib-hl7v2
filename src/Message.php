<?php

namespace Hl7v2;

use Hl7v2\Segment\SegmentInterface;

class Message
{
    private $segments = array();
    
    public function addSegment(SegmentInterface $segment)
    {
        $this->segments[] = $segment;
        return $this;
    }
    
    public function setSegment(SegmentInterface $segment, $index)
    {
        $this->segments[$index] = $segment;
        return $this;
    }
    
    public function getSegmentByIndex($index)
    {
        if (!isset($this->segments)) {
            return null;
        }
        return $this->segments[$index];
    }

    public function getSegmentsByName($name)
    {
        $res = array();
        foreach ($this->segments as $segment) {
            if ($segment->getName() == $name) {
                $res[] = $segment;
            }
        }
        return $res;
    }

}
