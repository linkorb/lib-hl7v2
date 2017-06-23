<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Segment\MshSegment;
use Hl7v2\Segment\SegmentInterface;

interface MessageInterface
{
    /**
     * Decode the Message, from the supplied Datagram, using the Codec.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param \Hl7v2\Encoding\Codec $codec
     * @throws \Hl7v2\Exception\MessageError
     */
    public function fromDatagram(Datagram $data, Codec $codec);

    /**
     * @param \Hl7v2\Segment\MshSegment $messageHeader
     */
    public function setMessageHeader(MshSegment $messageHeader);

    /**
     * @return \Hl7v2\Segment\MshSegment
     */
    public function getMessageHeader();

    /**
     * @param \Hl7v2\Segment\SegmentInterface $segment
     */
    public function addSegment(SegmentInterface $segment);

    /**
     * @return \Hl7v2\Segment\SegmentInterface[]
     */
    public function getSegments();

    /**
     * @return \Hl7v2\Segment\SegmentGroup[]
     */
    public function getSegmentGroups();
}
