<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Extended Address (XAD).
 */
class XadDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $streetAddress;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $otherDesignation;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $city;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $stateOrProvince;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $zipOrPostalCode;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $country;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $addressType;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $otherGeographicDesignation;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $countyParishCode;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $censusTract;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $addressRepresentationCode;

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress(string $streetAddress = null)
    {
        $this->streetAddress = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->streetAddress->setValue($streetAddress);
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
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getOtherDesignation()
    {
        return $this->otherDesignation;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getStateOrProvince()
    {
        return $this->stateOrProvince;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getZipOrPostalCode()
    {
        return $this->zipOrPostalCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getOtherGeographicDesignation()
    {
        return $this->otherGeographicDesignation;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getCountyParishCode()
    {
        return $this->countyParishCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getCensusTract()
    {
        return $this->censusTract;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getAddressRepresentationCode()
    {
        return $this->addressRepresentationCode;
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

        if ($this->getStreetAddress() && $this->getStreetAddress()->hasValue()) {
            $s .= (string) $this->getStreetAddress()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getOtherDesignation() || !$this->getOtherDesignation()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOtherDesignation()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCity() || !$this->getCity()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCity()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getStateOrProvince() || !$this->getStateOrProvince()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getStateOrProvince()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getZipOrPostalCode() || !$this->getZipOrPostalCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getZipOrPostalCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCountry() || !$this->getCountry()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCountry()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAddressType() || !$this->getAddressType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAddressType()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOtherGeographicDesignation() || !$this->getOtherGeographicDesignation()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOtherGeographicDesignation()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCountyParishCode() || !$this->getCountyParishCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCountyParishCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCensusTract() || !$this->getCensusTract()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCensusTract()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAddressRepresentationCode() || !$this->getAddressRepresentationCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAddressRepresentationCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
