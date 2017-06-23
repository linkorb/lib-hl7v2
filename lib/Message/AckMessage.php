<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;

/**
 * Acknowledgement Message (ACK).
 */
class AckMessage extends AbstractMessage
{
    public function fromDatagram(Datagram $data, Codec $codec)
    {
        throw new RuntimeException('Method is not implemented.');
    }
}
