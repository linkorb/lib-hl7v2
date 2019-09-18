<?php

namespace Hl7v2\Segment\V251;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractHeaderSegment;

/**
 * Message Header (MSH).
 */
class MshSegment extends AbstractHeaderSegment
{
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $fieldSeparator;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $encodingCharacters;
    /**
     * @var \Hl7v2\DataType\V251\HdDataType
     */
    private $sendingApplication = null;
    /**
     * @var \Hl7v2\DataType\V251\HdDataType
     */
    private $sendingFacility = null;
    /**
     * @var \Hl7v2\DataType\V251\HdDataType
     */
    private $receivingApplication = null;
    /**
     * @var \Hl7v2\DataType\V251\HdDataType
     */
    private $receivingFacility = null;
    /**
     * @var \Hl7v2\DataType\V251\TsDataType
     */
    private $dateTimeOfMessage;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $security = null;
    /**
     * @var \Hl7v2\DataType\V251\MsgDataType
     */
    private $messageType;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $messageControlId;
    /**
     * @var \Hl7v2\DataType\V251\PtDataType
     */
    private $processingId;
    /**
     * @var \Hl7v2\DataType\V251\VidDataType
     */
    private $versionId;
    /**
     * @var \Hl7v2\DataType\V251\NmDataType
     */
    private $sequenceNumber = null;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $continuationPointer = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $acceptAcknowledgmentType = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $applicationAcknowledgmentType = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $countryCode = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType[]
     */
    private $characterSet = [];
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $principalLanguageOfMessage = null;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $altCharacterSetHandlingScheme = null;
    /**
     * @var \Hl7v2\DataType\V251\EiDataType[]
     */
    private $messageProfileIdentifier = [];

