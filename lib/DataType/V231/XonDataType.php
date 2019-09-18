<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Extended Composite Name and Identification Number for Organizations (XON).
 */
class XonDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $organisationName;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $organisationNameTypeCode;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $idNumber;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $checkDigit;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $checkDigitScheme;
    /**
     * @var \Hl7v2\DataType\V231\HdDataType
     */
    private $assigningAuthority;
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
     * @param string $organisationName
     */
    public function setOrganisationName(string $organisationName = null)
    {
        $this->organisationName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->organisationName->setValue($organisationName);
    }

    /**
     * @param string $organisationNameTypeCode
     */
    public function setOrganisationNameTypeCode(
        string $organisationNameTypeCode = null
    ) {
        $this->organisationNameTypeCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->organisationNameTypeCode->setValue($organisationNameTypeCode);
    }

    /**
     * @param string $idNumber
     */
    public function setIdNumber(string $idNumber = null)
    {
        $this->idNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->idNumber->setValue($idNumber);
    }

    /**
     * @param string $checkDigit
     */
    public function setCheckDigit(string $checkDigit = null)
    {
        $this->checkDigit = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->checkDigit->setValue($checkDigit);
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
    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getOrganisationNameTypeCode()
    {
        return $this->organisationNameTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getCheckDigit()
    {
        return $this->checkDigit;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getCheckDigitScheme()
    {
        return $this->checkDigitScheme;
    }

    /**
     * @return \Hl7v2\DataType\V231\HdDataType
     */
    public function getAssigningAuthority()
    {
        return $this->assigningAuthority;
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

        if ($this->getOrganisationName() && $this->getOrganisationName()->hasValue()) {
            $s .= (string) $this->getOrganisationName()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getOrganisationNameTypeCode() || !$this->getOrganisationNameTypeCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOrganisationNameTypeCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getIdNumber() || !$this->getIdNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getIdNumber()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCheckDigit() || !$this->getCheckDigit()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCheckDigit()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCheckDigitScheme() || !$this->getCheckDigitScheme()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCheckDigitScheme()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningAuthority()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAssigningAuthority();
            if ('' === $value) {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getIdentifierTypeCode() || !$this->getIdentifierTypeCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getIdentifierTypeCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAssigningFacility()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAssigningFacility();
            if ('' === $value) {
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
                . (string) $this->getNameRepresentationCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
