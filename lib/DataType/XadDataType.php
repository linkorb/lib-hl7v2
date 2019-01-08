<?php

namespace Hl7v2\DataType;

/**
 * Extended Address (XAD).
 */
class XadDataType extends ComponentDataType
{
    const MAX_LEN = 631;

    /**
     * @var SadDataType
     */
    private $streetAddress;
    /**
     * @var StDataType
     */
    private $otherDesignation;
    /**
     * @var StDataType
     */
    private $city;
    /**
     * @var StDataType
     */
    private $stateOrProvince;
    /**
     * @var StDataType
     */
    private $zipOrPostalCode;
    /**
     * @var IdDataType
     */
    private $country;
    /**
     * @var IdDataType
     */
    private $addressType;
    /**
     * @var StDataType
     */
    private $otherGeographicDesignation;
    /**
     * @var IsDataType
     */
    private $countyParishCode;
    /**
     * @var IsDataType
     */
    private $censusTract;
    /**
     * @var IdDataType
     */
    private $addressRepresentationCode;
    /**
     * @var DrDataType
     */
    private $addressValidityRange;
    /**
     * @var TsDataType
     */
    private $effectiveDate;
    /**
     * @var TsDataType
     */
    private $expirationDate;

    /**
     * @param string $streetAddressStreetOrMailingAddress
     * @param string $streetAddressStreetName
     * @param string $streetAddressDwellingNumber
     */
    public function setStreetAddress(
        string $streetAddressStreetOrMailingAddress = null,
        string $streetAddressStreetName = null,
        string $streetAddressDwellingNumber = null
    ) {
        $this->streetAddress = $this
            ->dataTypeFactory
            ->create('SAD', $this->encodingParameters, true)
        ;
        $this->streetAddress->setStreetOrMailingAddress($streetAddressStreetOrMailingAddress);
        $this->streetAddress->setStreetName($streetAddressStreetName);
        $this->streetAddress->setDwellingNumber($streetAddressDwellingNumber);
    }

    /**
     * @param string $otherDesignation
     */
    public function setOtherDesignation(string $otherDesignation = null)
    {
        $this->otherDesignation = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->otherDesignation->setValue($otherDesignation);
    }

    /**
     * @param string $city
     */
    public function setCity(string $city = null)
    {
        $this->city = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->city->setValue($city);
    }

    /**
     * @param string $stateOrProvince
     */
    public function setStateOrProvince(string $stateOrProvince = null)
    {
        $this->stateOrProvince = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->stateOrProvince->setValue($stateOrProvince);
    }

    /**
     * @param string $zipOrPostalCode
     */
    public function setZipOrPostalCode(string $zipOrPostalCode = null)
    {
        $this->zipOrPostalCode = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->zipOrPostalCode->setValue($zipOrPostalCode);
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country = null)
    {
        $this->country = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->country->setValue($country);
    }

    /**
     * @param string $addressType
     */
    public function setAddressType(string $addressType = null)
    {
        $this->addressType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->addressType->setValue($addressType);
    }

    /**
     * @param string $otherGeographicDesignation
     */
    public function setOtherGeographicDesignation(
        string $otherGeographicDesignation = null
    ) {
        $this->otherGeographicDesignation = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->otherGeographicDesignation->setValue($otherGeographicDesignation);
    }

    /**
     * @param string $countyParishCode
     */
    public function setCountyParishCode(string $countyParishCode = null)
    {
        $this->countyParishCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->countyParishCode->setValue($countyParishCode);
    }

    /**
     * @param string $censusTract
     */
    public function setCensusTract(string $censusTract = null)
    {
        $this->censusTract = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->censusTract->setValue($censusTract);
    }

    /**
     * @param string $addressRepresentationCode
     */
    public function setAddressRepresentationCode(
        string $addressRepresentationCode = null
    ) {
        $this->addressRepresentationCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->addressRepresentationCode->setValue($addressRepresentationCode);
    }

    /**
     * @param string $addressValidityRangeRangeStartDateTimeTime
     * @param string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $addressValidityRangeRangeEndDateTimeTime
     * @param string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
     */
    public function setAddressValidityRange(
        string $addressValidityRangeRangeStartDateTimeTime,
        string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        string $addressValidityRangeRangeEndDateTimeTime,
        string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision = null
    ) {
        $this->addressValidityRange = $this
            ->dataTypeFactory
            ->create('DR', $this->encodingParameters, true)
        ;
        $this->addressValidityRange->setRangeStartDateTime(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision
        );
        $this->addressValidityRange->setRangeEndDateTime(
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
    }

    /**
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function setEffectiveDate(
        string $effectiveDateTime,
        string $effectiveDateDegreeOfPrecision = null
    ) {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->effectiveDate->setTime($effectiveDateTime);
        $this->effectiveDate->setDegreeOfPrecision($effectiveDateDegreeOfPrecision);
    }

    /**
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function setExpirationDate(
        string $expirationDateTime,
        string $expirationDateDegreeOfPrecision = null
    ) {
        $this->expirationDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->expirationDate->setTime($expirationDateTime);
        $this->expirationDate->setDegreeOfPrecision($expirationDateDegreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\SadDataType
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOtherDesignation()
    {
        return $this->otherDesignation;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getStateOrProvince()
    {
        return $this->stateOrProvince;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getZipOrPostalCode()
    {
        return $this->zipOrPostalCode;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOtherGeographicDesignation()
    {
        return $this->otherGeographicDesignation;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getCountyParishCode()
    {
        return $this->countyParishCode;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getCensusTract()
    {
        return $this->censusTract;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getAddressRepresentationCode()
    {
        return $this->addressRepresentationCode;
    }

    /**
     * @return \Hl7v2\DataType\DrDataType
     */
    public function getAddressValidityRange()
    {
        return $this->addressValidityRange;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
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

        if ($this->getStreetAddress()) {
            $s .= (string) $this->getStreetAddress();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getOtherDesignation() || !$this->getOtherDesignation()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOtherDesignation()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCity() || !$this->getCity()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCity()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getStateOrProvince() || !$this->getStateOrProvince()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getStateOrProvince()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getZipOrPostalCode() || !$this->getZipOrPostalCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getZipOrPostalCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCountry() || !$this->getCountry()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCountry()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAddressType() || !$this->getAddressType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAddressType()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOtherGeographicDesignation() || !$this->getOtherGeographicDesignation()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOtherGeographicDesignation()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCountyParishCode() || !$this->getCountyParishCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCountyParishCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCensusTract() || !$this->getCensusTract()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCensusTract()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAddressRepresentationCode() || !$this->getAddressRepresentationCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAddressRepresentationCode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAddressValidityRange()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAddressValidityRange();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getEffectiveDate()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getEffectiveDate();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getExpirationDate()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getExpirationDate();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        return $s;
    }
}
