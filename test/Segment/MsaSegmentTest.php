<?php

namespace Hl7v2\Test\Segment;

use PHPUnit_Framework_TestCase;

use Hl7v2\Encoding\CharacterEncodingNames;
use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\EncodingParametersBuilder;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Factory\DataTypeFactory;

use Hl7v2\Test\DatagramBuilder;

class MsaSegmentTest extends PHPUnit_Framework_TestCase
{
    private $charEncNames;
    private $codec;
    private $paramBuilder;

    protected function setUp()
    {
        $this->paramBuilder = (new EncodingParametersBuilder)
            ->withCharacterEncoding('7bit')
            ->withComponentSep('^')
            ->withEscapeChar('\\')
            ->withFieldSep('|')
            ->withRepetitionSep('~')
            ->withSegmentSep("\r")
            ->withSubcomponentSep('&')
        ;
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

    public function testToString()
    {
        $segmentData = 'MSA|||207|E';

        $encodingParams = $this->paramBuilder->build();
        $datagram = $this
            ->datagramBuilder
            ->withMessage($segmentData . "\r")
            ->build()
        ;
        $datagram->setEncodingParameters($encodingParams);

        /**
         * @var \Hl7v2\Segment\MsaSegment
         */
        $segment = $this
            ->segmentFactory
            ->create('MSA', $encodingParams)
        ;
        $segment->fromDatagram($datagram, $this->codec);

        $this->assertSame(
            $segmentData,
            (string) $segment
        );
    }
}
