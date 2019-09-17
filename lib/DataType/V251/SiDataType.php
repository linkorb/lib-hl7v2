<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\V251\NmDataType;

/**
 * Sequence ID (SI).
 */
class SiDataType extends NmDataType
{
    const MAX_LEN = 4;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
