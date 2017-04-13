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
            ->create('ST', $this->characterEncoding)
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
            ->create('ST', $this->characterEncoding)
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
            ->create('ST', $this->characterEncoding)
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
            ->create('ST', $this->characterEncoding)
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
            ->create('ST', $this->characterEncoding)
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
            ->create('ST', $this->characterEncoding)
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
            ->create('IS', $this->characterEncoding)
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
            ->create('IS', $this->characterEncoding)
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
            ->create('IS', $this->characterEncoding)
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
            ->create('ST', $this->characterEncoding)
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
            ->create('ID', $this->characterEncoding)
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
}
