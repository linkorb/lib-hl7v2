<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Composite ID Number and Name Simplified (CNN).
 */
class CnnDataType extends ComponentDataType
{
    const MAX_LEN = 406;

    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $idNumber;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $familyName;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $givenName;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $secondNames;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $suffix;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $prefix;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $degree;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $sourceTable;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $assigningAuthorityNamespaceId;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $assigningAuthorityUniversalId;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $assigningAuthorityUniversalIdType;

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
     */
    public function setAssigningAuthorityNamespaceId(
        string $assigningAuthorityNamespaceId = null
    ) {
        $this->assigningAuthorityNamespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->assigningAuthorityNamespaceId->setValue($assigningAuthorityNamespaceId);
    }

    /**
     * @param string $assigningAuthorityUniversalId
     */
    public function setAssigningAuthorityUniversalId(
        string $assigningAuthorityUniversalId = null
    ) {
        $this->assigningAuthorityUniversalId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->assigningAuthorityUniversalId->setValue($assigningAuthorityUniversalId);
    }

    /**
     * @param string $assigningAuthorityUniversalIdType
     */
    public function setAssigningAuthorityUniversalIdType(
        string $assigningAuthorityUniversalIdType = null
    ) {
        $this->assigningAuthorityUniversalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->assigningAuthorityUniversalIdType->setValue($assigningAuthorityUniversalIdType);
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getSecondNames()
    {
        return $this->secondNames;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getSourceTable()
    {
        return $this->sourceTable;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getAssigningAuthorityNamespaceId()
    {
        return $this->assigningAuthorityNamespaceId;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getAssigningAuthorityUniversalId()
    {
        return $this->assigningAuthorityUniversalId;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getAssigningAuthorityUniversalIdType()
    {
        return $this->assigningAuthorityUniversalIdType;
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

        if (!$this->getAssigningAuthorityNamespaceId() || !$this->getAssigningAuthorityNamespaceId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAssigningAuthorityNamespaceId()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningAuthorityUniversalId() || !$this->getAssigningAuthorityUniversalId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAssigningAuthorityUniversalId()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningAuthorityUniversalIdType() || !$this->getAssigningAuthorityUniversalIdType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAssigningAuthorityUniversalIdType()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
