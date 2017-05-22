<?php

namespace Hl7v2\DataType;

/**
 * Text Data (TX).
 */
class TxDataType extends AbstractDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
