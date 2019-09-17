<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\V251\StDataType;

/**
 * Coded value for HL7 tables (ID).
 */
class IdDataType extends StDataType
{
    const MAX_LEN = null;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
