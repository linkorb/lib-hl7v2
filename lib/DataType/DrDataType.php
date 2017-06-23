<?php

namespace Hl7v2\DataType;

/**
 * Date Time Range (DR).
 */
class DrDataType extends ComponentDataType
{
    const MAX_LEN = 53;

    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $rangeStartDateTime;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $rangeEndDateTime;

    /**
     * @param string $rangeStartDateTimeTime
     * @param string $rangeStartDateTimeDegreeOfPrecision
     */
    public function setRangeStartDateTime($rangeStartDateTimeTime, $rangeStartDateTimeDegreeOfPrecision = null)
    {
        $this->rangeStartDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->rangeStartDateTime->setTime($rangeStartDateTimeTime);
        $this->rangeStartDateTime->setDegreeOfPrecision($rangeStartDateTimeDegreeOfPrecision);
    }

    /**
     * @param string $rangeEndDateTimeTime
     * @param string $rangeEndDateTimeDegreeOfPrecision
     */
    public function setRangeEndDateTime($rangeEndDateTimeTime, $rangeEndDateTimeDegreeOfPrecision = null)
    {
        $this->rangeEndDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->rangeEndDateTime->setTime($rangeEndDateTimeTime);
        $this->rangeEndDateTime->setDegreeOfPrecision($rangeEndDateTimeDegreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getRangeStartDateTime()
    {
        return $this->rangeStartDateTime;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getRangeEndDateTime()
    {
        return $this->rangeEndDateTime;
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

        if ($this->getRangeStartDateTime()) {
            $s .= (string) $this->getRangeStartDateTime();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getRangeEndDateTime()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getRangeEndDateTime();
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
