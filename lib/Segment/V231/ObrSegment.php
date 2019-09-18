<?php

namespace Hl7v2\Segment\V231;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Observation Request (OBR).
 */
class ObrSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V231\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\V231\EiDataType
     */
    private $placerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\EiDataType
     */
    private $fillerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $universalServiceId;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $priority = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $requestedDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $observationDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $observationEndDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\CqDataType
     */
    private $collectionVolume = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $collectorIdentifier = [];
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $specimenActionCode = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $dangerCode = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $relevantClinicalInformation = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $specimenReceivedDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $specimenSource = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $orderingProvider = [];
    /**
     * @var \Hl7v2\DataType\V231\XtnDataType[]
     */
    private $orderCallbackPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $placerField1 = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $placerField2 = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $fillerField1 = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $fillerField2 = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $resultsRptstatusChngDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $chargeToPractice = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $diagnosticServSectId = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $resultStatus = null;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $parentResult = null;
    /**
     * @var \Hl7v2\DataType\V231\TqDataType[]
     */
    private $quantitytiming = [];
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $resultCopiesTo = [];
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $parent = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $transportationMode = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $reasonForStudy = [];
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $principalResultInterpreter = null;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType[]
     */
    private $assistantResultInterpreter = [];
    /**
     * @var \Hl7v2\DataType\V231\CmDataType[]
     */
    private $technician = [];
    /**
     * @var \Hl7v2\DataType\V231\CmDataType[]
     */
    private $transcriptionist = [];
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $scheduledDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $numberOfSampleContainers = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $transportLogisticsOfCollectedSample = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $collectorsComment = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $transportArrangementResponsibility = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $transportArranged = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $escortRequired = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $plannedPatientTransportComment = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $procedureCode = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $procedureCodeModifier = [];

    /**
     * @param string $value
     */
    public function setFieldSetId(string $value)
    {
        $this->setId = $this
            ->dataTypeFactory
            ->create('SI', $this->encodingParameters)
        ;
        $this->setId->setValue($value);
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
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldUniversalServiceId(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->universalServiceId = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->universalServiceId->setIdentifier($identifier);
        $this->universalServiceId->setText($text);
        $this->universalServiceId->setNameOfCodingSystem($nameOfCodingSystem);
        $this->universalServiceId->setAltIdentifier($altIdentifier);
        $this->universalServiceId->setAltText($altText);
        $this->universalServiceId->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldPriority(string $value)
    {
        $this->priority = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->priority->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldRequestedDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->requestedDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->requestedDatetime->setTime($time);
        $this->requestedDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldObservationDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->observationDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->observationDatetime->setTime($time);
        $this->observationDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldObservationEndDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->observationEndDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->observationEndDatetime->setTime($time);
        $this->observationEndDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $quantity
     * @param string $unitsIdentifier
     * @param string $unitsText
     * @param string $unitsNameOfCodingSystem
     * @param string $unitsAltIdentifier
     * @param string $unitsAltText
     * @param string $unitsNameOfAltCodingSystem
     */
    public function setFieldCollectionVolume(
        string $quantity = null,
        string $unitsIdentifier = null,
        string $unitsText = null,
        string $unitsNameOfCodingSystem = null,
        string $unitsAltIdentifier = null,
        string $unitsAltText = null,
        string $unitsNameOfAltCodingSystem = null
    ) {
        $this->collectionVolume = $this
            ->dataTypeFactory
            ->create('CQ', $this->encodingParameters)
        ;
        $this->collectionVolume->setQuantity($quantity);
        $this->collectionVolume->setUnits(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );
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
    public function addFieldCollectorIdentifier(
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
        $collectorIdentifier = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->collectorIdentifier[] = $collectorIdentifier;
        $collectorIdentifier->setIdNumber($idNumber);
        $collectorIdentifier->setFamilyName($familyName);
        $collectorIdentifier->setGivenName($givenName);
        $collectorIdentifier->setMiddleInitialOrName($middleInitialOrName);
        $collectorIdentifier->setSuffix($suffix);
        $collectorIdentifier->setPrefix($prefix);
        $collectorIdentifier->setDegree($degree);
        $collectorIdentifier->setSourceTable($sourceTable);
        $collectorIdentifier->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $collectorIdentifier->setNameTypeCode($nameTypeCode);
        $collectorIdentifier->setIdentifierCheckDigit($identifierCheckDigit);
        $collectorIdentifier->setCheckDigitScheme($checkDigitScheme);
        $collectorIdentifier->setIdentifierTypeCode($identifierTypeCode);
        $collectorIdentifier->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $collectorIdentifier->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $value
     */
    public function setFieldSpecimenActionCode(string $value)
    {
        $this->specimenActionCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->specimenActionCode->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldDangerCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->dangerCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->dangerCode->setIdentifier($identifier);
        $this->dangerCode->setText($text);
        $this->dangerCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->dangerCode->setAltIdentifier($altIdentifier);
        $this->dangerCode->setAltText($altText);
        $this->dangerCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldRelevantClinicalInformation(string $value)
    {
        $this->relevantClinicalInformation = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->relevantClinicalInformation->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldSpecimenReceivedDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->specimenReceivedDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->specimenReceivedDatetime->setTime($time);
        $this->specimenReceivedDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldSpecimenSource(string $value)
    {
        $this->specimenSource = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->specimenSource->setValue($value);
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
    public function addFieldOrderCallbackPhoneNumber(
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
        $orderCallbackPhoneNumber = $this
            ->dataTypeFactory
            ->create('XTN', $this->encodingParameters)
        ;
        $this->orderCallbackPhoneNumber[] = $orderCallbackPhoneNumber;
        $orderCallbackPhoneNumber->setTelephoneNumber($telephoneNumber);
        $orderCallbackPhoneNumber->setTelecommunicationUseCode($telecommunicationUseCode);
        $orderCallbackPhoneNumber->setTelepcommunicationEquipmentType(
            $telepcommunicationEquipmentType
        );
        $orderCallbackPhoneNumber->setEmailAddress($emailAddress);
        $orderCallbackPhoneNumber->setCountryCode($countryCode);
        $orderCallbackPhoneNumber->setAreaCityCode($areaCityCode);
        $orderCallbackPhoneNumber->setPhoneNumber($phoneNumber);
        $orderCallbackPhoneNumber->setExtension($extension);
        $orderCallbackPhoneNumber->setAnyText($anyText);
    }

    /**
     * @param string $value
     */
    public function setFieldPlacerField1(string $value)
    {
        $this->placerField1 = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->placerField1->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldPlacerField2(string $value)
    {
        $this->placerField2 = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->placerField2->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldFillerField1(string $value)
    {
        $this->fillerField1 = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->fillerField1->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldFillerField2(string $value)
    {
        $this->fillerField2 = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->fillerField2->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldResultsRptstatusChngDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->resultsRptstatusChngDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->resultsRptstatusChngDatetime->setTime($time);
        $this->resultsRptstatusChngDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldChargeToPractice(string $value)
    {
        $this->chargeToPractice = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->chargeToPractice->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDiagnosticServSectId(string $value)
    {
        $this->diagnosticServSectId = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->diagnosticServSectId->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldResultStatus(string $value)
    {
        $this->resultStatus = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->resultStatus->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldParentResult(string $value)
    {
        $this->parentResult = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->parentResult->setValue($value);
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
    public function addFieldQuantitytiming(
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
        $quantitytiming = $this
            ->dataTypeFactory
            ->create('TQ', $this->encodingParameters)
        ;
        $this->quantitytiming[] = $quantitytiming;
        $quantitytiming->setQuantity(
            $quantityQuantity,
            $quantityUnitsIdentifier,
            $quantityUnitsText,
            $quantityUnitsNameOfCodingSystem,
            $quantityUnitsAltIdentifier,
            $quantityUnitsAltText,
            $quantityUnitsNameOfAltCodingSystem
        );
        $quantitytiming->setInterval($interval);
        $quantitytiming->setDuration($duration);
        $quantitytiming->setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision);
        $quantitytiming->setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision);
        $quantitytiming->setPriority($priority);
        $quantitytiming->setCondition($condition);
        $quantitytiming->setText($text);
        $quantitytiming->setConjunction($conjunction);
        $quantitytiming->setOrderSequencing($orderSequencing);
        $quantitytiming->setOccurrenceDuration(
            $occurrenceDurationIdentifier,
            $occurrenceDurationText,
            $occurrenceDurationNameOfCodingSystem,
            $occurrenceDurationAltIdentifier,
            $occurrenceDurationAltText,
            $occurrenceDurationNameOfAltCodingSystem
        );
        $quantitytiming->setTotalOccurrences($totalOccurrences);
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
    public function addFieldResultCopiesTo(
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
        $resultCopiesTo = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->resultCopiesTo[] = $resultCopiesTo;
        $resultCopiesTo->setIdNumber($idNumber);
        $resultCopiesTo->setFamilyName($familyName);
        $resultCopiesTo->setGivenName($givenName);
        $resultCopiesTo->setMiddleInitialOrName($middleInitialOrName);
        $resultCopiesTo->setSuffix($suffix);
        $resultCopiesTo->setPrefix($prefix);
        $resultCopiesTo->setDegree($degree);
        $resultCopiesTo->setSourceTable($sourceTable);
        $resultCopiesTo->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $resultCopiesTo->setNameTypeCode($nameTypeCode);
        $resultCopiesTo->setIdentifierCheckDigit($identifierCheckDigit);
        $resultCopiesTo->setCheckDigitScheme($checkDigitScheme);
        $resultCopiesTo->setIdentifierTypeCode($identifierTypeCode);
        $resultCopiesTo->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $resultCopiesTo->setNameRepresentationCode($nameRepresentationCode);
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
     * @param string $value
     */
    public function setFieldTransportationMode(string $value)
    {
        $this->transportationMode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->transportationMode->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldReasonForStudy(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $reasonForStudy = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->reasonForStudy[] = $reasonForStudy;
        $reasonForStudy->setIdentifier($identifier);
        $reasonForStudy->setText($text);
        $reasonForStudy->setNameOfCodingSystem($nameOfCodingSystem);
        $reasonForStudy->setAltIdentifier($altIdentifier);
        $reasonForStudy->setAltText($altText);
        $reasonForStudy->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldPrincipalResultInterpreter(string $value)
    {
        $this->principalResultInterpreter = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->principalResultInterpreter->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldAssistantResultInterpreter(string $value)
    {
        $assistantResultInterpreter = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $assistantResultInterpreter->setValue($value);
        $this->assistantResultInterpreter[] = $assistantResultInterpreter;
    }

    /**
     * @param string $value
     */
    public function addFieldTechnician(string $value)
    {
        $technician = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $technician->setValue($value);
        $this->technician[] = $technician;
    }

    /**
     * @param string $value
     */
    public function addFieldTranscriptionist(string $value)
    {
        $transcriptionist = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $transcriptionist->setValue($value);
        $this->transcriptionist[] = $transcriptionist;
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldScheduledDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->scheduledDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->scheduledDatetime->setTime($time);
        $this->scheduledDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldNumberOfSampleContainers(string $value)
    {
        $this->numberOfSampleContainers = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->numberOfSampleContainers->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldTransportLogisticsOfCollectedSample(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $transportLogisticsOfCollectedSample = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->transportLogisticsOfCollectedSample[] = $transportLogisticsOfCollectedSample;
        $transportLogisticsOfCollectedSample->setIdentifier($identifier);
        $transportLogisticsOfCollectedSample->setText($text);
        $transportLogisticsOfCollectedSample->setNameOfCodingSystem($nameOfCodingSystem);
        $transportLogisticsOfCollectedSample->setAltIdentifier($altIdentifier);
        $transportLogisticsOfCollectedSample->setAltText($altText);
        $transportLogisticsOfCollectedSample->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldCollectorsComment(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $collectorsComment = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->collectorsComment[] = $collectorsComment;
        $collectorsComment->setIdentifier($identifier);
        $collectorsComment->setText($text);
        $collectorsComment->setNameOfCodingSystem($nameOfCodingSystem);
        $collectorsComment->setAltIdentifier($altIdentifier);
        $collectorsComment->setAltText($altText);
        $collectorsComment->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldTransportArrangementResponsibility(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->transportArrangementResponsibility = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->transportArrangementResponsibility->setIdentifier($identifier);
        $this->transportArrangementResponsibility->setText($text);
        $this->transportArrangementResponsibility->setNameOfCodingSystem($nameOfCodingSystem);
        $this->transportArrangementResponsibility->setAltIdentifier($altIdentifier);
        $this->transportArrangementResponsibility->setAltText($altText);
        $this->transportArrangementResponsibility->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldTransportArranged(string $value)
    {
        $this->transportArranged = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->transportArranged->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldEscortRequired(string $value)
    {
        $this->escortRequired = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->escortRequired->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldPlannedPatientTransportComment(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $plannedPatientTransportComment = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->plannedPatientTransportComment[] = $plannedPatientTransportComment;
        $plannedPatientTransportComment->setIdentifier($identifier);
        $plannedPatientTransportComment->setText($text);
        $plannedPatientTransportComment->setNameOfCodingSystem($nameOfCodingSystem);
        $plannedPatientTransportComment->setAltIdentifier($altIdentifier);
        $plannedPatientTransportComment->setAltText($altText);
        $plannedPatientTransportComment->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldProcedureCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->procedureCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->procedureCode->setIdentifier($identifier);
        $this->procedureCode->setText($text);
        $this->procedureCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->procedureCode->setAltIdentifier($altIdentifier);
        $this->procedureCode->setAltText($altText);
        $this->procedureCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldProcedureCodeModifier(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $procedureCodeModifier = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->procedureCodeModifier[] = $procedureCodeModifier;
        $procedureCodeModifier->setIdentifier($identifier);
        $procedureCodeModifier->setText($text);
        $procedureCodeModifier->setNameOfCodingSystem($nameOfCodingSystem);
        $procedureCodeModifier->setAltIdentifier($altIdentifier);
        $procedureCodeModifier->setAltText($altText);
        $procedureCodeModifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\V231\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
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
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldUniversalServiceId()
    {
        return $this->universalServiceId;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldPriority()
    {
        return $this->priority;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldRequestedDatetime()
    {
        return $this->requestedDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldObservationDatetime()
    {
        return $this->observationDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldObservationEndDatetime()
    {
        return $this->observationEndDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\CqDataType
     */
    public function getFieldCollectionVolume()
    {
        return $this->collectionVolume;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldCollectorIdentifier()
    {
        return $this->collectorIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldSpecimenActionCode()
    {
        return $this->specimenActionCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldDangerCode()
    {
        return $this->dangerCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldRelevantClinicalInformation()
    {
        return $this->relevantClinicalInformation;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldSpecimenReceivedDatetime()
    {
        return $this->specimenReceivedDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldSpecimenSource()
    {
        return $this->specimenSource;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldOrderingProvider()
    {
        return $this->orderingProvider;
    }

    /**
     * @return \Hl7v2\DataType\V231\XtnDataType[]
     */
    public function getFieldOrderCallbackPhoneNumber()
    {
        return $this->orderCallbackPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldPlacerField1()
    {
        return $this->placerField1;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldPlacerField2()
    {
        return $this->placerField2;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldFillerField1()
    {
        return $this->fillerField1;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldFillerField2()
    {
        return $this->fillerField2;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldResultsRptstatusChngDatetime()
    {
        return $this->resultsRptstatusChngDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldChargeToPractice()
    {
        return $this->chargeToPractice;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldDiagnosticServSectId()
    {
        return $this->diagnosticServSectId;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldResultStatus()
    {
        return $this->resultStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldParentResult()
    {
        return $this->parentResult;
    }

    /**
     * @return \Hl7v2\DataType\V231\TqDataType[]
     */
    public function getFieldQuantitytiming()
    {
        return $this->quantitytiming;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldResultCopiesTo()
    {
        return $this->resultCopiesTo;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldParent()
    {
        return $this->parent;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldTransportationMode()
    {
        return $this->transportationMode;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldReasonForStudy()
    {
        return $this->reasonForStudy;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldPrincipalResultInterpreter()
    {
        return $this->principalResultInterpreter;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType[]
     */
    public function getFieldAssistantResultInterpreter()
    {
        return $this->assistantResultInterpreter;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType[]
     */
    public function getFieldTechnician()
    {
        return $this->technician;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType[]
     */
    public function getFieldTranscriptionist()
    {
        return $this->transcriptionist;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldScheduledDatetime()
    {
        return $this->scheduledDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldNumberOfSampleContainers()
    {
        return $this->numberOfSampleContainers;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldTransportLogisticsOfCollectedSample()
    {
        return $this->transportLogisticsOfCollectedSample;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldCollectorsComment()
    {
        return $this->collectorsComment;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldTransportArrangementResponsibility()
    {
        return $this->transportArrangementResponsibility;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldTransportArranged()
    {
        return $this->transportArranged;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldEscortRequired()
    {
        return $this->escortRequired;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldPlannedPatientTransportComment()
    {
        return $this->plannedPatientTransportComment;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldProcedureCode()
    {
        return $this->procedureCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldProcedureCodeModifier()
    {
        return $this->procedureCodeModifier;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // OBR.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBR Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetId($codec->extractComponent($datagram));

        // OBR.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBR Segment data contains too few required fields.'
            );
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

        // OBR.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBR Segment data contains too few required fields.'
            );
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

        // OBR.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBR Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('UniversalServiceId', 200, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldUniversalServiceId(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBR.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Priority', 2, $datagram->getPositionalState());
        $this->setFieldPriority($codec->extractComponent($datagram));

        // OBR.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('RequestedDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldRequestedDatetime(
            $time,
            $degreeOfPrecision
        );

        // OBR.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ObservationDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldObservationDatetime(
            $time,
            $degreeOfPrecision
        );

        // OBR.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ObservationEndDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldObservationEndDatetime(
            $time,
            $degreeOfPrecision
        );

        // OBR.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CollectionVolume', 20, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1,1]];
        list(
            $quantity,
            list(
                $unitsIdentifier,
                $unitsText,
                $unitsNameOfCodingSystem,
                $unitsAltIdentifier,
                $unitsAltText,
                $unitsNameOfAltCodingSystem,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldCollectionVolume(
            $quantity,
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );

        // OBR.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CollectorIdentifier', 60, $datagram->getPositionalState());
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
            $this->addFieldCollectorIdentifier(
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

        // OBR.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenActionCode', 1, $datagram->getPositionalState());
        $this->setFieldSpecimenActionCode($codec->extractComponent($datagram));

        // OBR.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DangerCode', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDangerCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBR.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('RelevantClinicalInformation', 300, $datagram->getPositionalState());
        $this->setFieldRelevantClinicalInformation($codec->extractComponent($datagram));

        // OBR.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenReceivedDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenReceivedDatetime(
            $time,
            $degreeOfPrecision
        );

        // OBR.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenSource', 300, $datagram->getPositionalState());
        $this->setFieldSpecimenSource($codec->extractComponent($datagram));

        // OBR.16
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

        // OBR.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderCallbackPhoneNumber', 40, $datagram->getPositionalState());
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
            $this->addFieldOrderCallbackPhoneNumber(
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

        // OBR.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlacerField1', 60, $datagram->getPositionalState());
        $this->setFieldPlacerField1($codec->extractComponent($datagram));

        // OBR.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlacerField2', 60, $datagram->getPositionalState());
        $this->setFieldPlacerField2($codec->extractComponent($datagram));

        // OBR.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('FillerField1', 60, $datagram->getPositionalState());
        $this->setFieldFillerField1($codec->extractComponent($datagram));

        // OBR.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('FillerField2', 60, $datagram->getPositionalState());
        $this->setFieldFillerField2($codec->extractComponent($datagram));

        // OBR.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ResultsRptstatusChngDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldResultsRptstatusChngDatetime(
            $time,
            $degreeOfPrecision
        );

        // OBR.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ChargeToPractice', 40, $datagram->getPositionalState());
        $this->setFieldChargeToPractice($codec->extractComponent($datagram));

        // OBR.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosticServSectId', 10, $datagram->getPositionalState());
        $this->setFieldDiagnosticServSectId($codec->extractComponent($datagram));

        // OBR.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ResultStatus', 1, $datagram->getPositionalState());
        $this->setFieldResultStatus($codec->extractComponent($datagram));

        // OBR.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ParentResult', 200, $datagram->getPositionalState());
        $this->setFieldParentResult($codec->extractComponent($datagram));

        // OBR.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,[1,1,1,1,1,1]],1,1,[1,1],[1,1],1,1,1,1,1,[1,1,1,1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Quantitytiming', 200, $datagram->getPositionalState());
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
            ) = $components;
            $this->addFieldQuantitytiming(
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
        }

        // OBR.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ResultCopiesTo', 150, $datagram->getPositionalState());
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
            $this->addFieldResultCopiesTo(
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

        // OBR.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Parent', 200, $datagram->getPositionalState());
        $this->setFieldParent($codec->extractComponent($datagram));

        // OBR.30
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TransportationMode', 20, $datagram->getPositionalState());
        $this->setFieldTransportationMode($codec->extractComponent($datagram));

        // OBR.31
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ReasonForStudy', 300, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
            ) = $components;
            $this->addFieldReasonForStudy(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBR.32
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PrincipalResultInterpreter', 200, $datagram->getPositionalState());
        $this->setFieldPrincipalResultInterpreter($codec->extractComponent($datagram));

        // OBR.33
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AssistantResultInterpreter', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldAssistantResultInterpreter($value);
        }

        // OBR.34
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Technician', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldTechnician($value);
        }

        // OBR.35
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Transcriptionist', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldTranscriptionist($value);
        }

        // OBR.36
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ScheduledDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldScheduledDatetime(
            $time,
            $degreeOfPrecision
        );

        // OBR.37
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('NumberOfSampleContainers', 4, $datagram->getPositionalState());
        $this->setFieldNumberOfSampleContainers($codec->extractComponent($datagram));

        // OBR.38
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('TransportLogisticsOfCollectedSample', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
            ) = $components;
            $this->addFieldTransportLogisticsOfCollectedSample(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBR.39
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CollectorsComment', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
            ) = $components;
            $this->addFieldCollectorsComment(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBR.40
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TransportArrangementResponsibility', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldTransportArrangementResponsibility(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBR.41
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TransportArranged', 30, $datagram->getPositionalState());
        $this->setFieldTransportArranged($codec->extractComponent($datagram));

        // OBR.42
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EscortRequired', 1, $datagram->getPositionalState());
        $this->setFieldEscortRequired($codec->extractComponent($datagram));

        // OBR.43
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PlannedPatientTransportComment', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
            ) = $components;
            $this->addFieldPlannedPatientTransportComment(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBR.44
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ProcedureCode', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldProcedureCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBR.45
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ProcedureCodeModifier', 80, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
            ) = $components;
            $this->addFieldProcedureCodeModifier(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'OBR';
        $emptyFieldsSinceLastField = 0;

        if (!$this->getFieldSetId() || !$this->getFieldSetId()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSetId()->getValue();
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

        if (!$this->getFieldUniversalServiceId()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldUniversalServiceId();
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

        if (!$this->getFieldPriority() || !$this->getFieldPriority()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPriority()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldRequestedDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldRequestedDatetime();
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

        if (!$this->getFieldObservationDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldObservationDatetime();
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

        if (!$this->getFieldObservationEndDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldObservationEndDatetime();
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

        if (!$this->getFieldCollectionVolume()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldCollectionVolume();
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

        if (empty($this->getFieldCollectorIdentifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCollectorIdentifier() as $repetition) {
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

        if (!$this->getFieldSpecimenActionCode() || !$this->getFieldSpecimenActionCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSpecimenActionCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDangerCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDangerCode();
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

        if (!$this->getFieldRelevantClinicalInformation() || !$this->getFieldRelevantClinicalInformation()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldRelevantClinicalInformation()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldSpecimenReceivedDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldSpecimenReceivedDatetime();
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

        if (!$this->getFieldSpecimenSource() || !$this->getFieldSpecimenSource()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSpecimenSource()->getValue();
            $emptyFieldsSinceLastField = 0;
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

        if (empty($this->getFieldOrderCallbackPhoneNumber())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderCallbackPhoneNumber() as $repetition) {
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

        if (!$this->getFieldPlacerField1() || !$this->getFieldPlacerField1()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPlacerField1()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldPlacerField2() || !$this->getFieldPlacerField2()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPlacerField2()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldFillerField1() || !$this->getFieldFillerField1()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldFillerField1()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldFillerField2() || !$this->getFieldFillerField2()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldFillerField2()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldResultsRptstatusChngDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldResultsRptstatusChngDatetime();
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

        if (!$this->getFieldChargeToPractice() || !$this->getFieldChargeToPractice()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldChargeToPractice()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDiagnosticServSectId() || !$this->getFieldDiagnosticServSectId()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldDiagnosticServSectId()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldResultStatus() || !$this->getFieldResultStatus()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldResultStatus()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldParentResult() || !$this->getFieldParentResult()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldParentResult()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldQuantitytiming())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldQuantitytiming() as $repetition) {
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

        if (empty($this->getFieldResultCopiesTo())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldResultCopiesTo() as $repetition) {
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

        if (!$this->getFieldParent() || !$this->getFieldParent()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldParent()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTransportationMode() || !$this->getFieldTransportationMode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTransportationMode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldReasonForStudy())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldReasonForStudy() as $repetition) {
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

        if (!$this->getFieldPrincipalResultInterpreter() || !$this->getFieldPrincipalResultInterpreter()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPrincipalResultInterpreter()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldAssistantResultInterpreter())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAssistantResultInterpreter() as $repetition) {
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

        if (empty($this->getFieldTechnician())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldTechnician() as $repetition) {
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

        if (empty($this->getFieldTranscriptionist())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldTranscriptionist() as $repetition) {
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

        if (!$this->getFieldScheduledDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldScheduledDatetime();
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

        if (!$this->getFieldNumberOfSampleContainers() || !$this->getFieldNumberOfSampleContainers()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldNumberOfSampleContainers()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldTransportLogisticsOfCollectedSample())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldTransportLogisticsOfCollectedSample() as $repetition) {
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

        if (empty($this->getFieldCollectorsComment())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCollectorsComment() as $repetition) {
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

        if (!$this->getFieldTransportArrangementResponsibility()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldTransportArrangementResponsibility();
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

        if (!$this->getFieldTransportArranged() || !$this->getFieldTransportArranged()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTransportArranged()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldEscortRequired() || !$this->getFieldEscortRequired()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldEscortRequired()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldPlannedPatientTransportComment())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPlannedPatientTransportComment() as $repetition) {
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

        if (!$this->getFieldProcedureCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldProcedureCode();
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

        if (empty($this->getFieldProcedureCodeModifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldProcedureCodeModifier() as $repetition) {
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
