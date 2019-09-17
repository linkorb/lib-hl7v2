<?php

namespace Hl7v2\Segment\V251;

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
     * @var \Hl7v2\DataType\V251\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\V251\EiDataType
     */
    private $placerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V251\EiDataType
     */
    private $fillerOrderNumber = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $universalServiceIdentifier;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $priority = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $requestedDatetime = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $observationDatetime = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $observationEndDatetime = null;
    /**
     * @var \Hl7v2\DataType\V251\CqDataType
     */
    private $collectionVolume = null;
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $collectorIdentifier = [];
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $specimenActionCode = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $dangerCode = null;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $relevantClinicalInformation = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $specimenReceivedDatetime = null;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $specimenSource = null;
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $orderingProvider = [];
    /**
     * @var \Hl7v2\DataType\V251\XtnDataType[]
     */
    private $orderCallbackPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $placerField1 = null;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $placerField2 = null;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $fillerField1 = null;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $fillerField2 = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $resultsRptstatusChngDatetime = null;
    /**
     * @var \Hl7v2\DataType\V251\MocDataType
     */
    private $chargeToPractice = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $diagnosticServSectId = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $resultStatus = null;
    /**
     * @var \Hl7v2\DataType\V251\PrlDataType
     */
    private $parentResult = null;
    /**
     * @var \Hl7v2\DataType\V251\TqDataType[]
     */
    private $quantitytiming = [];
    /**
     * @var \Hl7v2\DataType\V251\XcnDataType[]
     */
    private $resultCopiesTo = [];
    /**
     * @var \Hl7v2\DataType\V251\EipDataType
     */
    private $parent = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $transportationMode = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $reasonForStudy = [];
    /**
     * @var \Hl7v2\DataType\V251\NdlDataType
     */
    private $principalResultInterpreter = null;
    /**
     * @var \Hl7v2\DataType\V251\NdlDataType[]
     */
    private $assistantResultInterpreter = [];
    /**
     * @var \Hl7v2\DataType\V251\NdlDataType[]
     */
    private $technician = [];
    /**
     * @var \Hl7v2\DataType\V251\NdlDataType[]
     */
    private $transcriptionist = [];
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $scheduledDatetime = null;
    /**
     * @var \Hl7v2\DataType\V251\NmDataType
     */
    private $numberOfSampleContainers = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $transportLogisticsOfCollectedSample = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $collectorsComment = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $transportArrangementResponsibility = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $transportArranged = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $escortRequired = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $plannedPatientTransportComment = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $procedureCode = null;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $procedureCodeModifier = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $placerSupplementalServiceInformation = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType[]
     */
    private $fillerSupplementalServiceInformation = [];
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $medicallyNecessaryDuplicateProcedureReason = null;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $resultHandling = null;
    /**
     * @var \Hl7v2\DataType\V251\CweDataType
     */
    private $parentUniversalServiceIdentifier = null;

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
    public function setFieldUniversalServiceIdentifier(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->universalServiceIdentifier = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->universalServiceIdentifier->setIdentifier($identifier);
        $this->universalServiceIdentifier->setText($text);
        $this->universalServiceIdentifier->setNameOfCodingSystem($nameOfCodingSystem);
        $this->universalServiceIdentifier->setAltIdentifier($altIdentifier);
        $this->universalServiceIdentifier->setAltText($altText);
        $this->universalServiceIdentifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldCollectorIdentifier(
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
        $collectorIdentifier = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->collectorIdentifier[] = $collectorIdentifier;
        $collectorIdentifier->setIdNumber($idNumber);
        $collectorIdentifier->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $collectorIdentifier->setGivenName($givenName);
        $collectorIdentifier->setSecondNames($secondNames);
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
        $collectorIdentifier->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $collectorIdentifier->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $collectorIdentifier->setNameAssemblyOrder($nameAssemblyOrder);
        $collectorIdentifier->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $collectorIdentifier->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $collectorIdentifier->setProfessionalSuffix($professionalSuffix);
        $collectorIdentifier->setAssigningJurisdiction(
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
        $collectorIdentifier->setAssigningAgency(
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
            ->create('ST', $this->encodingParameters)
        ;
        $this->specimenSource->setValue($value);
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
    public function addFieldOrderCallbackPhoneNumber(
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
        $orderCallbackPhoneNumber->setLocalNumber($localNumber);
        $orderCallbackPhoneNumber->setExtension($extension);
        $orderCallbackPhoneNumber->setAnyText($anyText);
        $orderCallbackPhoneNumber->setExtensionPrefix($extensionPrefix);
        $orderCallbackPhoneNumber->setSpeedDialCode($speedDialCode);
        $orderCallbackPhoneNumber->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
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
     * @param string $monetaryAmountQuantity
     * @param string $monetaryAmountDenomination
     * @param string $chargeCodeIdentifier
     * @param string $chargeCodeText
     * @param string $chargeCodeNameOfCodingSystem
     * @param string $chargeCodeAltIdentifier
     * @param string $chargeCodeAltText
     * @param string $chargeCodeNameOfAltCodingSystem
     */
    public function setFieldChargeToPractice(
        string $monetaryAmountQuantity = null,
        string $monetaryAmountDenomination = null,
        string $chargeCodeIdentifier = null,
        string $chargeCodeText = null,
        string $chargeCodeNameOfCodingSystem = null,
        string $chargeCodeAltIdentifier = null,
        string $chargeCodeAltText = null,
        string $chargeCodeNameOfAltCodingSystem = null
    ) {
        $this->chargeToPractice = $this
            ->dataTypeFactory
            ->create('MOC', $this->encodingParameters)
        ;
        $this->chargeToPractice->setMonetaryAmount(
            $monetaryAmountQuantity,
            $monetaryAmountDenomination
        );
        $this->chargeToPractice->setChargeCode(
            $chargeCodeIdentifier,
            $chargeCodeText,
            $chargeCodeNameOfCodingSystem,
            $chargeCodeAltIdentifier,
            $chargeCodeAltText,
            $chargeCodeNameOfAltCodingSystem
        );
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
     * @param string $parentObservationIdentifierIdentifier
     * @param string $parentObservationIdentifierText
     * @param string $parentObservationIdentifierNameOfCodingSystem
     * @param string $parentObservationIdentifierAltIdentifier
     * @param string $parentObservationIdentifierAltText
     * @param string $parentObservationIdentifierNameOfAltCodingSystem
     * @param string $parentObservationSubIdentifier
     * @param string $parentObservationValueDescriptor
     */
    public function setFieldParentResult(
        string $parentObservationIdentifierIdentifier = null,
        string $parentObservationIdentifierText = null,
        string $parentObservationIdentifierNameOfCodingSystem = null,
        string $parentObservationIdentifierAltIdentifier = null,
        string $parentObservationIdentifierAltText = null,
        string $parentObservationIdentifierNameOfAltCodingSystem = null,
        string $parentObservationSubIdentifier = null,
        string $parentObservationValueDescriptor = null
    ) {
        $this->parentResult = $this
            ->dataTypeFactory
            ->create('PRL', $this->encodingParameters)
        ;
        $this->parentResult->setParentObservationIdentifier(
            $parentObservationIdentifierIdentifier,
            $parentObservationIdentifierText,
            $parentObservationIdentifierNameOfCodingSystem,
            $parentObservationIdentifierAltIdentifier,
            $parentObservationIdentifierAltText,
            $parentObservationIdentifierNameOfAltCodingSystem
        );
        $this->parentResult->setParentObservationSubIdentifier($parentObservationSubIdentifier);
        $this->parentResult->setParentObservationValueDescriptor($parentObservationValueDescriptor);
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
    public function addFieldQuantitytiming(
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
        $quantitytiming->setInterval($intervalRepeatPattern, $intervalExplicitTimeInterval);
        $quantitytiming->setDuration($duration);
        $quantitytiming->setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision);
        $quantitytiming->setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision);
        $quantitytiming->setPriority($priority);
        $quantitytiming->setCondition($condition);
        $quantitytiming->setText($text);
        $quantitytiming->setConjunction($conjunction);
        $quantitytiming->setOrderSequencing(
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
    public function addFieldResultCopiesTo(
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
        $resultCopiesTo = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->resultCopiesTo[] = $resultCopiesTo;
        $resultCopiesTo->setIdNumber($idNumber);
        $resultCopiesTo->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $resultCopiesTo->setGivenName($givenName);
        $resultCopiesTo->setSecondNames($secondNames);
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
        $resultCopiesTo->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $resultCopiesTo->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $resultCopiesTo->setNameAssemblyOrder($nameAssemblyOrder);
        $resultCopiesTo->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $resultCopiesTo->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $resultCopiesTo->setProfessionalSuffix($professionalSuffix);
        $resultCopiesTo->setAssigningJurisdiction(
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
        $resultCopiesTo->setAssigningAgency(
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
     * @param string $nameIdNumber
     * @param string $nameFamilyName
     * @param string $nameGivenName
     * @param string $nameSecondNames
     * @param string $nameSuffix
     * @param string $namePrefix
     * @param string $nameDegree
     * @param string $nameSourceTable
     * @param string $nameAssigningAuthorityNamespaceId
     * @param string $nameAssigningAuthorityUniversalId
     * @param string $nameAssigningAuthorityUniversalIdType
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $patientLocationType
     * @param string $building
     * @param string $floor
     */
    public function setFieldPrincipalResultInterpreter(
        string $nameIdNumber = null,
        string $nameFamilyName = null,
        string $nameGivenName = null,
        string $nameSecondNames = null,
        string $nameSuffix = null,
        string $namePrefix = null,
        string $nameDegree = null,
        string $nameSourceTable = null,
        string $nameAssigningAuthorityNamespaceId = null,
        string $nameAssigningAuthorityUniversalId = null,
        string $nameAssigningAuthorityUniversalIdType = null,
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null,
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null,
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $patientLocationType = null,
        string $building = null,
        string $floor = null
    ) {
        $this->principalResultInterpreter = $this
            ->dataTypeFactory
            ->create('NDL', $this->encodingParameters)
        ;
        $this->principalResultInterpreter->setName(
            $nameIdNumber,
            $nameFamilyName,
            $nameGivenName,
            $nameSecondNames,
            $nameSuffix,
            $namePrefix,
            $nameDegree,
            $nameSourceTable,
            $nameAssigningAuthorityNamespaceId,
            $nameAssigningAuthorityUniversalId,
            $nameAssigningAuthorityUniversalIdType
        );
        $this->principalResultInterpreter->setStartDateTime(
            $startDateTimeTime,
            $startDateTimeDegreeOfPrecision
        );
        $this->principalResultInterpreter->setEndDateTime(
            $endDateTimeTime,
            $endDateTimeDegreeOfPrecision
        );
        $this->principalResultInterpreter->setPointOfCare($pointOfCare);
        $this->principalResultInterpreter->setRoom($room);
        $this->principalResultInterpreter->setBed($bed);
        $this->principalResultInterpreter->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->principalResultInterpreter->setLocationStatus($locationStatus);
        $this->principalResultInterpreter->setPatientLocationType($patientLocationType);
        $this->principalResultInterpreter->setBuilding($building);
        $this->principalResultInterpreter->setFloor($floor);
    }

    /**
     * @param string $nameIdNumber
     * @param string $nameFamilyName
     * @param string $nameGivenName
     * @param string $nameSecondNames
     * @param string $nameSuffix
     * @param string $namePrefix
     * @param string $nameDegree
     * @param string $nameSourceTable
     * @param string $nameAssigningAuthorityNamespaceId
     * @param string $nameAssigningAuthorityUniversalId
     * @param string $nameAssigningAuthorityUniversalIdType
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $patientLocationType
     * @param string $building
     * @param string $floor
     */
    public function addFieldAssistantResultInterpreter(
        string $nameIdNumber = null,
        string $nameFamilyName = null,
        string $nameGivenName = null,
        string $nameSecondNames = null,
        string $nameSuffix = null,
        string $namePrefix = null,
        string $nameDegree = null,
        string $nameSourceTable = null,
        string $nameAssigningAuthorityNamespaceId = null,
        string $nameAssigningAuthorityUniversalId = null,
        string $nameAssigningAuthorityUniversalIdType = null,
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null,
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null,
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $patientLocationType = null,
        string $building = null,
        string $floor = null
    ) {
        $assistantResultInterpreter = $this
            ->dataTypeFactory
            ->create('NDL', $this->encodingParameters)
        ;
        $this->assistantResultInterpreter[] = $assistantResultInterpreter;
        $assistantResultInterpreter->setName(
            $nameIdNumber,
            $nameFamilyName,
            $nameGivenName,
            $nameSecondNames,
            $nameSuffix,
            $namePrefix,
            $nameDegree,
            $nameSourceTable,
            $nameAssigningAuthorityNamespaceId,
            $nameAssigningAuthorityUniversalId,
            $nameAssigningAuthorityUniversalIdType
        );
        $assistantResultInterpreter->setStartDateTime(
            $startDateTimeTime,
            $startDateTimeDegreeOfPrecision
        );
        $assistantResultInterpreter->setEndDateTime(
            $endDateTimeTime,
            $endDateTimeDegreeOfPrecision
        );
        $assistantResultInterpreter->setPointOfCare($pointOfCare);
        $assistantResultInterpreter->setRoom($room);
        $assistantResultInterpreter->setBed($bed);
        $assistantResultInterpreter->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $assistantResultInterpreter->setLocationStatus($locationStatus);
        $assistantResultInterpreter->setPatientLocationType($patientLocationType);
        $assistantResultInterpreter->setBuilding($building);
        $assistantResultInterpreter->setFloor($floor);
    }

    /**
     * @param string $nameIdNumber
     * @param string $nameFamilyName
     * @param string $nameGivenName
     * @param string $nameSecondNames
     * @param string $nameSuffix
     * @param string $namePrefix
     * @param string $nameDegree
     * @param string $nameSourceTable
     * @param string $nameAssigningAuthorityNamespaceId
     * @param string $nameAssigningAuthorityUniversalId
     * @param string $nameAssigningAuthorityUniversalIdType
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $patientLocationType
     * @param string $building
     * @param string $floor
     */
    public function addFieldTechnician(
        string $nameIdNumber = null,
        string $nameFamilyName = null,
        string $nameGivenName = null,
        string $nameSecondNames = null,
        string $nameSuffix = null,
        string $namePrefix = null,
        string $nameDegree = null,
        string $nameSourceTable = null,
        string $nameAssigningAuthorityNamespaceId = null,
        string $nameAssigningAuthorityUniversalId = null,
        string $nameAssigningAuthorityUniversalIdType = null,
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null,
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null,
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $patientLocationType = null,
        string $building = null,
        string $floor = null
    ) {
        $technician = $this
            ->dataTypeFactory
            ->create('NDL', $this->encodingParameters)
        ;
        $this->technician[] = $technician;
        $technician->setName(
            $nameIdNumber,
            $nameFamilyName,
            $nameGivenName,
            $nameSecondNames,
            $nameSuffix,
            $namePrefix,
            $nameDegree,
            $nameSourceTable,
            $nameAssigningAuthorityNamespaceId,
            $nameAssigningAuthorityUniversalId,
            $nameAssigningAuthorityUniversalIdType
        );
        $technician->setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision);
        $technician->setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision);
        $technician->setPointOfCare($pointOfCare);
        $technician->setRoom($room);
        $technician->setBed($bed);
        $technician->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $technician->setLocationStatus($locationStatus);
        $technician->setPatientLocationType($patientLocationType);
        $technician->setBuilding($building);
        $technician->setFloor($floor);
    }

    /**
     * @param string $nameIdNumber
     * @param string $nameFamilyName
     * @param string $nameGivenName
     * @param string $nameSecondNames
     * @param string $nameSuffix
     * @param string $namePrefix
     * @param string $nameDegree
     * @param string $nameSourceTable
     * @param string $nameAssigningAuthorityNamespaceId
     * @param string $nameAssigningAuthorityUniversalId
     * @param string $nameAssigningAuthorityUniversalIdType
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $patientLocationType
     * @param string $building
     * @param string $floor
     */
    public function addFieldTranscriptionist(
        string $nameIdNumber = null,
        string $nameFamilyName = null,
        string $nameGivenName = null,
        string $nameSecondNames = null,
        string $nameSuffix = null,
        string $namePrefix = null,
        string $nameDegree = null,
        string $nameSourceTable = null,
        string $nameAssigningAuthorityNamespaceId = null,
        string $nameAssigningAuthorityUniversalId = null,
        string $nameAssigningAuthorityUniversalIdType = null,
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null,
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null,
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $patientLocationType = null,
        string $building = null,
        string $floor = null
    ) {
        $transcriptionist = $this
            ->dataTypeFactory
            ->create('NDL', $this->encodingParameters)
        ;
        $this->transcriptionist[] = $transcriptionist;
        $transcriptionist->setName(
            $nameIdNumber,
            $nameFamilyName,
            $nameGivenName,
            $nameSecondNames,
            $nameSuffix,
            $namePrefix,
            $nameDegree,
            $nameSourceTable,
            $nameAssigningAuthorityNamespaceId,
            $nameAssigningAuthorityUniversalId,
            $nameAssigningAuthorityUniversalIdType
        );
        $transcriptionist->setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision);
        $transcriptionist->setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision);
        $transcriptionist->setPointOfCare($pointOfCare);
        $transcriptionist->setRoom($room);
        $transcriptionist->setBed($bed);
        $transcriptionist->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $transcriptionist->setLocationStatus($locationStatus);
        $transcriptionist->setPatientLocationType($patientLocationType);
        $transcriptionist->setBuilding($building);
        $transcriptionist->setFloor($floor);
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
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldPlacerSupplementalServiceInformation(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $placerSupplementalServiceInformation = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->placerSupplementalServiceInformation[] = $placerSupplementalServiceInformation;
        $placerSupplementalServiceInformation->setIdentifier($identifier);
        $placerSupplementalServiceInformation->setText($text);
        $placerSupplementalServiceInformation->setNameOfCodingSystem($nameOfCodingSystem);
        $placerSupplementalServiceInformation->setAltIdentifier($altIdentifier);
        $placerSupplementalServiceInformation->setAltText($altText);
        $placerSupplementalServiceInformation->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldFillerSupplementalServiceInformation(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $fillerSupplementalServiceInformation = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->fillerSupplementalServiceInformation[] = $fillerSupplementalServiceInformation;
        $fillerSupplementalServiceInformation->setIdentifier($identifier);
        $fillerSupplementalServiceInformation->setText($text);
        $fillerSupplementalServiceInformation->setNameOfCodingSystem($nameOfCodingSystem);
        $fillerSupplementalServiceInformation->setAltIdentifier($altIdentifier);
        $fillerSupplementalServiceInformation->setAltText($altText);
        $fillerSupplementalServiceInformation->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function setFieldMedicallyNecessaryDuplicateProcedureReason(
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
        $this->medicallyNecessaryDuplicateProcedureReason = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->medicallyNecessaryDuplicateProcedureReason->setIdentifier($identifier);
        $this->medicallyNecessaryDuplicateProcedureReason->setText($text);
        $this->medicallyNecessaryDuplicateProcedureReason->setNameOfCodingSystem(
            $nameOfCodingSystem
        );
        $this->medicallyNecessaryDuplicateProcedureReason->setAltIdentifier($altIdentifier);
        $this->medicallyNecessaryDuplicateProcedureReason->setAltText($altText);
        $this->medicallyNecessaryDuplicateProcedureReason->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->medicallyNecessaryDuplicateProcedureReason->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->medicallyNecessaryDuplicateProcedureReason->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->medicallyNecessaryDuplicateProcedureReason->setOriginalText($originalText);
    }

    /**
     * @param string $value
     */
    public function setFieldResultHandling(string $value)
    {
        $this->resultHandling = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->resultHandling->setValue($value);
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
     * @return \Hl7v2\DataType\V251\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
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
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldUniversalServiceIdentifier()
    {
        return $this->universalServiceIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldPriority()
    {
        return $this->priority;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldRequestedDatetime()
    {
        return $this->requestedDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldObservationDatetime()
    {
        return $this->observationDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldObservationEndDatetime()
    {
        return $this->observationEndDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\CqDataType
     */
    public function getFieldCollectionVolume()
    {
        return $this->collectionVolume;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldCollectorIdentifier()
    {
        return $this->collectorIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldSpecimenActionCode()
    {
        return $this->specimenActionCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldDangerCode()
    {
        return $this->dangerCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldRelevantClinicalInformation()
    {
        return $this->relevantClinicalInformation;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldSpecimenReceivedDatetime()
    {
        return $this->specimenReceivedDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldSpecimenSource()
    {
        return $this->specimenSource;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldOrderingProvider()
    {
        return $this->orderingProvider;
    }

    /**
     * @return \Hl7v2\DataType\V251\XtnDataType[]
     */
    public function getFieldOrderCallbackPhoneNumber()
    {
        return $this->orderCallbackPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldPlacerField1()
    {
        return $this->placerField1;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldPlacerField2()
    {
        return $this->placerField2;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldFillerField1()
    {
        return $this->fillerField1;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldFillerField2()
    {
        return $this->fillerField2;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldResultsRptstatusChngDatetime()
    {
        return $this->resultsRptstatusChngDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\MocDataType
     */
    public function getFieldChargeToPractice()
    {
        return $this->chargeToPractice;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldDiagnosticServSectId()
    {
        return $this->diagnosticServSectId;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldResultStatus()
    {
        return $this->resultStatus;
    }

    /**
     * @return \Hl7v2\DataType\V251\PrlDataType
     */
    public function getFieldParentResult()
    {
        return $this->parentResult;
    }

    /**
     * @return \Hl7v2\DataType\V251\TqDataType[]
     */
    public function getFieldQuantitytiming()
    {
        return $this->quantitytiming;
    }

    /**
     * @return \Hl7v2\DataType\V251\XcnDataType[]
     */
    public function getFieldResultCopiesTo()
    {
        return $this->resultCopiesTo;
    }

    /**
     * @return \Hl7v2\DataType\V251\EipDataType
     */
    public function getFieldParent()
    {
        return $this->parent;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldTransportationMode()
    {
        return $this->transportationMode;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldReasonForStudy()
    {
        return $this->reasonForStudy;
    }

    /**
     * @return \Hl7v2\DataType\V251\NdlDataType
     */
    public function getFieldPrincipalResultInterpreter()
    {
        return $this->principalResultInterpreter;
    }

    /**
     * @return \Hl7v2\DataType\V251\NdlDataType[]
     */
    public function getFieldAssistantResultInterpreter()
    {
        return $this->assistantResultInterpreter;
    }

    /**
     * @return \Hl7v2\DataType\V251\NdlDataType[]
     */
    public function getFieldTechnician()
    {
        return $this->technician;
    }

    /**
     * @return \Hl7v2\DataType\V251\NdlDataType[]
     */
    public function getFieldTranscriptionist()
    {
        return $this->transcriptionist;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldScheduledDatetime()
    {
        return $this->scheduledDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V251\NmDataType
     */
    public function getFieldNumberOfSampleContainers()
    {
        return $this->numberOfSampleContainers;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldTransportLogisticsOfCollectedSample()
    {
        return $this->transportLogisticsOfCollectedSample;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldCollectorsComment()
    {
        return $this->collectorsComment;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldTransportArrangementResponsibility()
    {
        return $this->transportArrangementResponsibility;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldTransportArranged()
    {
        return $this->transportArranged;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldEscortRequired()
    {
        return $this->escortRequired;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldPlannedPatientTransportComment()
    {
        return $this->plannedPatientTransportComment;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldProcedureCode()
    {
        return $this->procedureCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldProcedureCodeModifier()
    {
        return $this->procedureCodeModifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldPlacerSupplementalServiceInformation()
    {
        return $this->placerSupplementalServiceInformation;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType[]
     */
    public function getFieldFillerSupplementalServiceInformation()
    {
        return $this->fillerSupplementalServiceInformation;
    }

    /**
     * @return \Hl7v2\DataType\V251\CweDataType
     */
    public function getFieldMedicallyNecessaryDuplicateProcedureReason()
    {
        return $this->medicallyNecessaryDuplicateProcedureReason;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getFieldResultHandling()
    {
        return $this->resultHandling;
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
        $this->checkFieldLength('UniversalServiceIdentifier', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldUniversalServiceIdentifier(
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
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CollectorIdentifier', 250, $datagram->getPositionalState());
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
            $this->addFieldCollectorIdentifier(
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
        $this->checkFieldLength('DangerCode', 250, $datagram->getPositionalState());
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

        // OBR.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderCallbackPhoneNumber', 250, $datagram->getPositionalState());
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
            $this->addFieldOrderCallbackPhoneNumber(
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
        $sequence = [[1,1],[1,1,1,1,1,1]];
        list(
            list(
                $monetaryAmountQuantity,
                $monetaryAmountDenomination,
            ),
            list(
                $chargeCodeIdentifier,
                $chargeCodeText,
                $chargeCodeNameOfCodingSystem,
                $chargeCodeAltIdentifier,
                $chargeCodeAltText,
                $chargeCodeNameOfAltCodingSystem,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldChargeToPractice(
            $monetaryAmountQuantity,
            $monetaryAmountDenomination,
            $chargeCodeIdentifier,
            $chargeCodeText,
            $chargeCodeNameOfCodingSystem,
            $chargeCodeAltIdentifier,
            $chargeCodeAltText,
            $chargeCodeNameOfAltCodingSystem
        );

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
        $this->checkFieldLength('ParentResult', 400, $datagram->getPositionalState());
        $sequence = [[1,1,1,1,1,1],1,1];
        list(
            list(
                $parentObservationIdentifierIdentifier,
                $parentObservationIdentifierText,
                $parentObservationIdentifierNameOfCodingSystem,
                $parentObservationIdentifierAltIdentifier,
                $parentObservationIdentifierAltText,
                $parentObservationIdentifierNameOfAltCodingSystem,
            ),
            $parentObservationSubIdentifier,
            $parentObservationValueDescriptor,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldParentResult(
            $parentObservationIdentifierIdentifier,
            $parentObservationIdentifierText,
            $parentObservationIdentifierNameOfCodingSystem,
            $parentObservationIdentifierAltIdentifier,
            $parentObservationIdentifierAltText,
            $parentObservationIdentifierNameOfAltCodingSystem,
            $parentObservationSubIdentifier,
            $parentObservationValueDescriptor
        );

        // OBR.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,[1,1,1,1,1,1]],[1,1],1,[1,1],[1,1],1,1,1,1,[1,1,1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1],1];
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
            $this->addFieldQuantitytiming(
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

        // OBR.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ResultCopiesTo', 250, $datagram->getPositionalState());
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
            $this->addFieldResultCopiesTo(
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

        // OBR.29
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
            $this->checkRepetitionLength('ReasonForStudy', 250, $datagram->getPositionalState());
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
        $sequence = [[1,1,1,1,1,1,1,1,1,1,1],[1,1],[1,1],1,1,1,[1,1,1],1,1,1,1];
        list(
            list(
                $nameIdNumber,
                $nameFamilyName,
                $nameGivenName,
                $nameSecondNames,
                $nameSuffix,
                $namePrefix,
                $nameDegree,
                $nameSourceTable,
                $nameAssigningAuthorityNamespaceId,
                $nameAssigningAuthorityUniversalId,
                $nameAssigningAuthorityUniversalIdType,
            ),
            list(
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
            ),
            list(
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
            ),
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $patientLocationType,
            $building,
            $floor,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPrincipalResultInterpreter(
            $nameIdNumber,
            $nameFamilyName,
            $nameGivenName,
            $nameSecondNames,
            $nameSuffix,
            $namePrefix,
            $nameDegree,
            $nameSourceTable,
            $nameAssigningAuthorityNamespaceId,
            $nameAssigningAuthorityUniversalId,
            $nameAssigningAuthorityUniversalIdType,
            $startDateTimeTime,
            $startDateTimeDegreeOfPrecision,
            $endDateTimeTime,
            $endDateTimeDegreeOfPrecision,
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $patientLocationType,
            $building,
            $floor
        );

        // OBR.33
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1,1,1,1,1,1,1,1,1],[1,1],[1,1],1,1,1,[1,1,1],1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AssistantResultInterpreter', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                    $nameIdNumber,
                    $nameFamilyName,
                    $nameGivenName,
                    $nameSecondNames,
                    $nameSuffix,
                    $namePrefix,
                    $nameDegree,
                    $nameSourceTable,
                    $nameAssigningAuthorityNamespaceId,
                    $nameAssigningAuthorityUniversalId,
                    $nameAssigningAuthorityUniversalIdType,
                ),
                list(
                    $startDateTimeTime,
                    $startDateTimeDegreeOfPrecision,
                ),
                list(
                    $endDateTimeTime,
                    $endDateTimeDegreeOfPrecision,
                ),
                $pointOfCare,
                $room,
                $bed,
                list(
                    $facilityNamespaceId,
                    $facilityUniversalId,
                    $facilityUniversalIdType,
                ),
                $locationStatus,
                $patientLocationType,
                $building,
                $floor,
            ) = $components;
            $this->addFieldAssistantResultInterpreter(
                $nameIdNumber,
                $nameFamilyName,
                $nameGivenName,
                $nameSecondNames,
                $nameSuffix,
                $namePrefix,
                $nameDegree,
                $nameSourceTable,
                $nameAssigningAuthorityNamespaceId,
                $nameAssigningAuthorityUniversalId,
                $nameAssigningAuthorityUniversalIdType,
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
                $pointOfCare,
                $room,
                $bed,
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
                $locationStatus,
                $patientLocationType,
                $building,
                $floor
            );
        }

        // OBR.34
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1,1,1,1,1,1,1,1,1],[1,1],[1,1],1,1,1,[1,1,1],1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Technician', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                    $nameIdNumber,
                    $nameFamilyName,
                    $nameGivenName,
                    $nameSecondNames,
                    $nameSuffix,
                    $namePrefix,
                    $nameDegree,
                    $nameSourceTable,
                    $nameAssigningAuthorityNamespaceId,
                    $nameAssigningAuthorityUniversalId,
                    $nameAssigningAuthorityUniversalIdType,
                ),
                list(
                    $startDateTimeTime,
                    $startDateTimeDegreeOfPrecision,
                ),
                list(
                    $endDateTimeTime,
                    $endDateTimeDegreeOfPrecision,
                ),
                $pointOfCare,
                $room,
                $bed,
                list(
                    $facilityNamespaceId,
                    $facilityUniversalId,
                    $facilityUniversalIdType,
                ),
                $locationStatus,
                $patientLocationType,
                $building,
                $floor,
            ) = $components;
            $this->addFieldTechnician(
                $nameIdNumber,
                $nameFamilyName,
                $nameGivenName,
                $nameSecondNames,
                $nameSuffix,
                $namePrefix,
                $nameDegree,
                $nameSourceTable,
                $nameAssigningAuthorityNamespaceId,
                $nameAssigningAuthorityUniversalId,
                $nameAssigningAuthorityUniversalIdType,
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
                $pointOfCare,
                $room,
                $bed,
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
                $locationStatus,
                $patientLocationType,
                $building,
                $floor
            );
        }

        // OBR.35
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1,1,1,1,1,1,1,1,1],[1,1],[1,1],1,1,1,[1,1,1],1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Transcriptionist', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                    $nameIdNumber,
                    $nameFamilyName,
                    $nameGivenName,
                    $nameSecondNames,
                    $nameSuffix,
                    $namePrefix,
                    $nameDegree,
                    $nameSourceTable,
                    $nameAssigningAuthorityNamespaceId,
                    $nameAssigningAuthorityUniversalId,
                    $nameAssigningAuthorityUniversalIdType,
                ),
                list(
                    $startDateTimeTime,
                    $startDateTimeDegreeOfPrecision,
                ),
                list(
                    $endDateTimeTime,
                    $endDateTimeDegreeOfPrecision,
                ),
                $pointOfCare,
                $room,
                $bed,
                list(
                    $facilityNamespaceId,
                    $facilityUniversalId,
                    $facilityUniversalIdType,
                ),
                $locationStatus,
                $patientLocationType,
                $building,
                $floor,
            ) = $components;
            $this->addFieldTranscriptionist(
                $nameIdNumber,
                $nameFamilyName,
                $nameGivenName,
                $nameSecondNames,
                $nameSuffix,
                $namePrefix,
                $nameDegree,
                $nameSourceTable,
                $nameAssigningAuthorityNamespaceId,
                $nameAssigningAuthorityUniversalId,
                $nameAssigningAuthorityUniversalIdType,
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
                $pointOfCare,
                $room,
                $bed,
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
                $locationStatus,
                $patientLocationType,
                $building,
                $floor
            );
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
            $this->checkRepetitionLength('TransportLogisticsOfCollectedSample', 250, $datagram->getPositionalState());
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
            $this->checkRepetitionLength('CollectorsComment', 250, $datagram->getPositionalState());
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
        $this->checkFieldLength('TransportArrangementResponsibility', 250, $datagram->getPositionalState());
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
            $this->checkRepetitionLength('PlannedPatientTransportComment', 250, $datagram->getPositionalState());
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
        $this->checkFieldLength('ProcedureCode', 250, $datagram->getPositionalState());
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
            $this->checkRepetitionLength('ProcedureCodeModifier', 250, $datagram->getPositionalState());
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

        // OBR.46
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PlacerSupplementalServiceInformation', 250, $datagram->getPositionalState());
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
            $this->addFieldPlacerSupplementalServiceInformation(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBR.47
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('FillerSupplementalServiceInformation', 250, $datagram->getPositionalState());
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
            $this->addFieldFillerSupplementalServiceInformation(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBR.48
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('MedicallyNecessaryDuplicateProcedureReason', 250, $datagram->getPositionalState());
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
        $this->setFieldMedicallyNecessaryDuplicateProcedureReason(
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

        // OBR.49
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ResultHandling', 2, $datagram->getPositionalState());
        $this->setFieldResultHandling($codec->extractComponent($datagram));

        // OBR.50
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

        if (!$this->getFieldFillerOrderNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldFillerOrderNumber();
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

        if (!$this->getFieldUniversalServiceIdentifier()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldUniversalServiceIdentifier();
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

        if (!$this->getFieldObservationDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldObservationDatetime();
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

        if (!$this->getFieldObservationEndDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldObservationEndDatetime();
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

        if (!$this->getFieldCollectionVolume()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldCollectionVolume();
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

        if (empty($this->getFieldCollectorIdentifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCollectorIdentifier() as $repetition) {
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

        if (empty($this->getFieldOrderCallbackPhoneNumber())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOrderCallbackPhoneNumber() as $repetition) {
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

        if (!$this->getFieldChargeToPractice()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldChargeToPractice();
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

        if (!$this->getFieldParentResult()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldParentResult();
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

        if (empty($this->getFieldQuantitytiming())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldQuantitytiming() as $repetition) {
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

        if (empty($this->getFieldResultCopiesTo())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldResultCopiesTo() as $repetition) {
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

        if (!$this->getFieldParent()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldParent();
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

        if (!$this->getFieldPrincipalResultInterpreter()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPrincipalResultInterpreter();
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

        if (empty($this->getFieldAssistantResultInterpreter())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAssistantResultInterpreter() as $repetition) {
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

        if (empty($this->getFieldTechnician())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldTechnician() as $repetition) {
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

        if (empty($this->getFieldTranscriptionist())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldTranscriptionist() as $repetition) {
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

        if (!$this->getFieldScheduledDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldScheduledDatetime();
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

        if (empty($this->getFieldCollectorsComment())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCollectorsComment() as $repetition) {
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

        if (!$this->getFieldTransportArrangementResponsibility()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldTransportArrangementResponsibility();
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

        if (!$this->getFieldProcedureCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldProcedureCode();
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

        if (empty($this->getFieldProcedureCodeModifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldProcedureCodeModifier() as $repetition) {
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

        if (empty($this->getFieldPlacerSupplementalServiceInformation())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPlacerSupplementalServiceInformation() as $repetition) {
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

        if (empty($this->getFieldFillerSupplementalServiceInformation())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldFillerSupplementalServiceInformation() as $repetition) {
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

        if (!$this->getFieldMedicallyNecessaryDuplicateProcedureReason()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldMedicallyNecessaryDuplicateProcedureReason();
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

        if (!$this->getFieldResultHandling() || !$this->getFieldResultHandling()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldResultHandling()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldParentUniversalServiceIdentifier()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldParentUniversalServiceIdentifier();
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
