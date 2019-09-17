<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Extended Telecommunication Number (XTN).
 */
class XtnDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\TnDataType
     */
    private $telephoneNumber;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $telecommunicationUseCode;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $telepcommunicationEquipmentType;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $emailAddress;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $countryCode;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $areaCityCode;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $phoneNumber;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $extension;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $anyText;

    /**
     * @param string $telephoneNumber
     */
    public function setTelephoneNumber(string $telephoneNumber = null)
    {
        $this->telephoneNumber = $this
            ->dataTypeFactory
            ->create('TN', $this->encodingParameters)
        ;
        $this->telephoneNumber->setValue($telephoneNumber);
    }

    /**
     * @param string $telecommunicationUseCode
     */
    public function setTelecommunicationUseCode(
        string $telecommunicationUseCode = null
    ) {
        $this->telecommunicationUseCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->telecommunicationUseCode->setValue($telecommunicationUseCode);
    }

    /**
     * @param string $telepcommunicationEquipmentType
     */
    public function setTelepcommunicationEquipmentType(
        string $telepcommunicationEquipmentType = null
    ) {
        $this->telepcommunicationEquipmentType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->telepcommunicationEquipmentType->setValue($telepcommunicationEquipmentType);
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress(string $emailAddress = null)
    {
        $this->emailAddress = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->emailAddress->setValue($emailAddress);
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode = null)
    {
        $this->countryCode = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->countryCode->setValue($countryCode);
    }

    /**
     * @param string $areaCityCode
     */
    public function setAreaCityCode(string $areaCityCode = null)
    {
        $this->areaCityCode = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->areaCityCode->setValue($areaCityCode);
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber = null)
    {
        $this->phoneNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->phoneNumber->setValue($phoneNumber);
    }

    /**
     * @param string $extension
     */
    public function setExtension(string $extension = null)
    {
        $this->extension = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->extension->setValue($extension);
    }

    /**
     * @param string $anyText
     */
    public function setAnyText(string $anyText = null)
    {
        $this->anyText = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->anyText->setValue($anyText);
    }

    /**
     * @return \Hl7v2\DataType\V231\TnDataType
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getTelecommunicationUseCode()
    {
        return $this->telecommunicationUseCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getTelepcommunicationEquipmentType()
    {
        return $this->telepcommunicationEquipmentType;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getAreaCityCode()
    {
        return $this->areaCityCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getAnyText()
    {
        return $this->anyText;
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

        if ($this->getTelephoneNumber() && $this->getTelephoneNumber()->hasValue()) {
            $s .= (string) $this->getTelephoneNumber()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getTelecommunicationUseCode() || !$this->getTelecommunicationUseCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getTelecommunicationUseCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getTelepcommunicationEquipmentType() || !$this->getTelepcommunicationEquipmentType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getTelepcommunicationEquipmentType()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getEmailAddress() || !$this->getEmailAddress()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getEmailAddress()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCountryCode() || !$this->getCountryCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCountryCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAreaCityCode() || !$this->getAreaCityCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAreaCityCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPhoneNumber() || !$this->getPhoneNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPhoneNumber()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getExtension() || !$this->getExtension()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getExtension()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAnyText() || !$this->getAnyText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAnyText()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
