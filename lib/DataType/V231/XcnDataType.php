<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Extended Composite ID Number and Name for Persons (XCN).
 */
class XcnDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $idNumber;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $familyName;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $givenName;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $middleInitialOrName;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $suffix;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $prefix;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $degree;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $sourceTable;
    /**
     * @var \Hl7v2\DataType\V231\HdDataType
     */
    private $assigningAuthority;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $nameTypeCode;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $identifierCheckDigit;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $checkDigitScheme;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $identifierTypeCode;
    /**
     * @var \Hl7v2\DataType\V231\HdDataType
     */
    private $assigningFacility;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $nameRepresentationCode;

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
     * @param string $familyName
     */
    public function setFamilyName(string $familyName = null)
    {
        $this->familyName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->familyName->setValue($familyName);
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
     * @param string $middleInitialOrName
     */
    public function setMiddleInitialOrName(string $middleInitialOrName = null)
    {
        $this->middleInitialOrName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->middleInitialOrName->setValue($middleInitialOrName);
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
            ->create('IS', $this->encodingParameters)
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
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getMiddleInitialOrName()
    {
        return $this->middleInitialOrName;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getSourceTable()
    {
        return $this->sourceTable;
    }

    /**
     * @return \Hl7v2\DataType\V231\HdDataType
     */
    public function getAssigningAuthority()
    {
        return $this->assigningAuthority;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getNameTypeCode()
    {
        return $this->nameTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getIdentifierCheckDigit()
    {
        return $this->identifierCheckDigit;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getCheckDigitScheme()
    {
        return $this->checkDigitScheme;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getIdentifierTypeCode()
    {
        return $this->identifierTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\HdDataType
     */
    public function getAssigningFacility()
    {
        return $this->assigningFacility;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getNameRepresentationCode()
    {
        return $this->nameRepresentationCode;
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

        if (!$this->getFamilyName() || !$this->getFamilyName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFamilyName()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getGivenName() || !$this->getGivenName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getGivenName()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getMiddleInitialOrName() || !$this->getMiddleInitialOrName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getMiddleInitialOrName()->getValue();
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

        return $s;
    }
}
