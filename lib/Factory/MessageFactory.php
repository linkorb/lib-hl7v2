<?php

namespace Hl7v2\Factory;

use Hl7v2\Exception\MessageError;
use Hl7v2\Factory\SegmentGroupFactory;
use Hl7v2\Segment\MshSegment;

class MessageFactory
{
    private $segmentFactory;
    private $segmentGroupFactory;

    public function __construct(
        SegmentFactory $segmentFactory,
        SegmentGroupFactory $segmentGroupFactory
    ) {
        $this->segmentFactory = $segmentFactory;
        $this->segmentGroupFactory = $segmentGroupFactory;
    }

    /**
     * @param \Hl7v2\Segment\MshSegment $messageHeader
     * @return \Hl7v2\Message\MessageInterface
     */
    public function create(MshSegment $messageHeader)
    {
        $messageClass = $this->determineClassname(
            $messageHeader->getFieldMessageType()->getMessageCode()->getValue()
        );
        $message = new $messageClass($this->segmentFactory, $this->segmentGroupFactory);
        $message->setMessageHeader($messageHeader);
        return $message;
    }

    private function determineClassname($typeName)
    {
        $name = ucfirst(strtolower($typeName));
        $class = "\\Hl7v2\\Message\\{$name}Message";
        if (!class_exists($class)) {
            throw new MessageError("Unknown Message Type \"{$typeName}\".");
        }
        return $class;
    }
}
