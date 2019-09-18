<?php

namespace Hl7v2\Segment\V251;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Common Order (ORC).
 */
class OrcSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $orderControl;
    /**
     * @var \Hl7v2\DataType\V251\EiDataType
     */
    private $placerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V251\EiDataType
     */
    private $fillerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V251\EiDataType
     */
    private $placerGroupNumber = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $orderStatus = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $responseFlag = null;
    /**
     * @var \Hl7v2\DataType\V251\TqDataType[]
     */
    private $quantityTiming = [];
    /**
     * @var \Hl7v2\DataType\V251\EipDataType
     */
    private $parent = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $dateTimeOfTransaction = null;
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $enteredBy = [];
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $verifiedBy = [];
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $orderingProvider = [];
    /**
     * @var \Hl7v2\DataType\V251\PlDataType
     */
    private $entererLocation = null;
    /**
     * @var \Hl7v2\DataType\V251\XtnDataType[]
     */
    private $callBackPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $orderEffectiveDateTime = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $orderControlCodeReason = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $enteringOrganization = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $enteringDevice = null;
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $actionBy = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $advancedBeneficiaryNoticeCode = null;
    /**
     * @var \Hl7v2\DataType\V251\XonDataType[]
     */
    private $orderingFacilityName = [];
    /**
     * @var \Hl7v2\DataType\V251\XadDataType[]
     */
    private $orderingFacilityAddress = [];
    /**
     * @var \Hl7v2\DataType\V251\XtnDataType[]
     */
    private $orderingFacilityPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\V251\XadDataType[]
     */
    private $orderingProviderAddress = [];
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $orderStatusModifier = null;
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $advancedBeneficiaryNoticeOverrideReason = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $fillerExpectedAvailabilityDateTime = null;
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $confidentialityCode = null;
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $orderType = null;
    /**
     * @var \Hl7v2\DataType\V251\CneDataType
     */
    private $entererAuthorizationMode = null;
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $parentUniversalServiceIdentifier = null;

    /**
     * @param string $value
     */
    public function setFieldOrderControl(string $value)
    {
        $this->orderControl = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->orderControl->setValue($value);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldPlacerOrderNumber(
        string $entityIdentifier = null,
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->placerOrderNumber = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters)
        ;
        $this->placerOrderNumber->setEntityIdentifier($entityIdentifier);
        $this->placerOrderNumber->setNamespaceId($namespaceId);
        $this->placerOrderNumber->setUniversalId($universalId);
        $this->placerOrderNumber->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldFillerOrderNumber(
        string $entityIdentifier = null,
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->fillerOrderNumber = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters)
        ;
        $this->fillerOrderNumber->setEntityIdentifier($entityIdentifier);
        $this->fillerOrderNumber->setNamespaceId($namespaceId);
        $this->fillerOrderNumber->setUniversalId($universalId);
        $this->fillerOrderNumber->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldPlacerGroupNumber(
        string $entityIdentifier = null,
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->placerGroupNumber = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters)
        ;
        $this->placerGroupNumber->setEntityIdentifier($entityIdentifier);
        $this->placerGroupNumber->setNamespaceId($namespaceId);
        $this->placerGroupNumber->setUniversalId($universalId);
        $this->placerGroupNumber->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $value
     */
    public function setFieldOrderStatus(string $value)
    {
        $this->orderStatus = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->orderStatus->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldResponseFlag(string $value)
    {
        $this->responseFlag = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->responseFlag->setValue($value);
    }

    /**
     * @param string $quantityQuantity
     * @param string $quantityUnitsIdentifier
     * @param string $quantityUnitsText
     * @param string $quantityUnitsNameOfCodingSystem
     * @param string $quantityUnitsAltIdentifier
     * @param string $quantityUnitsAltText
     * @param string $quantityUnitsNameOfAltCodingSystem
     * @param string $intervalRepeatPattern
     * @param string $intervalExplicitTimeInterval
     * @param string $duration
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     * @param string $priority
     * @param string $condition
     * @param string $text
     * @param string $conjunction
     * @param string $orderSequencingSequenceResultsFlag
     * @param string $orderSequencingPlacerOrderNumberEntityIdentifier
     * @param string $orderSequencingPlacerOrderNumberNamespaceId
     * @param string $orderSequencingFillerOrderNumberEntityIdentifier
     * @param string $orderSequencingFillerOrderNumberNamespaceId
     * @param string $orderSequencingSequenceConditionValue
     * @param string $orderSequencingMaximumNumberOfRepeats
     * @param string $orderSequencingPlacerOrderNumberUniversalId
     * @param string $orderSequencingPlacerOrderNumberUniversalIdType
     * @param string $orderSequencingFillerOrderNumberUniversalId
     * @param string $orderSequencingFillerOrderNumberUniversalIdType
     * @param string $occurrenceDurationIdentifier
     * @param string $occurrenceDurationText
     * @param string $occurrenceDurationNameOfCodingSystem
     * @param string $occurrenceDurationAltIdentifier
     * @param string $occurrenceDurationAltText
     * @param string $occurrenceDurationNameOfAltCodingSystem
     * @param string $totalOccurrences
     */
    public function addFieldQuantityTiming(
        string $quantityQuantity = null,
        string $quantityUnitsIdentifier = null,
        string $quantityUnitsText = null,
        string $quantityUnitsNameOfCodingSystem = null,
        string $quantityUnitsAltIdentifier = null,
        string $quantityUnitsAltText = null,
        string $quantityUnitsNameOfAltCodingSystem = null,
        string $intervalRepeatPattern = null,
        string $intervalExplicitTimeInterval = null,
        string $duration = null,
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null,
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null,
        string $priority = null,
        string $condition = null,
        string $text = null,
        string $conjunction = null,
        string $orderSequencingSequenceResultsFlag = null,
        string $orderSequencingPlacerOrderNumberEntityIdentifier = null,
        string $orderSequencingPlacerOrderNumberNamespaceId = null,
        string $orderSequencingFillerOrderNumberEntityIdentifier = null,
        string $orderSequencingFillerOrderNumberNamespaceId = null,
        string $orderSequencingSequenceConditionValue = null,
        string $orderSequencingMaximumNumberOfRepeats = null,
        string $orderSequencingPlacerOrderNumberUniversalId = null,
        string $orderSequencingPlacerOrderNumberUniversalIdType = null,
        string $orderSequencingFillerOrderNumberUniversalId = null,
        string $orderSequencingFillerOrderNumberUniversalIdType = null,
        string $occurrenceDurationIdentifier = null,
        string $occurrenceDurationText = null,
        string $occurrenceDurationNameOfCodingSystem = null,
        string $occurrenceDurationAltIdentifier = null,
        string $occurrenceDurationAltText = null,
        string $occurrenceDurationNameOfAltCodingSystem = null,
        string $totalOccurrences = null
    ) {
        $quantityTiming = $this
            ->dataTypeFactory
            ->create('TQ', $this->encodingParameters)
        ;
        $this->quantityTiming[] = $quantityTiming;
        $quantityTiming->setQuantity(
            $quantityQuantity,
            $quantityUnitsIdentifier,
            $quantityUnitsText,
            $quantityUnitsNameOfCodingSystem,
            $quantityUnitsAltIdentifier,
            $quantityUnitsAltText,
            $quantityUnitsNameOfAltCodingSystem
        );
        $quantityTiming->setInterval($intervalRepeatPattern, $intervalExplicitTimeInterval);
        $quantityTiming->setDuration($duration);
        $quantityTiming->setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision);
        $quantityTiming->setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision);
        $quantityTiming->setPriority($priority);
        $quantityTiming->setCondition($condition);
        $quantityTiming->setText($text);
        $quantityTiming->setConjunction($conjunction);
        $quantityTiming->setOrderSequencing(
            $orderSequencingSequenceResultsFlag,
            $orderSequencingPlacerOrderNumberEntityIdentifier,
            $orderSequencingPlacerOrderNumberNamespaceId,
            $orderSequencingFillerOrderNumberEntityIdentifier,
            $orderSequencingFillerOrderNumberNamespaceId,
            $orderSequencingSequenceConditionValue,
            $orderSequencingMaximumNumberOfRepeats,
            $orderSequencingPlacerOrderNumberUniversalId,
            $orderSequencingPlacerOrderNumberUniversalIdType,
            $orderSequencingFillerOrderNumberUniversalId,
            $orderSequencingFillerOrderNumberUniversalIdType
        );
        $quantityTiming->setOccurrenceDuration(
            $occurrenceDurationIdentifier,
            $occurrenceDurationText,
            $occurrenceDurationNameOfCodingSystem,
            $occurrenceDurationAltIdentifier,
            $occurrenceDurationAltText,
            $occurrenceDurationNameOfAltCodingSystem
        );
        $quantityTiming->setTotalOccurrences($totalOccurrences);
    }

    /**
     * @param string $placerAssignedIdentifierEntityIdentifier
     * @param string $placerAssignedIdentifierNamespaceId
     * @param string $placerAssignedIdentifierUniversalId
     * @param string $placerAssignedIdentifierUniversalIdType
     * @param string $fillerAssignedIdentifierEntityIdentifier
     * @param string $fillerAssignedIdentifierNamespaceId
     * @param string $fillerAssignedIdentifierUniversalId
     * @param string $fillerAssignedIdentifierUniversalIdType
     */
    public function setFieldParent(
        string $placerAssignedIdentifierEntityIdentifier = null,
        string $placerAssignedIdentifierNamespaceId = null,
        string $placerAssignedIdentifierUniversalId = null,
        string $placerAssignedIdentifierUniversalIdType = null,
        string $fillerAssignedIdentifierEntityIdentifier = null,
        string $fillerAssignedIdentifierNamespaceId = null,
        string $fillerAssignedIdentifierUniversalId = null,
        string $fillerAssignedIdentifierUniversalIdType = null
    ) {
        $this->parent = $this
            ->dataTypeFactory
            ->create('EIP', $this->encodingParameters)
        ;
        $this->parent->setPlacerAssignedIdentifier(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType
        );
        $this->parent->setFillerAssignedIdentifier(
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType
        );
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDateTimeOfTransaction(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->dateTimeOfTransaction = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->dateTimeOfTransaction->setTime($time);
        $this->dateTimeOfTransaction->setDegreeOfPrecision($degreeOfPrecision);
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
    public function addFieldEnteredBy(
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
        $enteredBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->enteredBy[] = $enteredBy;
        $enteredBy->setIdNumber($idNumber);
        $enteredBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $enteredBy->setGivenName($givenName);
        $enteredBy->setSecondNames($secondNames);
        $enteredBy->setSuffix($suffix);
        $enteredBy->setPrefix($prefix);
        $enteredBy->setDegree($degree);
        $enteredBy->setSourceTable($sourceTable);
        $enteredBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $enteredBy->setNameTypeCode($nameTypeCode);
        $enteredBy->setIdentifierCheckDigit($identifierCheckDigit);
        $enteredBy->setCheckDigitScheme($checkDigitScheme);
        $enteredBy->setIdentifierTypeCode($identifierTypeCode);
        $enteredBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $enteredBy->setNameRepresentationCode($nameRepresentationCode);
        $enteredBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $enteredBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $enteredBy->setNameAssemblyOrder($nameAssemblyOrder);
        $enteredBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $enteredBy->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $enteredBy->setProfessionalSuffix($professionalSuffix);
        $enteredBy->setAssigningJurisdiction(
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
        $enteredBy->setAssigningAgency(
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
    public function addFieldVerifiedBy(
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
        $verifiedBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->verifiedBy[] = $verifiedBy;
        $verifiedBy->setIdNumber($idNumber);
        $verifiedBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $verifiedBy->setGivenName($givenName);
        $verifiedBy->setSecondNames($secondNames);
        $verifiedBy->setSuffix($suffix);
        $verifiedBy->setPrefix($prefix);
        $verifiedBy->setDegree($degree);
        $verifiedBy->setSourceTable($sourceTable);
        $verifiedBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $verifiedBy->setNameTypeCode($nameTypeCode);
        $verifiedBy->setIdentifierCheckDigit($identifierCheckDigit);
        $verifiedBy->setCheckDigitScheme($checkDigitScheme);
        $verifiedBy->setIdentifierTypeCode($identifierTypeCode);
        $verifiedBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $verifiedBy->setNameRepresentationCode($nameRepresentationCode);
        $verifiedBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $verifiedBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $verifiedBy->setNameAssemblyOrder($nameAssemblyOrder);
        $verifiedBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $verifiedBy->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $verifiedBy->setProfessionalSuffix($professionalSuffix);
        $verifiedBy->setAssigningJurisdiction(
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
        $verifiedBy->setAssigningAgency(
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
    public function addFieldOrderingProvider(
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
        $orderingProvider = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->orderingProvider[] = $orderingProvider;
        $orderingProvider->setIdNumber($idNumber);
        $orderingProvider->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $orderingProvider->setGivenName($givenName);
        $orderingProvider->setSecondNames($secondNames);
        $orderingProvider->setSuffix($suffix);
        $orderingProvider->setPrefix($prefix);
        $orderingProvider->setDegree($degree);
        $orderingProvider->setSourceTable($sourceTable);
        $orderingProvider->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $orderingProvider->setNameTypeCode($nameTypeCode);
        $orderingProvider->setIdentifierCheckDigit($identifierCheckDigit);
        $orderingProvider->setCheckDigitScheme($checkDigitScheme);
        $orderingProvider->setIdentifierTypeCode($identifierTypeCode);
        $orderingProvider->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $orderingProvider->setNameRepresentationCode($nameRepresentationCode);
        $orderingProvider->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $orderingProvider->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $orderingProvider->setNameAssemblyOrder($nameAssemblyOrder);
        $orderingProvider->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $orderingProvider->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $orderingProvider->setProfessionalSuffix($professionalSuffix);
        $orderingProvider->setAssigningJurisdiction(
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
        $orderingProvider->setAssigningAgency(
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
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldEntererLocation(
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $personLocationType = null,
        string $building = null,
        string $floor = null,
        string $locationDescription = null,
        string $comprehensiveLocationIdentifierEntityIdentifier = null,
        string $comprehensiveLocationIdentifierNamespaceId = null,
        string $comprehensiveLocationIdentifierUniversalId = null,
        string $comprehensiveLocationIdentifierUniversalIdType = null,
        string $assigningAuthorityForLocationNamespaceId = null,
        string $assigningAuthorityForLocationUniversalId = null,
        string $assigningAuthorityForLocationUniversalIdType = null
    ) {
        $this->entererLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->encodingParameters)
        ;
        $this->entererLocation->setPointOfCare($pointOfCare);
        $this->entererLocation->setRoom($room);
        $this->entererLocation->setBed($bed);
        $this->entererLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->entererLocation->setLocationStatus($locationStatus);
        $this->entererLocation->setPersonLocationType($personLocationType);
        $this->entererLocation->setBuilding($building);
        $this->entererLocation->setFloor($floor);
        $this->entererLocation->setLocationDescription($locationDescription);
        $this->entererLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->entererLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $localNumber
     * @param string $extension
     * @param string $anyText
     * @param string $extensionPrefix
     * @param string $speedDialCode
     * @param string $unformattedTelephoneNumber
     */
    public function addFieldCallBackPhoneNumber(
        string $telephoneNumber = null,
        string $telecommunicationUseCode = null,
        string $telepcommunicationEquipmentType = null,
        string $emailAddress = null,
        string $countryCode = null,
        string $areaCityCode = null,
        string $localNumber = null,
        string $extension = null,
        string $anyText = null,
        string $extensionPrefix = null,
        string $speedDialCode = null,
        string $unformattedTelephoneNumber = null
    ) {
        $callBackPhoneNumber = $this
            ->dataTypeFactory
            ->create('XTN', $this->encodingParameters)
        ;
        $this->callBackPhoneNumber[] = $callBackPhoneNumber;
        $callBackPhoneNumber->setTelephoneNumber($telephoneNumber);
        $callBackPhoneNumber->setTelecommunicationUseCode($telecommunicationUseCode);
        $callBackPhoneNumber->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $callBackPhoneNumber->setEmailAddress($emailAddress);
        $callBackPhoneNumber->setCountryCode($countryCode);
        $callBackPhoneNumber->setAreaCityCode($areaCityCode);
        $callBackPhoneNumber->setLocalNumber($localNumber);
        $callBackPhoneNumber->setExtension($extension);
        $callBackPhoneNumber->setAnyText($anyText);
        $callBackPhoneNumber->setExtensionPrefix($extensionPrefix);
        $callBackPhoneNumber->setSpeedDialCode($speedDialCode);
        $callBackPhoneNumber->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldOrderEffectiveDateTime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->orderEffectiveDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->orderEffectiveDateTime->setTime($time);
        $this->orderEffectiveDateTime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldOrderControlCodeReason(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->orderControlCodeReason = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->orderControlCodeReason->setIdentifier($identifier);
        $this->orderControlCodeReason->setText($text);
        $this->orderControlCodeReason->setNameOfCodingSystem($nameOfCodingSystem);
        $this->orderControlCodeReason->setAltIdentifier($altIdentifier);
        $this->orderControlCodeReason->setAltText($altText);
        $this->orderControlCodeReason->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldEnteringOrganization(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->enteringOrganization = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->enteringOrganization->setIdentifier($identifier);
        $this->enteringOrganization->setText($text);
        $this->enteringOrganization->setNameOfCodingSystem($nameOfCodingSystem);
        $this->enteringOrganization->setAltIdentifier($altIdentifier);
        $this->enteringOrganization->setAltText($altText);
        $this->enteringOrganization->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldEnteringDevice(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->enteringDevice = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->enteringDevice->setIdentifier($identifier);
        $this->enteringDevice->setText($text);
        $this->enteringDevice->setNameOfCodingSystem($nameOfCodingSystem);
        $this->enteringDevice->setAltIdentifier($altIdentifier);
        $this->enteringDevice->setAltText($altText);
        $this->enteringDevice->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldActionBy(
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
        $actionBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->actionBy[] = $actionBy;
        $actionBy->setIdNumber($idNumber);
        $actionBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $actionBy->setGivenName($givenName);
        $actionBy->setSecondNames($secondNames);
        $actionBy->setSuffix($suffix);
        $actionBy->setPrefix($prefix);
        $actionBy->setDegree($degree);
        $actionBy->setSourceTable($sourceTable);
        $actionBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $actionBy->setNameTypeCode($nameTypeCode);
        $actionBy->setIdentifierCheckDigit($identifierCheckDigit);
        $actionBy->setCheckDigitScheme($checkDigitScheme);
        $actionBy->setIdentifierTypeCode($identifierTypeCode);
        $actionBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $actionBy->setNameRepresentationCode($nameRepresentationCode);
        $actionBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $actionBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $actionBy->setNameAssemblyOrder($nameAssemblyOrder);
        $actionBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $actionBy->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $actionBy->setProfessionalSuffix($professionalSuffix);
        $actionBy->setAssigningJurisdiction(
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
        $actionBy->setAssigningAgency(
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
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldAdvancedBeneficiaryNoticeCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->advancedBeneficiaryNoticeCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->advancedBeneficiaryNoticeCode->setIdentifier($identifier);
        $this->advancedBeneficiaryNoticeCode->setText($text);
        $this->advancedBeneficiaryNoticeCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->advancedBeneficiaryNoticeCode->setAltIdentifier($altIdentifier);
        $this->advancedBeneficiaryNoticeCode->setAltText($altText);
        $this->advancedBeneficiaryNoticeCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $organisationName
     * @param string $organisationNameTypeCode
     * @param string $idNumber
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     * @param string $organisationIdentifier
     */
    public function addFieldOrderingFacilityName(
        string $organisationName = null,
        string $organisationNameTypeCode = null,
        string $idNumber = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null,
        string $organisationIdentifier = null
    ) {
        $orderingFacilityName = $this
            ->dataTypeFactory
            ->create('XON', $this->encodingParameters)
        ;
        $this->orderingFacilityName[] = $orderingFacilityName;
        $orderingFacilityName->setOrganisationName($organisationName);
        $orderingFacilityName->setOrganisationNameTypeCode($organisationNameTypeCode);
        $orderingFacilityName->setIdNumber($idNumber);
        $orderingFacilityName->setCheckDigit($checkDigit);
        $orderingFacilityName->setCheckDigitScheme($checkDigitScheme);
        $orderingFacilityName->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $orderingFacilityName->setIdentifierTypeCode($identifierTypeCode);
        $orderingFacilityName->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $orderingFacilityName->setNameRepresentationCode($nameRepresentationCode);
        $orderingFacilityName->setOrganisationIdentifier($organisationIdentifier);
    }

    /**
     * @param string $streetAddressStreetOrMailingAddress
     * @param string $streetAddressStreetName
     * @param string $streetAddressDwellingNumber
     * @param string $otherDesignation
     * @param string $city
     * @param string $stateOrProvince
     * @param string $zipOrPostalCode
     * @param string $country
     * @param string $addressType
     * @param string $otherGeographicDesignation
     * @param string $countyParishCode
     * @param string $censusTract
     * @param string $addressRepresentationCode
     * @param string $addressValidityRangeRangeStartDateTimeTime
     * @param string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $addressValidityRangeRangeEndDateTimeTime
     * @param string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function addFieldOrderingFacilityAddress(
        string $streetAddressStreetOrMailingAddress = null,
        string $streetAddressStreetName = null,
        string $streetAddressDwellingNumber = null,
        string $otherDesignation = null,
        string $city = null,
        string $stateOrProvince = null,
        string $zipOrPostalCode = null,
        string $country = null,
        string $addressType = null,
        string $otherGeographicDesignation = null,
        string $countyParishCode = null,
        string $censusTract = null,
        string $addressRepresentationCode = null,
        string $addressValidityRangeRangeStartDateTimeTime = null,
        string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        string $addressValidityRangeRangeEndDateTimeTime = null,
        string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        string $effectiveDateTime = null,
        string $effectiveDateDegreeOfPrecision = null,
        string $expirationDateTime = null,
        string $expirationDateDegreeOfPrecision = null
    ) {
        $orderingFacilityAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->encodingParameters)
        ;
        $this->orderingFacilityAddress[] = $orderingFacilityAddress;
        $orderingFacilityAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $orderingFacilityAddress->setOtherDesignation($otherDesignation);
        $orderingFacilityAddress->setCity($city);
        $orderingFacilityAddress->setStateOrProvince($stateOrProvince);
        $orderingFacilityAddress->setZipOrPostalCode($zipOrPostalCode);
        $orderingFacilityAddress->setCountry($country);
        $orderingFacilityAddress->setAddressType($addressType);
        $orderingFacilityAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $orderingFacilityAddress->setCountyParishCode($countyParishCode);
        $orderingFacilityAddress->setCensusTract($censusTract);
        $orderingFacilityAddress->setAddressRepresentationCode($addressRepresentationCode);
        $orderingFacilityAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $orderingFacilityAddress->setEffectiveDate(
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );
        $orderingFacilityAddress->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $localNumber
     * @param string $extension
     * @param string $anyText
     * @param string $extensionPrefix
     * @param string $speedDialCode
     * @param string $unformattedTelephoneNumber
     */
    public function addFieldOrderingFacilityPhoneNumber(
        string $telephoneNumber = null,
        string $telecommunicationUseCode = null,
        string $telepcommunicationEquipmentType = null,
        string $emailAddress = null,
        string $countryCode = null,
        string $areaCityCode = null,
        string $localNumber = null,
        string $extension = null,
        string $anyText = null,
        string $extensionPrefix = null,
        string $speedDialCode = null,
        string $unformattedTelephoneNumber = null
    ) {
        $orderingFacilityPhoneNumber = $this
            ->dataTypeFactory
            ->create('XTN', $this->encodingParameters)
        ;
        $this->orderingFacilityPhoneNumber[] = $orderingFacilityPhoneNumber;
        $orderingFacilityPhoneNumber->setTelephoneNumber($telephoneNumber);
        $orderingFacilityPhoneNumber->setTelecommunicationUseCode($telecommunicationUseCode);
        $orderingFacilityPhoneNumber->setTelepcommunicationEquipmentType(
            $telepcommunicationEquipmentType
        );
        $orderingFacilityPhoneNumber->setEmailAddress($emailAddress);
        $orderingFacilityPhoneNumber->setCountryCode($countryCode);
        $orderingFacilityPhoneNumber->setAreaCityCode($areaCityCode);
        $orderingFacilityPhoneNumber->setLocalNumber($localNumber);
        $orderingFacilityPhoneNumber->setExtension($extension);
        $orderingFacilityPhoneNumber->setAnyText($anyText);
        $orderingFacilityPhoneNumber->setExtensionPrefix($extensionPrefix);
        $orderingFacilityPhoneNumber->setSpeedDialCode($speedDialCode);
        $orderingFacilityPhoneNumber->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @param string $streetAddressStreetOrMailingAddress
     * @param string $streetAddressStreetName
     * @param string $streetAddressDwellingNumber
     * @param string $otherDesignation
     * @param string $city
     * @param string $stateOrProvince
     * @param string $zipOrPostalCode
     * @param string $country
     * @param string $addressType
     * @param string $otherGeographicDesignation
     * @param string $countyParishCode
     * @param string $censusTract
     * @param string $addressRepresentationCode
     * @param string $addressValidityRangeRangeStartDateTimeTime
     * @param string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $addressValidityRangeRangeEndDateTimeTime
     * @param string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function addFieldOrderingProviderAddress(
        string $streetAddressStreetOrMailingAddress = null,
        string $streetAddressStreetName = null,
        string $streetAddressDwellingNumber = null,
        string $otherDesignation = null,
        string $city = null,
        string $stateOrProvince = null,
        string $zipOrPostalCode = null,
        string $country = null,
        string $addressType = null,
        string $otherGeographicDesignation = null,
        string $countyParishCode = null,
        string $censusTract = null,
        string $addressRepresentationCode = null,
        string $addressValidityRangeRangeStartDateTimeTime = null,
        string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        string $addressValidityRangeRangeEndDateTimeTime = null,
        string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        string $effectiveDateTime = null,
        string $effectiveDateDegreeOfPrecision = null,
        string $expirationDateTime = null,
        string $expirationDateDegreeOfPrecision = null
    ) {
        $orderingProviderAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->encodingParameters)
        ;
        $this->orderingProviderAddress[] = $orderingProviderAddress;
        $orderingProviderAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $orderingProviderAddress->setOtherDesignation($otherDesignation);
        $orderingProviderAddress->setCity($city);
        $orderingProviderAddress->setStateOrProvince($stateOrProvince);
        $orderingProviderAddress->setZipOrPostalCode($zipOrPostalCode);
        $orderingProviderAddress->setCountry($country);
        $orderingProviderAddress->setAddressType($addressType);
        $orderingProviderAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $orderingProviderAddress->setCountyParishCode($countyParishCode);
        $orderingProviderAddress->setCensusTract($censusTract);
        $orderingProviderAddress->setAddressRepresentationCode($addressRepresentationCode);
        $orderingProviderAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $orderingProviderAddress->setEffectiveDate(
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );
        $orderingProviderAddress->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldOrderStatusModifier(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->orderStatusModifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->orderStatusModifier->setIdentifier($identifier);
        $this->orderStatusModifier->setText($text);
        $this->orderStatusModifier->setNameOfCodingSystem($nameOfCodingSystem);
        $this->orderStatusModifier->setAltIdentifier($altIdentifier);
        $this->orderStatusModifier->setAltText($altText);
        $this->orderStatusModifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->orderStatusModifier->setCodingSystemVersionId($codingSystemVersionId);
        $this->orderStatusModifier->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->orderStatusModifier->setOriginalText($originalText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldAdvancedBeneficiaryNoticeOverrideReason(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->advancedBeneficiaryNoticeOverrideReason = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->advancedBeneficiaryNoticeOverrideReason->setIdentifier($identifier);
        $this->advancedBeneficiaryNoticeOverrideReason->setText($text);
        $this->advancedBeneficiaryNoticeOverrideReason->setNameOfCodingSystem($nameOfCodingSystem);
        $this->advancedBeneficiaryNoticeOverrideReason->setAltIdentifier($altIdentifier);
        $this->advancedBeneficiaryNoticeOverrideReason->setAltText($altText);
        $this->advancedBeneficiaryNoticeOverrideReason->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setOriginalText($originalText);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldFillerExpectedAvailabilityDateTime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->fillerExpectedAvailabilityDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->fillerExpectedAvailabilityDateTime->setTime($time);
        $this->fillerExpectedAvailabilityDateTime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldConfidentialityCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->confidentialityCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->confidentialityCode->setIdentifier($identifier);
        $this->confidentialityCode->setText($text);
        $this->confidentialityCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->confidentialityCode->setAltIdentifier($altIdentifier);
        $this->confidentialityCode->setAltText($altText);
        $this->confidentialityCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->confidentialityCode->setCodingSystemVersionId($codingSystemVersionId);
        $this->confidentialityCode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->confidentialityCode->setOriginalText($originalText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldOrderType(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->orderType = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->orderType->setIdentifier($identifier);
        $this->orderType->setText($text);
        $this->orderType->setNameOfCodingSystem($nameOfCodingSystem);
        $this->orderType->setAltIdentifier($altIdentifier);
        $this->orderType->setAltText($altText);
        $this->orderType->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->orderType->setCodingSystemVersionId($codingSystemVersionId);
        $this->orderType->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->orderType->setOriginalText($originalText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldEntererAuthorizationMode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->entererAuthorizationMode = $this
            ->dataTypeFactory
            ->create('CNE', $this->encodingParameters)
        ;
        $this->entererAuthorizationMode->setIdentifier($identifier);
        $this->entererAuthorizationMode->setText($text);
        $this->entererAuthorizationMode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->entererAuthorizationMode->setAltIdentifier($altIdentifier);
        $this->entererAuthorizationMode->setAltText($altText);
        $this->entererAuthorizationMode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->entererAuthorizationMode->setCodingSystemVersionId($codingSystemVersionId);
        $this->entererAuthorizationMode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->entererAuthorizationMode->setOriginalText($originalText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldParentUniversalServiceIdentifier(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->parentUniversalServiceIdentifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->parentUniversalServiceIdentifier->setIdentifier($identifier);
        $this->parentUniversalServiceIdentifier->setText($text);
        $this->parentUniversalServiceIdentifier->setNameOfCodingSystem($nameOfCodingSystem);
        $this->parentUniversalServiceIdentifier->setAltIdentifier($altIdentifier);
        $this->parentUniversalServiceIdentifier->setAltText($altText);
        $this->parentUniversalServiceIdentifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->parentUniversalServiceIdentifier->setCodingSystemVersionId($codingSystemVersionId);
        $this->parentUniversalServiceIdentifier->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->parentUniversalServiceIdentifier->setOriginalText($originalText);
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldOrderControl()
    {
        return $this->orderControl;
    }

    /**
     * @return \Hl7v2\DataType\V251\EiDataType
     */
    public function getFieldPlacerOrderNumber()
    {
        return $this->placerOrderNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\EiDataType
     */
    public function getFieldFillerOrderNumber()
    {
        return $this->fillerOrderNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\EiDataType
     */
    public function getFieldPlacerGroupNumber()
    {
        return $this->placerGroupNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldResponseFlag()
    {
        return $this->responseFlag;
    }

    /**
     * @return \Hl7v2\DataType\V251\TqDataType[]
     */
    public function getFieldQuantityTiming()
    {
        return $this->quantityTiming;
    }

    /**
     * @return \Hl7v2\DataType\V251\EipDataType
     */
    public function getFieldParent()
    {
        return $this->parent;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldDateTimeOfTransaction()
    {
        return $this->dateTimeOfTransaction;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldEnteredBy()
    {
        return $this->enteredBy;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldVerifiedBy()
    {
        return $this->verifiedBy;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldOrderingProvider()
    {
        return $this->orderingProvider;
    }

    /**
     * @return \Hl7v2\DataType\V251\PlDataType
     */
    public function getFieldEntererLocation()
    {
        return $this->entererLocation;
    }

    /**
     * @return \Hl7v2\DataType\V251\XtnDataType[]
     */
    public function getFieldCallBackPhoneNumber()
    {
        return $this->callBackPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldOrderEffectiveDateTime()
    {
        return $this->orderEffectiveDateTime;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldOrderControlCodeReason()
    {
        return $this->orderControlCodeReason;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldEnteringOrganization()
    {
        return $this->enteringOrganization;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldEnteringDevice()
    {
        return $this->enteringDevice;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldActionBy()
    {
        return $this->actionBy;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldAdvancedBeneficiaryNoticeCode()
    {
        return $this->advancedBeneficiaryNoticeCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\XonDataType[]
     */
    public function getFieldOrderingFacilityName()
    {
        return $this->orderingFacilityName;
    }

    /**
     * @return \Hl7v2\DataType\V251\XadDataType[]
     */
    public function getFieldOrderingFacilityAddress()
    {
        return $this->orderingFacilityAddress;
    }

    /**
     * @return \Hl7v2\DataType\V251\XtnDataType[]
     */
    public function getFieldOrderingFacilityPhoneNumber()
    {
        return $this->orderingFacilityPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\XadDataType[]
     */
    public function getFieldOrderingProviderAddress()
    {
        return $this->orderingProviderAddress;
    }

    /**
     * @return \Hl7v2\DataType\V251\CweDataType
     */
    public function getFieldOrderStatusModifier()
    {
        return $this->orderStatusModifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\CweDataType
     */
    public function getFieldAdvancedBeneficiaryNoticeOverrideReason()
    {
        return $this->advancedBeneficiaryNoticeOverrideReason;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldFillerExpectedAvailabilityDateTime()
    {
        return $this->fillerExpectedAvailabilityDateTime;
    }

    /**
     * @return \Hl7v2\DataType\V251\CweDataType
     */
    public function getFieldConfidentialityCode()
    {
        return $this->confidentialityCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\CweDataType
     */
    public function getFieldOrderType()
    {
        return $this->orderType;
    }

    /**
     * @return \Hl7v2\DataType\V251\CneDataType
     */
    public function getFieldEntererAuthorizationMode()
    {
        return $this->entererAuthorizationMode;
    }

    /**
     * @return \Hl7v2\DataType\V251\CweDataType
     */
    public function getFieldParentUniversalServiceIdentifier()
    {
        return $this->parentUniversalServiceIdentifier;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // ORC.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ORC Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('OrderControl', 2, $datagram->getPositionalState());
        $this->setFieldOrderControl($codec->extractComponent($datagram));

        // ORC.2
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlacerOrderNumber', 22, $datagram->getPositionalState());
        $sequence = [1,1,1,1];
        list(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPlacerOrderNumber(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // ORC.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('FillerOrderNumber', 22, $datagram->getPositionalState());
        $sequence = [1,1,1,1];
        list(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldFillerOrderNumber(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // ORC.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlacerGroupNumber', 22, $datagram->getPositionalState());
        $sequence = [1,1,1,1];
        list(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPlacerGroupNumber(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // ORC.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderStatus', 2, $datagram->getPositionalState());
        $this->setFieldOrderStatus($codec->extractComponent($datagram));

        // ORC.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ResponseFlag', 1, $datagram->getPositionalState());
        $this->setFieldResponseFlag($codec->extractComponent($datagram));

        // ORC.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,[1,1,1,1,1,1]],[1,1],1,[1,1],[1,1],1,1,1,1,[1,1,1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('QuantityTiming', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                    $quantityQuantity,
                    list(
                        $quantityUnitsIdentifier,
                        $quantityUnitsText,
                        $quantityUnitsNameOfCodingSystem,
                        $quantityUnitsAltIdentifier,
                        $quantityUnitsAltText,
                        $quantityUnitsNameOfAltCodingSystem,
                    ),
                ),
                list(
                    $intervalRepeatPattern,
                    $intervalExplicitTimeInterval,
                ),
                $duration,
                list(
                    $startDateTimeTime,
                    $startDateTimeDegreeOfPrecision,
                ),
                list(
                    $endDateTimeTime,
                    $endDateTimeDegreeOfPrecision,
                ),
                $priority,
                $condition,
                $text,
                $conjunction,
                list(
                    $orderSequencingSequenceResultsFlag,
                    $orderSequencingPlacerOrderNumberEntityIdentifier,
                    $orderSequencingPlacerOrderNumberNamespaceId,
                    $orderSequencingFillerOrderNumberEntityIdentifier,
                    $orderSequencingFillerOrderNumberNamespaceId,
                    $orderSequencingSequenceConditionValue,
                    $orderSequencingMaximumNumberOfRepeats,
                    $orderSequencingPlacerOrderNumberUniversalId,
                    $orderSequencingPlacerOrderNumberUniversalIdType,
                    $orderSequencingFillerOrderNumberUniversalId,
                    $orderSequencingFillerOrderNumberUniversalIdType,
                ),
                list(
                    $occurrenceDurationIdentifier,
                    $occurrenceDurationText,
                    $occurrenceDurationNameOfCodingSystem,
                    $occurrenceDurationAltIdentifier,
                    $occurrenceDurationAltText,
                    $occurrenceDurationNameOfAltCodingSystem,
                ),
                $totalOccurrences,
            ) = $components;
            $this->addFieldQuantityTiming(
                $quantityQuantity,
                $quantityUnitsIdentifier,
                $quantityUnitsText,
                $quantityUnitsNameOfCodingSystem,
                $quantityUnitsAltIdentifier,
                $quantityUnitsAltText,
                $quantityUnitsNameOfAltCodingSystem,
                $intervalRepeatPattern,
                $intervalExplicitTimeInterval,
                $duration,
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
                $priority,
                $condition,
                $text,
                $conjunction,
                $orderSequencingSequenceResultsFlag,
                $orderSequencingPlacerOrderNumberEntityIdentifier,
                $orderSequencingPlacerOrderNumberNamespaceId,
                $orderSequencingFillerOrderNumberEntityIdentifier,
                $orderSequencingFillerOrderNumberNamespaceId,
                $orderSequencingSequenceConditionValue,
                $orderSequencingMaximumNumberOfRepeats,
                $orderSequencingPlacerOrderNumberUniversalId,
                $orderSequencingPlacerOrderNumberUniversalIdType,
                $orderSequencingFillerOrderNumberUniversalId,
                $orderSequencingFillerOrderNumberUniversalIdType,
                $occurrenceDurationIdentifier,
                $occurrenceDurationText,
                $occurrenceDurationNameOfCodingSystem,
                $occurrenceDurationAltIdentifier,
                $occurrenceDurationAltText,
                $occurrenceDurationNameOfAltCodingSystem,
                $totalOccurrences
            );
        }

        // ORC.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Parent', 200, $datagram->getPositionalState());
        $sequence = [[1,1,1,1],[1,1,1,1]];
        list(
            list(
                $placerAssignedIdentifierEntityIdentifier,
                $placerAssignedIdentifierNamespaceId,
                $placerAssignedIdentifierUniversalId,
                $placerAssignedIdentifierUniversalIdType,
            ),
            list(
                $fillerAssignedIdentifierEntityIdentifier,
                $fillerAssignedIdentifierNamespaceId,
                $fillerAssignedIdentifierUniversalId,
                $fillerAssignedIdentifierUniversalIdType,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldParent(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType,
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType
        );

        // ORC.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DateTimeOfTransaction', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDateTimeOfTransaction(
            $time,
            $degreeOfPrecision
        );

        // ORC.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EnteredBy', 250, $datagram->getPositionalState());
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
            $this->addFieldEnteredBy(
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

        // ORC.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('VerifiedBy', 250, $datagram->getPositionalState());
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
            $this->addFieldVerifiedBy(
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

        // ORC.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingProvider', 250, $datagram->getPositionalState());
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
            $this->addFieldOrderingProvider(
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

        // ORC.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EntererLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
        list(
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
            list(
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
            ),
            list(
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEntererLocation(
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType,
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );

        // ORC.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CallBackPhoneNumber', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber,
            ) = $components;
            $this->addFieldCallBackPhoneNumber(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber
            );
        }

        // ORC.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderEffectiveDateTime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOrderEffectiveDateTime(
            $time,
            $degreeOfPrecision
        );

        // ORC.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderControlCodeReason', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOrderControlCodeReason(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // ORC.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EnteringOrganization', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEnteringOrganization(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // ORC.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EnteringDevice', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEnteringDevice(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // ORC.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ActionBy', 250, $datagram->getPositionalState());
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
            $this->addFieldActionBy(
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

        // ORC.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdvancedBeneficiaryNoticeCode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAdvancedBeneficiaryNoticeCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // ORC.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,[1,1,1],1,[1,1,1],1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityName', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $organisationName,
                $organisationNameTypeCode,
                $idNumber,
                $checkDigit,
                $checkDigitScheme,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
                $organisationIdentifier,
            ) = $components;
            $this->addFieldOrderingFacilityName(
                $organisationName,
                $organisationNameTypeCode,
                $idNumber,
                $checkDigit,
                $checkDigitScheme,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode,
                $organisationIdentifier
            );
        }

        // ORC.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityAddress', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                    $streetAddressStreetOrMailingAddress,
                    $streetAddressStreetName,
                    $streetAddressDwellingNumber,
                ),
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                list(
                    list(
                        $addressValidityRangeRangeStartDateTimeTime,
                        $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $addressValidityRangeRangeEndDateTimeTime,
                        $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
            ) = $components;
            $this->addFieldOrderingFacilityAddress(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision
            );
        }

        // ORC.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityPhoneNumber', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber,
            ) = $components;
            $this->addFieldOrderingFacilityPhoneNumber(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber
            );
        }

        // ORC.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingProviderAddress', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                    $streetAddressStreetOrMailingAddress,
                    $streetAddressStreetName,
                    $streetAddressDwellingNumber,
                ),
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                list(
                    list(
                        $addressValidityRangeRangeStartDateTimeTime,
                        $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $addressValidityRangeRangeEndDateTimeTime,
                        $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
            ) = $components;
            $this->addFieldOrderingProviderAddress(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision
            );
        }

        // ORC.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderStatusModifier', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOrderStatusModifier(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ORC.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdvancedBeneficiaryNoticeOverrideReason', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAdvancedBeneficiaryNoticeOverrideReason(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ORC.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('FillerExpectedAvailabilityDateTime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldFillerExpectedAvailabilityDateTime(
            $time,
            $degreeOfPrecision
        );

        // ORC.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ConfidentialityCode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldConfidentialityCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ORC.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderType', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOrderType(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ORC.30
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EntererAuthorizationMode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEntererAuthorizationMode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ORC.31
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ParentUniversalServiceIdentifier', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldParentUniversalServiceIdentifier(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'ORC';
        $emptyFieldsSinceLastField = 0;

        if (!$this->getFieldOrderControl() || !$this->getFieldOrderControl()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldOrderControl()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldPlacerOrderNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPlacerOrderNumber();
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

        if (!$this->getFieldFillerOrderNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldFillerOrderNumber();
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

        if (!$this->getFieldPlacerGroupNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPlacerGroupNumber();
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

        if (!$this->getFieldOrderStatus() || !$this->getFieldOrderStatus()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldOrderStatus()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldResponseFlag() || !$this->getFieldResponseFlag()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldResponseFlag()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldQuantityTiming())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldQuantityTiming() as $repetition) {
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

        if (!$this->getFieldParent()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldParent();
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

        if (!$this->getFieldDateTimeOfTransaction()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDateTimeOfTransaction();
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

        if (empty($this->getFieldEnteredBy())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldEnteredBy() as $repetition) {
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

        if (empty($this->getFieldVerifiedBy())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldVerifiedBy() as $repetition) {
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

        if (empty($this->getFieldOrderingProvider())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderingProvider() as $repetition) {
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

        if (!$this->getFieldEntererLocation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEntererLocation();
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

        if (empty($this->getFieldCallBackPhoneNumber())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCallBackPhoneNumber() as $repetition) {
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

        if (!$this->getFieldOrderEffectiveDateTime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldOrderEffectiveDateTime();
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

        if (!$this->getFieldOrderControlCodeReason()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldOrderControlCodeReason();
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

        if (!$this->getFieldEnteringOrganization()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEnteringOrganization();
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

        if (!$this->getFieldEnteringDevice()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEnteringDevice();
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

        if (empty($this->getFieldActionBy())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldActionBy() as $repetition) {
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

        if (!$this->getFieldAdvancedBeneficiaryNoticeCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldAdvancedBeneficiaryNoticeCode();
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

        if (empty($this->getFieldOrderingFacilityName())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderingFacilityName() as $repetition) {
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

        if (empty($this->getFieldOrderingFacilityAddress())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderingFacilityAddress() as $repetition) {
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

        if (empty($this->getFieldOrderingFacilityPhoneNumber())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderingFacilityPhoneNumber() as $repetition) {
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

        if (empty($this->getFieldOrderingProviderAddress())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderingProviderAddress() as $repetition) {
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

        if (!$this->getFieldOrderStatusModifier()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldOrderStatusModifier();
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

        if (!$this->getFieldAdvancedBeneficiaryNoticeOverrideReason()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldAdvancedBeneficiaryNoticeOverrideReason();
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

        if (!$this->getFieldFillerExpectedAvailabilityDateTime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldFillerExpectedAvailabilityDateTime();
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

        if (!$this->getFieldConfidentialityCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldConfidentialityCode();
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

        if (!$this->getFieldOrderType()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldOrderType();
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

        if (!$this->getFieldEntererAuthorizationMode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEntererAuthorizationMode();
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

        if (!$this->getFieldParentUniversalServiceIdentifier()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldParentUniversalServiceIdentifier();
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
