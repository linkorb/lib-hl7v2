<?php

namespace Hl7v2\DataType;

/**
 * Timing Quantity (TQ).
 */
class TqDataType extends ComponentDataType
{
    const MAX_LEN = 1545;

    /**
     * @var \Hl7v2\DataType\CqDataType
     */
    private $quantity;
    /**
     * @var \Hl7v2\DataType\RiDataType
     */
    private $interval;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $duration;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $startDateTime;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $endDateTime;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $priority;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $condition;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    private $text;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $conjunction;
    /**
     * @var \Hl7v2\DataType\OsdDataType
     */
    private $orderSequencing;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $occurrenceDuration;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $totalOccurrences;

    /**
     * @param string $quantityQuantity
     * @param string $quantityUnitsIdentifier
     * @param string $quantityUnitsText
     * @param string $quantityUnitsNameOfCodingSystem
     * @param string $quantityUnitsAltIdentifier
     * @param string $quantityUnitsAltText
     * @param string $quantityUnitsNameOfAltCodingSystem
     */
    public function setQuantity(
        $quantityQuantity = null,
        $quantityUnitsIdentifier = null,
        $quantityUnitsText = null,
        $quantityUnitsNameOfCodingSystem = null,
        $quantityUnitsAltIdentifier = null,
        $quantityUnitsAltText = null,
        $quantityUnitsNameOfAltCodingSystem = null
    ) {
        $this->quantity = $this
            ->dataTypeFactory
            ->create('CQ', $this->encodingParameters, true)
        ;
        $this->quantity->setQuantity($quantityQuantity);
        $this->quantity->setUnits(
            $quantityUnitsIdentifier,
            $quantityUnitsText,
            $quantityUnitsNameOfCodingSystem,
            $quantityUnitsAltIdentifier,
            $quantityUnitsAltText,
            $quantityUnitsNameOfAltCodingSystem
        );
    }

    /**
     * @param string $intervalRepeatPattern
     * @param string $intervalExplicitTimeInterval
     */
    public function setInterval($intervalRepeatPattern = null, $intervalExplicitTimeInterval = null)
    {
        $this->interval = $this
            ->dataTypeFactory
            ->create('RI', $this->encodingParameters, true)
        ;
        $this->interval->setRepeatPattern($intervalRepeatPattern);
        $this->interval->setExplicitTimeInterval($intervalExplicitTimeInterval);
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration = null)
    {
        $this->duration = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->duration->setValue($duration);
    }

