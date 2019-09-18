<?php

namespace Hl7v2\DataType\V231;

/**
 * Coded value for user-defined tables (IS).
 */
class IsDataType extends StDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
