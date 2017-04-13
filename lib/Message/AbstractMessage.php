<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Segment\MshSegment;

abstract class AbstractMessage
{
    /**
     * @var \Hl7v2\Segment\MshSegment
     */
    protected $messageHeader;
    /**
     * @var \Hl7v2\Factory\SegmentFactory
     */
    protected $segmentFactory;

    protected $segments = [];

    public function __construct(SegmentFactory $segmentFactory)
    {
        $this->segmentFactory = $segmentFactory;
    }

    /**
     * Decode the Message, from the supplied Datagram, using the Codec.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param \Hl7v2\Encoding\Codec $codec
     * @throws \Hl7v2\Exception\MessageError
     */
    abstract public function fromDatagram(Datagram $data, Codec $codec);

    /**
     * @param \Hl7v2\Segment\MshSegment $messageHeader
     */
    public function setMessageHeader(MshSegment $messageHeader)
    {
        $this->messageHeader = $messageHeader;
    }

    public function getSegments()
    {
        return $this->segments;
    }
}
