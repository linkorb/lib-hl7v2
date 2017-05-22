<?php

namespace Hl7v2\DataType;

/**
 * Discharge to Location and Date (DLD).
 */
class DldDataType extends ComponentDataType
{
    const MAX_LEN = 47;

    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $dischargeLocation;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $effectiveDate;

    /**
     * @param string $dischargeLocation
     */
    public function setDischargeLocation($dischargeLocation)
    {
        $this->dischargeLocation = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->dischargeLocation->setValue($dischargeLocation);
    }

    /**
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision = null)
    {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->effectiveDate->setTime($effectiveDateTime);
        $this->effectiveDate->setDegreeOfPrecision($effectiveDateDegreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getDischargeLocation()
    {
        return $this->dischargeLocation;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }
}
