<?php

namespace Hl7v2\DataType;

/**
 * Heirarchical Designator (HD).
 */
class HdDataType extends ComponentDataType
{
    const MAX_LEN = 227;

    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $namespaceId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $universalId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $universalIdType;

    /**
     * @param string $namespaceId
     */
    public function setNamespaceId($namespaceId = null)
    {
        $this->namespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->namespaceId->setValue($namespaceId);
    }

    /**
     * @param string $universalId
     */
    public function setUniversalId($universalId = null)
    {
        $this->universalId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->universalId->setValue($universalId);
    }

    /**
     * @param string $universalIdType
     */
    public function setUniversalIdType($universalIdType = null)
    {
        $this->universalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->universalIdType->setValue($universalIdType);
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getNamespaceId()
    {
        return $this->namespaceId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getUniversalId()
    {
        return $this->universalId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getUniversalIdType()
    {
        return $this->universalIdType;
    }
}
