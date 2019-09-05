<?php

namespace Hl7v2\DataType;

/**
 * Entity Identifier (EI).
 */
class EiDataType extends ComponentDataType
{
    const MAX_LEN = 427;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $entityIdentifier;
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
     * @param string $entityIdentifier
     */
    public function setEntityIdentifier(string $entityIdentifier = null)
    {
        $this->entityIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->entityIdentifier->setValue($entityIdentifier);
    }

    /**
     * @param string $namespaceId
     */
    public function setNamespaceId(string $namespaceId = null)
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
    public function setUniversalId(string $universalId = null)
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
    public function setUniversalIdType(string $universalIdType = null)
    {
        $this->universalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->universalIdType->setValue($universalIdType);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getEntityIdentifier()
    {
        return $this->entityIdentifier;
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

        if ($this->getEntityIdentifier() && $this->getEntityIdentifier()->hasValue()) {
            $s .= (string) $this->getEntityIdentifier()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getNamespaceId() || !$this->getNamespaceId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNamespaceId()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getUniversalId() || !$this->getUniversalId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getUniversalId()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getUniversalIdType() || !$this->getUniversalIdType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getUniversalIdType()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
