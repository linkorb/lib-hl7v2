<?php

namespace Hl7v2\DataType;

/**
 * Coded Element (CE).
 */
class CeDataType extends ComponentDataType
{
    const MAX_LEN = 483;

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
     * @param string $identifier
     */
    public function setIdentifier($identifier = null)
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
    public function setText($text = null)
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
    public function setNameOfCodingSystem($nameOfCodingSystem = null)
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
    public function setAltIdentifier($altIdentifier = null)
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
    public function setAltText($altText = null)
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
    public function setNameOfAltCodingSystem($nameOfAltCodingSystem = null)
    {
        $this->nameOfAltCodingSystem = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameOfAltCodingSystem->setValue($nameOfAltCodingSystem);
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
}
