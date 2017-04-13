<?php

namespace Hl7v2\DataType;

/**
 * Extended Composite Name and Identification Number for Organizations (XON).
 */
class XonDataType extends ComponentDataType
{
    const MAX_LEN = 567;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $organisationName;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $organisationNameTypeCode;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $idNumber;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $checkDigit;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $checkDigitScheme;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    private $assigningAuthority;
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
     * @var \Hl7v2\DataType\StDataType
     */
    private $organisationIdentifier;

    /**
     * @param string $organisationName
     */
    public function setOrganisationName($organisationName = null)
    {
        $this->organisationName = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->organisationName->setValue($organisationName);
    }

    /**
     * @param string $organisationNameTypeCode
     */
    public function setOrganisationNameTypeCode($organisationNameTypeCode = null)
    {
        $this->organisationNameTypeCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->organisationNameTypeCode->setValue($organisationNameTypeCode);
    }

    /**
     * @param string $idNumber
     */
    public function setIdNumber($idNumber = null)
    {
        $this->idNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->idNumber->setValue($idNumber);
    }

    /**
     * @param string $checkDigit
     */
    public function setCheckDigit($checkDigit = null)
    {
        $this->checkDigit = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->checkDigit->setValue($checkDigit);
    }

    /**
     * @param string $checkDigitScheme
     */
    public function setCheckDigitScheme($checkDigitScheme = null)
    {
        $this->checkDigitScheme = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->checkDigitScheme->setValue($checkDigitScheme);
    }

    /**
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     */
    public function setAssigningAuthority(
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType
    ) {
        $this->assigningAuthority = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->assigningAuthority->setNamespaceId($assigningAuthorityNamespaceId);
        $this->assigningAuthority->setUniversalId(
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
    }

    /**
     * @param string $identifierTypeCode
     */
    public function setIdentifierTypeCode($identifierTypeCode = null)
    {
        $this->identifierTypeCode = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->identifierTypeCode->setValue($identifierTypeCode);
    }

    /**
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setAssigningFacility(
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType
    ) {
        $this->assigningFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->assigningFacility->setNamespaceId($assigningFacilityNamespaceId);
        $this->assigningFacility->setUniversalId(
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $nameRepresentationCode
     */
    public function setNameRepresentationCode($nameRepresentationCode = null)
    {
        $this->nameRepresentationCode = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->nameRepresentationCode->setValue($nameRepresentationCode);
    }

    /**
     * @param string $organisationIdentifier
     */
    public function setOrganisationIdentifier($organisationIdentifier = null)
    {
        $this->organisationIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->organisationIdentifier->setValue($organisationIdentifier);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getOrganisationNameTypeCode()
    {
        return $this->organisationNameTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getCheckDigit()
    {
        return $this->checkDigit;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getCheckDigitScheme()
    {
        return $this->checkDigitScheme;
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
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOrganisationIdentifier()
    {
        return $this->organisationIdentifier;
    }
}
