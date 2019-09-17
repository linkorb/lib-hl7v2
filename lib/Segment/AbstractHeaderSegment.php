<?php

namespace Hl7v2\Segment;

/**
 * Base class of all MshSegment classes.
 */
abstract class AbstractHeaderSegment extends AbstractSegment implements HeaderSegmentInterface
{
    abstract public function getFieldMessageType();
}
