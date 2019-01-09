<?php

namespace Hl7v2\Test;

use PHPUnit_Framework_TestCase;

use Hl7v2\AcknowledgementGenerator;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Factory\MessageFactory;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Factory\SegmentGroupFactory;
use Hl7v2\MessageParserBuilder;

use Hl7v2\Test\SampleMessages;

class AcknowledgementGeneratorTest extends PHPUnit_Framework_TestCase
{
    private $datagramBuilder;
    private $dataTypeFac;
    private $messageFac;
    private $messageParser;
    private $segmentFac;

    protected function setUp()
    {
        $this->datagramBuilder = SampleMessages::getDatagramBuilder();

        $this->dataTypeFac = new DataTypeFactory;
        $this->segmentFac = new SegmentFactory($this->dataTypeFac);
        $this->messageFac = new MessageFactory($this->segmentFac, new SegmentGroupFactory);
        $this->messageParser = (new MessageParserBuilder)
            ->withDataTypeFactory($this->dataTypeFac)
            ->withMessageFactory($this->messageFac)
            ->withSegmentFactory($this->segmentFac)
            ->build()
        ;
    }

    public function testAckGenWillPopulateAckMessageHeader()
    {
        $data = $this
            ->datagramBuilder
            ->withMessage('MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||AL|AL||8859/1')
            ->build()
        ;
        $senderConfig = [
            'application' => ['namespaceId' => 'TestApp'],
            'facility' => ['namespaceId' => 'TestFac'],
        ];
        $message = $this->messageParser->parse($data);

        $ackGen = new AcknowledgementGenerator($this->messageFac, $this->segmentFac);

        $ackMessage = $ackGen->generate($message->getMessageHeader(), $senderConfig);

        $this->assertSame(
            'ACK',
            $ackMessage->getMessageHeader()->getFieldMessageType()->getMessageCode()->getValue(),
            'The ACK message has Message Code "ACK".'
        );

        $this->assertSame(
            'TestApp',
            $ackMessage->getMessageHeader()->getFieldSendingApplication()->getNamespaceId()->getValue(),
            'The ACK message has Sending Application Namespace ID "TestApp".'
        );

        $this->assertSame(
            'TestFac',
            $ackMessage->getMessageHeader()->getFieldSendingFacility()->getNamespaceId()->getValue(),
            'The ACK message has Sending Facility Namespace ID "TestFac".'
        );
    }

    /**
     * @dataProvider dataAckCodeProduction
     */
    public function testAckGenWillProduceTheCorrectAckCode($message, $success, $reject, $expectedCode)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($message)
            ->build()
        ;
        $senderConfig = [
            'application' => ['namespaceId' => 'TestApp'],
            'facility' => ['namespaceId' => 'TestFac'],
        ];
        $message = $this->messageParser->parse($data);

        $ackGen = new AcknowledgementGenerator($this->messageFac, $this->segmentFac);

        $ackMessage = $ackGen
            ->generate($message->getMessageHeader(), $senderConfig, $success, $reject)
        ;

        if (is_null($expectedCode)) {
            $this->assertNull(
                $ackMessage,
                'An ACK is not generated, with enhanced rules, according to the wishes of the sender.'
            );
            return;
        }

        $ack = $ackMessage->getSegments()[0];

        $this->assertSame(
            $expectedCode,
            $ack->getFieldAcknowledgmentCode()->getValue(),
            "The MSA segment has Acknowledgment Code \"{$expectedCode}\"."
        );
    }

    public function dataAckCodeProduction()
    {
        return [
            'Orig rule, reject' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1||||||8859/1',
                false, true, 'AR'
            ],
            'Orig rule, fail' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1||||||8859/1',
                false, false, 'AE'
            ],
            'Orig rule, success' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1||||||8859/1',
                true, false, 'AA'
            ],
            'Enhanced rule, ack always, reject' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||AL|||8859/1',
                false, true, 'CR'
            ],
            'Enhanced rule, ack always, fail' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||AL|||8859/1',
                false, false, 'CE'
            ],
            'Enhanced rule, ack always, success' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||AL|||8859/1',
                true, false, 'CA'
            ],
            'Enhanced rule, ack never, reject' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||NE|||8859/1',
                false, true, null
            ],
            'Enhanced rule, ack never, fail' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||NE|||8859/1',
                false, false, null
            ],
            'Enhanced rule, ack never, success' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||NE|||8859/1',
                true, false, null
            ],
            'Enhanced rule, ack on success, reject' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||SU|||8859/1',
                false, true, null
            ],
            'Enhanced rule, ack on success, fail' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||SU|||8859/1',
                false, false, null
            ],
            'Enhanced rule, ack on success, success' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||SU|||8859/1',
                true, false, 'CA'
            ],
            'Enhanced rule, ack on error, reject' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||ER|||8859/1',
                false, true, 'CR'
            ],
            'Enhanced rule, ack on error, fail' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||ER|||8859/1',
                false, false, 'CE'
            ],
            'Enhanced rule, ack on error, success' => [
                'MSH|^~\&|ACME|ACME|TEST|TEST|20160719132745||ORU^R01^ORU_RO1|906|P|2.5.1|||ER|||8859/1',
                true, false, null
            ],
        ];
    }
}
