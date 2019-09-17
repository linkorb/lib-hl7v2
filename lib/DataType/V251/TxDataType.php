<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\AbstractDataType;

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
