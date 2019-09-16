<?php

namespace Hl7v2\Message\Builder\V231;

use Hl7v2\Factory\MessageFactory;
use Hl7v2\Segment\V231\EvnSegment;
use Hl7v2\Segment\V231\MshSegment;
use Hl7v2\Segment\V231\PidSegment;
use Hl7v2\Segment\V231\Pv1Segment;

class AdtMessageBuilder
{
    protected $evnSegment;
    protected $messageFactory;
    protected $messageHeader;
    protected $pidSegment;
    protected $pv1Segment;

    public function __construct(MessageFactory $messageFactory)
    {
        $this->messageFactory = $messageFactory;
    }

    public function build()
    {
        if (null === $this->messageHeader) {
            \UnexpectedValueException('A "messageHeader" is required to build an ADT message.  Try calling: withMessageHeader(MshSegment $messageHeader).');
        }
        if (null === $this->evnSegment) {
            \UnexpectedValueException('An "evnSegment" is required to build an ADT message.  Try calling: withEvnSegment(EvnSegment $evnSegment).');
        }
        if (null === $this->pidSegment) {
            \UnexpectedValueException('A "pidSegment" is required to build an ADT message.  Try calling: withPidSegment(PidSegment $pidSegment).');
        }
        if (null === $this->pv1Segment) {
            \UnexpectedValueException('A "pv1Segment" is required to build an ADT message.  Try calling: withPv1Segment(Pv1Segment $pv1Segment).');
        }

        $message = $this->messageFactory->create($this->messageHeader);

        $message->addSegment($this->evnSegment);
        $message->addSegment($this->pidSegment);
        $message->addSegment($this->pv1Segment);

        return $message;
    }

    public function withMessageHeader(MshSegment $messageHeader)
    {
        $this->messageHeader = $messageHeader;

        return $this;
    }

    public function withEvnSegment(EvnSegment $evnSegment)
    {
        $this->evnSegment = $evnSegment;

        return $this;
    }

    public function withPidSegment(PidSegment $pidSegment)
    {
        $this->pidSegment = $pidSegment;

        return $this;
    }

    public function withPv1Segment(Pv1Segment $pv1Segment)
    {
        $this->pv1Segment = $pv1Segment;

        return $this;
    }
}
