<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\V231\StDataType;

/**
 * Formatted Text (FT).
 */
class FtDataType extends StDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
