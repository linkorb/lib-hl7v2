<?php

namespace Hl7v2\Encoding;

/**
 * Build EncodingParameters.
 */
class EncodingParametersBuilder
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

    public function build()
    {
        return new EncodingParameters(
            $this->characterEncoding,
            $this->componentSep,
            $this->escapeChar,
            $this->fieldSep,
            $this->repetitionSep,
            $this->segmentSep,
            $this->subcomponentSep
        );
    }

    /**
     * Set the PHP native name of the character encoding.
     *
     * @param string $characterEncoding
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withCharacterEncoding($characterEncoding)
    {
        $this->characterEncoding = $characterEncoding;
        return $this;
    }

    /**
     * @param string $componentSep
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withComponentSep($componentSep)
    {
        $this->componentSep = $componentSep;
        return $this;
    }

    /**
     * @param string $escapeChar
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withEscapeChar($escapeChar)
    {
        $this->escapeChar = $escapeChar;
        return $this;
    }

    /**
     * @param string $fieldSep
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withFieldSep($fieldSep)
    {
        $this->fieldSep = $fieldSep;
        return $this;
    }

    /**
     * @param string $repetitionSep
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withRepetitionSep($repetitionSep)
    {
        $this->repetitionSep = $repetitionSep;
        return $this;
    }

    /**
     * @param string $subcomponentSep
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withSubcomponentSep($subcomponentSep)
    {
        $this->subcomponentSep = $subcomponentSep;
        return $this;
    }

    /**
     * @param string $segmentSep
     * @return \Hl7v2\Encoding\EncodingParametersBuilder
     */
    public function withSegmentSep($segmentSep)
    {
        $this->segmentSep = $segmentSep;
        return $this;
    }
}
