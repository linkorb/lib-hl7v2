<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Street Address (SAD).
 */
class SadDataType extends ComponentDataType
{
    const MAX_LEN = 184;

    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $streetOrMailingAddress;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $streetName;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $dwellingNumber;

    /**
     * @param string $streetOrMailingAddress
     */
    public function setStreetOrMailingAddress(
        string $streetOrMailingAddress = null
    ) {
        $this->streetOrMailingAddress = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->streetOrMailingAddress->setValue($streetOrMailingAddress);
    }

    /**
     * @param string $streetName
     */
    public function setStreetName(string $streetName = null)
    {
        $this->streetName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->streetName->setValue($streetName);
    }

    /**
     * @param string $dwellingNumber
     */
    public function setDwellingNumber(string $dwellingNumber = null)
    {
        $this->dwellingNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->dwellingNumber->setValue($dwellingNumber);
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getStreetOrMailingAddress()
    {
        return $this->streetOrMailingAddress;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getDwellingNumber()
    {
        return $this->dwellingNumber;
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

        if ($this->getStreetOrMailingAddress() && $this->getStreetOrMailingAddress()->hasValue()) {
            $s .= (string) $this->getStreetOrMailingAddress()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getStreetName() || !$this->getStreetName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getStreetName()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getDwellingNumber() || !$this->getDwellingNumber()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDwellingNumber()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
