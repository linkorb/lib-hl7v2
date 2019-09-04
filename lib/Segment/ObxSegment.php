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
     * @var SiDataType
     */
    private $setId = null;
    /**
     * @var IdDataType
     */
    private $valueType = null;
    /**
     * @var CeDataType
     */
    private $observationIdentifier;
    /**
     * @var StDataType
     */
    private $observationSubid = null;
    /**
     * @var DataTypeInterface[]
     */
    private $observationValue = [];
    /**
     * @var CeDataType
     */
    private $units = null;
    /**
     * @var StDataType
     */
    private $referencesRange = null;
    /**
     * @var IsDataType[]
     */
    private $abnormalFlags = [];
    /**
     * @var NmDataType
     */
    private $probability = null;
    /**
     * @var IdDataType[]
     */
    private $natureOfAbnormalTest = [];
    /**
     * @var IdDataType
     */
    private $observationResultStatus;
    /**
     * @var TsDataType
     */
    private $effectiveDateOfReferenceRangeValues = null;
    /**
     * @var StDataType
     */
    private $userDefinedAccessChecks = null;
    /**
     * @var TsDataType
     */
    private $datetimeOfTheObservation = null;
    /**
     * @var CeDataType
     */
    private $producersReference = null;
    /**
     * @var XcnDataType[]
     */
    private $responsibleObserver = [];
    /**
     * @var CeDataType[]
     */
    private $observationMethod = [];
    /**
     * @var EiDataType[]
     */
    private $equipmentInstanceIdentifier = [];
    /**
     * @var TsDataType
     */
    private $datetimeOfTheAnalysis = null;
    private $unnamed1;
    private $unnamed2;
    private $unnamed3;
    /**
     * @var XonDataType
     */
    private $performingOrganizationName = null;
    /**
     * @var XadDataType
     */
    private $performingOrganizationAddress = null;
    /**
     * @var XcnDataType
     */
    private $performingOrganizationMedicalDirector = null;

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
     * @param string $value
     */
    public function setFieldValueType(string $value)
    {
        $this->valueType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
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
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->observationIdentifier = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
    public function setFieldObservationSubid(string $value)
    {
        $this->observationSubid = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
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
        string $sourceApplicationNamespaceId = null,
        string $sourceApplicationUniversalId = null,
        string $sourceApplicationUniversalIdType = null,
        string $typeOfData = null,
        string $dataSubtype = null,
        string $encoding = null,
        string $data = null
    ) {
        $observationValue = $this
            ->dataTypeFactory
            ->create('ED', $this->encodingParameters)
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
    public function addFieldObservationValueAsFT(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('FT', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsNM(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsST(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function addFieldObservationValueAsTS(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $observationValue = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->observationValue[] = $observationValue;
        $observationValue->setTime($time);
        $observationValue->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsTX(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
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
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->units = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
    public function setFieldReferencesRange(string $value)
    {
        $this->referencesRange = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->referencesRange->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldAbnormalFlags(string $value)
    {
        $abnormalFlags = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $abnormalFlags->setValue($value);
        $this->abnormalFlags[] = $abnormalFlags;
    }

    /**
     * @param string $value
     */
    public function setFieldProbability(string $value)
    {
        $this->probability = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->probability->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldNatureOfAbnormalTest(string $value)
    {
        $natureOfAbnormalTest = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $natureOfAbnormalTest->setValue($value);
        $this->natureOfAbnormalTest[] = $natureOfAbnormalTest;
    }

    /**
     * @param string $value
     */
    public function setFieldObservationResultStatus(string $value)
    {
        $this->observationResultStatus = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->observationResultStatus->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldEffectiveDateOfReferenceRangeValues(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->effectiveDateOfReferenceRangeValues = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->effectiveDateOfReferenceRangeValues->setTime($time);
        $this->effectiveDateOfReferenceRangeValues->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldUserDefinedAccessChecks(string $value)
    {
        $this->userDefinedAccessChecks = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->userDefinedAccessChecks->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimeOfTheObservation(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->datetimeOfTheObservation = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
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
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->producersReference = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
        $responsibleObserver = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
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
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $observationMethod = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
        string $entityIdentifier = null,
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $equipmentInstanceIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters)
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
    public function setFieldDatetimeOfTheAnalysis(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->datetimeOfTheAnalysis = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
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
        $this->performingOrganizationName = $this
            ->dataTypeFactory
            ->create('XON', $this->encodingParameters)
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
        $this->performingOrganizationAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->encodingParameters)
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
        $this->performingOrganizationMedicalDirector = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
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

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'OBX';
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

        if (!$this->getFieldValueType() || !$this->getFieldValueType()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldValueType()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldObservationIdentifier()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldObservationIdentifier();
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

        if (!$this->getFieldObservationSubid() || !$this->getFieldObservationSubid()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldObservationSubid()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldObservationValue())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldObservationValue() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (!$this->getFieldUnits()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldUnits();
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

        if (!$this->getFieldReferencesRange() || !$this->getFieldReferencesRange()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldReferencesRange()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldAbnormalFlags())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAbnormalFlags() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (!$this->getFieldProbability() || !$this->getFieldProbability()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldProbability()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldNatureOfAbnormalTest())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldNatureOfAbnormalTest() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (!$this->getFieldObservationResultStatus() || !$this->getFieldObservationResultStatus()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldObservationResultStatus()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldEffectiveDateOfReferenceRangeValues()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldEffectiveDateOfReferenceRangeValues();
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

        if (!$this->getFieldUserDefinedAccessChecks() || !$this->getFieldUserDefinedAccessChecks()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldUserDefinedAccessChecks()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDatetimeOfTheObservation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDatetimeOfTheObservation();
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

        if (!$this->getFieldProducersReference()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldProducersReference();
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

        if (empty($this->getFieldResponsibleObserver())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldResponsibleObserver() as $repetition) {
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

        if (empty($this->getFieldObservationMethod())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldObservationMethod() as $repetition) {
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

        if (empty($this->getFieldEquipmentInstanceIdentifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldEquipmentInstanceIdentifier() as $repetition) {
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

        if (!$this->getFieldDatetimeOfTheAnalysis()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDatetimeOfTheAnalysis();
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

        ++$emptyFieldsSinceLastField; // skip OBX.20

        ++$emptyFieldsSinceLastField; // skip OBX.21

        ++$emptyFieldsSinceLastField; // skip OBX.22

        if (!$this->getFieldPerformingOrganizationName()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPerformingOrganizationName();
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

        if (!$this->getFieldPerformingOrganizationAddress()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPerformingOrganizationAddress();
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

        if (!$this->getFieldPerformingOrganizationMedicalDirector()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPerformingOrganizationMedicalDirector();
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
