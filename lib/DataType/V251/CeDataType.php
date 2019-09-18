<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Coded Element (CE).
 */
class CeDataType extends ComponentDataType
{
    const MAX_LEN = 483;

    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $identifier;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $text;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $nameOfCodingSystem;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $altIdentifier;
    /**
     * @var \Hl7v2\DataType\V251\StDataType
     */
    private $altText;
    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $nameOfAltCodingSystem;

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier = null)
    {
        $this->identifier = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->identifier->setValue($identifier);
    }

    /**
     * @param string $text
     */
    public function setText(string $text = null)
    {
        $this->text = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->text->setValue($text);
    }

    /**
     * @param string $nameOfCodingSystem
     */
    public function setNameOfCodingSystem(string $nameOfCodingSystem = null)
    {
        $this->nameOfCodingSystem = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameOfCodingSystem->setValue($nameOfCodingSystem);
    }

    /**
     * @param string $altIdentifier
     */
    public function setAltIdentifier(string $altIdentifier = null)
    {
        $this->altIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->altIdentifier->setValue($altIdentifier);
    }

    /**
     * @param string $altText
     */
    public function setAltText(string $altText = null)
    {
        $this->altText = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->altText->setValue($altText);
    }

    /**
     * @param string $nameOfAltCodingSystem
     */
    public function setNameOfAltCodingSystem(
        string $nameOfAltCodingSystem = null
    ) {
        $this->nameOfAltCodingSystem = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameOfAltCodingSystem->setValue($nameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getNameOfCodingSystem()
    {
        return $this->nameOfCodingSystem;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getAltIdentifier()
    {
        return $this->altIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V251\StDataType
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getNameOfAltCodingSystem()
    {
        return $this->nameOfAltCodingSystem;
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

        if ($this->getIdentifier() && $this->getIdentifier()->hasValue()) {
            $s .= (string) $this->getIdentifier()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getText() || !$this->getText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getText()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameOfCodingSystem() || !$this->getNameOfCodingSystem()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameOfCodingSystem()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAltIdentifier() || !$this->getAltIdentifier()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAltIdentifier()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAltText() || !$this->getAltText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAltText()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameOfAltCodingSystem() || !$this->getNameOfAltCodingSystem()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameOfAltCodingSystem()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
