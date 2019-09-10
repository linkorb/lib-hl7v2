<?php

namespace Hl7v2\Segment\V251;

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
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $eventTypeCode = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $recordedDatetime;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $datetimePlannedEvent = null;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $eventReasonCode = null;
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $operatorId = [];
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $eventOccurred = null;
    /**
     * @var \Hl7v2\DataType\V251\HdDataType
     */
    private $eventFacility = null;

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
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
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
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldOperatorId(
        string $idNumber = null,
        string $familyNameSurname = null,
        string $familyNameOwnSurnamePrefix = null,
        string $familyNameOwnSurname = null,
        string $familyNameSurnamePrefixFromPartner = null,
        string $familyNameSurnameFromPartner = null,
        string $givenName = null,
        string $secondNames = null,
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
        string $nameRepresentationCode = null,
        string $nameContextIdentifier = null,
        string $nameContextText = null,
        string $nameContextNameOfCodingSystem = null,
        string $nameContextAltIdentifier = null,
        string $nameContextAltText = null,
        string $nameContextNameOfAltCodingSystem = null,
        string $nameValidityRangeRangeStartDateTimeTime = null,
        string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        string $nameValidityRangeRangeEndDateTimeTime = null,
        string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        string $nameAssemblyOrder = null,
        string $effectiveDateTime = null,
        string $effectiveDateDegreeOfPrecision = null,
        string $expirationDateTime = null,
        string $expirationDateDegreeOfPrecision = null,
        string $professionalSuffix = null,
        string $assigningJurisdictionIdentifier = null,
        string $assigningJurisdictionText = null,
        string $assigningJurisdictionNameOfCodingSystem = null,
        string $assigningJurisdictionAltIdentifier = null,
        string $assigningJurisdictionAltText = null,
        string $assigningJurisdictionNameOfAltCodingSystem = null,
        string $assigningJurisdictionCodingSystemVersionId = null,
        string $assigningJurisdictionAltCodingSystemVersionId = null,
        string $assigningJurisdictionOriginalText = null,
        string $assigningAgencyIdentifier = null,
        string $assigningAgencyText = null,
        string $assigningAgencyNameOfCodingSystem = null,
        string $assigningAgencyAltIdentifier = null,
        string $assigningAgencyAltText = null,
        string $assigningAgencyNameOfAltCodingSystem = null,
        string $assigningAgencyCodingSystemVersionId = null,
        string $assigningAgencyAltCodingSystemVersionId = null,
        string $assigningAgencyOriginalText = null
    ) {
        $operatorId = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->operatorId[] = $operatorId;
        $operatorId->setIdNumber($idNumber);
        $operatorId->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $operatorId->setGivenName($givenName);
        $operatorId->setSecondNames($secondNames);
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
        $operatorId->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $operatorId->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $operatorId->setNameAssemblyOrder($nameAssemblyOrder);
        $operatorId->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $operatorId->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $operatorId->setProfessionalSuffix($professionalSuffix);
        $operatorId->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $operatorId->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
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
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldEventFacility(
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->eventFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->eventFacility->setNamespaceId($namespaceId);
        $this->eventFacility->setUniversalId($universalId);
        $this->eventFacility->setUniversalIdType($universalIdType);
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldEventTypeCode()
    {
        return $this->eventTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldRecordedDatetime()
    {
        return $this->recordedDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldDatetimePlannedEvent()
    {
        return $this->datetimePlannedEvent;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getFieldEventReasonCode()
    {
        return $this->eventReasonCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldOperatorId()
    {
        return $this->operatorId;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldEventOccurred()
    {
        return $this->eventOccurred;
    }

    /**
     * @return \Hl7v2\DataType\V251\HdDataType
     */
    public function getFieldEventFacility()
    {
        return $this->eventFacility;
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
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OperatorId', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                    $familyNameSurname,
                    $familyNameOwnSurnamePrefix,
                    $familyNameOwnSurname,
                    $familyNameSurnamePrefixFromPartner,
                    $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
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
                list(
                    $nameContextIdentifier,
                    $nameContextText,
                    $nameContextNameOfCodingSystem,
                    $nameContextAltIdentifier,
                    $nameContextAltText,
                    $nameContextNameOfAltCodingSystem,
                ),
                list(
                    list(
                        $nameValidityRangeRangeStartDateTimeTime,
                        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $nameValidityRangeRangeEndDateTimeTime,
                        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                $nameAssemblyOrder,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                    $assigningJurisdictionIdentifier,
                    $assigningJurisdictionText,
                    $assigningJurisdictionNameOfCodingSystem,
                    $assigningJurisdictionAltIdentifier,
                    $assigningJurisdictionAltText,
                    $assigningJurisdictionNameOfAltCodingSystem,
                    $assigningJurisdictionCodingSystemVersionId,
                    $assigningJurisdictionAltCodingSystemVersionId,
                    $assigningJurisdictionOriginalText,
                ),
                list(
                    $assigningAgencyIdentifier,
                    $assigningAgencyText,
                    $assigningAgencyNameOfCodingSystem,
                    $assigningAgencyAltIdentifier,
                    $assigningAgencyAltText,
                    $assigningAgencyNameOfAltCodingSystem,
                    $assigningAgencyCodingSystemVersionId,
                    $assigningAgencyAltCodingSystemVersionId,
                    $assigningAgencyOriginalText,
                ),
            ) = $components;
            $this->addFieldOperatorId(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
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
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
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

        // EVN.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EventFacility', 241, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEventFacility(
            $namespaceId,
            $universalId,
            $universalIdType
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
            if ($value === '') {
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
            if ($value === '') {
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
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldEventFacility()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEventFacility();
            if ($value === '') {
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
