<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Timing Quantity (TQ).
 */
class TqDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\CqDataType
     */
    private $quantity;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $interval;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $duration;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $startDateTime;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $endDateTime;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $priority;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $condition;
    /**
     * @var \Hl7v2\DataType\V231\TxDataType
     */
    private $text;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $conjunction;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $orderSequencing;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $occurrenceDuration;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
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
        string $quantityQuantity = null,
        string $quantityUnitsIdentifier = null,
        string $quantityUnitsText = null,
        string $quantityUnitsNameOfCodingSystem = null,
        string $quantityUnitsAltIdentifier = null,
        string $quantityUnitsAltText = null,
        string $quantityUnitsNameOfAltCodingSystem = null
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
     * @param string $interval
     */
    public function setInterval(string $interval = null)
    {
        $this->interval = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->interval->setValue($interval);
    }

    /**
     * @param string $duration
     */
    public function setDuration(string $duration = null)
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
    public function setStartDateTime(
        string $startDateTimeTime = null,
        string $startDateTimeDegreeOfPrecision = null
    ) {
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
    public function setEndDateTime(
        string $endDateTimeTime = null,
        string $endDateTimeDegreeOfPrecision = null
    ) {
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
    public function setPriority(string $priority = null)
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
    public function setCondition(string $condition = null)
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
    public function setText(string $text = null)
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
    public function setConjunction(string $conjunction = null)
    {
        $this->conjunction = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->conjunction->setValue($conjunction);
    }

    /**
     * @param string $orderSequencing
     */
    public function setOrderSequencing(string $orderSequencing = null)
    {
        $this->orderSequencing = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->orderSequencing->setValue($orderSequencing);
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
        string $occurrenceDurationIdentifier = null,
        string $occurrenceDurationText = null,
        string $occurrenceDurationNameOfCodingSystem = null,
        string $occurrenceDurationAltIdentifier = null,
        string $occurrenceDurationAltText = null,
        string $occurrenceDurationNameOfAltCodingSystem = null
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
    public function setTotalOccurrences(string $totalOccurrences = null)
    {
        $this->totalOccurrences = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->totalOccurrences->setValue($totalOccurrences);
    }

    /**
     * @return \Hl7v2\DataType\V231\CqDataType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return \Hl7v2\DataType\V231\TxDataType
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getConjunction()
    {
        return $this->conjunction;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getOrderSequencing()
    {
        return $this->orderSequencing;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getOccurrenceDuration()
    {
        return $this->occurrenceDuration;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
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

        if (!$this->getInterval() || !$this->getInterval()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getInterval()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getDuration() || !$this->getDuration()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDuration()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getStartDateTime()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getStartDateTime();
            if ('' === $value) {
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
            if ('' === $value) {
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
                . (string) $this->getPriority()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCondition() || !$this->getCondition()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCondition()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getText() || !$this->getText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getText()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getConjunction() || !$this->getConjunction()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getConjunction()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOrderSequencing() || !$this->getOrderSequencing()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOrderSequencing()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOccurrenceDuration()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getOccurrenceDuration();
            if ('' === $value) {
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
                . (string) $this->getTotalOccurrences()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
