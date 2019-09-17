<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\AbstractDataType;

/**
 * Composite (CM).
 */
class CmDataType extends AbstractDataType
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
