<?php

namespace Hl7v2\DataType\V251;

/**
 * Coded value for user-defined tables (IS).
 */
class IsDataType extends StDataType
{
    const MAX_LEN = 20;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
