<?php

namespace Hl7v2\Test;

use PHPUnit_Framework_TestCase;

use Hl7v2\Encoding\CharacterEncodingNames;
use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Factory\MessageFactory;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Factory\SegmentGroupFactory;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\MessageParser;

use Hl7v2\Test\SampleMessages;
use Hl7v2\Encoding\EncodingParametersBuilder;

class MessageParserTest extends PHPUnit_Framework_TestCase
{
    private $datagram;
    private $datagramBuilder;

    private $charEncNames;
    private $codec;
    private $dataTypeFac;
    private $encParamBuilder;
    private $messageFac;
    private $messageParser;
    private $segmentFac;
    private $segmentGroupFac;

    protected function setUp()
    {
        $this->datagramBuilder = SampleMessages::getDatagramBuilder();

        $this->charEncNames = new CharacterEncodingNames;
        $this->encParamBuilder = new EncodingParametersBuilder;
        $this->codec = new Codec($this->charEncNames);
        $this->dataTypeFac = new DataTypeFactory;
        $this->segmentFac = new SegmentFactory($this->dataTypeFac);
        $this->segmentGroupFac = new SegmentGroupFactory();
        $this->messageFac = new MessageFactory(
            $this->segmentFac,
            $this->segmentGroupFac
        );
        $this->messageParser = new MessageParser(
            $this->codec,
            $this->encParamBuilder,
            $this->messageFac,
            $this->segmentFac
        );
    }

    public function testBasicParserUsage()
    {
        $message = $this->messageParser->parse($this->datagramBuilder->build());
        $this->assertCount(
            18,
            $message->getSegments(),
            'The message contains the expected number of segments (minus the MSH segment which is treated specially).'
        );
    }
}
