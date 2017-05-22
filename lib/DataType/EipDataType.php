<?php

namespace Hl7v2\DataType;

/**
 * Entity Identifier Pair (EIP).
 */
class EipDataType extends ComponentDataType
{
    const MAX_LEN = 855;

    /**
     * @var \Hl7v2\DataType\EiDataType
     */
    private $placerAssignedIdentifier;
    /**
     * @var \Hl7v2\DataType\EiDataType
     */
    private $fillerAssignedIdentifier;

    /**
     * @param string $placerAssignedIdentifierEntityIdentifier
     * @param string $placerAssignedIdentifierNamespaceId
     * @param string $placerAssignedIdentifierUniversalId
     * @param string $placerAssignedIdentifierUniversalIdType
     */
    public function setPlacerAssignedIdentifier(
        $placerAssignedIdentifierEntityIdentifier = null,
        $placerAssignedIdentifierNamespaceId = null,
        $placerAssignedIdentifierUniversalId = null,
        $placerAssignedIdentifierUniversalIdType = null
    ) {
        $this->placerAssignedIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters, true)
        ;
        $this->placerAssignedIdentifier->setEntityIdentifier(
            $placerAssignedIdentifierEntityIdentifier
        );
        $this->placerAssignedIdentifier->setNamespaceId($placerAssignedIdentifierNamespaceId);
        $this->placerAssignedIdentifier->setUniversalId($placerAssignedIdentifierUniversalId);
        $this->placerAssignedIdentifier->setUniversalIdType(
            $placerAssignedIdentifierUniversalIdType
        );
    }

    /**
     * @param string $fillerAssignedIdentifierEntityIdentifier
     * @param string $fillerAssignedIdentifierNamespaceId
     * @param string $fillerAssignedIdentifierUniversalId
     * @param string $fillerAssignedIdentifierUniversalIdType
     */
    public function setFillerAssignedIdentifier(
        $fillerAssignedIdentifierEntityIdentifier = null,
        $fillerAssignedIdentifierNamespaceId = null,
        $fillerAssignedIdentifierUniversalId = null,
        $fillerAssignedIdentifierUniversalIdType = null
    ) {
        $this->fillerAssignedIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->encodingParameters, true)
        ;
        $this->fillerAssignedIdentifier->setEntityIdentifier(
            $fillerAssignedIdentifierEntityIdentifier
        );
        $this->fillerAssignedIdentifier->setNamespaceId($fillerAssignedIdentifierNamespaceId);
        $this->fillerAssignedIdentifier->setUniversalId($fillerAssignedIdentifierUniversalId);
        $this->fillerAssignedIdentifier->setUniversalIdType(
            $fillerAssignedIdentifierUniversalIdType
        );
    }

    /**
     * @return \Hl7v2\DataType\EiDataType
     */
    public function getPlacerAssignedIdentifier()
    {
        return $this->placerAssignedIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType
     */
    public function getFillerAssignedIdentifier()
    {
        return $this->fillerAssignedIdentifier;
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

        if ($this->getPlacerAssignedIdentifier()) {
            $s .= (string) $this->getPlacerAssignedIdentifier();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getFillerAssignedIdentifier()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getFillerAssignedIdentifier();
            if ($value === '') {
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
