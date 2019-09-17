<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Factory\SegmentGroupFactory;
use Hl7v2\Segment\HeaderSegmentInterface;
use Hl7v2\Segment\SegmentInterface;

abstract class AbstractMessage implements MessageInterface
{
    /**
     * @var \Hl7v2\Segment\HeaderSegmentInterface
     */
    protected $messageHeader;
    /**
     * @var \Hl7v2\Factory\SegmentFactory
     */
    protected $segmentFactory;
    /**
     * @var \Hl7v2\Factory\SegmentGroupFactory
     */
    protected $segmentGroupFactory;
    /**
     * @var \Hl7v2\Segment\Group\SegmentGroup[]
     */
    protected $segmentGroups = [];
    /**
     * @var \Hl7v2\Segment\SegmentInterface[]
     */
    protected $segments = [];
    /**
     * @var string
     */
    protected $segmentSeparator;

    public function __construct(
        SegmentFactory $segmentFactory,
        SegmentGroupFactory $segmentGroupFactory,
        $segmentSeparator = "\r"
    ) {
        $this->segmentFactory = $segmentFactory;
        $this->segmentGroupFactory = $segmentGroupFactory;
        $this->segmentSeparator = $segmentSeparator;
    }

    /**
     * Decode the Message, from the supplied Datagram, using the Codec.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param \Hl7v2\Encoding\Codec $codec
     *
     * @throws \Hl7v2\Exception\MessageError
     */
    abstract public function fromDatagram(Datagram $data, Codec $codec);

    /**
     * @param \Hl7v2\Segment\HeaderSegmentInterface $messageHeader
     */
    public function setMessageHeader(HeaderSegmentInterface $messageHeader)
    {
        $this->messageHeader = $messageHeader;
    }

    /**
     * $return \Hl7v2\Segment\HeaderSegmentInterface.
     */
    public function getMessageHeader()
    {
        return $this->messageHeader;
    }

    /**
     * @param \Hl7v2\Segment\SegmentInterface $segment
     */
    public function addSegment(SegmentInterface $segment)
    {
        $this->segments[] = $segment;
    }

    /**
     * @return \Hl7v2\Segment\SegmentInterface[]
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * @return \Hl7v2\Segment\Group\SegmentGroup[]
     */
    public function getSegmentGroups()
    {
        return $this->segmentGroups;
    }

    public function __toString()
    {
        $s = (string) $this->messageHeader;
        foreach ($this->segments as $segment) {
            $s .= "\r" . (string) $segment;
        }

        return $s;
    }
}
