<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\V231\NmDataType;

/**
 * Sequence ID (SI).
 */
class SiDataType extends NmDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
