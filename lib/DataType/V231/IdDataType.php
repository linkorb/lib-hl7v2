<?php

namespace Hl7v2\DataType\V231;

/**
 * Coded value for HL7 tables (ID).
 */
class IdDataType extends StDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
