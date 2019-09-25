<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\DataTypeError;
use Hl7v2\Exception\MessageError;
use Hl7v2\Exception\SegmentError;

/**
 * Acknowledgement Message (ACK).
 */
class AckMessage extends AbstractMessage
{
    public function fromDatagram(Datagram $data, Codec $codec)
    {
        $i = 1;
        while (false !== $codec->advanceToSegment($data)
            && false !== ($segmentId = $codec->extractSegmentId($data))
        ) {
            ++$i;
            try {
                $segment = $this
                    ->segmentFactory
                    ->create($segmentId, $data->getEncodingParameters())
                ;
                $segment->fromDatagram($data, $codec);
            } catch (DataTypeError $e) {
                throw new MessageError("Unable to decode segment {$i} ({$segmentId}) of ACK message. Error in Field.", null, $e);
            } catch (SegmentError $e) {
                throw new MessageError("Unable to decode segment {$i} ({$segmentId}) of ACK message.", null, $e);
            }

            $this->segments[] = $segment;
        }
    }
}
