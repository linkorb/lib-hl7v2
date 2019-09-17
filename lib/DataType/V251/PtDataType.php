<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Processing Type (PT).
 */
class PtDataType extends ComponentDataType
{
    const MAX_LEN = 3;

    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $processingId;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $processingMode;

    /**
     * @param string $processingId
     */
    public function setProcessingId(string $processingId = null)
    {
        $this->processingId = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->processingId->setValue($processingId);
    }

    /**
     * @param string $processingMode
     */
    public function setProcessingMode(string $processingMode = null)
    {
        $this->processingMode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->processingMode->setValue($processingMode);
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getProcessingId()
    {
        return $this->processingId;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getProcessingMode()
    {
        return $this->processingMode;
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

        if ($this->getProcessingId() && $this->getProcessingId()->hasValue()) {
            $s .= (string) $this->getProcessingId()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getProcessingMode() || !$this->getProcessingMode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getProcessingMode()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
