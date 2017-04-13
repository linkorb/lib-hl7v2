<?php

namespace Hl7v2\Validation;

use Hl7v2\Encoding\CharacterEncodingTrait;
use Hl7v2\Encoding\PositionalState;
use Hl7v2\Exception\DataTypeError;
use Hl7v2\Exception\SegmentError;

trait StringLengthTrait
{
    use CharacterEncodingTrait;

    protected function checkLength($maxLength, $value)
    {
        $len = mb_strlen($value, $this->characterEncoding);
        if (false === $len) {
            throw new DataTypeError(
                "The value cannot be checked for length. It is not valid {$this->characterEncoding} encoded."
            );
        }
        if ($maxLength < $len) {
            throw new DataTypeError(
                "The value exceeds the permitted maximum length of {$maxLength} characters."
            );
        }
    }

    protected function checkFieldLength(
        $fieldName,
        $maxLength,
        PositionalState $pos
    ) {
        $len = $pos->eof - $pos->sof;
        if ($maxLength < $len) {
            throw new SegmentError(
                "The length of Field \"{$fieldName}\" ({$len}) exceeds the maximum length of {$maxLength} characters."
            );
        }
    }

    protected function checkRepetitionLength(
        $fieldName,
        $maxLength,
        PositionalState $pos
    ) {
        $len = $pos->eor - $pos->sor;
        if ($maxLength < $len) {
            throw new SegmentError(
                "The length of a repetiton of Field \"{$fieldName}\" ({$len}) exceeds the maximum length of {$maxLength} characters."
            );
        }
    }
}
