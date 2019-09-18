<?php

namespace Hl7v2\Segment\V231;

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
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $orderControl;
    /**
     * @var \Hl7v2\DataType\V231\EiDataType
     */
    private $placerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\EiDataType
     */
    private $fillerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\EiDataType
     */
    private $placerGroupNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $orderStatus = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $responseFlag = null;
    /**
     * @var \Hl7v2\DataType\V231\TqDataType
     */
    private $quantityTiming = null;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $parent = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $dateTimeOfTransaction = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $enteredBy = [];
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $verifiedBy = [];
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $orderingProvider = [];
    /**
     * @var \Hl7v2\DataType\V231\PlDataType
     */
    private $entererLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\XtnDataType[]
     */
    private $callBackPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $orderEffectiveDateTime = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $orderControlCodeReason = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $enteringOrganization = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $enteringDevice = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $actionBy = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $advancedBeneficiaryNoticeCode = null;
    /**
     * @var \Hl7v2\DataType\V231\XonDataType[]
     */
    private $orderingFacilityName = [];
    /**
     * @var \Hl7v2\DataType\V231\XadDataType[]
     */
    private $orderingFacilityAddress = [];
    /**
     * @var \Hl7v2\DataType\V231\XtnDataType[]
     */
    private $orderingFacilityPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\V231\XadDataType[]
     */
    private $orderingProviderAddress = [];

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
     * @param string $interval
     * @param string $duration
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     * @param string $priority
     * @param string $condition
     * @param string $text
     * @param string $conjunction
     * @param string $orderSequencing
     * @param string $occurrenceDurationIdentifier
     * @param string $occurrenceDurationText
     * @param string $occurrenceDurationNameOfCodingSystem
     * @param string $occurrenceDurationAltIdentifier
     * @param string $occurrenceDurationAltText
     * @param string $occurrenceDurationNameOfAltCodingSystem
     * @param string $totalOccurrences
     */
    public function setFieldQuantityTiming(
        string $quantityQuantity = null,
        string $quantityUnitsIdentifier = null,
        string $quantityUnitsText = null,
        string $quantityUnitsNameOfCodingSystem = null,
        string $quantityUnitsAltIdentifier = null,
        string $quantityUnitsAltText = null,
        string $quantityUnitsNameOfAltCodingSystem = null,
        string $interval = null,
        string $duration = null,
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null,
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null,
        string $priority = null,
        string $condition = null,
        string $text = null,
        string $conjunction = null,
        string $orderSequencing = null,
        string $occurrenceDurationIdentifier = null,
        string $occurrenceDurationText = null,
        string $occurrenceDurationNameOfCodingSystem = null,
        string $occurrenceDurationAltIdentifier = null,
        string $occurrenceDurationAltText = null,
        string $occurrenceDurationNameOfAltCodingSystem = null,
        string $totalOccurrences = null
    ) {
        $this->quantityTiming = $this
            ->dataTypeFactory
            ->create('TQ', $this->encodingParameters)
        ;
        $this->quantityTiming->setQuantity(
            $quantityQuantity,
            $quantityUnitsIdentifier,
            $quantityUnitsText,
            $quantityUnitsNameOfCodingSystem,
            $quantityUnitsAltIdentifier,
            $quantityUnitsAltText,
            $quantityUnitsNameOfAltCodingSystem
        );
        $this->quantityTiming->setInterval($interval);
        $this->quantityTiming->setDuration($duration);
        $this->quantityTiming->setStartDateTime(
            $startDateTimeTime,
            $startDateTimeDegreeOfPrecision
        );
        $this->quantityTiming->setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision);
        $this->quantityTiming->setPriority($priority);
        $this->quantityTiming->setCondition($condition);
        $this->quantityTiming->setText($text);
        $this->quantityTiming->setConjunction($conjunction);
        $this->quantityTiming->setOrderSequencing($orderSequencing);
        $this->quantityTiming->setOccurrenceDuration(
            $occurrenceDurationIdentifier,
            $occurrenceDurationText,
            $occurrenceDurationNameOfCodingSystem,
            $occurrenceDurationAltIdentifier,
            $occurrenceDurationAltText,
            $occurrenceDurationNameOfAltCodingSystem
        );
        $this->quantityTiming->setTotalOccurrences($totalOccurrences);
    }

    /**
     * @param string $value
     */
    public function setFieldParent(string $value)
    {
        $this->parent = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->parent->setValue($value);
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
    public function addFieldEnteredBy(
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
        $enteredBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->enteredBy[] = $enteredBy;
        $enteredBy->setIdNumber($idNumber);
        $enteredBy->setFamilyName($familyName);
        $enteredBy->setGivenName($givenName);
        $enteredBy->setMiddleInitialOrName($middleInitialOrName);
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
    public function addFieldVerifiedBy(
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
        $verifiedBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->verifiedBy[] = $verifiedBy;
        $verifiedBy->setIdNumber($idNumber);
        $verifiedBy->setFamilyName($familyName);
        $verifiedBy->setGivenName($givenName);
        $verifiedBy->setMiddleInitialOrName($middleInitialOrName);
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
    public function addFieldOrderingProvider(
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
        $orderingProvider = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->orderingProvider[] = $orderingProvider;
        $orderingProvider->setIdNumber($idNumber);
        $orderingProvider->setFamilyName($familyName);
        $orderingProvider->setGivenName($givenName);
        $orderingProvider->setMiddleInitialOrName($middleInitialOrName);
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
        string $locationDescription = null
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
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $phoneNumber
     * @param string $extension
     * @param string $anyText
     */
    public function addFieldCallBackPhoneNumber(
        string $telephoneNumber = null,
        string $telecommunicationUseCode = null,
        string $telepcommunicationEquipmentType = null,
        string $emailAddress = null,
        string $countryCode = null,
        string $areaCityCode = null,
        string $phoneNumber = null,
        string $extension = null,
        string $anyText = null
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
        $callBackPhoneNumber->setPhoneNumber($phoneNumber);
        $callBackPhoneNumber->setExtension($extension);
        $callBackPhoneNumber->setAnyText($anyText);
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
    public function addFieldActionBy(
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
        $actionBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->actionBy[] = $actionBy;
        $actionBy->setIdNumber($idNumber);
        $actionBy->setFamilyName($familyName);
        $actionBy->setGivenName($givenName);
        $actionBy->setMiddleInitialOrName($middleInitialOrName);
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
        string $nameRepresentationCode = null
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
    }

    /**
     * @param string $streetAddress
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
     */
    public function addFieldOrderingFacilityAddress(
        string $streetAddress = null,
        string $otherDesignation = null,
        string $city = null,
        string $stateOrProvince = null,
        string $zipOrPostalCode = null,
        string $country = null,
        string $addressType = null,
        string $otherGeographicDesignation = null,
        string $countyParishCode = null,
        string $censusTract = null,
        string $addressRepresentationCode = null
    ) {
        $orderingFacilityAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->encodingParameters)
        ;
        $this->orderingFacilityAddress[] = $orderingFacilityAddress;
        $orderingFacilityAddress->setStreetAddress($streetAddress);
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
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $phoneNumber
     * @param string $extension
     * @param string $anyText
     */
    public function addFieldOrderingFacilityPhoneNumber(
        string $telephoneNumber = null,
        string $telecommunicationUseCode = null,
        string $telepcommunicationEquipmentType = null,
        string $emailAddress = null,
        string $countryCode = null,
        string $areaCityCode = null,
        string $phoneNumber = null,
        string $extension = null,
        string $anyText = null
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
        $orderingFacilityPhoneNumber->setPhoneNumber($phoneNumber);
        $orderingFacilityPhoneNumber->setExtension($extension);
        $orderingFacilityPhoneNumber->setAnyText($anyText);
    }

    /**
     * @param string $streetAddress
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
     */
    public function addFieldOrderingProviderAddress(
        string $streetAddress = null,
        string $otherDesignation = null,
        string $city = null,
        string $stateOrProvince = null,
        string $zipOrPostalCode = null,
        string $country = null,
        string $addressType = null,
        string $otherGeographicDesignation = null,
        string $countyParishCode = null,
        string $censusTract = null,
        string $addressRepresentationCode = null
    ) {
        $orderingProviderAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->encodingParameters)
        ;
        $this->orderingProviderAddress[] = $orderingProviderAddress;
        $orderingProviderAddress->setStreetAddress($streetAddress);
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
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldOrderControl()
    {
        return $this->orderControl;
    }

    /**
     * @return \Hl7v2\DataType\V231\EiDataType
     */
    public function getFieldPlacerOrderNumber()
    {
        return $this->placerOrderNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\EiDataType
     */
    public function getFieldFillerOrderNumber()
    {
        return $this->fillerOrderNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\EiDataType
     */
    public function getFieldPlacerGroupNumber()
    {
        return $this->placerGroupNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldResponseFlag()
    {
        return $this->responseFlag;
    }

    /**
     * @return \Hl7v2\DataType\V231\TqDataType
     */
    public function getFieldQuantityTiming()
    {
        return $this->quantityTiming;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldParent()
    {
        return $this->parent;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldDateTimeOfTransaction()
    {
        return $this->dateTimeOfTransaction;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldEnteredBy()
    {
        return $this->enteredBy;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldVerifiedBy()
    {
        return $this->verifiedBy;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldOrderingProvider()
    {
        return $this->orderingProvider;
    }

    /**
     * @return \Hl7v2\DataType\V231\PlDataType
     */
    public function getFieldEntererLocation()
    {
        return $this->entererLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\XtnDataType[]
     */
    public function getFieldCallBackPhoneNumber()
    {
        return $this->callBackPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldOrderEffectiveDateTime()
    {
        return $this->orderEffectiveDateTime;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldOrderControlCodeReason()
    {
        return $this->orderControlCodeReason;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldEnteringOrganization()
    {
        return $this->enteringOrganization;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldEnteringDevice()
    {
        return $this->enteringDevice;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldActionBy()
    {
        return $this->actionBy;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldAdvancedBeneficiaryNoticeCode()
    {
        return $this->advancedBeneficiaryNoticeCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\XonDataType[]
     */
    public function getFieldOrderingFacilityName()
    {
        return $this->orderingFacilityName;
    }

    /**
     * @return \Hl7v2\DataType\V231\XadDataType[]
     */
    public function getFieldOrderingFacilityAddress()
    {
        return $this->orderingFacilityAddress;
    }

    /**
     * @return \Hl7v2\DataType\V231\XtnDataType[]
     */
    public function getFieldOrderingFacilityPhoneNumber()
    {
        return $this->orderingFacilityPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\XadDataType[]
     */
    public function getFieldOrderingProviderAddress()
    {
        return $this->orderingProviderAddress;
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
        $this->checkFieldLength('QuantityTiming', 200, $datagram->getPositionalState());
        $sequence = [[1,[1,1,1,1,1,1]],1,1,[1,1],[1,1],1,1,1,1,1,[1,1,1,1,1,1],1];
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
            $interval,
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
            $orderSequencing,
            list(
                $occurrenceDurationIdentifier,
                $occurrenceDurationText,
                $occurrenceDurationNameOfCodingSystem,
                $occurrenceDurationAltIdentifier,
                $occurrenceDurationAltText,
                $occurrenceDurationNameOfAltCodingSystem,
            ),
            $totalOccurrences,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldQuantityTiming(
            $quantityQuantity,
            $quantityUnitsIdentifier,
            $quantityUnitsText,
            $quantityUnitsNameOfCodingSystem,
            $quantityUnitsAltIdentifier,
            $quantityUnitsAltText,
            $quantityUnitsNameOfAltCodingSystem,
            $interval,
            $duration,
            $startDateTimeTime,
            $startDateTimeDegreeOfPrecision,
            $endDateTimeTime,
            $endDateTimeDegreeOfPrecision,
            $priority,
            $condition,
            $text,
            $conjunction,
            $orderSequencing,
            $occurrenceDurationIdentifier,
            $occurrenceDurationText,
            $occurrenceDurationNameOfCodingSystem,
            $occurrenceDurationAltIdentifier,
            $occurrenceDurationAltText,
            $occurrenceDurationNameOfAltCodingSystem,
            $totalOccurrences
        );

        // ORC.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Parent', 200, $datagram->getPositionalState());
        $this->setFieldParent($codec->extractComponent($datagram));

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
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EnteredBy', 120, $datagram->getPositionalState());
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
            $this->addFieldEnteredBy(
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

        // ORC.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('VerifiedBy', 120, $datagram->getPositionalState());
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
            $this->addFieldVerifiedBy(
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

        // ORC.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingProvider', 120, $datagram->getPositionalState());
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
            $this->addFieldOrderingProvider(
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

        // ORC.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EntererLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1];
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
            $locationDescription
        );

        // ORC.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CallBackPhoneNumber', 40, $datagram->getPositionalState());
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
                $phoneNumber,
                $extension,
                $anyText,
            ) = $components;
            $this->addFieldCallBackPhoneNumber(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $phoneNumber,
                $extension,
                $anyText
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
        $this->checkFieldLength('OrderControlCodeReason', 200, $datagram->getPositionalState());
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
        $this->checkFieldLength('EnteringOrganization', 60, $datagram->getPositionalState());
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
        $this->checkFieldLength('EnteringDevice', 60, $datagram->getPositionalState());
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
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ActionBy', 120, $datagram->getPositionalState());
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
            $this->addFieldActionBy(
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

        // ORC.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdvancedBeneficiaryNoticeCode', 40, $datagram->getPositionalState());
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
        $sequence = [1,1,1,1,1,[1,1,1],1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityName', 60, $datagram->getPositionalState());
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
                $nameRepresentationCode
            );
        }

        // ORC.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityAddress', 106, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $streetAddress,
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
            ) = $components;
            $this->addFieldOrderingFacilityAddress(
                $streetAddress,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode
            );
        }

        // ORC.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityPhoneNumber', 48, $datagram->getPositionalState());
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
                $phoneNumber,
                $extension,
                $anyText,
            ) = $components;
            $this->addFieldOrderingFacilityPhoneNumber(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $phoneNumber,
                $extension,
                $anyText
            );
        }

        // ORC.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingProviderAddress', 106, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $streetAddress,
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
            ) = $components;
            $this->addFieldOrderingProviderAddress(
                $streetAddress,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode
            );
        }
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

        if (!$this->getFieldQuantityTiming()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldQuantityTiming();
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

        if (!$this->getFieldParent() || !$this->getFieldParent()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldParent()->getValue();
            $emptyFieldsSinceLastField = 0;
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

        return $s;
    }
}
