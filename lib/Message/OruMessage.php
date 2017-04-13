<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Exception\MessageError;

/**
 * Unsolicited Observation Message (ORU).
 *
 *
 * The kind of message this class can handle is as follows:-
 *
 * {PID -> [PV1] -> [PV2] -> { OBR -> [{ OBX }] } }
 *
 * That is:-
 * - There may be One or More PID
 * - PID is optionally followed by PV1 (and optionally PV2)
 * - OBR is followed by Zero or More OBX
 * - There may be One or More OBR (each followed by zero or more OBX)
 *
 */
class OruMessage extends AbstractMessage
{
    public function fromDatagram(Datagram $data, Codec $codec)
    {
        $characterEncoding = $data->getEncodingParameters()->getCharacterEncoding();

        while (false !== $codec->advanceToSegment($data)
            && false !== ($segmentId = $codec->extractSegmentId($data))
        ) {
            try {
                $segment = $this->segmentFactory->create($segmentId, $characterEncoding);
                $segment->fromDatagram($data, $codec);
            } catch (SegmentError $e) {
                throw new MessageError('Unable to decode ORU message.', null, $e);
            }
            $this->segments[] = $segment;
        }
    }
}
