<?php

namespace Hl7v2\DataType;

/**
 * Driver&amp;#039;s License Number (DLN).
 */
class DlnDataType extends ComponentDataType
{
    const MAX_LEN = 66;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $licenseNumber;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $issuingStateProvinceCountry;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    private $expirationDate;

    /**
     * @param string $licenseNumber
     */
    public function setLicenseNumber(string $licenseNumber = null)
    {
        $this->licenseNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->licenseNumber->setValue($licenseNumber);
    }

    /**
     * @param string $issuingStateProvinceCountry
     */
    public function setIssuingStateProvinceCountry(
        string $issuingStateProvinceCountry = null
    ) {
        $this->issuingStateProvinceCountry = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->issuingStateProvinceCountry->setValue($issuingStateProvinceCountry);
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate(string $expirationDate = null)
    {
        $this->expirationDate = $this
            ->dataTypeFactory
            ->create('DT', $this->encodingParameters)
        ;
        $this->expirationDate->setValue($expirationDate);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getLicenseNumber()
    {
        return $this->licenseNumber;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getIssuingStateProvinceCountry()
    {
        return $this->issuingStateProvinceCountry;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
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

        if ($this->getLicenseNumber() && $this->getLicenseNumber()->hasValue()) {
            $s .= (string) $this->getLicenseNumber()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getIssuingStateProvinceCountry() || !$this->getIssuingStateProvinceCountry()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getIssuingStateProvinceCountry()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getExpirationDate() || !$this->getExpirationDate()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getExpirationDate()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
