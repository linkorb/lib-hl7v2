<?php

namespace Hl7v2\DataType;

/**
 * Repeat Interval (RI).
 */
class RiDataType extends ComponentDataType
{
    const MAX_LEN = 206;

    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $repeatPattern;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $explicitTimeInterval;

    /**
     * @param string $repeatPattern
     */
    public function setRepeatPattern($repeatPattern = null)
    {
        $this->repeatPattern = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->repeatPattern->setValue($repeatPattern);
    }

    /**
     * @param string $explicitTimeInterval
     */
    public function setExplicitTimeInterval($explicitTimeInterval = null)
    {
        $this->explicitTimeInterval = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->explicitTimeInterval->setValue($explicitTimeInterval);
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getRepeatPattern()
    {
        return $this->repeatPattern;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getExplicitTimeInterval()
    {
        return $this->explicitTimeInterval;
    }
}
