<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\EncodingParameters;

interface SegmentInterface
{
    /**
     * Decode the Segment, from the supplied Datagram, using the Codec.
     *
     * @param \Hl7v2\Encoding\Datagram $datagram
     * @param \Hl7v2\Encoding\Codec $codec
     * @throws \Hl7v2\Exception\SegmentError
     */
    public function fromDatagram(Datagram $datagram, Codec $codec);

    /**
     * @param \Hl7v2\Encoding\EncodingParameters $encodingParameters
     */
    public function setEncodingParameters(EncodingParameters $encodingParameters);

    /**
     * @return \Hl7v2\Encoding\EncodingParameters
     */
    public function getEncodingParameters();
}
