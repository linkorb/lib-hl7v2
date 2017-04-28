<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;

interface SegmentInterface
{
    public function fromDatagram(Datagram $data, Codec $codec);
}
