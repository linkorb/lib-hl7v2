<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Extended Person Name (XPN).
 */
class XpnDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $familyName;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $givenName;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $middleInitialOrName;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $suffix;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $prefix;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $degree;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $nameTypeCode;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $nameRepresentationCode;

    /**
     * @param string $familyName
     */
    public function setFamilyName(string $familyName = null)
    {
        $this->familyName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->familyName->setValue($familyName);
    }

    /**
     * @param string $givenName
     */
    public function setGivenName(string $givenName = null)
    {
        $this->givenName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->givenName->setValue($givenName);
    }

    /**
     * @param string $middleInitialOrName
     */
    public function setMiddleInitialOrName(string $middleInitialOrName = null)
    {
        $this->middleInitialOrName = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->middleInitialOrName->setValue($middleInitialOrName);
    }

    /**
     * @param string $suffix
     */
    public function setSuffix(string $suffix = null)
    {
        $this->suffix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->suffix->setValue($suffix);
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix = null)
    {
        $this->prefix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->prefix->setValue($prefix);
    }

    /**
     * @param string $degree
     */
    public function setDegree(string $degree = null)
    {
        $this->degree = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->degree->setValue($degree);
    }

    /**
     * @param string $nameTypeCode
     */
    public function setNameTypeCode(string $nameTypeCode = null)
    {
        $this->nameTypeCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameTypeCode->setValue($nameTypeCode);
    }

    /**
     * @param string $nameRepresentationCode
     */
    public function setNameRepresentationCode(
        string $nameRepresentationCode = null
    ) {
        $this->nameRepresentationCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->nameRepresentationCode->setValue($nameRepresentationCode);
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getMiddleInitialOrName()
    {
        return $this->middleInitialOrName;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getNameTypeCode()
    {
        return $this->nameTypeCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getNameRepresentationCode()
    {
        return $this->nameRepresentationCode;
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

        if ($this->getFamilyName() && $this->getFamilyName()->hasValue()) {
            $s .= (string) $this->getFamilyName()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getGivenName() || !$this->getGivenName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getGivenName()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getMiddleInitialOrName() || !$this->getMiddleInitialOrName()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getMiddleInitialOrName()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSuffix() || !$this->getSuffix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSuffix()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPrefix() || !$this->getPrefix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPrefix()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getDegree() || !$this->getDegree()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDegree()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameTypeCode() || !$this->getNameTypeCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameTypeCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getNameRepresentationCode() || !$this->getNameRepresentationCode()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getNameRepresentationCode()->getValue()
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
