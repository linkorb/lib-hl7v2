<?php

namespace Hl7v2\DataType;

/**
 * Coded with Exceptions (CWE).
 */
class CweDataType extends ComponentDataType
{
    const MAX_LEN = 705;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $identifier;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $text;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $nameOfCodingSystem;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $altIdentifier;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $altText;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $nameOfAltCodingSystem;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $codingSystemVersionId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $altCodingSystemVersionId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $originalText;

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
     * @param string $codingSystemVersionId
     */
    public function setCodingSystemVersionId(
        string $codingSystemVersionId = null
    ) {
        $this->codingSystemVersionId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->codingSystemVersionId->setValue($codingSystemVersionId);
    }

    /**
     * @param string $altCodingSystemVersionId
     */
    public function setAltCodingSystemVersionId(
        string $altCodingSystemVersionId = null
    ) {
        $this->altCodingSystemVersionId = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->altCodingSystemVersionId->setValue($altCodingSystemVersionId);
    }

    /**
     * @param string $originalText
     */
    public function setOriginalText(string $originalText = null)
    {
        $this->originalText = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->originalText->setValue($originalText);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameOfCodingSystem()
    {
        return $this->nameOfCodingSystem;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAltIdentifier()
    {
        return $this->altIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameOfAltCodingSystem()
    {
        return $this->nameOfAltCodingSystem;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getCodingSystemVersionId()
    {
        return $this->codingSystemVersionId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAltCodingSystemVersionId()
    {
        return $this->altCodingSystemVersionId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOriginalText()
    {
        return $this->originalText;
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
                . (string) $this->getText()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameOfCodingSystem() || !$this->getNameOfCodingSystem()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameOfCodingSystem()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAltIdentifier() || !$this->getAltIdentifier()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAltIdentifier()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAltText() || !$this->getAltText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAltText()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameOfAltCodingSystem() || !$this->getNameOfAltCodingSystem()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameOfAltCodingSystem()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getCodingSystemVersionId() || !$this->getCodingSystemVersionId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getCodingSystemVersionId()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getAltCodingSystemVersionId() || !$this->getAltCodingSystemVersionId()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getAltCodingSystemVersionId()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOriginalText() || !$this->getOriginalText()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOriginalText()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
