<?php

namespace Hl7v2\DataType;

/**
 * Error Location And Description (ELD).
 */
class EldDataType extends ComponentDataType
{
    const MAX_LEN = 493;

    /**
     * @var StDataType
     */
    private $segmentId;
    /**
     * @var NmDataType
     */
    private $segmentSequence;
    /**
     * @var NmDataType
     */
    private $fieldPosition;
    /**
     * @var CeDataType
     */
    private $codeIdentifyingError;

    /**
     * @param string $segmentId
     */
    public function setSegmentId(string $segmentId = null)
    {
        $this->segmentId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->segmentId->setValue($segmentId);
    }

    /**
     * @param string $segmentSequence
     */
    public function setSegmentSequence(string $segmentSequence = null)
    {
        $this->segmentSequence = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->segmentSequence->setValue($segmentSequence);
    }

    /**
     * @param string $fieldPosition
     */
    public function setFieldPosition(string $fieldPosition = null)
    {
        $this->fieldPosition = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->fieldPosition->setValue($fieldPosition);
    }

    /**
     * @param string $codeIdentifyingErrorIdentifier
     * @param string $codeIdentifyingErrorText
     * @param string $codeIdentifyingErrorNameOfCodingSystem
     * @param string $codeIdentifyingErrorAltIdentifier
     * @param string $codeIdentifyingErrorAltText
     * @param string $codeIdentifyingErrorNameOfAltCodingSystem
     */
    public function setCodeIdentifyingError(
        string $codeIdentifyingErrorIdentifier = null,
        string $codeIdentifyingErrorText = null,
        string $codeIdentifyingErrorNameOfCodingSystem = null,
        string $codeIdentifyingErrorAltIdentifier = null,
        string $codeIdentifyingErrorAltText = null,
        string $codeIdentifyingErrorNameOfAltCodingSystem = null
    ) {
        $this->codeIdentifyingError = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
        ;
        $this->codeIdentifyingError->setIdentifier($codeIdentifyingErrorIdentifier);
        $this->codeIdentifyingError->setText($codeIdentifyingErrorText);
        $this->codeIdentifyingError->setNameOfCodingSystem($codeIdentifyingErrorNameOfCodingSystem);
        $this->codeIdentifyingError->setAltIdentifier($codeIdentifyingErrorAltIdentifier);
        $this->codeIdentifyingError->setAltText($codeIdentifyingErrorAltText);
        $this->codeIdentifyingError->setNameOfAltCodingSystem(
            $codeIdentifyingErrorNameOfAltCodingSystem
        );
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getSegmentSequence()
    {
        return $this->segmentSequence;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldPosition()
    {
        return $this->fieldPosition;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getCodeIdentifyingError()
    {
        return $this->codeIdentifyingError;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = '';

        $sep = $this->isSubcomponent
            ? $this->encodingParameters->getSubcomponentSep()
            : $this->encodingParameters->getComponentSep()
        ;

        if ($this->getSegmentId() && $this->getSegmentId()->hasValue()) {
            $s .= (string) $this->getSegmentId()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getSegmentSequence() || !$this->getSegmentSequence()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSegmentSequence()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFieldPosition() || !$this->getFieldPosition()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFieldPosition()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCodeIdentifyingError()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getCodeIdentifyingError();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        return $s;
    }
}
