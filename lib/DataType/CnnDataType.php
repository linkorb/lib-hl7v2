<?php

namespace Hl7v2\DataType;

/**
 * Composite ID Number and Name Simplified (CNN).
 */
class CnnDataType extends ComponentDataType
{
    const MAX_LEN = 406;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $idNumber;
    /**
     * @var \Hl7v2\DataType\StDataType
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
     * @var \Hl7v2\DataType\IsDataType
     */
    private $assigningAuthorityNamespaceId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $assigningAuthorityUniversalId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $assigningAuthorityUniversalIdType;

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
     * @param string $familyName
     */
    public function setFamilyName($familyName = null)
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
     */
    public function setAssigningAuthorityNamespaceId($assigningAuthorityNamespaceId = null)
    {
        $this->assigningAuthorityNamespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->assigningAuthorityNamespaceId->setValue($assigningAuthorityNamespaceId);
    }

    /**
     * @param string $assigningAuthorityUniversalId
     */
    public function setAssigningAuthorityUniversalId($assigningAuthorityUniversalId = null)
    {
        $this->assigningAuthorityUniversalId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->assigningAuthorityUniversalId->setValue($assigningAuthorityUniversalId);
    }

    /**
     * @param string $assigningAuthorityUniversalIdType
     */
    public function setAssigningAuthorityUniversalIdType($assigningAuthorityUniversalIdType = null)
    {
        $this->assigningAuthorityUniversalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->assigningAuthorityUniversalIdType->setValue($assigningAuthorityUniversalIdType);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
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
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getAssigningAuthorityNamespaceId()
    {
        return $this->assigningAuthorityNamespaceId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAssigningAuthorityUniversalId()
    {
        return $this->assigningAuthorityUniversalId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
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
