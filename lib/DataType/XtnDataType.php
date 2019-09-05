<?php

namespace Hl7v2\DataType;

/**
 * Extended Telecommunication Number (XTN).
 */
class XtnDataType extends ComponentDataType
{
    const MAX_LEN = 850;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $telephoneNumber;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $telecommunicationUseCode;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $telepcommunicationEquipmentType;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $emailAddress;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $countryCode;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $areaCityCode;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $localNumber;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $extension;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $anyText;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $extensionPrefix;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $speedDialCode;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $unformattedTelephoneNumber;

    /**
     * @param string $telephoneNumber
     */
    public function setTelephoneNumber(string $telephoneNumber = null)
    {
        $this->telephoneNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
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
     * @param string $localNumber
     */
    public function setLocalNumber(string $localNumber = null)
    {
        $this->localNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->localNumber->setValue($localNumber);
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
     * @param string $extensionPrefix
     */
    public function setExtensionPrefix(string $extensionPrefix = null)
    {
        $this->extensionPrefix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->extensionPrefix->setValue($extensionPrefix);
    }

    /**
     * @param string $speedDialCode
     */
    public function setSpeedDialCode(string $speedDialCode = null)
    {
        $this->speedDialCode = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->speedDialCode->setValue($speedDialCode);
    }

    /**
     * @param string $unformattedTelephoneNumber
     */
    public function setUnformattedTelephoneNumber(
        string $unformattedTelephoneNumber = null
    ) {
        $this->unformattedTelephoneNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->unformattedTelephoneNumber->setValue($unformattedTelephoneNumber);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getTelecommunicationUseCode()
    {
        return $this->telecommunicationUseCode;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getTelepcommunicationEquipmentType()
    {
        return $this->telepcommunicationEquipmentType;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getAreaCityCode()
    {
        return $this->areaCityCode;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getLocalNumber()
    {
        return $this->localNumber;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAnyText()
    {
        return $this->anyText;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getExtensionPrefix()
    {
        return $this->extensionPrefix;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSpeedDialCode()
    {
        return $this->speedDialCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getUnformattedTelephoneNumber()
    {
        return $this->unformattedTelephoneNumber;
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

        if (!$this->getLocalNumber() || !$this->getLocalNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getLocalNumber()->getValue();
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

        if (!$this->getExtensionPrefix() || !$this->getExtensionPrefix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getExtensionPrefix()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSpeedDialCode() || !$this->getSpeedDialCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSpeedDialCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getUnformattedTelephoneNumber() || !$this->getUnformattedTelephoneNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getUnformattedTelephoneNumber()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
