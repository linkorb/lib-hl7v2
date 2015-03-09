<?php

namespace Hl7v2\Segment;

class MshSegment extends AbstractSegment implements SegmentInterface
{
    public function __construct($fields = array())
    {
        $this->fields[0] = 'MSH';
        
        if (is_array($fields)) {
            for ($i = 0; $i < count($fields); $i++) {
                $this->setField($i + 1, $fields[$i]);
            }
        }
    }
    
    public function setMessageType(Field $field)
    {
        $this->fields[8];
    }

    public function getMessageType()
    {
        return $this->fields[8];
    }


}
