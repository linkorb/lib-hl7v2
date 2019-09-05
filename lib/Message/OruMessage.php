<?php

namespace Hl7v2\Message;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\DataTypeError;
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
                throw new MessageError("Unable to decode segment {$i} ({$segmentId}) of ORU message. Error in Field.", null, $e);
            } catch (SegmentError $e) {
                throw new MessageError("Unable to decode segment {$i} ({$segmentId}) of ORU message.", null, $e);
            }

            $this->segments[] = $segment;

            if ($segment instanceof PidSegment) {
                $patientGroup = $this->segmentGroupFactory->create();
                $this->segmentGroups[] = $patientGroup;
                $patientGroup->push($segment);
            } elseif ($segment instanceof Pv1Segment
                // TODO || $segment instanceof Pv2Segment
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
