<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\AbstractDataType;

/**
 * String (ST).
 */
class StDataType extends AbstractDataType
{
    const MAX_LEN = 199;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
