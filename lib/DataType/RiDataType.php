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
            ->create('IS', $this->encodingParameters)
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
            ->create('ST', $this->encodingParameters)
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

        if ($this->getRepeatPattern() && $this->getRepeatPattern()->hasValue()) {
            $s .= (string) $this->getRepeatPattern()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getExplicitTimeInterval() || !$this->getExplicitTimeInterval()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getExplicitTimeInterval()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
