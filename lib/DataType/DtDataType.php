<?php

namespace Hl7v2\DataType;

/**
 * Date (DT).
 */
class DtDataType extends AbstractDataType
{
    const MAX_LEN = 8;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
