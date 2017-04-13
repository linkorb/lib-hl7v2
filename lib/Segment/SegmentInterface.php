<?php

namespace Hl7v2\Segment;

interface SegmentInterface
{
    /**
     * @deprecated
     */
    public function getName();
    /**
     * @deprecated
     */
    public function setField($index, $value = "");
    /**
     * @deprecated
     */
    public function getField($index);
}
