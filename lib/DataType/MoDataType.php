<?php

namespace Hl7v2\DataType;

/**
 * Money (MO).
 */
class MoDataType extends ComponentDataType
{
    const MAX_LEN = 20;

    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $quantity;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $denomination;

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
     * @param string $denomination
     */
    public function setDenomination(string $denomination = null)
    {
        $this->denomination = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->denomination->setValue($denomination);
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDenomination()
    {
        return $this->denomination;
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

        if (!$this->getDenomination() || !$this->getDenomination()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDenomination()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
