<?php

namespace Hl7v2\Factory;

use Hl7v2\Segment\Group\SegmentGroup;

class SegmentGroupFactory
{
    /**
     * Create a SegmentGroup.
     *
     * @return \Hl7v2\Segment\Group\SegmentGroup
     */
    public function create()
    {
        return new SegmentGroup;
    }
}
