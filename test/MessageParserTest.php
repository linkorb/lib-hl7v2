<?php

namespace Hl7v2\Test;

use PHPUnit_Framework_TestCase;

use Hl7v2\MessageParserBuilder;

use Hl7v2\Test\SampleMessages;

class MessageParserTest extends PHPUnit_Framework_TestCase
{
    private $datagramBuilder;
    private $messageParser;

    protected function setUp()
    {
        $this->datagramBuilder = SampleMessages::getDatagramBuilder();

        $messageParserBuilder = new MessageParserBuilder;
        $this->messageParser = $messageParserBuilder->build();
    }

    public function testBasicParserUsage()
    {
        $messageParserBuilder = new MessageParserBuilder();
        $message = $this->messageParser->parse($this->datagramBuilder->build());
        $this->assertCount(
            18,
            $message->getSegments(),
            'The message contains the expected number of segments (minus the MSH segment which is treated specially).'
        );
    }
}
