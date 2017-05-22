<?php

namespace Hl7v2\DataType;

/**
 * Date/Time (DTM).
 */
class DtmDataType extends AbstractDataType
{
    const MAX_LEN = 24;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
