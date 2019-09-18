<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Order Sequence Definition (OSD).
 */
class OsdDataType extends ComponentDataType
{
    const MAX_LEN = 110;

    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $sequenceResultsFlag;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $placerOrderNumberEntityIdentifier;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $placerOrderNumberNamespaceId;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $fillerOrderNumberEntityIdentifier;
    /**
     * @var \Hl7v2\DataType\V251\IsDataType
     */
    private $fillerOrderNumberNamespaceId;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $sequenceConditionValue;
    /**
     * @var \Hl7v2\DataType\V251\NmDataType
     */
    private $maximumNumberOfRepeats;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $placerOrderNumberUniversalId;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $placerOrderNumberUniversalIdType;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $fillerOrderNumberUniversalId;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $fillerOrderNumberUniversalIdType;

    /**
     * @param string $sequenceResultsFlag
     */
    public function setSequenceResultsFlag(string $sequenceResultsFlag = null)
    {
        $this->sequenceResultsFlag = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->sequenceResultsFlag->setValue($sequenceResultsFlag);
    }

    /**
     * @param string $placerOrderNumberEntityIdentifier
     */
    public function setPlacerOrderNumberEntityIdentifier(
        string $placerOrderNumberEntityIdentifier = null
    ) {
        $this->placerOrderNumberEntityIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->placerOrderNumberEntityIdentifier->setValue($placerOrderNumberEntityIdentifier);
    }

    /**
     * @param string $placerOrderNumberNamespaceId
     */
    public function setPlacerOrderNumberNamespaceId(
        string $placerOrderNumberNamespaceId = null
    ) {
        $this->placerOrderNumberNamespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->placerOrderNumberNamespaceId->setValue($placerOrderNumberNamespaceId);
    }

    /**
     * @param string $fillerOrderNumberEntityIdentifier
     */
    public function setFillerOrderNumberEntityIdentifier(
        string $fillerOrderNumberEntityIdentifier = null
    ) {
        $this->fillerOrderNumberEntityIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->fillerOrderNumberEntityIdentifier->setValue($fillerOrderNumberEntityIdentifier);
    }

    /**
     * @param string $fillerOrderNumberNamespaceId
     */
    public function setFillerOrderNumberNamespaceId(
        string $fillerOrderNumberNamespaceId = null
    ) {
        $this->fillerOrderNumberNamespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->fillerOrderNumberNamespaceId->setValue($fillerOrderNumberNamespaceId);
    }

    /**
     * @param string $sequenceConditionValue
     */
    public function setSequenceConditionValue(
        string $sequenceConditionValue = null
    ) {
        $this->sequenceConditionValue = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->sequenceConditionValue->setValue($sequenceConditionValue);
    }

    /**
     * @param string $maximumNumberOfRepeats
     */
    public function setMaximumNumberOfRepeats(
        string $maximumNumberOfRepeats = null
    ) {
        $this->maximumNumberOfRepeats = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->maximumNumberOfRepeats->setValue($maximumNumberOfRepeats);
    }

    /**
     * @param string $placerOrderNumberUniversalId
     */
    public function setPlacerOrderNumberUniversalId(
        string $placerOrderNumberUniversalId = null
    ) {
        $this->placerOrderNumberUniversalId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->placerOrderNumberUniversalId->setValue($placerOrderNumberUniversalId);
    }

    /**
     * @param string $placerOrderNumberUniversalIdType
     */
    public function setPlacerOrderNumberUniversalIdType(
        string $placerOrderNumberUniversalIdType = null
    ) {
        $this->placerOrderNumberUniversalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->placerOrderNumberUniversalIdType->setValue($placerOrderNumberUniversalIdType);
    }

    /**
     * @param string $fillerOrderNumberUniversalId
     */
    public function setFillerOrderNumberUniversalId(
        string $fillerOrderNumberUniversalId = null
    ) {
        $this->fillerOrderNumberUniversalId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->fillerOrderNumberUniversalId->setValue($fillerOrderNumberUniversalId);
    }

    /**
     * @param string $fillerOrderNumberUniversalIdType
     */
    public function setFillerOrderNumberUniversalIdType(
        string $fillerOrderNumberUniversalIdType = null
    ) {
        $this->fillerOrderNumberUniversalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->fillerOrderNumberUniversalIdType->setValue($fillerOrderNumberUniversalIdType);
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getSequenceResultsFlag()
    {
        return $this->sequenceResultsFlag;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getPlacerOrderNumberEntityIdentifier()
    {
        return $this->placerOrderNumberEntityIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getPlacerOrderNumberNamespaceId()
    {
        return $this->placerOrderNumberNamespaceId;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFillerOrderNumberEntityIdentifier()
    {
        return $this->fillerOrderNumberEntityIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\IsDataType
     */
    public function getFillerOrderNumberNamespaceId()
    {
        return $this->fillerOrderNumberNamespaceId;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getSequenceConditionValue()
    {
        return $this->sequenceConditionValue;
    }

    /**
     * @return \Hl7v2\DataType\V251\NmDataType
     */
    public function getMaximumNumberOfRepeats()
    {
        return $this->maximumNumberOfRepeats;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getPlacerOrderNumberUniversalId()
    {
        return $this->placerOrderNumberUniversalId;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getPlacerOrderNumberUniversalIdType()
    {
        return $this->placerOrderNumberUniversalIdType;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getFillerOrderNumberUniversalId()
    {
        return $this->fillerOrderNumberUniversalId;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getFillerOrderNumberUniversalIdType()
    {
        return $this->fillerOrderNumberUniversalIdType;
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

        if ($this->getSequenceResultsFlag() && $this->getSequenceResultsFlag()->hasValue()) {
            $s .= (string) $this->getSequenceResultsFlag()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getPlacerOrderNumberEntityIdentifier() || !$this->getPlacerOrderNumberEntityIdentifier()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPlacerOrderNumberEntityIdentifier()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPlacerOrderNumberNamespaceId() || !$this->getPlacerOrderNumberNamespaceId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPlacerOrderNumberNamespaceId()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFillerOrderNumberEntityIdentifier() || !$this->getFillerOrderNumberEntityIdentifier()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFillerOrderNumberEntityIdentifier()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFillerOrderNumberNamespaceId() || !$this->getFillerOrderNumberNamespaceId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFillerOrderNumberNamespaceId()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSequenceConditionValue() || !$this->getSequenceConditionValue()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSequenceConditionValue()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getMaximumNumberOfRepeats() || !$this->getMaximumNumberOfRepeats()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getMaximumNumberOfRepeats()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPlacerOrderNumberUniversalId() || !$this->getPlacerOrderNumberUniversalId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPlacerOrderNumberUniversalId()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPlacerOrderNumberUniversalIdType() || !$this->getPlacerOrderNumberUniversalIdType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPlacerOrderNumberUniversalIdType()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFillerOrderNumberUniversalId() || !$this->getFillerOrderNumberUniversalId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFillerOrderNumberUniversalId()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFillerOrderNumberUniversalIdType() || !$this->getFillerOrderNumberUniversalIdType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFillerOrderNumberUniversalIdType()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
