<?php

namespace Hl7v2\Factory;

use Hl7v2\Segment\MshSegment;
use Hl7v2\Exception\MessageError;

class MessageFactory
{
    private $segmentFactory;

    public function __construct(SegmentFactory $segmentFactory)
    {
        $this->segmentFactory = $segmentFactory;
    }

    public function create(MshSegment $messageHeader)
    {
        $messageClass = $this->determineClassname(
            $messageHeader->getFieldMessageType()->getMessageCode()->getValue()
        );
        return new $messageClass($this->segmentFactory);
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
