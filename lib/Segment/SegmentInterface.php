<?php

namespace Hl7v2\Segment;

interface SegmentInterface
{
    public function getName();
    public function setField($index, $value = "");
    public function getField($index);
}
