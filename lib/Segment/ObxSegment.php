<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;

/**
 * Observation/Result (OBX).
 */
class ObxSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $valueType = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $observationIdentifier;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $observationSubid = null;
    /**
     * @var \Hl7v2\DataType\DataTypeInterface[]
     */
    private $observationValue = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $units = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $referencesRange = null;
    /**
     * @var \Hl7v2\DataType\IsDataType[]
     */
    private $abnormalFlags = [];
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $probability = null;
    /**
     * @var \Hl7v2\DataType\IdDataType[]
     */
    private $natureOfAbnormalTest = [];
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $observationResultStatus;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $effectiveDateOfReferenceRangeValues = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $userDefinedAccessChecks = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $datetimeOfTheObservation = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $producersReference = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    private $responsibleObserver = [];
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    private $observationMethod = [];
    /**
     * @var \Hl7v2\DataType\EiDataType[]
     */
    private $equipmentInstanceIdentifier = [];
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $datetimeOfTheAnalysis = null;
    private $unnamed1;
    private $unnamed2;
    private $unnamed3;
    /**
     * @var \Hl7v2\DataType\XonDataType
     */
    private $performingOrganizationName = null;
    /**
     * @var \Hl7v2\DataType\XadDataType
     */
    private $performingOrganizationAddress = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType
     */
    private $performingOrganizationMedicalDirector = null;

    /**
     * @param string $value
     */
    public function setFieldSetId($value)
    {
        $this->setId = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setId->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldValueType($value)
    {
        $this->valueType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->valueType->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldObservationIdentifier(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->observationIdentifier = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->observationIdentifier->setIdentifier($identifier);
        $this->observationIdentifier->setText($text);
        $this->observationIdentifier->setNameOfCodingSystem($nameOfCodingSystem);
        $this->observationIdentifier->setAltIdentifier($altIdentifier);
        $this->observationIdentifier->setAltText($altText);
        $this->observationIdentifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldObservationSubid($value)
    {
        $this->observationSubid = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->observationSubid->setValue($value);
    }

    /**
     * @param string $sourceApplicationNamespaceId
     * @param string $sourceApplicationUniversalId
     * @param string $sourceApplicationUniversalIdType
     * @param string $typeOfData
     * @param string $dataSubtype
     * @param string $encoding
     * @param string $data
     */
    public function addFieldObservationValueAsED(
        $sourceApplicationNamespaceId = null,
        $sourceApplicationUniversalId = null,
        $sourceApplicationUniversalIdType = null,
        $typeOfData,
        $dataSubtype = null,
        $encoding,
        $data
    ) {
        $observationValue = $this
            ->dataTypeFactory
            ->create('ED', $this->characterEncoding)
        ;
        $this->observationValue[] = $observationValue;
        $observationValue->setSourceApplication(
            $sourceApplicationNamespaceId,
            $sourceApplicationUniversalId,
            $sourceApplicationUniversalIdType
        );
        $observationValue->setTypeOfData($typeOfData);
        $observationValue->setDataSubtype($dataSubtype);
        $observationValue->setEncoding($encoding);
        $observationValue->setData($data);
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsFT($value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('FT', $this->characterEncoding)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsNM($value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsST($value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function addFieldObservationValueAsTS($time, $degreeOfPrecision = null)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->observationValue[] = $observationValue;
        $observationValue->setTime($time);
        $observationValue->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsTX($value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldUnits(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->units = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->units->setIdentifier($identifier);
        $this->units->setText($text);
        $this->units->setNameOfCodingSystem($nameOfCodingSystem);
        $this->units->setAltIdentifier($altIdentifier);
        $this->units->setAltText($altText);
        $this->units->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldReferencesRange($value)
    {
        $this->referencesRange = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->referencesRange->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldAbnormalFlags($value)
    {
        $abnormalFlags = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $abnormalFlags->setValue($value);
        $this->abnormalFlags[] = $abnormalFlags;
    }

    /**
     * @param string $value
     */
    public function setFieldProbability($value)
    {
        $this->probability = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->probability->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldNatureOfAbnormalTest($value)
    {
        $natureOfAbnormalTest = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $natureOfAbnormalTest->setValue($value);
        $this->natureOfAbnormalTest[] = $natureOfAbnormalTest;
    }

    /**
     * @param string $value
     */
    public function setFieldObservationResultStatus($value)
    {
        $this->observationResultStatus = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->observationResultStatus->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldEffectiveDateOfReferenceRangeValues($time, $degreeOfPrecision = null)
    {
        $this->effectiveDateOfReferenceRangeValues = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->effectiveDateOfReferenceRangeValues->setTime($time);
        $this->effectiveDateOfReferenceRangeValues->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldUserDefinedAccessChecks($value)
    {
        $this->userDefinedAccessChecks = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->userDefinedAccessChecks->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimeOfTheObservation($time, $degreeOfPrecision = null)
    {
        $this->datetimeOfTheObservation = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->datetimeOfTheObservation->setTime($time);
        $this->datetimeOfTheObservation->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldProducersReference(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->producersReference = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->producersReference->setIdentifier($identifier);
        $this->producersReference->setText($text);
        $this->producersReference->setNameOfCodingSystem($nameOfCodingSystem);
        $this->producersReference->setAltIdentifier($altIdentifier);
        $this->producersReference->setAltText($altText);
        $this->producersReference->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldResponsibleObserver(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId = null,
        $assigningAuthorityUniversalId = null,
        $assigningAuthorityUniversalIdType = null,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId = null,
        $assigningFacilityUniversalId = null,
        $assigningFacilityUniversalIdType = null,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $responsibleObserver = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->responsibleObserver[] = $responsibleObserver;
        $responsibleObserver->setIdNumber($idNumber);
        $responsibleObserver->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $responsibleObserver->setGivenName($givenName);
        $responsibleObserver->setSecondNames($secondNames);
        $responsibleObserver->setSuffix($suffix);
        $responsibleObserver->setPrefix($prefix);
        $responsibleObserver->setDegree($degree);
        $responsibleObserver->setSourceTable($sourceTable);
        $responsibleObserver->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $responsibleObserver->setNameTypeCode($nameTypeCode);
        $responsibleObserver->setIdentifierCheckDigit($identifierCheckDigit);
        $responsibleObserver->setCheckDigitScheme($checkDigitScheme);
        $responsibleObserver->setIdentifierTypeCode($identifierTypeCode);
        $responsibleObserver->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $responsibleObserver->setNameRepresentationCode($nameRepresentationCode);
        $responsibleObserver->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $responsibleObserver->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $responsibleObserver->setNameAssemblyOrder($nameAssemblyOrder);
        $responsibleObserver->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $responsibleObserver->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $responsibleObserver->setProfessionalSuffix($professionalSuffix);
        $responsibleObserver->setAssigningJurisdiction(
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
        $responsibleObserver->setAssigningAgency(
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
    public function addFieldObservationMethod(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $observationMethod = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->observationMethod[] = $observationMethod;
        $observationMethod->setIdentifier($identifier);
        $observationMethod->setText($text);
        $observationMethod->setNameOfCodingSystem($nameOfCodingSystem);
        $observationMethod->setAltIdentifier($altIdentifier);
        $observationMethod->setAltText($altText);
        $observationMethod->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function addFieldEquipmentInstanceIdentifier(
        $entityIdentifier = null,
        $namespaceId = null,
        $universalId = null,
        $universalIdType = null
    ) {
        $equipmentInstanceIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->equipmentInstanceIdentifier[] = $equipmentInstanceIdentifier;
        $equipmentInstanceIdentifier->setEntityIdentifier($entityIdentifier);
        $equipmentInstanceIdentifier->setNamespaceId($namespaceId);
        $equipmentInstanceIdentifier->setUniversalId($universalId);
        $equipmentInstanceIdentifier->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimeOfTheAnalysis($time, $degreeOfPrecision = null)
    {
        $this->datetimeOfTheAnalysis = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->datetimeOfTheAnalysis->setTime($time);
        $this->datetimeOfTheAnalysis->setDegreeOfPrecision($degreeOfPrecision);
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
    public function setFieldPerformingOrganizationName(
        $organisationName = null,
        $organisationNameTypeCode = null,
        $idNumber = null,
        $checkDigit = null,
        $checkDigitScheme = null,
        $assigningAuthorityNamespaceId = null,
        $assigningAuthorityUniversalId = null,
        $assigningAuthorityUniversalIdType = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId = null,
        $assigningFacilityUniversalId = null,
        $assigningFacilityUniversalIdType = null,
        $nameRepresentationCode = null,
        $organisationIdentifier = null
    ) {
        $this->performingOrganizationName = $this
            ->dataTypeFactory
            ->create('XON', $this->characterEncoding)
        ;
        $this->performingOrganizationName->setOrganisationName($organisationName);
        $this->performingOrganizationName->setOrganisationNameTypeCode($organisationNameTypeCode);
        $this->performingOrganizationName->setIdNumber($idNumber);
        $this->performingOrganizationName->setCheckDigit($checkDigit);
        $this->performingOrganizationName->setCheckDigitScheme($checkDigitScheme);
        $this->performingOrganizationName->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->performingOrganizationName->setIdentifierTypeCode($identifierTypeCode);
        $this->performingOrganizationName->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $this->performingOrganizationName->setNameRepresentationCode($nameRepresentationCode);
        $this->performingOrganizationName->setOrganisationIdentifier($organisationIdentifier);
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
    public function setFieldPerformingOrganizationAddress(
        $streetAddressStreetOrMailingAddress = null,
        $streetAddressStreetName = null,
        $streetAddressDwellingNumber = null,
        $otherDesignation = null,
        $city = null,
        $stateOrProvince = null,
        $zipOrPostalCode = null,
        $country = null,
        $addressType = null,
        $otherGeographicDesignation = null,
        $countyParishCode = null,
        $censusTract = null,
        $addressRepresentationCode = null,
        $addressValidityRangeRangeStartDateTimeTime,
        $addressValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $addressValidityRangeRangeEndDateTimeTime,
        $addressValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null
    ) {
        $this->performingOrganizationAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->performingOrganizationAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $this->performingOrganizationAddress->setOtherDesignation($otherDesignation);
        $this->performingOrganizationAddress->setCity($city);
        $this->performingOrganizationAddress->setStateOrProvince($stateOrProvince);
        $this->performingOrganizationAddress->setZipOrPostalCode($zipOrPostalCode);
        $this->performingOrganizationAddress->setCountry($country);
        $this->performingOrganizationAddress->setAddressType($addressType);
        $this->performingOrganizationAddress->setOtherGeographicDesignation(
            $otherGeographicDesignation
        );
        $this->performingOrganizationAddress->setCountyParishCode($countyParishCode);
        $this->performingOrganizationAddress->setCensusTract($censusTract);
        $this->performingOrganizationAddress->setAddressRepresentationCode(
            $addressRepresentationCode
        );
        $this->performingOrganizationAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $this->performingOrganizationAddress->setEffectiveDate(
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );
        $this->performingOrganizationAddress->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
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
    public function setFieldPerformingOrganizationMedicalDirector(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId = null,
        $assigningAuthorityUniversalId = null,
        $assigningAuthorityUniversalIdType = null,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId = null,
        $assigningFacilityUniversalId = null,
        $assigningFacilityUniversalIdType = null,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $this->performingOrganizationMedicalDirector = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->performingOrganizationMedicalDirector->setIdNumber($idNumber);
        $this->performingOrganizationMedicalDirector->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $this->performingOrganizationMedicalDirector->setGivenName($givenName);
        $this->performingOrganizationMedicalDirector->setSecondNames($secondNames);
        $this->performingOrganizationMedicalDirector->setSuffix($suffix);
        $this->performingOrganizationMedicalDirector->setPrefix($prefix);
        $this->performingOrganizationMedicalDirector->setDegree($degree);
        $this->performingOrganizationMedicalDirector->setSourceTable($sourceTable);
        $this->performingOrganizationMedicalDirector->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->performingOrganizationMedicalDirector->setNameTypeCode($nameTypeCode);
        $this->performingOrganizationMedicalDirector->setIdentifierCheckDigit(
            $identifierCheckDigit
        );
        $this->performingOrganizationMedicalDirector->setCheckDigitScheme($checkDigitScheme);
        $this->performingOrganizationMedicalDirector->setIdentifierTypeCode($identifierTypeCode);
        $this->performingOrganizationMedicalDirector->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $this->performingOrganizationMedicalDirector->setNameRepresentationCode(
            $nameRepresentationCode
        );
        $this->performingOrganizationMedicalDirector->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $this->performingOrganizationMedicalDirector->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $this->performingOrganizationMedicalDirector->setNameAssemblyOrder($nameAssemblyOrder);
        $this->performingOrganizationMedicalDirector->setEffectiveDate(
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );
        $this->performingOrganizationMedicalDirector->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $this->performingOrganizationMedicalDirector->setProfessionalSuffix($professionalSuffix);
        $this->performingOrganizationMedicalDirector->setAssigningJurisdiction(
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
        $this->performingOrganizationMedicalDirector->setAssigningAgency(
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
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldValueType()
    {
        return $this->valueType;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldObservationIdentifier()
    {
        return $this->observationIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldObservationSubid()
    {
        return $this->observationSubid;
    }

    /**
     * @return \Hl7v2\DataType\DataTypeInterface[]
     */
    public function getFieldObservationValue()
    {
        return $this->observationValue;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldUnits()
    {
        return $this->units;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldReferencesRange()
    {
        return $this->referencesRange;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType[]
     */
    public function getFieldAbnormalFlags()
    {
        return $this->abnormalFlags;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldProbability()
    {
        return $this->probability;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType[]
     */
    public function getFieldNatureOfAbnormalTest()
    {
        return $this->natureOfAbnormalTest;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldObservationResultStatus()
    {
        return $this->observationResultStatus;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldEffectiveDateOfReferenceRangeValues()
    {
        return $this->effectiveDateOfReferenceRangeValues;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldUserDefinedAccessChecks()
    {
        return $this->userDefinedAccessChecks;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldDatetimeOfTheObservation()
    {
        return $this->datetimeOfTheObservation;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldProducersReference()
    {
        return $this->producersReference;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getFieldResponsibleObserver()
    {
        return $this->responsibleObserver;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getFieldObservationMethod()
    {
        return $this->observationMethod;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType[]
     */
    public function getFieldEquipmentInstanceIdentifier()
    {
        return $this->equipmentInstanceIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldDatetimeOfTheAnalysis()
    {
        return $this->datetimeOfTheAnalysis;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType
     */
    public function getFieldPerformingOrganizationName()
    {
        return $this->performingOrganizationName;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType
     */
    public function getFieldPerformingOrganizationAddress()
    {
        return $this->performingOrganizationAddress;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType
     */
    public function getFieldPerformingOrganizationMedicalDirector()
    {
        return $this->performingOrganizationMedicalDirector;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // OBX.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetId($codec->extractComponent($datagram));

        // OBX.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ValueType', 2, $datagram->getPositionalState());
        $this->setFieldValueType($codec->extractComponent($datagram));

        // OBX.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ObservationIdentifier', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldObservationIdentifier(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBX.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ObservationSubid', 20, $datagram->getPositionalState());
        $this->setFieldObservationSubid($codec->extractComponent($datagram));

        // OBX.5
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        if ('ED' === $this->getFieldValueType()->getValue()) {
            $sequence = [[1,1,1],1,1,1,1];
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
                $first = false;
            }
            foreach ($repetitions as $components) {
                list(
                    list(
                        $sourceApplicationNamespaceId,
                        $sourceApplicationUniversalId,
                        $sourceApplicationUniversalIdType,
                    ),
                    $typeOfData,
                    $dataSubtype,
                    $encoding,
                    $data,
                ) = $components;
                $this->addFieldObservationValueAsED(
                    $sourceApplicationNamespaceId,
                    $sourceApplicationUniversalId,
                    $sourceApplicationUniversalIdType,
                    $typeOfData,
                    $dataSubtype,
                    $encoding,
                    $data
                );
            }
        } elseif ('FT' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsFT($value);
            }
        } elseif ('NM' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $this->checkRepetitionLength('ObservationValue', 16, $datagram->getPositionalState());
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsNM($value);
            }
        } elseif ('ST' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $this->checkRepetitionLength('ObservationValue', 199, $datagram->getPositionalState());
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsST($value);
            }
        } elseif ('TS' === $this->getFieldValueType()->getValue()) {
            $sequence = [1,1];
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $this->checkRepetitionLength('ObservationValue', 26, $datagram->getPositionalState());
                $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
                $first = false;
            }
            foreach ($repetitions as $components) {
                list(
                    $time,
                    $degreeOfPrecision,
                ) = $components;
                $this->addFieldObservationValueAsTS(
                    $time,
                    $degreeOfPrecision
                );
            }
        } elseif ('TX' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsTX($value);
            }
        }

        // OBX.6
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Units', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldUnits(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBX.7
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ReferencesRange', 60, $datagram->getPositionalState());
        $this->setFieldReferencesRange($codec->extractComponent($datagram));

        // OBX.8
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AbnormalFlags', 5, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldAbnormalFlags($value);
        }

        // OBX.9
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Probability', 5, $datagram->getPositionalState());
        $this->setFieldProbability($codec->extractComponent($datagram));

        // OBX.10
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('NatureOfAbnormalTest', 2, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldNatureOfAbnormalTest($value);
        }

        // OBX.11
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ObservationResultStatus', 1, $datagram->getPositionalState());
        $this->setFieldObservationResultStatus($codec->extractComponent($datagram));

        // OBX.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EffectiveDateOfReferenceRangeValues', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEffectiveDateOfReferenceRangeValues(
            $time,
            $degreeOfPrecision
        );

        // OBX.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('UserDefinedAccessChecks', 20, $datagram->getPositionalState());
        $this->setFieldUserDefinedAccessChecks($codec->extractComponent($datagram));

        // OBX.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DatetimeOfTheObservation', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDatetimeOfTheObservation(
            $time,
            $degreeOfPrecision
        );

        // OBX.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ProducersReference', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldProducersReference(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBX.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ResponsibleObserver', 250, $datagram->getPositionalState());
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
            $this->addFieldResponsibleObserver(
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

        // OBX.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ObservationMethod', 250, $datagram->getPositionalState());
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
            $this->addFieldObservationMethod(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // OBX.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EquipmentInstanceIdentifier', 22, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType,
            ) = $components;
            $this->addFieldEquipmentInstanceIdentifier(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType
            );
        }

        // OBX.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DatetimeOfTheAnalysis', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDatetimeOfTheAnalysis(
            $time,
            $degreeOfPrecision
        );

        // OBX.20 (Skipped)
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }

        // OBX.21 (Skipped)
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }

        // OBX.22 (Skipped)
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }

        // OBX.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PerformingOrganizationName', 567, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,[1,1,1],1,[1,1,1],1,1];
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
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPerformingOrganizationName(
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

        // OBX.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PerformingOrganizationAddress', 631, $datagram->getPositionalState());
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
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
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPerformingOrganizationAddress(
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

        // OBX.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PerformingOrganizationMedicalDirector', 3002, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
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
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPerformingOrganizationMedicalDirector(
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
}
