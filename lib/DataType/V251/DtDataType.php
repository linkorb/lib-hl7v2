<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\AbstractDataType;

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
