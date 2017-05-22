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
    public function setMonetaryAmount($monetaryAmountQuantity = null, $monetaryAmountDenomination = null)
    {
        $this->monetaryAmount = $this
            ->dataTypeFactory
            ->create('MO', $this->encodingParameters)
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
        $chargeCodeIdentifier = null,
        $chargeCodeText = null,
        $chargeCodeNameOfCodingSystem = null,
        $chargeCodeAltIdentifier = null,
        $chargeCodeAltText = null,
        $chargeCodeNameOfAltCodingSystem = null
    ) {
        $this->chargeCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
}
