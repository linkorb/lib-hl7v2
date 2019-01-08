<?php

namespace Hl7v2\DataType;

/**
 * Error Location (ERL).
 */
class ErlDataType extends ComponentDataType
{
    const MAX_LEN = 18;

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
     * @var NmDataType
     */
    private $fieldRepetition;
    /**
     * @var NmDataType
     */
    private $componentNumber;
    /**
     * @var NmDataType
     */
    private $subcomponentNumber;

    /**
     * @param string $segmentId
     */
    public function setSegmentId(string $segmentId)
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
    public function setSegmentSequence(string $segmentSequence)
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
     * @param string $fieldRepetition
     */
    public function setFieldRepetition(string $fieldRepetition = null)
    {
        $this->fieldRepetition = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->fieldRepetition->setValue($fieldRepetition);
    }

    /**
     * @param string $componentNumber
     */
    public function setComponentNumber(string $componentNumber = null)
    {
        $this->componentNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->componentNumber->setValue($componentNumber);
    }

    /**
     * @param string $subcomponentNumber
     */
    public function setSubcomponentNumber(string $subcomponentNumber = null)
    {
        $this->subcomponentNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->subcomponentNumber->setValue($subcomponentNumber);
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
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldRepetition()
    {
        return $this->fieldRepetition;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getComponentNumber()
    {
        return $this->componentNumber;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getSubcomponentNumber()
    {
        return $this->subcomponentNumber;
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

        if (!$this->getFieldRepetition() || !$this->getFieldRepetition()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFieldRepetition()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getComponentNumber() || !$this->getComponentNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getComponentNumber()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSubcomponentNumber() || !$this->getSubcomponentNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSubcomponentNumber()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
