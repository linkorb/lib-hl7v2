<?php

namespace Hl7v2\Encoding;

use Hl7v2\Exception\CodecError;

/**
 * The characters used to encode an HL7 message.
 */
class EncodingParameters
{
    /**
     * The PHP native name for the character encoding.
     *
     * @var string
     */
    private $characterEncoding;
    /**
     * The Component Separator.
     *
     * @var string
     */
    private $componentSep;
    /**
     * The Escape Character.
     *
     * @var string
     */
    private $escapeChar;
    /**
     * The Field Separator.
     *
     * @var string
     */
    private $fieldSep;
    /**
     * The Repetition Separator.
     *
     * @var string
     */
    private $repetitionSep;
    /**
     * The Segment Separator.
     *
     * This does not vary as may other encoding characters.
     *
     * @var string
     */
    private $segmentSep;
    /**
     * The Sub-Component Separator.
     *
     * @var string
     */
    private $subcomponentSep;

    /**
     * @param string $characterEncoding
     * @param string $componentSep
     * @param string $escapeChar
     * @param string $fieldSep
     * @param string $repetitionSep
     * @param string $segmentSep
     * @param string $subcomponentSep
     * @throws CodecError
     */
    public function __construct(
        $characterEncoding,
        $componentSep,
        $escapeChar,
        $fieldSep,
        $repetitionSep,
        $segmentSep,
        $subcomponentSep
    ) {
        if (empty($characterEncoding)
            || empty($componentSep)
            || empty($escapeChar)
            || empty($fieldSep)
            || empty($repetitionSep)
            || empty($segmentSep)
            || empty($subcomponentSep)
        ) {
            throw new CodecError('Expected a value for every Encoding parameter.');
        }

        $this->characterEncoding = $characterEncoding;
        $this->componentSep = $componentSep;
        $this->escapeChar = $escapeChar;
        $this->fieldSep = $fieldSep;
        $this->repetitionSep = $repetitionSep;
        $this->segmentSep = $segmentSep;
        $this->subcomponentSep = $subcomponentSep;
    }

    /**
     * Get the PHP native name of the character encoding.
     *
     * @return string
     */
    public function getCharacterEncoding()
    {
        return $this->characterEncoding;
    }

    /**
     * @return string
     */
    public function getComponentSep()
    {
        return $this->componentSep;
    }

    /**
     * @return string
     */
    public function getEscapeChar()
    {
        return $this->escapeChar;
    }

    /**
     * @return string
     */
    public function getFieldSep()
    {
        return $this->fieldSep;
    }

    /**
     * @return string
     */
    public function getRepetitionSep()
    {
        return $this->repetitionSep;
    }

    /**
     * @return string
     */
    public function getSubcomponentSep()
    {
        return $this->subcomponentSep;
    }

    /**
     * @return string
     */
    public function getSegmentSep()
    {
        return $this->segmentSep;
    }
}
