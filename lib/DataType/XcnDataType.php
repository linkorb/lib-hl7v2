<?php

namespace Hl7v2\DataType;

/**
 * Extended Composite ID Number and Name for Persons (XCN).
 */
class XcnDataType extends ComponentDataType
{
    const MAX_LEN = 3002;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $idNumber;
    /**
     * @var \Hl7v2\DataType\FnDataType
     */
    private $familyName;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $givenName;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $secondNames;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $suffix;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $prefix;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $degree;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $sourceTable;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    private $assigningAuthority;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $nameTypeCode;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $identifierCheckDigit;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $checkDigitScheme;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $identifierTypeCode;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    private $assigningFacility;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $nameRepresentationCode;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $nameContext;
    /**
     * @var \Hl7v2\DataType\DrDataType
     */
    private $nameValidityRange;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $nameAssemblyOrder;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $effectiveDate;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $expirationDate;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $professionalSuffix;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $assigningJurisdiction;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $assigningAgency;

    /**
     * @param string $idNumber
     */
    public function setIdNumber($idNumber = null)
    {
        $this->idNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->idNumber->setValue($idNumber);
    }

    /**
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     */
    public function setFamilyName(
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null
    ) {
        $this->familyName = $this
            ->dataTypeFactory
            ->create('FN', $this->encodingParameters)
        ;
        $this->familyName->setSurname($familyNameSurname);
        $this->familyName->setOwnSurnamePrefix($familyNameOwnSurnamePrefix);
        $this->familyName->setOwnSurname($familyNameOwnSurname);
        $this->familyName->setSurnamePrefixFromPartner($familyNameSurnamePrefixFromPartner);
        $this->familyName->setSurnameFromPartner($familyNameSurnameFromPartner);
    }

    /**
     * @param string $givenName
     */
    public function setGivenName($givenName = null)
    {
        $this->givenName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->givenName->setValue($givenName);
    }

    /**
     * @param string $secondNames
     */
    public function setSecondNames($secondNames = null)
    {
        $this->secondNames = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->secondNames->setValue($secondNames);
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix = null)
    {
        $this->suffix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->suffix->setValue($suffix);
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix = null)
    {
        $this->prefix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->prefix->setValue($prefix);
    }

    /**
     * @param string $degree
     */
    public function setDegree($degree = null)
    {
        $this->degree = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->degree->setValue($degree);
    }

    /**
     * @param string $sourceTable
     */
    public function setSourceTable($sourceTable = null)
    {
        $this->sourceTable = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->sourceTable->setValue($sourceTable);
    }

    /**
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     */
    public function setAssigningAuthority(
        $assigningAuthorityNamespaceId = null,
        $assigningAuthorityUniversalId = null,
        $assigningAuthorityUniversalIdType = null
    ) {
        $this->assigningAuthority = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->assigningAuthority->setNamespaceId($assigningAuthorityNamespaceId);
        $this->assigningAuthority->setUniversalId($assigningAuthorityUniversalId);
        $this->assigningAuthority->setUniversalIdType($assigningAuthorityUniversalIdType);
    }

    /**
     * @param string $nameTypeCode
     */
    public function setNameTypeCode($nameTypeCode = null)
    {
        $this->nameTypeCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameTypeCode->setValue($nameTypeCode);
    }

    /**
     * @param string $identifierCheckDigit
     */
    public function setIdentifierCheckDigit($identifierCheckDigit = null)
    {
        $this->identifierCheckDigit = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->identifierCheckDigit->setValue($identifierCheckDigit);
    }

    /**
     * @param string $checkDigitScheme
     */
    public function setCheckDigitScheme($checkDigitScheme = null)
    {
        $this->checkDigitScheme = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->checkDigitScheme->setValue($checkDigitScheme);
    }

    /**
     * @param string $identifierTypeCode
     */
    public function setIdentifierTypeCode($identifierTypeCode = null)
    {
        $this->identifierTypeCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->identifierTypeCode->setValue($identifierTypeCode);
    }

    /**
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setAssigningFacility(
        $assigningFacilityNamespaceId = null,
        $assigningFacilityUniversalId = null,
        $assigningFacilityUniversalIdType = null
    ) {
        $this->assigningFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->assigningFacility->setNamespaceId($assigningFacilityNamespaceId);
        $this->assigningFacility->setUniversalId($assigningFacilityUniversalId);
        $this->assigningFacility->setUniversalIdType($assigningFacilityUniversalIdType);
    }

    /**
     * @param string $nameRepresentationCode
     */
    public function setNameRepresentationCode($nameRepresentationCode = null)
    {
        $this->nameRepresentationCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameRepresentationCode->setValue($nameRepresentationCode);
    }

