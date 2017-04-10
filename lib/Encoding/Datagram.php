<?php

namespace Hl7v2\Encoding;

/**
 * A container for an HL7 message datagram.
 *
 * The pos and param properties hold, respectively, the PositionalState and
 * EncodingParameters for use during decoding of the message.
 *
 */
class Datagram
{
    /**
     * @var \Hl7v2\Encoding\PositionalState
     */
    private $pos;
    /**
     * @var \Hl7v2\Encoding\EncodingParameters
     */
    private $param;

    public $value;

    public function __construct($value)
    {
        if (!is_string($value)) {
            throw new Exception('Invalid message data. Expected a string.');
        }

        $this->value = $value;
    }

    /**
     * @return \Hl7v2\Encoding\PositionalState
     */
    public function getPositionalState()
    {
        return $this->pos;
    }

    /**
     * @param \Hl7v2\Encoding\PositionalState $pos
     */
    public function setPositionalState(PositionalState $pos)
    {
        $this->pos = $pos;
    }

    /**
     *
     * @return \Hl7v2\Encoding\EncodingParameters
     */
    public function getEncodingParameters()
    {
        return $this->param;
    }

    /**
     * @param \Hl7v2\Encoding\EncodingParameters $param
     */
    public function setEncodingParameters(EncodingParameters $param)
    {
        $this->param = $param;
    }
}
