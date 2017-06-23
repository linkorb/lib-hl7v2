<?php

namespace Hl7v2\DataType;

/**
 * Numeric (NM).
 */
class NmDataType extends AbstractDataType
{
    const MAX_LEN = 16;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
