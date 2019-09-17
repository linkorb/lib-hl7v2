<?php

namespace Hl7v2;

use DateTime;
use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Factory\MessageFactory;
use Hl7v2\Factory\SegmentFactory;
use Hl7v2\Message\AckMessage;
use Hl7v2\Segment\HeaderSegmentInterface;

class AcknowledgementGenerator
{
    private $messageFactory;
    private $segmentFactory;
    private $suppressTxOfSenderIdTypes;

    public function __construct(
        MessageFactory $messageFactory,
        SegmentFactory $segmentFactory,
        array $suppressTxOfSenderIdTypes = ['G']
    ) {
        $this->messageFactory = $messageFactory;
        $this->segmentFactory = $segmentFactory;
        $this->suppressTxOfSenderIdTypes = $suppressTxOfSenderIdTypes;
    }

    public function generate(
        HeaderSegmentInterface $header,
        array $senderConfig,
        $success = true,
        $reject = false
    ) {
        if ($header->getFieldAcceptAcknowledgmentType()->hasValue()
            || $header->getFieldApplicationAcknowledgmentType()->hasValue()
        ) {
            return $this
                ->generateEnhancedAcceptAcknowledgment($header, $senderConfig, $success, $reject)
            ;
        }

        return $this
            ->generateOriginalAcknowledgment($header, $senderConfig, $success, $reject)
        ;
    }

    public function generateOriginalAcknowledgment(
        HeaderSegmentInterface $header,
        array $senderConfig,
        $success = true,
        $reject = false
    ) {
        $time = new DateTime;

        $message = $this
            ->messageFactory
            ->create($this->buildAckHeader($header, $time, $this->senderConfig($senderConfig)))
        ;

        $ackCode = 'AA';
        if (!$success && !$reject) {
            $ackCode = 'AE';
        } elseif (!$success && $reject) {
            $ackCode = 'AR';
        }
        $messageControlId = 0;
        if ($header->getFieldMessageControlId()) {
            $messageControlId = $header->getFieldMessageControlId()->getValue();
        }

        $message->addSegment(
            $this->buildAck($header->getEncodingParameters(), $ackCode, $messageControlId)
        );

        return $message;
    }

    public function generateEnhancedAcceptAcknowledgment(
        HeaderSegmentInterface $header,
        array $senderConfig,
        $success = true,
        $reject = false
    ) {
        $ackDesirability = null;
        if ($header->getFieldAcceptAcknowledgmentType()->hasValue()) {
            $ackDesirability = strtolower($header->getFieldAcceptAcknowledgmentType()->getValue());
        }

        if (!$ackDesirability
            || 'ne' === $ackDesirability                // never
            || ('er' === $ackDesirability && $success)  // only on error
            || ('su' === $ackDesirability && !$success) // only on success
        ) {
            return;
        }

        $time = new DateTime;

        $message = $this
            ->messageFactory
            ->create($this->buildAckHeader($header, $time, $this->senderConfig($senderConfig)))
        ;

        $ackCode = 'CA';
        if (!$success && !$reject) {
            $ackCode = 'CE';
        } elseif (!$success && $reject) {
            $ackCode = 'CR';
        }
        $messageControlId = 0;
        if ($header->getFieldMessageControlId()) {
            $messageControlId = $header->getFieldMessageControlId()->getValue();
        }

        $message->addSegment(
            $this->buildAck($header->getEncodingParameters(), $ackCode, $messageControlId)
        );

        return $message;
    }

    public function addErrorToAcknowledgment(
        AckMessage $message,
        $errorCode,
        $severity,
        $userMessage = null,
        $diagnosticInfo = null
    ) {
        $message->addSegment(
            $this->buildErr(
                $message->getMessageHeader()->getEncodingParameters(),
                $errorCode,
                ucfirst(substr($severity, 0, 1)),
                $userMessage,
                $diagnosticInfo
            )
        );

        return $message;
    }

