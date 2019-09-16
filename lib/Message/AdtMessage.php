<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;

/**
 * Patient Administration (ADT)
 *
 *    EVN -> PID -> PV1
 *
 */
class AdtMessage extends AbstractMessage
{
    public function fromDatagram(Datagram $data, Codec $codec)
    {
        throw new \RuntimeException(__METHOD__ . ' is not implemented.');
    }
}
