<?php

namespace Hl7v2\Segment\V231;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Event Type (EVN).
 */
class EvnSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $eventTypeCode = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $recordedDatetime;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $datetimePlannedEvent = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $eventReasonCode = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $operatorId = [];
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $eventOccurred = null;

    /**
     * @param string $value
     */
    public function setFieldEventTypeCode(string $value)
    {
        $this->eventTypeCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->eventTypeCode->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldRecordedDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->recordedDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->recordedDatetime->setTime($time);
        $this->recordedDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimePlannedEvent(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->datetimePlannedEvent = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->datetimePlannedEvent->setTime($time);
        $this->datetimePlannedEvent->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldEventReasonCode(string $value)
    {
        $this->eventReasonCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->eventReasonCode->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     */
    public function addFieldOperatorId(
        string $idNumber = null,
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $sourceTable = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $nameTypeCode = null,
        string $identifierCheckDigit = null,
        string $checkDigitScheme = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null
    ) {
        $operatorId = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->operatorId[] = $operatorId;
        $operatorId->setIdNumber($idNumber);
        $operatorId->setFamilyName($familyName);
        $operatorId->setGivenName($givenName);
        $operatorId->setMiddleInitialOrName($middleInitialOrName);
        $operatorId->setSuffix($suffix);
        $operatorId->setPrefix($prefix);
        $operatorId->setDegree($degree);
        $operatorId->setSourceTable($sourceTable);
        $operatorId->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $operatorId->setNameTypeCode($nameTypeCode);
        $operatorId->setIdentifierCheckDigit($identifierCheckDigit);
        $operatorId->setCheckDigitScheme($checkDigitScheme);
        $operatorId->setIdentifierTypeCode($identifierTypeCode);
        $operatorId->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $operatorId->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldEventOccurred(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->eventOccurred = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->eventOccurred->setTime($time);
        $this->eventOccurred->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldEventTypeCode()
    {
        return $this->eventTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldRecordedDatetime()
    {
        return $this->recordedDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldDatetimePlannedEvent()
    {
        return $this->datetimePlannedEvent;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldEventReasonCode()
    {
        return $this->eventReasonCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldOperatorId()
    {
        return $this->operatorId;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldEventOccurred()
    {
        return $this->eventOccurred;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // EVN.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'EVN Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('EventTypeCode', 3, $datagram->getPositionalState());
        $this->setFieldEventTypeCode($codec->extractComponent($datagram));

        // EVN.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'EVN Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('RecordedDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldRecordedDatetime(
            $time,
            $degreeOfPrecision
        );

        // EVN.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DatetimePlannedEvent', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDatetimePlannedEvent(
            $time,
            $degreeOfPrecision
        );

        // EVN.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EventReasonCode', 3, $datagram->getPositionalState());
        $this->setFieldEventReasonCode($codec->extractComponent($datagram));

        // EVN.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OperatorId', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldOperatorId(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode
            );
        }

        // EVN.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EventOccurred', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEventOccurred(
            $time,
            $degreeOfPrecision
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'EVN';
        $emptyFieldsSinceLastField = 0;

        if (!$this->getFieldEventTypeCode() || !$this->getFieldEventTypeCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldEventTypeCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldRecordedDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldRecordedDatetime();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldDatetimePlannedEvent()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDatetimePlannedEvent();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldEventReasonCode() || !$this->getFieldEventReasonCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldEventReasonCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldOperatorId())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOperatorId() as $repetition) {
                $value = (string) $repetition;
                if ('' === $value) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldEventOccurred()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEventOccurred();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        return $s;
    }
}
