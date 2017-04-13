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
    public function setLicenseNumber($licenseNumber)
    {
        $this->licenseNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->licenseNumber->setValue($licenseNumber);
    }

    /**
     * @param string $issuingStateProvinceCountry
     */
    public function setIssuingStateProvinceCountry($issuingStateProvinceCountry = null)
    {
        $this->issuingStateProvinceCountry = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->issuingStateProvinceCountry->setValue($issuingStateProvinceCountry);
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate($expirationDate = null)
    {
        $this->expirationDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
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
}
