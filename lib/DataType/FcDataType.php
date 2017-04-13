<?php

namespace Hl7v2\DataType;

/**
 * Financial Class (FC).
 */
class FcDataType extends ComponentDataType
{
    const MAX_LEN = 47;

    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $financialClassCode;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $effectiveDate;

    /**
     * @param string $financialClassCode
     */
    public function setFinancialClassCode($financialClassCode)
    {
        $this->financialClassCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->financialClassCode->setValue($financialClassCode);
    }

    /**
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision = null)
    {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->effectiveDate->setTime($effectiveDateTime);
        $this->effectiveDate->setDegreeOfPrecision($effectiveDateDegreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFinancialClassCode()
    {
        return $this->financialClassCode;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }
}
