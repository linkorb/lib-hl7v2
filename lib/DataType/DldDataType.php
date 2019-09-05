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
    public function setDischargeLocation(string $dischargeLocation = null)
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
    public function setEffectiveDate(
        string $effectiveDateTime = null,
        string $effectiveDateDegreeOfPrecision = null
    ) {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
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

        if ($this->getDischargeLocation() && $this->getDischargeLocation()->hasValue()) {
            $s .= (string) $this->getDischargeLocation()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getEffectiveDate()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getEffectiveDate();
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
