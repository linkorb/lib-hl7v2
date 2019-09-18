<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Financial Class (FC).
 */
class FcDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $financialClassCode;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $effectiveDate;

    /**
     * @param string $financialClassCode
     */
    public function setFinancialClassCode(string $financialClassCode = null)
    {
        $this->financialClassCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->financialClassCode->setValue($financialClassCode);
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
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFinancialClassCode()
    {
        return $this->financialClassCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
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

        if ($this->getFinancialClassCode() && $this->getFinancialClassCode()->hasValue()) {
            $s .= (string) $this->getFinancialClassCode()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getEffectiveDate()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getEffectiveDate();
            if ('' === $value) {
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
