<?php

namespace Hl7v2;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\EncodingParametersBuilder;
use Hl7v2\Exception\CapabilityError;
use Hl7v2\Exception\CodecError;
use Hl7v2\Exception\DiagnosticInterface;
use Hl7v2\Exception\MessageError;
use Hl7v2\Exception\MessageHeaderParseError;
use Hl7v2\Exception\MessageParseError;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Factory\MessageFactory;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Segment\MshSegment;

class MessageParser
{
    const SEGID_MSH = 'MSH';

    private $codec;
    private $encParamBuilder;
    private $messageFactory;
    private $segmentFactory;

    public function __construct(
        Codec $codec,
        EncodingParametersBuilder $encParamBuilder,
        MessageFactory $messageFactory,
        SegmentFactory $segmentFactory
    ) {
        $this->codec = $codec;
        $this->encParamBuilder = $encParamBuilder;
        $this->messageFactory = $messageFactory;
        $this->segmentFactory = $segmentFactory;
    }

    public function parse(Datagram $messageData)
    {
        $messageHeader = $this->parseMessageHeader($messageData);
        return $this->parseMessageContent($messageData, $messageHeader);
    }

    public function parseMessageHeader(Datagram $messageData)
    {
        // Fail if the message does not begin with an MSH Segment
        $pos = $messageData->getPositionalState();
        if (self::SEGID_MSH !== substr($messageData->value, $pos->ptr, 3)) {
            throw new MessageHeaderParseError(
                "Expected the Datagram to begin with \"{self::SEGID_MSH}\".",
                DiagnosticInterface::ESEGMENT,
                null,
                DiagnosticInterface::ERROR,
                'The message did not begin with a valid Message Header (MSH).'
            );
        }

        // Get the EncodingParameters from the MSH
        try {
            $this->codec->bootstrap($messageData, $this->encParamBuilder);
        } catch (CodecError $e) {
            throw new MessageHeaderParseError(
                'Unable to detect message Encoding Parameters.',
                DiagnosticInterface::ESEGMENT,
                $e,
                DiagnosticInterface::ERROR,
                $e->getMessage()
            );
        }


        try {
            $messageHeader = $this
                ->segmentFactory
                ->create(self::SEGID_MSH, $messageData->getEncodingParameters())
            ;
        } catch (CapabilityError $e) {
            // well, this is embarrasing: creating an MSH should never go badly!
            throw new MessageHeaderParseError(
                $e->getMessage(),
                DiagnosticInterface::EAPPINTERNAL,
                $e,
                DiagnosticInterface::ERROR
            );
        }
        // Decode MSH
        try {
            $messageHeader->fromDatagram($messageData, $this->codec);
        } catch (SegmentError $e) {
            throw new MessageHeaderParseError(
                'Unable to decode Message Header (MSH) Segment.',
                DiagnosticInterface::ESEGMENT,
                $e,
                DiagnosticInterface::ERROR,
                $e->getMessage()
            );
        }

        return $messageHeader;
    }

    public function parseMessageContent(Datagram $messageData, MshSegment $messageHeader)
    {
        // Create the appropriate type of message
        $message = null;
        try {
            $message = $this->messageFactory->create($messageHeader);
        } catch (CapabilityError $e) {
            throw new MessageParseError(
                $e->getMessage(),
                DiagnosticInterface::EAPPINTERNAL,
                $e,
                DiagnosticInterface::ERROR,
                $e->getMessage()
            );
        }

        // Decode message
        try {
            $message->fromDatagram($messageData, $this->codec);
        } catch (MessageError $e) {
            throw new MessageParseError(
                'Unable to decode Message.',
                DiagnosticInterface::EAPPINTERNAL,
                $e,
                DiagnosticInterface::ERROR,
                $e->getMessage()
            );
        }

        return $message;
    }
}
