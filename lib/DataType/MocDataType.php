<?php

namespace Hl7v2\DataType;

/**
 * Money and Charge Code (MOC).
 */
class MocDataType extends ComponentDataType
{
    const MAX_LEN = 504;

    /**
     * @var \Hl7v2\DataType\MoDataType
     */
    private $monetaryAmount;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $chargeCode;

    /**
     * @param string $monetaryAmountQuantity
     * @param string $monetaryAmountDenomination
     */
    public function setMonetaryAmount(
        string $monetaryAmountQuantity = null,
        string $monetaryAmountDenomination = null
    ) {
        $this->monetaryAmount = $this
            ->dataTypeFactory
            ->create('MO', $this->encodingParameters, true)
        ;
        $this->monetaryAmount->setQuantity($monetaryAmountQuantity);
        $this->monetaryAmount->setDenomination($monetaryAmountDenomination);
    }

    /**
     * @param string $chargeCodeIdentifier
     * @param string $chargeCodeText
     * @param string $chargeCodeNameOfCodingSystem
     * @param string $chargeCodeAltIdentifier
     * @param string $chargeCodeAltText
     * @param string $chargeCodeNameOfAltCodingSystem
     */
    public function setChargeCode(
        string $chargeCodeIdentifier = null,
        string $chargeCodeText = null,
        string $chargeCodeNameOfCodingSystem = null,
        string $chargeCodeAltIdentifier = null,
        string $chargeCodeAltText = null,
        string $chargeCodeNameOfAltCodingSystem = null
    ) {
        $this->chargeCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
        ;
        $this->chargeCode->setIdentifier($chargeCodeIdentifier);
        $this->chargeCode->setText($chargeCodeText);
        $this->chargeCode->setNameOfCodingSystem($chargeCodeNameOfCodingSystem);
        $this->chargeCode->setAltIdentifier($chargeCodeAltIdentifier);
        $this->chargeCode->setAltText($chargeCodeAltText);
        $this->chargeCode->setNameOfAltCodingSystem($chargeCodeNameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\MoDataType
     */
    public function getMonetaryAmount()
    {
        return $this->monetaryAmount;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getChargeCode()
    {
        return $this->chargeCode;
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

        if ($this->getMonetaryAmount()) {
            $s .= (string) $this->getMonetaryAmount();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getChargeCode()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getChargeCode();
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