    /**
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     */
    public function setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision = null)
    {
        $this->startDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->startDateTime->setTime($startDateTimeTime);
        $this->startDateTime->setDegreeOfPrecision($startDateTimeDegreeOfPrecision);
    }

    /**
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     */
    public function setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision = null)
    {
        $this->endDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->endDateTime->setTime($endDateTimeTime);
        $this->endDateTime->setDegreeOfPrecision($endDateTimeDegreeOfPrecision);
    }

    /**
     * @param string $priority
     */
    public function setPriority($priority = null)
    {
        $this->priority = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->priority->setValue($priority);
    }

    /**
     * @param string $condition
     */
    public function setCondition($condition = null)
    {
        $this->condition = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->condition->setValue($condition);
    }

    /**
     * @param string $text
     */
    public function setText($text = null)
    {
        $this->text = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
        ;
        $this->text->setValue($text);
    }

    /**
     * @param string $conjunction
     */
    public function setConjunction($conjunction = null)
    {
        $this->conjunction = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->conjunction->setValue($conjunction);
    }

    /**
     * @param string $orderSequencingSequenceResultsFlag
     * @param string $orderSequencingPlacerOrderNumberEntityIdentifier
     * @param string $orderSequencingPlacerOrderNumberNamespaceId
     * @param string $orderSequencingFillerOrderNumberEntityIdentifier
     * @param string $orderSequencingFillerOrderNumberNamespaceId
     * @param string $orderSequencingSequenceConditionValue
     * @param string $orderSequencingMaximumNumberOfRepeats
     * @param string $orderSequencingPlacerOrderNumberUniversalId
     * @param string $orderSequencingPlacerOrderNumberUniversalIdType
     * @param string $orderSequencingFillerOrderNumberUniversalId
     * @param string $orderSequencingFillerOrderNumberUniversalIdType
     */
    public function setOrderSequencing(
        $orderSequencingSequenceResultsFlag,
        $orderSequencingPlacerOrderNumberEntityIdentifier,
        $orderSequencingPlacerOrderNumberNamespaceId = null,
        $orderSequencingFillerOrderNumberEntityIdentifier,
        $orderSequencingFillerOrderNumberNamespaceId = null,
        $orderSequencingSequenceConditionValue = null,
        $orderSequencingMaximumNumberOfRepeats = null,
        $orderSequencingPlacerOrderNumberUniversalId,
        $orderSequencingPlacerOrderNumberUniversalIdType = null,
        $orderSequencingFillerOrderNumberUniversalId,
        $orderSequencingFillerOrderNumberUniversalIdType = null
    ) {
        $this->orderSequencing = $this
            ->dataTypeFactory
            ->create('OSD', $this->encodingParameters, true)
        ;
        $this->orderSequencing->setSequenceResultsFlag($orderSequencingSequenceResultsFlag);
        $this->orderSequencing->setPlacerOrderNumberEntityIdentifier(
            $orderSequencingPlacerOrderNumberEntityIdentifier
        );
        $this->orderSequencing->setPlacerOrderNumberNamespaceId(
            $orderSequencingPlacerOrderNumberNamespaceId
        );
        $this->orderSequencing->setFillerOrderNumberEntityIdentifier(
            $orderSequencingFillerOrderNumberEntityIdentifier
        );
        $this->orderSequencing->setFillerOrderNumberNamespaceId(
            $orderSequencingFillerOrderNumberNamespaceId
        );
        $this->orderSequencing->setSequenceConditionValue($orderSequencingSequenceConditionValue);
        $this->orderSequencing->setMaximumNumberOfRepeats($orderSequencingMaximumNumberOfRepeats);
        $this->orderSequencing->setPlacerOrderNumberUniversalId(
            $orderSequencingPlacerOrderNumberUniversalId
        );
        $this->orderSequencing->setPlacerOrderNumberUniversalIdType(
            $orderSequencingPlacerOrderNumberUniversalIdType
        );
        $this->orderSequencing->setFillerOrderNumberUniversalId(
            $orderSequencingFillerOrderNumberUniversalId
        );
        $this->orderSequencing->setFillerOrderNumberUniversalIdType(
            $orderSequencingFillerOrderNumberUniversalIdType
        );
    }

    /**
     * @param string $occurrenceDurationIdentifier
     * @param string $occurrenceDurationText
     * @param string $occurrenceDurationNameOfCodingSystem
     * @param string $occurrenceDurationAltIdentifier
     * @param string $occurrenceDurationAltText
     * @param string $occurrenceDurationNameOfAltCodingSystem
     */
    public function setOccurrenceDuration(
        $occurrenceDurationIdentifier = null,
        $occurrenceDurationText = null,
        $occurrenceDurationNameOfCodingSystem = null,
        $occurrenceDurationAltIdentifier = null,
        $occurrenceDurationAltText = null,
        $occurrenceDurationNameOfAltCodingSystem = null
    ) {
        $this->occurrenceDuration = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
        ;
        $this->occurrenceDuration->setIdentifier($occurrenceDurationIdentifier);
        $this->occurrenceDuration->setText($occurrenceDurationText);
        $this->occurrenceDuration->setNameOfCodingSystem($occurrenceDurationNameOfCodingSystem);
        $this->occurrenceDuration->setAltIdentifier($occurrenceDurationAltIdentifier);
        $this->occurrenceDuration->setAltText($occurrenceDurationAltText);
        $this->occurrenceDuration->setNameOfAltCodingSystem(
            $occurrenceDurationNameOfAltCodingSystem
        );
    }

    /**
     * @param string $totalOccurrences
     */
    public function setTotalOccurrences($totalOccurrences = null)
    {
        $this->totalOccurrences = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->totalOccurrences->setValue($totalOccurrences);
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return \Hl7v2\DataType\RiDataType
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getConjunction()
    {
        return $this->conjunction;
    }

    /**
     * @return \Hl7v2\DataType\OsdDataType
     */
    public function getOrderSequencing()
    {
        return $this->orderSequencing;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getOccurrenceDuration()
    {
        return $this->occurrenceDuration;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getTotalOccurrences()
    {
        return $this->totalOccurrences;
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

        if ($this->getQuantity()) {
            $s .= (string) $this->getQuantity();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getInterval()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getInterval();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getDuration() || !$this->getDuration()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDuration()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getStartDateTime()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getStartDateTime();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getEndDateTime()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getEndDateTime();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getPriority() || !$this->getPriority()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPriority()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCondition() || !$this->getCondition()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCondition()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getText() || !$this->getText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getText()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getConjunction() || !$this->getConjunction()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getConjunction()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOrderSequencing()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getOrderSequencing();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getOccurrenceDuration()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getOccurrenceDuration();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getTotalOccurrences() || !$this->getTotalOccurrences()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getTotalOccurrences()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
