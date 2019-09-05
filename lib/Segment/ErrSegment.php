<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;

/**
 * Error (ERR).
 */
class ErrSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\EldDataType[]
     */
    private $errorCodeAndLocation = [];
    /**
     * @var \Hl7v2\DataType\ErlDataType[]
     */
    private $errorLocation = [];
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $hl7ErrorCode;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $severity;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $applicationErrorCode = null;
    /**
     * @var \Hl7v2\DataType\StDataType[]
     */
    private $applicationErrorParameter = [];
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    private $diagnosticInformation = null;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    private $userMessage = null;
    /**
     * @var \Hl7v2\DataType\IsDataType[]
     */
    private $informPersonIndicator = [];
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $overrideType = null;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    private $overrideReasonCode = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    private $helpDeskContactPoint = [];

    /**
     * @param string $segmentId
     * @param string $segmentSequence
     * @param string $fieldPosition
     * @param string $codeIdentifyingErrorIdentifier
     * @param string $codeIdentifyingErrorText
     * @param string $codeIdentifyingErrorNameOfCodingSystem
     * @param string $codeIdentifyingErrorAltIdentifier
     * @param string $codeIdentifyingErrorAltText
     * @param string $codeIdentifyingErrorNameOfAltCodingSystem
     */
    public function addFieldErrorCodeAndLocation(
        string $segmentId = null,
        string $segmentSequence = null,
        string $fieldPosition = null,
        string $codeIdentifyingErrorIdentifier = null,
        string $codeIdentifyingErrorText = null,
        string $codeIdentifyingErrorNameOfCodingSystem = null,
        string $codeIdentifyingErrorAltIdentifier = null,
        string $codeIdentifyingErrorAltText = null,
        string $codeIdentifyingErrorNameOfAltCodingSystem = null
    ) {
        $errorCodeAndLocation = $this
            ->dataTypeFactory
            ->create('ELD', $this->encodingParameters)
        ;
        $this->errorCodeAndLocation[] = $errorCodeAndLocation;
        $errorCodeAndLocation->setSegmentId($segmentId);
        $errorCodeAndLocation->setSegmentSequence($segmentSequence);
        $errorCodeAndLocation->setFieldPosition($fieldPosition);
        $errorCodeAndLocation->setCodeIdentifyingError(
            $codeIdentifyingErrorIdentifier,
            $codeIdentifyingErrorText,
            $codeIdentifyingErrorNameOfCodingSystem,
            $codeIdentifyingErrorAltIdentifier,
            $codeIdentifyingErrorAltText,
            $codeIdentifyingErrorNameOfAltCodingSystem
        );
    }

    /**
     * @param string $segmentId
     * @param string $segmentSequence
     * @param string $fieldPosition
     * @param string $fieldRepetition
     * @param string $componentNumber
     * @param string $subcomponentNumber
     */
    public function addFieldErrorLocation(
        string $segmentId = null,
        string $segmentSequence = null,
        string $fieldPosition = null,
        string $fieldRepetition = null,
        string $componentNumber = null,
        string $subcomponentNumber = null
    ) {
        $errorLocation = $this
            ->dataTypeFactory
            ->create('ERL', $this->encodingParameters)
        ;
        $this->errorLocation[] = $errorLocation;
        $errorLocation->setSegmentId($segmentId);
        $errorLocation->setSegmentSequence($segmentSequence);
        $errorLocation->setFieldPosition($fieldPosition);
        $errorLocation->setFieldRepetition($fieldRepetition);
        $errorLocation->setComponentNumber($componentNumber);
        $errorLocation->setSubcomponentNumber($subcomponentNumber);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldHl7ErrorCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->hl7ErrorCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->hl7ErrorCode->setIdentifier($identifier);
        $this->hl7ErrorCode->setText($text);
        $this->hl7ErrorCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->hl7ErrorCode->setAltIdentifier($altIdentifier);
        $this->hl7ErrorCode->setAltText($altText);
        $this->hl7ErrorCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->hl7ErrorCode->setCodingSystemVersionId($codingSystemVersionId);
        $this->hl7ErrorCode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->hl7ErrorCode->setOriginalText($originalText);
    }

    /**
     * @param string $value
     */
    public function setFieldSeverity(string $value)
    {
        $this->severity = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->severity->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldApplicationErrorCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->applicationErrorCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->applicationErrorCode->setIdentifier($identifier);
        $this->applicationErrorCode->setText($text);
        $this->applicationErrorCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->applicationErrorCode->setAltIdentifier($altIdentifier);
        $this->applicationErrorCode->setAltText($altText);
        $this->applicationErrorCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->applicationErrorCode->setCodingSystemVersionId($codingSystemVersionId);
        $this->applicationErrorCode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->applicationErrorCode->setOriginalText($originalText);
    }

    /**
     * @param string $value
     */
    public function addFieldApplicationErrorParameter(string $value)
    {
        $applicationErrorParameter = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $applicationErrorParameter->setValue($value);
        $this->applicationErrorParameter[] = $applicationErrorParameter;
    }

    /**
     * @param string $value
     */
    public function setFieldDiagnosticInformation(string $value)
    {
        $this->diagnosticInformation = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
        ;
        $this->diagnosticInformation->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldUserMessage(string $value)
    {
        $this->userMessage = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
        ;
        $this->userMessage->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldInformPersonIndicator(string $value)
    {
        $informPersonIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $informPersonIndicator->setValue($value);
        $this->informPersonIndicator[] = $informPersonIndicator;
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldOverrideType(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $this->overrideType = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->overrideType->setIdentifier($identifier);
        $this->overrideType->setText($text);
        $this->overrideType->setNameOfCodingSystem($nameOfCodingSystem);
        $this->overrideType->setAltIdentifier($altIdentifier);
        $this->overrideType->setAltText($altText);
        $this->overrideType->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->overrideType->setCodingSystemVersionId($codingSystemVersionId);
        $this->overrideType->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $this->overrideType->setOriginalText($originalText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function addFieldOverrideReasonCode(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null,
        string $codingSystemVersionId = null,
        string $altCodingSystemVersionId = null,
        string $originalText = null
    ) {
        $overrideReasonCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters)
        ;
        $this->overrideReasonCode[] = $overrideReasonCode;
        $overrideReasonCode->setIdentifier($identifier);
        $overrideReasonCode->setText($text);
        $overrideReasonCode->setNameOfCodingSystem($nameOfCodingSystem);
        $overrideReasonCode->setAltIdentifier($altIdentifier);
        $overrideReasonCode->setAltText($altText);
        $overrideReasonCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $overrideReasonCode->setCodingSystemVersionId($codingSystemVersionId);
        $overrideReasonCode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $overrideReasonCode->setOriginalText($originalText);
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $localNumber
     * @param string $extension
     * @param string $anyText
     * @param string $extensionPrefix
     * @param string $speedDialCode
     * @param string $unformattedTelephoneNumber
     */
    public function addFieldHelpDeskContactPoint(
        string $telephoneNumber = null,
        string $telecommunicationUseCode = null,
        string $telepcommunicationEquipmentType = null,
        string $emailAddress = null,
        string $countryCode = null,
        string $areaCityCode = null,
        string $localNumber = null,
        string $extension = null,
        string $anyText = null,
        string $extensionPrefix = null,
        string $speedDialCode = null,
        string $unformattedTelephoneNumber = null
    ) {
        $helpDeskContactPoint = $this
            ->dataTypeFactory
            ->create('XTN', $this->encodingParameters)
        ;
        $this->helpDeskContactPoint[] = $helpDeskContactPoint;
        $helpDeskContactPoint->setTelephoneNumber($telephoneNumber);
        $helpDeskContactPoint->setTelecommunicationUseCode($telecommunicationUseCode);
        $helpDeskContactPoint->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $helpDeskContactPoint->setEmailAddress($emailAddress);
        $helpDeskContactPoint->setCountryCode($countryCode);
        $helpDeskContactPoint->setAreaCityCode($areaCityCode);
        $helpDeskContactPoint->setLocalNumber($localNumber);
        $helpDeskContactPoint->setExtension($extension);
        $helpDeskContactPoint->setAnyText($anyText);
        $helpDeskContactPoint->setExtensionPrefix($extensionPrefix);
        $helpDeskContactPoint->setSpeedDialCode($speedDialCode);
        $helpDeskContactPoint->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @return \Hl7v2\DataType\EldDataType[]
     */
    public function getFieldErrorCodeAndLocation()
    {
        return $this->errorCodeAndLocation;
    }

    /**
     * @return \Hl7v2\DataType\ErlDataType[]
     */
    public function getFieldErrorLocation()
    {
        return $this->errorLocation;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getFieldHl7ErrorCode()
    {
        return $this->hl7ErrorCode;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldSeverity()
    {
        return $this->severity;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getFieldApplicationErrorCode()
    {
        return $this->applicationErrorCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType[]
     */
    public function getFieldApplicationErrorParameter()
    {
        return $this->applicationErrorParameter;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getFieldDiagnosticInformation()
    {
        return $this->diagnosticInformation;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getFieldUserMessage()
    {
        return $this->userMessage;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType[]
     */
    public function getFieldInformPersonIndicator()
    {
        return $this->informPersonIndicator;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getFieldOverrideType()
    {
        return $this->overrideType;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getFieldOverrideReasonCode()
    {
        return $this->overrideReasonCode;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getFieldHelpDeskContactPoint()
    {
        return $this->helpDeskContactPoint;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // ERR.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ERR Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ErrorCodeAndLocation', 493, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $segmentId,
                $segmentSequence,
                $fieldPosition,
                list(
                    $codeIdentifyingErrorIdentifier,
                    $codeIdentifyingErrorText,
                    $codeIdentifyingErrorNameOfCodingSystem,
                    $codeIdentifyingErrorAltIdentifier,
                    $codeIdentifyingErrorAltText,
                    $codeIdentifyingErrorNameOfAltCodingSystem,
                ),
            ) = $components;
            $this->addFieldErrorCodeAndLocation(
                $segmentId,
                $segmentSequence,
                $fieldPosition,
                $codeIdentifyingErrorIdentifier,
                $codeIdentifyingErrorText,
                $codeIdentifyingErrorNameOfCodingSystem,
                $codeIdentifyingErrorAltIdentifier,
                $codeIdentifyingErrorAltText,
                $codeIdentifyingErrorNameOfAltCodingSystem
            );
        }

        // ERR.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ERR Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ErrorLocation', 18, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $segmentId,
                $segmentSequence,
                $fieldPosition,
                $fieldRepetition,
                $componentNumber,
                $subcomponentNumber,
            ) = $components;
            $this->addFieldErrorLocation(
                $segmentId,
                $segmentSequence,
                $fieldPosition,
                $fieldRepetition,
                $componentNumber,
                $subcomponentNumber
            );
        }

        // ERR.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ERR Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Hl7ErrorCode', 705, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldHl7ErrorCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ERR.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ERR Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Severity', 2, $datagram->getPositionalState());
        $this->setFieldSeverity($codec->extractComponent($datagram));

        // ERR.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ApplicationErrorCode', 705, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldApplicationErrorCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ERR.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ApplicationErrorParameter', 80, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldApplicationErrorParameter($value);
        }

        // ERR.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosticInformation', 2048, $datagram->getPositionalState());
        $this->setFieldDiagnosticInformation($codec->extractComponent($datagram));

        // ERR.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('UserMessage', 250, $datagram->getPositionalState());
        $this->setFieldUserMessage($codec->extractComponent($datagram));

        // ERR.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InformPersonIndicator', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldInformPersonIndicator($value);
        }

        // ERR.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OverrideType', 705, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOverrideType(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $altCodingSystemVersionId,
            $originalText
        );

        // ERR.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OverrideReasonCode', 705, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
                $codingSystemVersionId,
                $altCodingSystemVersionId,
                $originalText,
            ) = $components;
            $this->addFieldOverrideReasonCode(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
                $codingSystemVersionId,
                $altCodingSystemVersionId,
                $originalText
            );
        }

        // ERR.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('HelpDeskContactPoint', 652, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber,
            ) = $components;
            $this->addFieldHelpDeskContactPoint(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber
            );
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'ERR';
        $emptyFieldsSinceLastField = 0;

        if (empty($this->getFieldErrorCodeAndLocation())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldErrorCodeAndLocation() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (empty($this->getFieldErrorLocation())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldErrorLocation() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (!$this->getFieldHl7ErrorCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldHl7ErrorCode();
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

        if (!$this->getFieldSeverity() || !$this->getFieldSeverity()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSeverity()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldApplicationErrorCode()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldApplicationErrorCode();
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

        if (empty($this->getFieldApplicationErrorParameter())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldApplicationErrorParameter() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (!$this->getFieldDiagnosticInformation() || !$this->getFieldDiagnosticInformation()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldDiagnosticInformation()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldUserMessage() || !$this->getFieldUserMessage()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldUserMessage()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldInformPersonIndicator())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldInformPersonIndicator() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (!$this->getFieldOverrideType()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldOverrideType();
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

        if (empty($this->getFieldOverrideReasonCode())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOverrideReasonCode() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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

        if (empty($this->getFieldHelpDeskContactPoint())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldHelpDeskContactPoint() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
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
