<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\MessageError;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\ObrSegment;
use Hl7v2\Segment\ObxSegment;
use Hl7v2\Segment\PidSegment;
use Hl7v2\Segment\Pv1Segment;

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
        $patientGroup = null;
        $obrGroup = null;

        while (false !== $codec->advanceToSegment($data)
            && false !== ($segmentId = $codec->extractSegmentId($data))
        ) {
            try {
                $segment = $this
                    ->segmentFactory
                    ->create($segmentId, $data->getEncodingParameters())
                ;
                $segment->fromDatagram($data, $codec);
            } catch (SegmentError $e) {
                throw new MessageError('Unable to decode ORU message.', null, $e);
            }

            $this->segments[] = $segment;

            if ($segment instanceof PidSegment) {
                $patientGroup = $this->segmentGroupFactory->create();
                $this->segmentGroups[] = $patientGroup;
                $patientGroup->push($segment);
            } elseif ($segment instanceof Pv1Segment
                || $segment instanceof Pv2Segment
            ) {
                $patientGroup->push($segment);
            } elseif ($segment instanceof ObrSegment) {
                $obrGroup = $this->segmentGroupFactory->create();
                $patientGroup->push($obrGroup);
                $obrGroup->push($segment);
            } elseif ($segment instanceof ObxSegment) {
                $obrGroup->push($segment);
            }
        }
    }
}
