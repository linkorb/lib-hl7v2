<?php

namespace Hl7v2\DataType;

/**
 * Extended Composite ID Number and Name for Persons (XCN).
 */
class XcnDataType extends ComponentDataType
{
    const MAX_LEN = 3002;

    /**
     * @var StDataType
     */
    private $idNumber;
    /**
     * @var FnDataType
     */
    private $familyName;
    /**
     * @var StDataType
     */
    private $givenName;
    /**
     * @var StDataType
     */
    private $secondNames;
    /**
     * @var StDataType
     */
    private $suffix;
    /**
     * @var StDataType
     */
    private $prefix;
    /**
     * @var IsDataType
     */
    private $degree;
    /**
     * @var IsDataType
     */
    private $sourceTable;
    /**
     * @var HdDataType
     */
    private $assigningAuthority;
    /**
     * @var IdDataType
     */
    private $nameTypeCode;
    /**
     * @var StDataType
     */
    private $identifierCheckDigit;
    /**
     * @var IdDataType
     */
    private $checkDigitScheme;
    /**
     * @var IdDataType
     */
    private $identifierTypeCode;
    /**
     * @var HdDataType
     */
    private $assigningFacility;
    /**
     * @var IdDataType
     */
    private $nameRepresentationCode;
    /**
     * @var CeDataType
     */
    private $nameContext;
    /**
     * @var DrDataType
     */
    private $nameValidityRange;
    /**
     * @var IdDataType
     */
    private $nameAssemblyOrder;
    /**
     * @var TsDataType
     */
    private $effectiveDate;
    /**
     * @var TsDataType
     */
    private $expirationDate;
    /**
     * @var StDataType
     */
    private $professionalSuffix;
    /**
     * @var CweDataType
     */
    private $assigningJurisdiction;
    /**
     * @var CweDataType
     */
    private $assigningAgency;

    /**
     * @param string $idNumber
     */
    public function setIdNumber(string $idNumber = null)
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
        string $familyNameSurname = null,
        string $familyNameOwnSurnamePrefix = null,
        string $familyNameOwnSurname = null,
        string $familyNameSurnamePrefixFromPartner = null,
        string $familyNameSurnameFromPartner = null
    ) {
        $this->familyName = $this
            ->dataTypeFactory
            ->create('FN', $this->encodingParameters, true)
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
    public function setGivenName(string $givenName = null)
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
    public function setSecondNames(string $secondNames = null)
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
    public function setSuffix(string $suffix = null)
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
    public function setPrefix(string $prefix = null)
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
    public function setDegree(string $degree = null)
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
    public function setSourceTable(string $sourceTable = null)
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
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null
    ) {
        $this->assigningAuthority = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters, true)
        ;
        $this->assigningAuthority->setNamespaceId($assigningAuthorityNamespaceId);
        $this->assigningAuthority->setUniversalId($assigningAuthorityUniversalId);
        $this->assigningAuthority->setUniversalIdType($assigningAuthorityUniversalIdType);
    }

    /**
     * @param string $nameTypeCode
     */
    public function setNameTypeCode(string $nameTypeCode = null)
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
    public function setIdentifierCheckDigit(string $identifierCheckDigit = null)
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
    public function setCheckDigitScheme(string $checkDigitScheme = null)
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
    public function setIdentifierTypeCode(string $identifierTypeCode = null)
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
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $this->assigningFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters, true)
        ;
        $this->assigningFacility->setNamespaceId($assigningFacilityNamespaceId);
        $this->assigningFacility->setUniversalId($assigningFacilityUniversalId);
        $this->assigningFacility->setUniversalIdType($assigningFacilityUniversalIdType);
    }

    /**
     * @param string $nameRepresentationCode
     */
    public function setNameRepresentationCode(
        string $nameRepresentationCode = null
    ) {
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
        string $nameContextIdentifier = null,
        string $nameContextText = null,
        string $nameContextNameOfCodingSystem = null,
        string $nameContextAltIdentifier = null,
        string $nameContextAltText = null,
        string $nameContextNameOfAltCodingSystem = null
    ) {
        $this->nameContext = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
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
        string $nameValidityRangeRangeStartDateTimeTime = null,
        string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        string $nameValidityRangeRangeEndDateTimeTime = null,
        string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null
    ) {
        $this->nameValidityRange = $this
            ->dataTypeFactory
            ->create('DR', $this->encodingParameters, true)
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
    public function setNameAssemblyOrder(string $nameAssemblyOrder = null)
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
    public function setEffectiveDate(
        string $effectiveDateTime = null,
        string $effectiveDateDegreeOfPrecision = null
    ) {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->effectiveDate->setTime($effectiveDateTime);
        $this->effectiveDate->setDegreeOfPrecision($effectiveDateDegreeOfPrecision);
    }

    /**
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function setExpirationDate(
        string $expirationDateTime = null,
        string $expirationDateDegreeOfPrecision = null
    ) {
        $this->expirationDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->expirationDate->setTime($expirationDateTime);
        $this->expirationDate->setDegreeOfPrecision($expirationDateDegreeOfPrecision);
    }

    /**
     * @param string $professionalSuffix
     */
    public function setProfessionalSuffix(string $professionalSuffix = null)
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
        string $assigningJurisdictionIdentifier = null,
        string $assigningJurisdictionText = null,
        string $assigningJurisdictionNameOfCodingSystem = null,
        string $assigningJurisdictionAltIdentifier = null,
        string $assigningJurisdictionAltText = null,
        string $assigningJurisdictionNameOfAltCodingSystem = null,
        string $assigningJurisdictionCodingSystemVersionId = null,
        string $assigningJurisdictionAltCodingSystemVersionId = null,
        string $assigningJurisdictionOriginalText = null
    ) {
        $this->assigningJurisdiction = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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
        $this->assigningAgency = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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

    /**
     * @return string
     */
    public function __toString()
    {
        $s = '';

        $sep = $this->isSubcomponent
            ? $this->encodingParameters->getSubcomponentSep()
            : $this->encodingParameters->getComponentSep()
        ;

        if ($this->getIdNumber() && $this->getIdNumber()->hasValue()) {
            $s .= (string) $this->getIdNumber()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getFamilyName()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getFamilyName();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getGivenName() || !$this->getGivenName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getGivenName()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSecondNames() || !$this->getSecondNames()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSecondNames()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSuffix() || !$this->getSuffix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSuffix()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPrefix() || !$this->getPrefix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPrefix()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getDegree() || !$this->getDegree()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDegree()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSourceTable() || !$this->getSourceTable()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSourceTable()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningAuthority()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAssigningAuthority();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getNameTypeCode() || !$this->getNameTypeCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameTypeCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getIdentifierCheckDigit() || !$this->getIdentifierCheckDigit()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getIdentifierCheckDigit()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCheckDigitScheme() || !$this->getCheckDigitScheme()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCheckDigitScheme()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getIdentifierTypeCode() || !$this->getIdentifierTypeCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getIdentifierTypeCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningFacility()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAssigningFacility();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getNameRepresentationCode() || !$this->getNameRepresentationCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameRepresentationCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameContext()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getNameContext();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getNameValidityRange()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getNameValidityRange();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getNameAssemblyOrder() || !$this->getNameAssemblyOrder()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameAssemblyOrder()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getEffectiveDate()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getEffectiveDate();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getExpirationDate()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getExpirationDate();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getProfessionalSuffix() || !$this->getProfessionalSuffix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getProfessionalSuffix()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningJurisdiction()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAssigningJurisdiction();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getAssigningAgency()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAssigningAgency();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        return $s;
    }
}
