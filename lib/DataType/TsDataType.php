<?php

namespace Hl7v2\DataType;

/**
 * Time Stamp (TS).
 */
class TsDataType extends ComponentDataType
{
    const MAX_LEN = 26;

    /**
     * @var \Hl7v2\DataType\DtmDataType
     */
    private $time;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $degreeOfPrecision;

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $this
            ->dataTypeFactory
            ->create('DTM', $this->characterEncoding)
        ;
        $this->time->setValue($time);
    }

    /**
     * @param string $degreeOfPrecision
     */
    public function setDegreeOfPrecision($degreeOfPrecision = null)
    {
        $this->degreeOfPrecision = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->degreeOfPrecision->setValue($degreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\DtmDataType
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDegreeOfPrecision()
    {
        return $this->degreeOfPrecision;
    }
}
