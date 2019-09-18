<?php

namespace Hl7v2\Test;

use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Factory\MessageFactory;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Factory\SegmentGroupFactory;
use Hl7v2\Message\Builder\V231\AdtMessageBuilder;
use PHPUnit_Framework_TestCase;

class AdtMessageToStringTest extends PHPUnit_Framework_TestCase
{
    private $encodingParams;
    private $messageBuilder;
    private $segmentFactory;

    protected function setUp()
    {
        $this->encodingParams = new EncodingParameters('utf-8', '^', '\\', '|', '~', "\r", '&');
        $this->segmentFactory = new SegmentFactory(new DataTypeFactory('v231'), 'v231');
        $this->messageBuilder = new AdtMessageBuilder(
            new MessageFactory(
                $this->segmentFactory,
                new SegmentGroupFactory()
            )
        );
    }

    public function testMinimalAdtIsCorrectlyConvertedToAString()
    {
        $time = new \DateTime('2020-01-01T00:00:00+0000');
        /**
         * @var \Hl7v2\Segment\MshSegment $msh
         */
        $msh = $this->buildMessageHeader($this->encodingParams, $time);
        $msh->setFieldMessageType('ADT^A28^ADT_A01');

        $message = $this->messageBuilder
            ->withMessageHeader($msh)
            ->withEvnSegment($this->buildEvnSegment($this->encodingParams, $time))
            ->withPidSegment($this->segmentFactory->create('PID', $this->encodingParams))
            ->withPv1Segment($this->segmentFactory->create('PV1', $this->encodingParams))
            ->build()
        ;

        $this->assertSame(
            'MSH|^~\\&|SA|SF|RA|RF|20200101000000||ADT^A28^ADT_A01|123|P|2.3.1'
                . "\r"
                . 'EVN||20200101000000'
                . "\r"
                . 'PID'
                . "\r"
                . 'PV1',
            (string) $message
        );
    }

    /**
     * Build a minimal message header segment.
     *
     * MSH|^~\&|SA|SF|RA|RF|{$time}||{no-value-for-message-type}|123|P|2.5.1
     *
     * @param EncodingParameters $encodingParameters
     * @param \DateTime $time
     *
     * @return \Hl7v2\Segment\HeaderSegmentInterface
     */
    private function buildMessageHeader(EncodingParameters $encodingParameters, \DateTime $time)
    {
        /**
         * @var \Hl7v2\Segment\MshSegment
         */
        $header = $this
            ->segmentFactory
            ->create('MSH', $encodingParameters)
        ;
        $header->setFieldFieldSeparator($encodingParameters->getFieldSep());
        $header->setFieldEncodingCharacters($encodingParameters->getEncodingCharacters());
        $header->setFieldSendingApplication('SA');
        $header->setFieldSendingFacility('SF');
        $header->setFieldReceivingApplication('RA');
        $header->setFieldReceivingFacility('RF');
        $header->setFieldDateTimeOfMessage($time->format('YmdHis'));
        $header->setFieldMessageControlId('123');
        $header->setFieldProcessingId('P');
        $header->setFieldVersionId('2.3.1');

        return $header;
    }

    /**
     * Build a minimal EVN Segment.
     *
     * EVN||{time}
     *
     * @param EncodingParameters $encodingParameters
     * @param \DateTime $time
     *
     * @return \Hl7v2\Segment\SegmentInterface
     */
    private function buildEvnSegment(EncodingParameters $encodingParameters, \DateTime $time)
    {
        /**
         * @var \Hl7v2\Segment\EvnSegment
         */
        $segment = $this
            ->segmentFactory
            ->create('EVN', $encodingParameters)
        ;
        $segment->setFieldRecordedDatetime($time->format('YmdHis'));

        return $segment;
    }
}