    /**
     * @param string $value
     */
    public function setFieldFieldSeparator(string $value)
    {
        $this->fieldSeparator = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->fieldSeparator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldEncodingCharacters(string $value)
    {
        $this->encodingCharacters = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->encodingCharacters->setValue($value);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldSendingApplication(
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->sendingApplication = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->sendingApplication->setNamespaceId($namespaceId);
        $this->sendingApplication->setUniversalId($universalId);
        $this->sendingApplication->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldSendingFacility(
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->sendingFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->sendingFacility->setNamespaceId($namespaceId);
        $this->sendingFacility->setUniversalId($universalId);
        $this->sendingFacility->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldReceivingApplication(
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->receivingApplication = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->receivingApplication->setNamespaceId($namespaceId);
        $this->receivingApplication->setUniversalId($universalId);
        $this->receivingApplication->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldReceivingFacility(
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $this->receivingFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters)
        ;
        $this->receivingFacility->setNamespaceId($namespaceId);
        $this->receivingFacility->setUniversalId($universalId);
        $this->receivingFacility->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDateTimeOfMessage(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->dateTimeOfMessage = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->dateTimeOfMessage->setTime($time);
        $this->dateTimeOfMessage->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldSecurity(string $value)
    {
        $this->security = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->security->setValue($value);
    }

    /**
     * @param string $messageCode
     * @param string $triggerEvent
     * @param string $messageStructure
     */
    public function setFieldMessageType(
        string $messageCode = null,
        string $triggerEvent = null,
        string $messageStructure = null
    ) {
        $this->messageType = $this
            ->dataTypeFactory
            ->create('MSG', $this->encodingParameters)
        ;
        $this->messageType->setMessageCode($messageCode);
        $this->messageType->setTriggerEvent($triggerEvent);
        $this->messageType->setMessageStructure($messageStructure);
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
     * @param string $processingId
     * @param string $processingMode
     */
    public function setFieldProcessingId(
        string $processingId = null,
        string $processingMode = null
    ) {
        $this->processingId = $this
            ->dataTypeFactory
            ->create('PT', $this->encodingParameters)
        ;
        $this->processingId->setProcessingId($processingId);
        $this->processingId->setProcessingMode($processingMode);
    }

    /**
     * @param string $versionId
     * @param string $internationalisationCodeIdentifier
     * @param string $internationalisationCodeText
     * @param string $internationalisationCodeNameOfCodingSystem
     * @param string $internationalisationCodeAltIdentifier
     * @param string $internationalisationCodeAltText
     * @param string $internationalisationCodeNameOfAltCodingSystem
     * @param string $internationalisationVersionIdIdentifier
     * @param string $internationalisationVersionIdText
     * @param string $internationalisationVersionIdNameOfCodingSystem
     * @param string $internationalisationVersionIdAltIdentifier
     * @param string $internationalisationVersionIdAltText
     * @param string $internationalisationVersionIdNameOfAltCodingSystem
     */
    public function setFieldVersionId(
        string $versionId = null,
        string $internationalisationCodeIdentifier = null,
        string $internationalisationCodeText = null,
        string $internationalisationCodeNameOfCodingSystem = null,
        string $internationalisationCodeAltIdentifier = null,
        string $internationalisationCodeAltText = null,
        string $internationalisationCodeNameOfAltCodingSystem = null,
        string $internationalisationVersionIdIdentifier = null,
        string $internationalisationVersionIdText = null,
        string $internationalisationVersionIdNameOfCodingSystem = null,
        string $internationalisationVersionIdAltIdentifier = null,
        string $internationalisationVersionIdAltText = null,
        string $internationalisationVersionIdNameOfAltCodingSystem = null
    ) {
        $this->versionId = $this
            ->dataTypeFactory
            ->create('VID', $this->encodingParameters)
        ;
        $this->versionId->setVersionId($versionId);
        $this->versionId->setInternationalisationCode(
            $internationalisationCodeIdentifier,
            $internationalisationCodeText,
            $internationalisationCodeNameOfCodingSystem,
            $internationalisationCodeAltIdentifier,
            $internationalisationCodeAltText,
            $internationalisationCodeNameOfAltCodingSystem
        );
        $this->versionId->setInternationalisationVersionId(
            $internationalisationVersionIdIdentifier,
            $internationalisationVersionIdText,
            $internationalisationVersionIdNameOfCodingSystem,
            $internationalisationVersionIdAltIdentifier,
            $internationalisationVersionIdAltText,
            $internationalisationVersionIdNameOfAltCodingSystem
        );
    }

    /**
     * @param string $value
     */
    public function setFieldSequenceNumber(string $value)
    {
        $this->sequenceNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->sequenceNumber->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldContinuationPointer(string $value)
    {
        $this->continuationPointer = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->continuationPointer->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAcceptAcknowledgmentType(string $value)
    {
        $this->acceptAcknowledgmentType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->acceptAcknowledgmentType->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldApplicationAcknowledgmentType(string $value)
    {
        $this->applicationAcknowledgmentType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->applicationAcknowledgmentType->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCountryCode(string $value)
    {
        $this->countryCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->countryCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldCharacterSet(string $value)
    {
        $characterSet = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $characterSet->setValue($value);
        $this->characterSet[] = $characterSet;
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldPrincipalLanguageOfMessage(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->principalLanguageOfMessage = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->principalLanguageOfMessage->setIdentifier($identifier);
        $this->principalLanguageOfMessage->setText($text);
        $this->principalLanguageOfMessage->setNameOfCodingSystem($nameOfCodingSystem);
        $this->principalLanguageOfMessage->setAltIdentifier($altIdentifier);
        $this->principalLanguageOfMessage->setAltText($altText);
        $this->principalLanguageOfMessage->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldAltCharacterSetHandlingScheme(string $value)
    {
        $this->altCharacterSetHandlingScheme = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->altCharacterSetHandlingScheme->setValue($value);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function addFieldMessageProfileIdentifier(
        string $entityIdentifier = null,
        string $namespaceId = null,
        string $universalId = null,
        string $universalIdType = null
    ) {
        $messageProfileIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters)
        ;
        $this->messageProfileIdentifier[] = $messageProfileIdentifier;
        $messageProfileIdentifier->setEntityIdentifier($entityIdentifier);
        $messageProfileIdentifier->setNamespaceId($namespaceId);
        $messageProfileIdentifier->setUniversalId($universalId);
        $messageProfileIdentifier->setUniversalIdType($universalIdType);
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldFieldSeparator()
    {
        return $this->fieldSeparator;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldEncodingCharacters()
    {
        return $this->encodingCharacters;
    }

    /**
     * @return \Hl7v2\DataType\V251\HdDataType
     */
    public function getFieldSendingApplication()
    {
        return $this->sendingApplication;
    }

    /**
     * @return \Hl7v2\DataType\V251\HdDataType
     */
    public function getFieldSendingFacility()
    {
        return $this->sendingFacility;
    }

    /**
     * @return \Hl7v2\DataType\V251\HdDataType
     */
    public function getFieldReceivingApplication()
    {
        return $this->receivingApplication;
    }

    /**
     * @return \Hl7v2\DataType\V251\HdDataType
     */
    public function getFieldReceivingFacility()
    {
        return $this->receivingFacility;
    }

    /**
     * @return \Hl7v2\DataType\V251\TsDataType
     */
    public function getFieldDateTimeOfMessage()
    {
        return $this->dateTimeOfMessage;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldSecurity()
    {
        return $this->security;
    }

    /**
     * @return \Hl7v2\DataType\V251\MsgDataType
     */
    public function getFieldMessageType()
    {
        return $this->messageType;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldMessageControlId()
    {
        return $this->messageControlId;
    }

    /**
     * @return \Hl7v2\DataType\V251\PtDataType
     */
    public function getFieldProcessingId()
    {
        return $this->processingId;
    }

    /**
     * @return \Hl7v2\DataType\V251\VidDataType
     */
    public function getFieldVersionId()
    {
        return $this->versionId;
    }

    /**
     * @return \Hl7v2\DataType\V251\NmDataType
     */
    public function getFieldSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFieldContinuationPointer()
    {
        return $this->continuationPointer;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldAcceptAcknowledgmentType()
    {
        return $this->acceptAcknowledgmentType;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldApplicationAcknowledgmentType()
    {
        return $this->applicationAcknowledgmentType;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType[]
     */
    public function getFieldCharacterSet()
    {
        return $this->characterSet;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getFieldPrincipalLanguageOfMessage()
    {
        return $this->principalLanguageOfMessage;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFieldAltCharacterSetHandlingScheme()
    {
        return $this->altCharacterSetHandlingScheme;
    }

    /**
     * @return \Hl7v2\DataType\V251\EiDataType[]
     */
    public function getFieldMessageProfileIdentifier()
    {
        return $this->messageProfileIdentifier;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // MSH.1
        $encodingParams = $datagram->getEncodingParameters();
        $this->setFieldFieldSeparator($encodingParams->getFieldSep());

        // MSH.2
        $codec->advanceToField($datagram);
        $this->setFieldEncodingCharacters(
            $encodingParams->getComponentSep()
            . $encodingParams->getRepetitionSep()
            . $encodingParams->getEscapeChar()
            . $encodingParams->getSubcomponentSep()
        );

        // MSH.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SendingApplication', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSendingApplication(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SendingFacility', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSendingFacility(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.5
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ReceivingApplication', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldReceivingApplication(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.6
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ReceivingFacility', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldReceivingFacility(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.7
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('DateTimeOfMessage', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDateTimeOfMessage(
            $time,
            $degreeOfPrecision
        );

        // MSH.8
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Security', 40, $datagram->getPositionalState());
        $this->setFieldSecurity($codec->extractComponent($datagram));

        // MSH.9
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('MessageType', 15, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $messageCode,
            $triggerEvent,
            $messageStructure,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldMessageType(
            $messageCode,
            $triggerEvent,
            $messageStructure
        );

        // MSH.10
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('MessageControlId', 20, $datagram->getPositionalState());
        $this->setFieldMessageControlId($codec->extractComponent($datagram));

        // MSH.11
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ProcessingId', 3, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $processingId,
            $processingMode,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldProcessingId(
            $processingId,
            $processingMode
        );

        // MSH.12
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('VersionId', 60, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1,1],[1,1,1,1,1,1]];
        list(
            $versionId,
            list(
                $internationalisationCodeIdentifier,
                $internationalisationCodeText,
                $internationalisationCodeNameOfCodingSystem,
                $internationalisationCodeAltIdentifier,
                $internationalisationCodeAltText,
                $internationalisationCodeNameOfAltCodingSystem,
            ),
            list(
                $internationalisationVersionIdIdentifier,
                $internationalisationVersionIdText,
                $internationalisationVersionIdNameOfCodingSystem,
                $internationalisationVersionIdAltIdentifier,
                $internationalisationVersionIdAltText,
                $internationalisationVersionIdNameOfAltCodingSystem,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVersionId(
            $versionId,
            $internationalisationCodeIdentifier,
            $internationalisationCodeText,
            $internationalisationCodeNameOfCodingSystem,
            $internationalisationCodeAltIdentifier,
            $internationalisationCodeAltText,
            $internationalisationCodeNameOfAltCodingSystem,
            $internationalisationVersionIdIdentifier,
            $internationalisationVersionIdText,
            $internationalisationVersionIdNameOfCodingSystem,
            $internationalisationVersionIdAltIdentifier,
            $internationalisationVersionIdAltText,
            $internationalisationVersionIdNameOfAltCodingSystem
        );

        // MSH.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SequenceNumber', 15, $datagram->getPositionalState());
        $this->setFieldSequenceNumber($codec->extractComponent($datagram));

        // MSH.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ContinuationPointer', 180, $datagram->getPositionalState());
        $this->setFieldContinuationPointer($codec->extractComponent($datagram));

        // MSH.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AcceptAcknowledgmentType', 2, $datagram->getPositionalState());
        $this->setFieldAcceptAcknowledgmentType($codec->extractComponent($datagram));

        // MSH.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ApplicationAcknowledgmentType', 2, $datagram->getPositionalState());
        $this->setFieldApplicationAcknowledgmentType($codec->extractComponent($datagram));

        // MSH.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CountryCode', 3, $datagram->getPositionalState());
        $this->setFieldCountryCode($codec->extractComponent($datagram));

        // MSH.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CharacterSet', 16, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldCharacterSet($value);
        }

        // MSH.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PrincipalLanguageOfMessage', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPrincipalLanguageOfMessage(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // MSH.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AltCharacterSetHandlingScheme', 20, $datagram->getPositionalState());
        $this->setFieldAltCharacterSetHandlingScheme($codec->extractComponent($datagram));

        // MSH.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('MessageProfileIdentifier', 427, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType,
            ) = $components;
            $this->addFieldMessageProfileIdentifier(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType
            );
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'MSH' . (string) $this->getFieldFieldSeparator()->getValue();
        $emptyFieldsSinceLastField = -1;

        if (!$this->getFieldEncodingCharacters() || !$this->getFieldEncodingCharacters()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldEncodingCharacters()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldSendingApplication()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldSendingApplication();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldSendingFacility()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldSendingFacility();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldReceivingApplication()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldReceivingApplication();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldReceivingFacility()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldReceivingFacility();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldDateTimeOfMessage()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDateTimeOfMessage();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldSecurity() || !$this->getFieldSecurity()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSecurity()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldMessageType()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldMessageType();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
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

        if (!$this->getFieldProcessingId()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldProcessingId();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldVersionId()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldVersionId();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldSequenceNumber() || !$this->getFieldSequenceNumber()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSequenceNumber()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldContinuationPointer() || !$this->getFieldContinuationPointer()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldContinuationPointer()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldAcceptAcknowledgmentType() || !$this->getFieldAcceptAcknowledgmentType()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldAcceptAcknowledgmentType()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldApplicationAcknowledgmentType() || !$this->getFieldApplicationAcknowledgmentType()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldApplicationAcknowledgmentType()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldCountryCode() || !$this->getFieldCountryCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldCountryCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldCharacterSet())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldCharacterSet() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldPrincipalLanguageOfMessage()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPrincipalLanguageOfMessage();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldAltCharacterSetHandlingScheme() || !$this->getFieldAltCharacterSetHandlingScheme()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldAltCharacterSetHandlingScheme()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldMessageProfileIdentifier())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldMessageProfileIdentifier() as $repetition) {
                $value = (string) $repetition;
                if ('' === $value) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        return $s;
    }
}
