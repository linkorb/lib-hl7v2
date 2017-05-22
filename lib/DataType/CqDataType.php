<?php

namespace Hl7v2\DataType;

/**
 * Composite Quantity with Units (CQ).
 */
class CqDataType extends ComponentDataType
{
    const MAX_LEN = 500;

    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $quantity;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $units;

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity = null)
    {
        $this->quantity = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->quantity->setValue($quantity);
    }

    /**
     * @param string $unitsIdentifier
     * @param string $unitsText
     * @param string $unitsNameOfCodingSystem
     * @param string $unitsAltIdentifier
     * @param string $unitsAltText
     * @param string $unitsNameOfAltCodingSystem
     */
    public function setUnits(
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $this->units = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
        ;
        $this->units->setIdentifier($unitsIdentifier);
        $this->units->setText($unitsText);
        $this->units->setNameOfCodingSystem($unitsNameOfCodingSystem);
        $this->units->setAltIdentifier($unitsAltIdentifier);
        $this->units->setAltText($unitsAltText);
        $this->units->setNameOfAltCodingSystem($unitsNameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getUnits()
    {
        return $this->units;
    }
}
