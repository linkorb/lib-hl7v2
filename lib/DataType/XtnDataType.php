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
    public function setTelephoneNumber($telephoneNumber = null)
    {
        $this->telephoneNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->telephoneNumber->setValue($telephoneNumber);
    }

    /**
     * @param string $telecommunicationUseCode
     */
    public function setTelecommunicationUseCode($telecommunicationUseCode = null)
    {
        $this->telecommunicationUseCode = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->telecommunicationUseCode->setValue($telecommunicationUseCode);
    }

    /**
     * @param string $telepcommunicationEquipmentType
     */
    public function setTelepcommunicationEquipmentType($telepcommunicationEquipmentType = null)
    {
        $this->telepcommunicationEquipmentType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->telepcommunicationEquipmentType->setValue($telepcommunicationEquipmentType);
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress = null)
    {
        $this->emailAddress = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->emailAddress->setValue($emailAddress);
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->countryCode->setValue($countryCode);
    }

    /**
     * @param string $areaCityCode
     */
    public function setAreaCityCode($areaCityCode = null)
    {
        $this->areaCityCode = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->areaCityCode->setValue($areaCityCode);
    }

    /**
     * @param string $localNumber
     */
    public function setLocalNumber($localNumber = null)
    {
        $this->localNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->localNumber->setValue($localNumber);
    }

    /**
     * @param string $extension
     */
    public function setExtension($extension = null)
    {
        $this->extension = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->extension->setValue($extension);
    }

    /**
     * @param string $anyText
     */
    public function setAnyText($anyText = null)
    {
        $this->anyText = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->anyText->setValue($anyText);
    }

    /**
     * @param string $extensionPrefix
     */
    public function setExtensionPrefix($extensionPrefix = null)
    {
        $this->extensionPrefix = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->extensionPrefix->setValue($extensionPrefix);
    }

    /**
     * @param string $speedDialCode
     */
    public function setSpeedDialCode($speedDialCode = null)
    {
        $this->speedDialCode = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->speedDialCode->setValue($speedDialCode);
    }

    /**
     * @param string $unformattedTelephoneNumber
     */
    public function setUnformattedTelephoneNumber($unformattedTelephoneNumber = null)
    {
        $this->unformattedTelephoneNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
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
}
