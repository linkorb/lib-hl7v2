<?php

namespace Hl7v2\DataType;

use Hl7v2\Validation\StringLengthTrait;

abstract class AbstractDataType implements SimpleDataTypeInterface
{
    use StringLengthTrait;

    const MAX_LEN = null;

    protected $value;

    public function setValue($value)
    {
        $this->checkOwnLength($value);
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    /**
     * Test for a non-null, non-empty string value.
     *
     * @return bool
     */
    public function hasValue()
    {
        return null !== $this->value && '' !== $this->value;
    }

    protected function checkOwnLength($value)
    {
        if (null === static::MAX_LEN) {
            return;
        }
        $this->checkLength(static::MAX_LEN, $value);
    }
}
