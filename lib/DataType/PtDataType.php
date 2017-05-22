<?php

namespace Hl7v2\DataType;

/**
 * Processing Type (PT).
 */
class PtDataType extends ComponentDataType
{
    const MAX_LEN = 3;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $processingId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $processingMode;

    /**
     * @param string $processingId
     */
    public function setProcessingId($processingId = null)
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
    public function setProcessingMode($processingMode = null)
    {
        $this->processingMode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->processingMode->setValue($processingMode);
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getProcessingId()
    {
        return $this->processingId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getProcessingMode()
    {
        return $this->processingMode;
    }
}
