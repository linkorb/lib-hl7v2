<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Composite Quantity with Units (CQ).
 */
class CqDataType extends ComponentDataType
{
    const MAX_LEN = 500;

    /**
     * @var \Hl7v2\DataType\V251\NmDataType
     */
    private $quantity;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $units;

    /**
     * @param string $quantity
     */
    public function setQuantity(string $quantity = null)
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
        string $unitsIdentifier = null,
        string $unitsText = null,
        string $unitsNameOfCodingSystem = null,
        string $unitsAltIdentifier = null,
        string $unitsAltText = null,
        string $unitsNameOfAltCodingSystem = null
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
     * @return \Hl7v2\DataType\V251\NmDataType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getUnits()
    {
        return $this->units;
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

        if ($this->getQuantity() && $this->getQuantity()->hasValue()) {
            $s .= (string) $this->getQuantity()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getUnits()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getUnits();
            if ('' === $value) {
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