    /**
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     */
    public function setNameContext(
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null
    ) {
        $this->nameContext = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->nameContext->setIdentifier($nameContextIdentifier);
        $this->nameContext->setText($nameContextText);
        $this->nameContext->setNameOfCodingSystem($nameContextNameOfCodingSystem);
        $this->nameContext->setAltIdentifier($nameContextAltIdentifier);
        $this->nameContext->setAltText($nameContextAltText);
        $this->nameContext->setNameOfAltCodingSystem($nameContextNameOfAltCodingSystem);
    }

    /**
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     */
    public function setNameValidityRange(
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null
    ) {
        $this->nameValidityRange = $this
            ->dataTypeFactory
            ->create('DR', $this->encodingParameters)
        ;
        $this->nameValidityRange->setRangeStartDateTime(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
        );
        $this->nameValidityRange->setRangeEndDateTime(
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
    }

    /**
     * @param string $nameAssemblyOrder
     */
    public function setNameAssemblyOrder($nameAssemblyOrder = null)
    {
        $this->nameAssemblyOrder = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameAssemblyOrder->setValue($nameAssemblyOrder);
    }

    /**
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision = null)
    {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->effectiveDate->setTime($effectiveDateTime);
        $this->effectiveDate->setDegreeOfPrecision($effectiveDateDegreeOfPrecision);
    }

    /**
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision = null)
    {
        $this->expirationDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->expirationDate->setTime($expirationDateTime);
        $this->expirationDate->setDegreeOfPrecision($expirationDateDegreeOfPrecision);
    }

    /**
     * @param string $professionalSuffix
     */
    public function setProfessionalSuffix($professionalSuffix = null)
    {
        $this->professionalSuffix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->professionalSuffix->setValue($professionalSuffix);
    }

    /**
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     */
    public function setAssigningJurisdiction(
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null
    ) {
        $this->assigningJurisdiction = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->assigningJurisdiction->setIdentifier($assigningJurisdictionIdentifier);
        $this->assigningJurisdiction->setText($assigningJurisdictionText);
        $this->assigningJurisdiction->setNameOfCodingSystem(
            $assigningJurisdictionNameOfCodingSystem
        );
        $this->assigningJurisdiction->setAltIdentifier($assigningJurisdictionAltIdentifier);
        $this->assigningJurisdiction->setAltText($assigningJurisdictionAltText);
        $this->assigningJurisdiction->setNameOfAltCodingSystem(
            $assigningJurisdictionNameOfAltCodingSystem
        );
        $this->assigningJurisdiction->setCodingSystemVersionId(
            $assigningJurisdictionCodingSystemVersionId
        );
        $this->assigningJurisdiction->setAltCodingSystemVersionId(
            $assigningJurisdictionAltCodingSystemVersionId
        );
        $this->assigningJurisdiction->setOriginalText($assigningJurisdictionOriginalText);
    }

    /**
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
    public function setAssigningAgency(
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
        $this->assigningAgency = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->assigningAgency->setIdentifier($assigningAgencyIdentifier);
        $this->assigningAgency->setText($assigningAgencyText);
        $this->assigningAgency->setNameOfCodingSystem($assigningAgencyNameOfCodingSystem);
        $this->assigningAgency->setAltIdentifier($assigningAgencyAltIdentifier);
        $this->assigningAgency->setAltText($assigningAgencyAltText);
        $this->assigningAgency->setNameOfAltCodingSystem($assigningAgencyNameOfAltCodingSystem);
        $this->assigningAgency->setCodingSystemVersionId($assigningAgencyCodingSystemVersionId);
        $this->assigningAgency->setAltCodingSystemVersionId(
            $assigningAgencyAltCodingSystemVersionId
        );
        $this->assigningAgency->setOriginalText($assigningAgencyOriginalText);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return \Hl7v2\DataType\FnDataType
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSecondNames()
    {
        return $this->secondNames;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getSourceTable()
    {
        return $this->sourceTable;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getAssigningAuthority()
    {
        return $this->assigningAuthority;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameTypeCode()
    {
        return $this->nameTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getIdentifierCheckDigit()
    {
        return $this->identifierCheckDigit;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getCheckDigitScheme()
    {
        return $this->checkDigitScheme;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getIdentifierTypeCode()
    {
        return $this->identifierTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getAssigningFacility()
    {
        return $this->assigningFacility;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameRepresentationCode()
    {
        return $this->nameRepresentationCode;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getNameContext()
    {
        return $this->nameContext;
    }

    /**
     * @return \Hl7v2\DataType\DrDataType
     */
    public function getNameValidityRange()
    {
        return $this->nameValidityRange;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameAssemblyOrder()
    {
        return $this->nameAssemblyOrder;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getProfessionalSuffix()
    {
        return $this->professionalSuffix;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getAssigningJurisdiction()
    {
        return $this->assigningJurisdiction;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getAssigningAgency()
    {
        return $this->assigningAgency;
    }
}
