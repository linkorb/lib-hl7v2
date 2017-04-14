<?php

namespace Hl7v2;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\CapabilityError;
use Hl7v2\Exception\CodecError;
use Hl7v2\Exception\MessageError;
use Hl7v2\Exception\ParseError;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Factory\MessageFactory;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Encoding\EncodingParametersBuilder;

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
        // Fail if the message does not begin with an MSH Segment
        $pos = $messageData->getPositionalState();
        if (self::SEGID_MSH !== substr($messageData->value, $pos->ptr, 3)) {
            $looksValid = preg_match('/^[A-Z]{3,3}$/', substr($messageData->value, $pos->ptr, 3));
            if ($looksValid) {
                throw new CapabilityError(
                    "Unable to parse a Datagram which does not begin with \"{self::SEGID_MSH}\"."
                );
            } else {
                throw new ParseError(
                    "Expected the Datagram to begin with \"{self::SEGID_MSH}\"."
                );
            }
        }

        // Get the EncodingParameters from the MSH
        try {
            $this->codec->bootstrap($messageData, $this->encParamBuilder);
        } catch (CodecError $e) {
            throw new ParseError(
                'Unable to detect message Encoding Parameters.',
                null,
                $e
            );
        }

        // Decode MSH
        try {
            $messageHeader = $this
                ->segmentFactory
                ->create(
                    self::SEGID_MSH,
                    $messageData->getEncodingParameters()->getCharacterEncoding()
                )
            ;
            $messageHeader->fromDatagram($messageData, $this->codec);
        } catch (SegmentError $e) {
            throw new ParseError(
                'Unable to decode Message Header (MSH) Segment.',
                null,
                $e
            );
        }

        // Create the appropriate type of message
        try {
            $message = $this->messageFactory->create($messageHeader);
            $message->setMessageHeader($messageHeader);
        } catch (MessageError $e) {
            throw new ParseError(
                'Unable to create a Message of the appropriate type.',
                null,
                $e
            );
        }

        // Decode message
        try {
            $message->fromDatagram($messageData, $this->codec);
        } catch (MessageError $e) {
            throw new ParseError(
                'Unable to decode Message.',
                null,
                $e
            );
        }

        return $message;
    }
}
