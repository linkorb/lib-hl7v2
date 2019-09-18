<?php

namespace Hl7v2\Segment\V231;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Error (ERR).
 */
class ErrSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V231\CmDataType[]
     */
    private $errorCodeAndLocation;

    /**
     * @param string $value
     */
    public function addFieldErrorCodeAndLocation(string $value)
    {
        $errorCodeAndLocation = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $errorCodeAndLocation->setValue($value);
        $this->errorCodeAndLocation[] = $errorCodeAndLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType[]
     */
    public function getFieldErrorCodeAndLocation()
    {
        return $this->errorCodeAndLocation;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // ERR.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ERR Segment data contains too few required fields.'
            );
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ErrorCodeAndLocation', 80, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldErrorCodeAndLocation($value);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'ERR';
        $emptyFieldsSinceLastField = 0;

        if (empty($this->getFieldErrorCodeAndLocation())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldErrorCodeAndLocation() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        return $s;
    }
}
