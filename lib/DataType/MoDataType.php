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
    public function setQuantity($quantity = null)
    {
        $this->quantity = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->quantity->setValue($quantity);
    }

    /**
     * @param string $denomination
     */
    public function setDenomination($denomination = null)
    {
        $this->denomination = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
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
}
