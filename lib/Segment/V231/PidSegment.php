<?php

namespace Hl7v2\Segment\V231;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Patient Identification (PID).
 */
class PidSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V231\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType
     */
    private $patientId = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType[]
     */
    private $patientIdentifierList;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType[]
     */
    private $altPatientId = [];
    /**
     * @var \Hl7v2\DataType\V231\XpnDataType[]
     */
    private $patientName;
    /**
     * @var \Hl7v2\DataType\V231\XpnDataType[]
     */
    private $mothersMaidenName = [];
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $datetimeOfBirth = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $sex = null;
    /**
     * @var \Hl7v2\DataType\V231\XpnDataType[]
     */
    private $patientAlias = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $race = [];
    /**
     * @var \Hl7v2\DataType\V231\XadDataType[]
     */
    private $patientAddress = [];
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $countyCode = null;
    /**
     * @var \Hl7v2\DataType\V231\XtnDataType[]
     */
    private $phoneNumberHome = [];
    /**
     * @var \Hl7v2\DataType\V231\XtnDataType[]
     */
    private $phoneNumberBusiness = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $primaryLanguage = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $maritalStatus = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $religion = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType
     */
    private $patientAccountNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $ssnNumberPatient = null;
    /**
     * @var \Hl7v2\DataType\V231\DlnDataType
     */
    private $driversLicenseNumberPatient = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType[]
     */
    private $mothersIdentifier = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $ethnicGroup = [];
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $birthPlace = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $multipleBirthIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $birthOrder = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $citizenship = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $veteransMilitaryStatus = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $nationality = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $patientDeathDateAndTime = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $patientDeathIndicator = null;

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
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setFieldPatientId(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $this->patientId = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->patientId->setId($id);
        $this->patientId->setCheckDigit($checkDigit);
        $this->patientId->setCheckDigitScheme($checkDigitScheme);
        $this->patientId->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->patientId->setIdentifierTypeCode($identifierTypeCode);
        $this->patientId->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function addFieldPatientIdentifierList(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $patientIdentifierList = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->patientIdentifierList[] = $patientIdentifierList;
        $patientIdentifierList->setId($id);
        $patientIdentifierList->setCheckDigit($checkDigit);
        $patientIdentifierList->setCheckDigitScheme($checkDigitScheme);
        $patientIdentifierList->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $patientIdentifierList->setIdentifierTypeCode($identifierTypeCode);
        $patientIdentifierList->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function addFieldAltPatientId(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $altPatientId = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->altPatientId[] = $altPatientId;
        $altPatientId->setId($id);
        $altPatientId->setCheckDigit($checkDigit);
        $altPatientId->setCheckDigitScheme($checkDigitScheme);
        $altPatientId->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $altPatientId->setIdentifierTypeCode($identifierTypeCode);
        $altPatientId->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $nameTypeCode
     * @param string $nameRepresentationCode
     */
    public function addFieldPatientName(
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $nameTypeCode = null,
        string $nameRepresentationCode = null
    ) {
        $patientName = $this
            ->dataTypeFactory
            ->create('XPN', $this->encodingParameters)
        ;
        $this->patientName[] = $patientName;
        $patientName->setFamilyName($familyName);
        $patientName->setGivenName($givenName);
        $patientName->setMiddleInitialOrName($middleInitialOrName);
        $patientName->setSuffix($suffix);
        $patientName->setPrefix($prefix);
        $patientName->setDegree($degree);
        $patientName->setNameTypeCode($nameTypeCode);
        $patientName->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $nameTypeCode
     * @param string $nameRepresentationCode
     */
    public function addFieldMothersMaidenName(
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $nameTypeCode = null,
        string $nameRepresentationCode = null
    ) {
        $mothersMaidenName = $this
            ->dataTypeFactory
            ->create('XPN', $this->encodingParameters)
        ;
        $this->mothersMaidenName[] = $mothersMaidenName;
        $mothersMaidenName->setFamilyName($familyName);
        $mothersMaidenName->setGivenName($givenName);
        $mothersMaidenName->setMiddleInitialOrName($middleInitialOrName);
        $mothersMaidenName->setSuffix($suffix);
        $mothersMaidenName->setPrefix($prefix);
        $mothersMaidenName->setDegree($degree);
        $mothersMaidenName->setNameTypeCode($nameTypeCode);
        $mothersMaidenName->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimeOfBirth(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->datetimeOfBirth = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->datetimeOfBirth->setTime($time);
        $this->datetimeOfBirth->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldSex(string $value)
    {
        $this->sex = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->sex->setValue($value);
    }

    /**
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $nameTypeCode
     * @param string $nameRepresentationCode
     */
    public function addFieldPatientAlias(
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $nameTypeCode = null,
        string $nameRepresentationCode = null
    ) {
        $patientAlias = $this
            ->dataTypeFactory
            ->create('XPN', $this->encodingParameters)
        ;
        $this->patientAlias[] = $patientAlias;
        $patientAlias->setFamilyName($familyName);
        $patientAlias->setGivenName($givenName);
        $patientAlias->setMiddleInitialOrName($middleInitialOrName);
        $patientAlias->setSuffix($suffix);
        $patientAlias->setPrefix($prefix);
        $patientAlias->setDegree($degree);
        $patientAlias->setNameTypeCode($nameTypeCode);
        $patientAlias->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldRace(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $race = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->race[] = $race;
        $race->setIdentifier($identifier);
        $race->setText($text);
        $race->setNameOfCodingSystem($nameOfCodingSystem);
        $race->setAltIdentifier($altIdentifier);
        $race->setAltText($altText);
        $race->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldPatientAddress(
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
        $patientAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->encodingParameters)
        ;
        $this->patientAddress[] = $patientAddress;
        $patientAddress->setStreetAddress($streetAddress);
        $patientAddress->setOtherDesignation($otherDesignation);
        $patientAddress->setCity($city);
        $patientAddress->setStateOrProvince($stateOrProvince);
        $patientAddress->setZipOrPostalCode($zipOrPostalCode);
        $patientAddress->setCountry($country);
        $patientAddress->setAddressType($addressType);
        $patientAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $patientAddress->setCountyParishCode($countyParishCode);
        $patientAddress->setCensusTract($censusTract);
        $patientAddress->setAddressRepresentationCode($addressRepresentationCode);
    }

    /**
     * @param string $value
     */
    public function setFieldCountyCode(string $value)
    {
        $this->countyCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->countyCode->setValue($value);
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
    public function addFieldPhoneNumberHome(
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
        $phoneNumberHome = $this
            ->dataTypeFactory
            ->create('XTN', $this->encodingParameters)
        ;
        $this->phoneNumberHome[] = $phoneNumberHome;
        $phoneNumberHome->setTelephoneNumber($telephoneNumber);
        $phoneNumberHome->setTelecommunicationUseCode($telecommunicationUseCode);
        $phoneNumberHome->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $phoneNumberHome->setEmailAddress($emailAddress);
        $phoneNumberHome->setCountryCode($countryCode);
        $phoneNumberHome->setAreaCityCode($areaCityCode);
        $phoneNumberHome->setPhoneNumber($phoneNumber);
        $phoneNumberHome->setExtension($extension);
        $phoneNumberHome->setAnyText($anyText);
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
    public function addFieldPhoneNumberBusiness(
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
        $phoneNumberBusiness = $this
            ->dataTypeFactory
            ->create('XTN', $this->encodingParameters)
        ;
        $this->phoneNumberBusiness[] = $phoneNumberBusiness;
        $phoneNumberBusiness->setTelephoneNumber($telephoneNumber);
        $phoneNumberBusiness->setTelecommunicationUseCode($telecommunicationUseCode);
        $phoneNumberBusiness->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $phoneNumberBusiness->setEmailAddress($emailAddress);
        $phoneNumberBusiness->setCountryCode($countryCode);
        $phoneNumberBusiness->setAreaCityCode($areaCityCode);
        $phoneNumberBusiness->setPhoneNumber($phoneNumber);
        $phoneNumberBusiness->setExtension($extension);
        $phoneNumberBusiness->setAnyText($anyText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldPrimaryLanguage(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->primaryLanguage = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->primaryLanguage->setIdentifier($identifier);
        $this->primaryLanguage->setText($text);
        $this->primaryLanguage->setNameOfCodingSystem($nameOfCodingSystem);
        $this->primaryLanguage->setAltIdentifier($altIdentifier);
        $this->primaryLanguage->setAltText($altText);
        $this->primaryLanguage->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldMaritalStatus(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->maritalStatus = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->maritalStatus->setIdentifier($identifier);
        $this->maritalStatus->setText($text);
        $this->maritalStatus->setNameOfCodingSystem($nameOfCodingSystem);
        $this->maritalStatus->setAltIdentifier($altIdentifier);
        $this->maritalStatus->setAltText($altText);
        $this->maritalStatus->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldReligion(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->religion = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->religion->setIdentifier($identifier);
        $this->religion->setText($text);
        $this->religion->setNameOfCodingSystem($nameOfCodingSystem);
        $this->religion->setAltIdentifier($altIdentifier);
        $this->religion->setAltText($altText);
        $this->religion->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setFieldPatientAccountNumber(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $this->patientAccountNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->patientAccountNumber->setId($id);
        $this->patientAccountNumber->setCheckDigit($checkDigit);
        $this->patientAccountNumber->setCheckDigitScheme($checkDigitScheme);
        $this->patientAccountNumber->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->patientAccountNumber->setIdentifierTypeCode($identifierTypeCode);
        $this->patientAccountNumber->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $value
     */
    public function setFieldSsnNumberPatient(string $value)
    {
        $this->ssnNumberPatient = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->ssnNumberPatient->setValue($value);
    }

    /**
     * @param string $licenseNumber
     * @param string $issuingStateProvinceCountry
     * @param string $expirationDate
     */
    public function setFieldDriversLicenseNumberPatient(
        string $licenseNumber = null,
        string $issuingStateProvinceCountry = null,
        string $expirationDate = null
    ) {
        $this->driversLicenseNumberPatient = $this
            ->dataTypeFactory
            ->create('DLN', $this->encodingParameters)
        ;
        $this->driversLicenseNumberPatient->setLicenseNumber($licenseNumber);
        $this->driversLicenseNumberPatient->setIssuingStateProvinceCountry(
            $issuingStateProvinceCountry
        );
        $this->driversLicenseNumberPatient->setExpirationDate($expirationDate);
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function addFieldMothersIdentifier(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $mothersIdentifier = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->mothersIdentifier[] = $mothersIdentifier;
        $mothersIdentifier->setId($id);
        $mothersIdentifier->setCheckDigit($checkDigit);
        $mothersIdentifier->setCheckDigitScheme($checkDigitScheme);
        $mothersIdentifier->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $mothersIdentifier->setIdentifierTypeCode($identifierTypeCode);
        $mothersIdentifier->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
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
    public function addFieldEthnicGroup(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $ethnicGroup = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->ethnicGroup[] = $ethnicGroup;
        $ethnicGroup->setIdentifier($identifier);
        $ethnicGroup->setText($text);
        $ethnicGroup->setNameOfCodingSystem($nameOfCodingSystem);
        $ethnicGroup->setAltIdentifier($altIdentifier);
        $ethnicGroup->setAltText($altText);
        $ethnicGroup->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldBirthPlace(string $value)
    {
        $this->birthPlace = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->birthPlace->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldMultipleBirthIndicator(string $value)
    {
        $this->multipleBirthIndicator = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->multipleBirthIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBirthOrder(string $value)
    {
        $this->birthOrder = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->birthOrder->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldCitizenship(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $citizenship = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->citizenship[] = $citizenship;
        $citizenship->setIdentifier($identifier);
        $citizenship->setText($text);
        $citizenship->setNameOfCodingSystem($nameOfCodingSystem);
        $citizenship->setAltIdentifier($altIdentifier);
        $citizenship->setAltText($altText);
        $citizenship->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldVeteransMilitaryStatus(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->veteransMilitaryStatus = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->veteransMilitaryStatus->setIdentifier($identifier);
        $this->veteransMilitaryStatus->setText($text);
        $this->veteransMilitaryStatus->setNameOfCodingSystem($nameOfCodingSystem);
        $this->veteransMilitaryStatus->setAltIdentifier($altIdentifier);
        $this->veteransMilitaryStatus->setAltText($altText);
        $this->veteransMilitaryStatus->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldNationality(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->nationality = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->nationality->setIdentifier($identifier);
        $this->nationality->setText($text);
        $this->nationality->setNameOfCodingSystem($nameOfCodingSystem);
        $this->nationality->setAltIdentifier($altIdentifier);
        $this->nationality->setAltText($altText);
        $this->nationality->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldPatientDeathDateAndTime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->patientDeathDateAndTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->patientDeathDateAndTime->setTime($time);
        $this->patientDeathDateAndTime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldPatientDeathIndicator(string $value)
    {
        $this->patientDeathIndicator = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->patientDeathIndicator->setValue($value);
    }

    /**
     * @return \Hl7v2\DataType\V231\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType
     */
    public function getFieldPatientId()
    {
        return $this->patientId;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType[]
     */
    public function getFieldPatientIdentifierList()
    {
        return $this->patientIdentifierList;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType[]
     */
    public function getFieldAltPatientId()
    {
        return $this->altPatientId;
    }

    /**
     * @return \Hl7v2\DataType\V231\XpnDataType[]
     */
    public function getFieldPatientName()
    {
        return $this->patientName;
    }

    /**
     * @return \Hl7v2\DataType\V231\XpnDataType[]
     */
    public function getFieldMothersMaidenName()
    {
        return $this->mothersMaidenName;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldDatetimeOfBirth()
    {
        return $this->datetimeOfBirth;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldSex()
    {
        return $this->sex;
    }

    /**
     * @return \Hl7v2\DataType\V231\XpnDataType[]
     */
    public function getFieldPatientAlias()
    {
        return $this->patientAlias;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldRace()
    {
        return $this->race;
    }

    /**
     * @return \Hl7v2\DataType\V231\XadDataType[]
     */
    public function getFieldPatientAddress()
    {
        return $this->patientAddress;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldCountyCode()
    {
        return $this->countyCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\XtnDataType[]
     */
    public function getFieldPhoneNumberHome()
    {
        return $this->phoneNumberHome;
    }

    /**
     * @return \Hl7v2\DataType\V231\XtnDataType[]
     */
    public function getFieldPhoneNumberBusiness()
    {
        return $this->phoneNumberBusiness;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldPrimaryLanguage()
    {
        return $this->primaryLanguage;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldReligion()
    {
        return $this->religion;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType
     */
    public function getFieldPatientAccountNumber()
    {
        return $this->patientAccountNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldSsnNumberPatient()
    {
        return $this->ssnNumberPatient;
    }

    /**
     * @return \Hl7v2\DataType\V231\DlnDataType
     */
    public function getFieldDriversLicenseNumberPatient()
    {
        return $this->driversLicenseNumberPatient;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType[]
     */
    public function getFieldMothersIdentifier()
    {
        return $this->mothersIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldEthnicGroup()
    {
        return $this->ethnicGroup;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldMultipleBirthIndicator()
    {
        return $this->multipleBirthIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldBirthOrder()
    {
        return $this->birthOrder;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldCitizenship()
    {
        return $this->citizenship;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldVeteransMilitaryStatus()
    {
        return $this->veteransMilitaryStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldNationality()
    {
        return $this->nationality;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldPatientDeathDateAndTime()
    {
        return $this->patientDeathDateAndTime;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldPatientDeathIndicator()
    {
        return $this->patientDeathIndicator;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // PID.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetId($codec->extractComponent($datagram));

        // PID.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('PatientId', 20, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        list(
            $id,
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
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPatientId(
            $id,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );

        // PID.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientIdentifierList', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $id,
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
            ) = $components;
            $this->addFieldPatientIdentifierList(
                $id,
                $checkDigit,
                $checkDigitScheme,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType
            );
        }

        // PID.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AltPatientId', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $id,
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
            ) = $components;
            $this->addFieldAltPatientId(
                $id,
                $checkDigit,
                $checkDigitScheme,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType
            );
        }

        // PID.5
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientName', 48, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $nameTypeCode,
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldPatientName(
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $nameTypeCode,
                $nameRepresentationCode
            );
        }

        // PID.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('MothersMaidenName', 48, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $nameTypeCode,
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldMothersMaidenName(
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $nameTypeCode,
                $nameRepresentationCode
            );
        }

        // PID.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DatetimeOfBirth', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDatetimeOfBirth(
            $time,
            $degreeOfPrecision
        );

        // PID.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Sex', 1, $datagram->getPositionalState());
        $this->setFieldSex($codec->extractComponent($datagram));

        // PID.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientAlias', 48, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $nameTypeCode,
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldPatientAlias(
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $nameTypeCode,
                $nameRepresentationCode
            );
        }

        // PID.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Race', 80, $datagram->getPositionalState());
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
            $this->addFieldRace(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientAddress', 106, $datagram->getPositionalState());
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
            $this->addFieldPatientAddress(
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

        // PID.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CountyCode', 4, $datagram->getPositionalState());
        $this->setFieldCountyCode($codec->extractComponent($datagram));

        // PID.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PhoneNumberHome', 40, $datagram->getPositionalState());
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
            $this->addFieldPhoneNumberHome(
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

        // PID.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PhoneNumberBusiness', 40, $datagram->getPositionalState());
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
            $this->addFieldPhoneNumberBusiness(
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

        // PID.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PrimaryLanguage', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPrimaryLanguage(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('MaritalStatus', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldMaritalStatus(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Religion', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldReligion(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PatientAccountNumber', 20, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        list(
            $id,
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
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPatientAccountNumber(
            $id,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );

        // PID.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SsnNumberPatient', 16, $datagram->getPositionalState());
        $this->setFieldSsnNumberPatient($codec->extractComponent($datagram));

        // PID.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DriversLicenseNumberPatient', 25, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $licenseNumber,
            $issuingStateProvinceCountry,
            $expirationDate,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDriversLicenseNumberPatient(
            $licenseNumber,
            $issuingStateProvinceCountry,
            $expirationDate
        );

        // PID.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('MothersIdentifier', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $id,
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
            ) = $components;
            $this->addFieldMothersIdentifier(
                $id,
                $checkDigit,
                $checkDigitScheme,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType
            );
        }

        // PID.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EthnicGroup', 80, $datagram->getPositionalState());
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
            $this->addFieldEthnicGroup(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BirthPlace', 60, $datagram->getPositionalState());
        $this->setFieldBirthPlace($codec->extractComponent($datagram));

        // PID.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('MultipleBirthIndicator', 1, $datagram->getPositionalState());
        $this->setFieldMultipleBirthIndicator($codec->extractComponent($datagram));

        // PID.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BirthOrder', 2, $datagram->getPositionalState());
        $this->setFieldBirthOrder($codec->extractComponent($datagram));

        // PID.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Citizenship', 80, $datagram->getPositionalState());
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
            $this->addFieldCitizenship(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VeteransMilitaryStatus', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVeteransMilitaryStatus(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Nationality', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldNationality(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PatientDeathDateAndTime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPatientDeathDateAndTime(
            $time,
            $degreeOfPrecision
        );

        // PID.30
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PatientDeathIndicator', 1, $datagram->getPositionalState());
        $this->setFieldPatientDeathIndicator($codec->extractComponent($datagram));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'PID';
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

        if (!$this->getFieldPatientId()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPatientId();
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

        if (empty($this->getFieldPatientIdentifierList())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPatientIdentifierList() as $repetition) {
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

        if (empty($this->getFieldAltPatientId())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAltPatientId() as $repetition) {
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

        if (empty($this->getFieldPatientName())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPatientName() as $repetition) {
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

        if (empty($this->getFieldMothersMaidenName())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldMothersMaidenName() as $repetition) {
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

        if (!$this->getFieldDatetimeOfBirth()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDatetimeOfBirth();
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

        if (!$this->getFieldSex() || !$this->getFieldSex()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSex()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldPatientAlias())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPatientAlias() as $repetition) {
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

        if (empty($this->getFieldRace())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldRace() as $repetition) {
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

        if (empty($this->getFieldPatientAddress())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPatientAddress() as $repetition) {
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

        if (!$this->getFieldCountyCode() || !$this->getFieldCountyCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldCountyCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldPhoneNumberHome())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPhoneNumberHome() as $repetition) {
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

        if (empty($this->getFieldPhoneNumberBusiness())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldPhoneNumberBusiness() as $repetition) {
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

        if (!$this->getFieldPrimaryLanguage()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPrimaryLanguage();
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

        if (!$this->getFieldMaritalStatus()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldMaritalStatus();
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

        if (!$this->getFieldReligion()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldReligion();
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

        if (!$this->getFieldPatientAccountNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPatientAccountNumber();
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

        if (!$this->getFieldSsnNumberPatient() || !$this->getFieldSsnNumberPatient()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSsnNumberPatient()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDriversLicenseNumberPatient()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDriversLicenseNumberPatient();
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

        if (empty($this->getFieldMothersIdentifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldMothersIdentifier() as $repetition) {
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

        if (empty($this->getFieldEthnicGroup())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldEthnicGroup() as $repetition) {
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

        if (!$this->getFieldBirthPlace() || !$this->getFieldBirthPlace()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldBirthPlace()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldMultipleBirthIndicator() || !$this->getFieldMultipleBirthIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldMultipleBirthIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldBirthOrder() || !$this->getFieldBirthOrder()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldBirthOrder()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldCitizenship())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCitizenship() as $repetition) {
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

        if (!$this->getFieldVeteransMilitaryStatus()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldVeteransMilitaryStatus();
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

        if (!$this->getFieldNationality()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldNationality();
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

        if (!$this->getFieldPatientDeathDateAndTime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPatientDeathDateAndTime();
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

        if (!$this->getFieldPatientDeathIndicator() || !$this->getFieldPatientDeathIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPatientDeathIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        return $s;
    }
}
