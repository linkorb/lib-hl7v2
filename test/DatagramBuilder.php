<?php

namespace Hl7v2\Test;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\EncodingParametersBuilder;
use Hl7v2\Encoding\PositionalState;

class DatagramBuilder
{
    private $paramBuilder;

    private $withParams = false;
    private $characterEncoding = '7bit';
    private $componentSep = '^';
    private $escapeChar = '\\';
    private $fieldSep = '|';
    private $repetitionSep = '~';
    private $segmentSep = "\r";
    private $subcomponentSep = '&';

    private $messageData = '';

    public function __construct(EncodingParametersBuilder $paramBuilder)
    {
        $this->paramBuilder = $paramBuilder;
    }

    public function build()
    {
        $d = new Datagram($this->messageData);
        $d->setPositionalState(new PositionalState);
        if ($this->withParams) {
            $d->setEncodingParameters(
                $this->paramBuilder
                    ->withCharacterEncoding($this->characterEncoding)
                    ->withComponentSep($this->componentSep)
                    ->withEscapeChar($this->escapeChar)
                    ->withFieldSep($this->fieldSep)
                    ->withRepetitionSep($this->repetitionSep)
                    ->withSegmentSep($this->segmentSep)
                    ->withSubcomponentSep($this->subcomponentSep)
                    ->build()
            );
        }
        return $d;
    }

    public function withMessage($messageData)
    {
        $this->messageData = $messageData;
        return $this;
    }

    public function withParams()
    {
        $this->withParams = true;
        return $this;
    }
}
