<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Time Stamp (TS).
 */
class TsDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $time;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $degreeOfPrecision;

    /**
     * @param string $time
     */
    public function setTime(string $time = null)
    {
        $this->time = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->time->setValue($time);
    }

    /**
     * @param string $degreeOfPrecision
     */
    public function setDegreeOfPrecision(string $degreeOfPrecision = null)
    {
        $this->degreeOfPrecision = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->degreeOfPrecision->setValue($degreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getDegreeOfPrecision()
    {
        return $this->degreeOfPrecision;
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

        if ($this->getTime() && $this->getTime()->hasValue()) {
            $s .= (string) $this->getTime()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getDegreeOfPrecision() || !$this->getDegreeOfPrecision()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDegreeOfPrecision()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
