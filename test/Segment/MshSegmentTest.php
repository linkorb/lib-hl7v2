<?php

namespace Hl7v2\Test\Segment;

use Hl7v2\Encoding\CharacterEncodingNames;
use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\EncodingParametersBuilder;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Test\DatagramBuilder;
use PHPUnit_Framework_TestCase;

class MshSegmentTest extends PHPUnit_Framework_TestCase
{
    private $charEncNames;
    private $codec;
    private $paramBuilder;

    protected function setUp()
    {
        $this->paramBuilder = new EncodingParametersBuilder;
        $this->datagramBuilder = new DatagramBuilder($this->paramBuilder);
        $this->charEncNames = $this
            ->getMockBuilder(CharacterEncodingNames::class)
            ->getMock()
        ;
        $this
            ->charEncNames
            ->method('translateToNativeName')
            ->willReturn('7bit')
        ;
        $this->codec = new Codec($this->charEncNames);
        $this->segmentFactory = new SegmentFactory(new DataTypeFactory());
    }

    public function testFromDatagram()
    {
        $data = $this
            ->datagramBuilder
            ->withMessage(
                "MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|001|P|2.5.1|||AL|AL||ASCII~8859/1~8859/2\r"
            )
            ->build()
        ;
        $this->codec->bootstrap($data, $this->paramBuilder);
        /**
         * @var \Hl7v2\Segment\V251\MshSegment
         */
        $messageHeader = $this
            ->segmentFactory
            ->create('MSH', $data->getEncodingParameters())
        ;
        $messageHeader->fromDatagram($data, $this->codec);

        $this->assertSame(
            '8859/2',
            $messageHeader->getFieldCharacterSet()[2]->getValue()
        );
    }

    public function testToString()
    {
        $segmentData = 'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|001|P|2.5.1|||AL|AL||ASCII~8859/1~8859/2';
        $datagram = $this
            ->datagramBuilder
            ->withMessage($segmentData . "\r")
            ->build()
        ;
        $this->codec->bootstrap($datagram, $this->paramBuilder);
        /**
         * @var \Hl7v2\Segment\V251\MshSegment
         */
        $segment = $this
            ->segmentFactory
            ->create('MSH', $datagram->getEncodingParameters())
        ;
        $segment->fromDatagram($datagram, $this->codec);

        $this->assertSame(
            $segmentData,
            (string) $segment
        );
    }
}