    private function buildAckHeader(HeaderSegmentInterface $header, DateTime $time, $senderConfig)
    {
        /**
         * @var \Hl7v2\Segment\HeaderSegmentInterface
         */
        $ackHeader = $this
            ->segmentFactory
            ->create('MSH', $header->getEncodingParameters())
        ;
        $ackHeader->setFieldFieldSeparator(
            $header->getFieldFieldSeparator()->getValue()
        );
        $ackHeader->setFieldEncodingCharacters(
            $header->getFieldEncodingCharacters()->getValue()
        );
        $ackHeader->setFieldSendingApplication(
            $senderConfig['application']['namespaceId'],
            $senderConfig['application']['universalId'],
            $senderConfig['application']['universalIdType']
        );
        $ackHeader->setFieldSendingFacility(
            $senderConfig['facility']['namespaceId'],
            $senderConfig['facility']['universalId'],
            $senderConfig['facility']['universalIdType']
        );
        if ($header->getFieldSendingApplication()) {
            $ns = $this->getValueFromField($header->getFieldSendingApplication()->getNamespaceId());
            $uid = $this->getValueFromField($header->getFieldSendingApplication()->getUniversalId());
            $type = $this->getValueFromField($header->getFieldSendingApplication()->getUniversalIdType());
            if (!in_array($type, $this->suppressTxOfSenderIdTypes)) {
                $ackHeader->setFieldReceivingApplication($ns, $uid, $type);
            } else {
                $ackHeader->setFieldReceivingApplication($ns);
            }
        }
        if ($header->getFieldSendingFacility()) {
            $ns = $this->getValueFromField($header->getFieldSendingFacility()->getNamespaceId());
            $uid = $this->getValueFromField($header->getFieldSendingFacility()->getUniversalId());
            $type = $this->getValueFromField($header->getFieldSendingFacility()->getUniversalIdType());
            if (!in_array($type, $this->suppressTxOfSenderIdTypes)) {
                $ackHeader->setFieldReceivingFacility($ns, $uid, $type);
            } else {
                $ackHeader->setFieldReceivingFacility($ns);
            }
        }
        $ackHeader->setFieldDateTimeOfMessage($time->format('YmdHis'));
        $ackHeader->setFieldMessageType('ACK', $header->getFieldMessageType()->getTriggerEvent(), 'ACK');
        list($ft, $t) = explode(' ', microtime(false));
        $ackHeader->setFieldMessageControlId(substr($t . substr($ft, 2), 0, 20));
        if ($header->getFieldProcessingId()) {
            $ackHeader->setFieldProcessingId(
                $this->getValueFromField($header->getFieldProcessingId()->getProcessingId()),
                $this->getValueFromField($header->getFieldProcessingId()->getProcessingMode())
            );
        }
        if ($header->getFieldVersionId()) {
            $versionIdVersionId = null;
            if ($header->getFieldVersionId()->getVersionId()) {
                $versionIdVersionId = $header->getFieldVersionId()->getVersionId()->getValue();
            }
            $versionIdInternationalisationCodeIdentifier = null;
            $versionIdInternationalisationCodeText = null;
            $versionIdInternationalisationCodeNameOfCodingSystem = null;
            $versionIdInternationalisationCodeAltIdentifier = null;
            $versionIdInternationalisationCodeAltText = null;
            $versionIdInternationalisationCodeNameOfAltCodingSystem = null;
            if ($header->getFieldVersionId()->getInternationalisationCode()) {
                $versionIdInternationalisationCodeIdentifier = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationCode()->getIdentifier()
                    )
                ;
                $versionIdInternationalisationCodeText = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationCode()->getText()
                    )
                ;
                $versionIdInternationalisationCodeNameOfCodingSystem = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationCode()->getNameOfCodingSystem()
                    )
                ;
                $versionIdInternationalisationCodeAltIdentifier = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationCode()->getAltIdentifier()
                    )
                ;
                $versionIdInternationalisationCodeAltText = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationCode()->getAltText()
                    )
                ;
                $versionIdInternationalisationCodeNameOfAltCodingSystem = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationCode()->getNameOfAltCodingSystem()
                    )
                ;
            }
            $versionIdInternationalisationVersionIdIdentifier = null;
            $versionIdInternationalisationVersionIdText = null;
            $versionIdInternationalisationVersionIdNameOfCodingSystem = null;
            $versionIdInternationalisationVersionIdAltIdentifier = null;
            $versionIdInternationalisationVersionIdAltText = null;
            $versionIdInternationalisationVersionIdNameOfAltCodingSystem = null;
            if ($header->getFieldVersionId()->getInternationalisationVersionId()) {
                $versionIdInternationalisationVersionIdIdentifier = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationVersionId()->getIdentifier()
                    )
                ;
                $versionIdInternationalisationVersionIdText = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationVersionId()->getText()
                    )
                ;
                $versionIdInternationalisationVersionIdNameOfCodingSystem = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationVersionId()->getNameOfAltCodingSystem()
                    )
                ;
                $versionIdInternationalisationVersionIdAltIdentifier = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationVersionId()->getAltIdentifier()
                    )
                ;
                $versionIdInternationalisationVersionIdAltText = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationVersionId()->getAltText()
                    )
                ;
                $versionIdInternationalisationVersionIdNameOfAltCodingSystem = $this
                    ->getValueFromField(
                        $header->getFieldVersionId()->getInternationalisationVersionId()->getNameOfAltCodingSystem()
                    )
                ;
            }
            $ackHeader->setFieldVersionId(
                $versionIdVersionId,
                $versionIdInternationalisationCodeIdentifier,
                $versionIdInternationalisationCodeText,
                $versionIdInternationalisationCodeNameOfCodingSystem,
                $versionIdInternationalisationCodeAltIdentifier,
                $versionIdInternationalisationCodeAltText,
                $versionIdInternationalisationCodeNameOfAltCodingSystem,
                $versionIdInternationalisationVersionIdIdentifier,
                $versionIdInternationalisationVersionIdText,
                $versionIdInternationalisationVersionIdNameOfCodingSystem,
                $versionIdInternationalisationVersionIdAltIdentifier,
                $versionIdInternationalisationVersionIdAltText,
                $versionIdInternationalisationVersionIdNameOfAltCodingSystem
            );
        }
        foreach ($header->getFieldCharacterSet() as $repetition) {
            if (!$repetition->hasValue()) {
                continue;
            }
            $ackHeader->addFieldCharacterSet($repetition->getValue());
        }

        return $ackHeader;
    }

    private function buildAck(
        EncodingParameters $encodingParams,
        $ackCode,
        $controlId
    ) {
        /**
         * @var \Hl7v2\Segment\MsaSegment
         */
        $ack = $this
            ->segmentFactory
            ->create('MSA', $encodingParams)
        ;
        $ack->setFieldAcknowledgmentCode($ackCode);
        $ack->setFieldMessageControlId($controlId);

        return $ack;
    }

    private function buildErr(
        EncodingParameters $encodingParams,
        $code,
        $severity,
        $userMessage = null,
        $diagnosticInfo = null
    ) {
        /**
         * @var \Hl7v2\Segment\ErrSegment
         */
        $err = $this
            ->segmentFactory
            ->create('ERR', $encodingParams)
        ;
        $err->setFieldHl7ErrorCode((string) $code);
        $err->setFieldSeverity($severity);
        if ($diagnosticInfo) {
            $err->setFieldDiagnosticInformation($diagnosticInfo);
        }
        if ($userMessage) {
            $err->setFieldUserMessage($userMessage);
        }

        return $err;
    }

    private function getValueFromField($field)
    {
        if (!$field || !$field->hasValue()) {
            return;
        }

        return $field->getValue();
    }

    private function senderConfig($config)
    {
        $c = [
            'application' => [
                'namespaceId' => '',
                'universalId' => '',
                'universalIdType' => '',
            ],
            'facility' => [
                'namespaceId' => '',
                'universalId' => '',
                'universalIdType' => '',
            ],
        ];

        return array_replace_recursive($c, $config);
    }
}
