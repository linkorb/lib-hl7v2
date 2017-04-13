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
    public function setNamespaceId($namespaceId)
    {
        $this->checkLength(20, $namespaceId);
        $this->namespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->namespaceId->setValue($namespaceId);
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getNamespaceId()
    {
        return $this->namespaceId;
    }

    /**
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setUniversalId($universalId, $universalIdType)
    {
        $this->checkLength(199, $universalId);
        $this->checkLength(6, $universalIdType);
        $this->universalId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->universalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->universalId->setValue($universalId);
        $this->universalIdType->setValue($universalIdType);
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
