<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;

/**
 * Message Acknowledgement (MSA).
 */
class MsaSegment extends AbstractSegment
{
    /**
     * @var IdDataType
     */
    private $acknowledgmentCode;
    /**
     * @var StDataType
     */
    private $messageControlId;
    /**
     * @var StDataType
     */
    private $textMessage = null;
    /**
     * @var NmDataType
     */
    private $expectedSequenceNumber = null;
    private $delayedAcknowledgementType;
    /**
     * @var CeDataType
     */
    private $errorCondition = null;

    /**
     * @param string $value
     */
    public function setFieldAcknowledgmentCode(string $value)
    {
        $this->acknowledgmentCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->acknowledgmentCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldMessageControlId(string $value)
    {
        $this->messageControlId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->messageControlId->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTextMessage(string $value)
    {
        $this->textMessage = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->textMessage->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldExpectedSequenceNumber(string $value)
    {
        $this->expectedSequenceNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->expectedSequenceNumber->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldErrorCondition(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->errorCondition = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->errorCondition->setIdentifier($identifier);
        $this->errorCondition->setText($text);
        $this->errorCondition->setNameOfCodingSystem($nameOfCodingSystem);
        $this->errorCondition->setAltIdentifier($altIdentifier);
        $this->errorCondition->setAltText($altText);
        $this->errorCondition->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldAcknowledgmentCode()
    {
        return $this->acknowledgmentCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldMessageControlId()
    {
        return $this->messageControlId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldTextMessage()
    {
        return $this->textMessage;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldExpectedSequenceNumber()
    {
        return $this->expectedSequenceNumber;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldErrorCondition()
    {
        return $this->errorCondition;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // MSA.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSA Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('AcknowledgmentCode', 2, $datagram->getPositionalState());
        $this->setFieldAcknowledgmentCode($codec->extractComponent($datagram));

        // MSA.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSA Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('MessageControlId', 20, $datagram->getPositionalState());
        $this->setFieldMessageControlId($codec->extractComponent($datagram));

        // MSA.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TextMessage', 80, $datagram->getPositionalState());
        $this->setFieldTextMessage($codec->extractComponent($datagram));

        // MSA.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ExpectedSequenceNumber', 15, $datagram->getPositionalState());
        $this->setFieldExpectedSequenceNumber($codec->extractComponent($datagram));

        // MSA.5 (Skipped)
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }

        // MSA.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ErrorCondition', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldErrorCondition(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'MSA';
        $emptyFieldsSinceLastField = 0;

        if (!$this->getFieldAcknowledgmentCode() || !$this->getFieldAcknowledgmentCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldAcknowledgmentCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldMessageControlId() || !$this->getFieldMessageControlId()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldMessageControlId()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTextMessage() || !$this->getFieldTextMessage()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTextMessage()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldExpectedSequenceNumber() || !$this->getFieldExpectedSequenceNumber()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldExpectedSequenceNumber()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        ++$emptyFieldsSinceLastField; // skip MSA.5

        if (!$this->getFieldErrorCondition()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldErrorCondition();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        return $s;
    }
}
