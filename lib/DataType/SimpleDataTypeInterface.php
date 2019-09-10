<?php

namespace Hl7v2\DataType;

/**
 * Interface of a simple DataTypeInterface.
 */
interface SimpleDataTypeInterface extends DataTypeInterface
{
    /**
     * @return bool
     */
    public function hasValue();

    /**
     * @return string
     */
    public function getValue();

    /**
     * @return string
     */
    public function getCharacterEncoding();
}
