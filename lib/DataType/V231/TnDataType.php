<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\AbstractDataType;

/**
 * Telephone Number (TN).
 */
class TnDataType extends AbstractDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
