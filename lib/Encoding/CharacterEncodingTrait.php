<?php

namespace Hl7v2\Encoding;

/**
 * Trait enabling accessors for a characterEncoding property.
 */
trait CharacterEncodingTrait
{
    /**
     * @var string
     */
    protected $characterEncoding;

    /**
     * @param string $characterEncoding
     */
    public function setCharacterEncoding($characterEncoding)
    {
        $this->characterEncoding = $characterEncoding;
    }

    /**
     * @return string
     */
    public function getCharacterEncoding()
    {
        return $this->characterEncoding;
    }
}
