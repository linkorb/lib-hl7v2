<?php

namespace Hl7v2\Factory;

use Hl7v2\DataType\ComponentDataType;
use Hl7v2\Exception\CapabilityError;
use Hl7v2\Segment\HeaderSegmentInterface;

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
     * @param \Hl7v2\Segment\HeaderSegmentInterface $messageHeader
     *
     * @return \Hl7v2\Message\MessageInterface
     *
     * @throws \Hl7v2\Exception\CapabilityError;
     */
    public function create(HeaderSegmentInterface $messageHeader)
    {
        $messageClass = $this->determineClassname(
            $this->getMessageTypeComponentValue($messageHeader->getFieldMessageType())
        );
        $message = new $messageClass($this->segmentFactory, $this->segmentGroupFactory);
        $message->setMessageHeader($messageHeader);

        return $message;
    }

    private function getMessageTypeComponentValue($field)
    {
        if ($field instanceof ComponentDataType) {
            // e.g. when V251
            return $field->getMessageCode()->getValue();
        }

        // e.g. when v231
        return strtok($field->getValue(), '^');
    }

    private function determineClassname($typeName)
    {
        $name = ucfirst(strtolower($typeName));
        $class = "\\Hl7v2\\Message\\{$name}Message";
        if (!class_exists($class)) {
            throw new CapabilityError("Unable to create a message of type \"{$typeName}\".");
        }

        return $class;
    }
}
