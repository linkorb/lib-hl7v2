<?php

namespace Hl7v2\DataType;

/**
 * Order Sequence Definition (OSD).
 */
class OsdDataType extends ComponentDataType
{
    const MAX_LEN = 110;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $sequenceResultsFlag;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $placerOrderNumberEntityIdentifier;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $placerOrderNumberNamespaceId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $fillerOrderNumberEntityIdentifier;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $fillerOrderNumberNamespaceId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $sequenceConditionValue;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $maximumNumberOfRepeats;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $placerOrderNumberUniversalId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $placerOrderNumberUniversalIdType;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $fillerOrderNumberUniversalId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $fillerOrderNumberUniversalIdType;

    /**
     * @param string $sequenceResultsFlag
     */
    public function setSequenceResultsFlag($sequenceResultsFlag)
    {
        $this->sequenceResultsFlag = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->sequenceResultsFlag->setValue($sequenceResultsFlag);
    }

    /**
     * @param string $placerOrderNumberEntityIdentifier
     */
    public function setPlacerOrderNumberEntityIdentifier($placerOrderNumberEntityIdentifier)
    {
        $this->placerOrderNumberEntityIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->placerOrderNumberEntityIdentifier->setValue($placerOrderNumberEntityIdentifier);
    }

    /**
     * @param string $placerOrderNumberNamespaceId
     */
    public function setPlacerOrderNumberNamespaceId($placerOrderNumberNamespaceId = null)
    {
        $this->placerOrderNumberNamespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->placerOrderNumberNamespaceId->setValue($placerOrderNumberNamespaceId);
    }

    /**
     * @param string $fillerOrderNumberEntityIdentifier
     */
    public function setFillerOrderNumberEntityIdentifier($fillerOrderNumberEntityIdentifier)
    {
        $this->fillerOrderNumberEntityIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->fillerOrderNumberEntityIdentifier->setValue($fillerOrderNumberEntityIdentifier);
    }

    /**
     * @param string $fillerOrderNumberNamespaceId
     */
    public function setFillerOrderNumberNamespaceId($fillerOrderNumberNamespaceId = null)
    {
        $this->fillerOrderNumberNamespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->fillerOrderNumberNamespaceId->setValue($fillerOrderNumberNamespaceId);
    }

    /**
     * @param string $sequenceConditionValue
     */
    public function setSequenceConditionValue($sequenceConditionValue = null)
    {
        $this->sequenceConditionValue = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->sequenceConditionValue->setValue($sequenceConditionValue);
    }

    /**
     * @param string $maximumNumberOfRepeats
     */
    public function setMaximumNumberOfRepeats($maximumNumberOfRepeats = null)
    {
        $this->maximumNumberOfRepeats = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->maximumNumberOfRepeats->setValue($maximumNumberOfRepeats);
    }

    /**
     * @param string $placerOrderNumberUniversalId
     */
    public function setPlacerOrderNumberUniversalId($placerOrderNumberUniversalId)
    {
        $this->placerOrderNumberUniversalId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->placerOrderNumberUniversalId->setValue($placerOrderNumberUniversalId);
    }

    /**
     * @param string $placerOrderNumberUniversalIdType
     */
    public function setPlacerOrderNumberUniversalIdType($placerOrderNumberUniversalIdType = null)
    {
        $this->placerOrderNumberUniversalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->placerOrderNumberUniversalIdType->setValue($placerOrderNumberUniversalIdType);
    }

    /**
     * @param string $fillerOrderNumberUniversalId
     */
    public function setFillerOrderNumberUniversalId($fillerOrderNumberUniversalId)
    {
        $this->fillerOrderNumberUniversalId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->fillerOrderNumberUniversalId->setValue($fillerOrderNumberUniversalId);
    }

    /**
     * @param string $fillerOrderNumberUniversalIdType
     */
    public function setFillerOrderNumberUniversalIdType($fillerOrderNumberUniversalIdType = null)
    {
        $this->fillerOrderNumberUniversalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->fillerOrderNumberUniversalIdType->setValue($fillerOrderNumberUniversalIdType);
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getSequenceResultsFlag()
    {
        return $this->sequenceResultsFlag;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getPlacerOrderNumberEntityIdentifier()
    {
        return $this->placerOrderNumberEntityIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getPlacerOrderNumberNamespaceId()
    {
        return $this->placerOrderNumberNamespaceId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFillerOrderNumberEntityIdentifier()
    {
        return $this->fillerOrderNumberEntityIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFillerOrderNumberNamespaceId()
    {
        return $this->fillerOrderNumberNamespaceId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSequenceConditionValue()
    {
        return $this->sequenceConditionValue;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getMaximumNumberOfRepeats()
    {
        return $this->maximumNumberOfRepeats;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getPlacerOrderNumberUniversalId()
    {
        return $this->placerOrderNumberUniversalId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getPlacerOrderNumberUniversalIdType()
    {
        return $this->placerOrderNumberUniversalIdType;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFillerOrderNumberUniversalId()
    {
        return $this->fillerOrderNumberUniversalId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFillerOrderNumberUniversalIdType()
    {
        return $this->fillerOrderNumberUniversalIdType;
    }
}
