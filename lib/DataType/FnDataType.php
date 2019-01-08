<?php

namespace Hl7v2\DataType;

/**
 * Family Name (FN).
 */
class FnDataType extends ComponentDataType
{
    const MAX_LEN = 194;

    /**
     * @var StDataType
     */
    private $surname;
    /**
     * @var StDataType
     */
    private $ownSurnamePrefix;
    /**
     * @var StDataType
     */
    private $ownSurname;
    /**
     * @var StDataType
     */
    private $surnamePrefixFromPartner;
    /**
     * @var StDataType
     */
    private $surnameFromPartner;

    /**
     * @param string $surname
     */
    public function setSurname(string $surname)
    {
        $this->surname = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->surname->setValue($surname);
    }

    /**
     * @param string $ownSurnamePrefix
     */
    public function setOwnSurnamePrefix(string $ownSurnamePrefix = null)
    {
        $this->ownSurnamePrefix = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->ownSurnamePrefix->setValue($ownSurnamePrefix);
    }

    /**
     * @param string $ownSurname
     */
    public function setOwnSurname(string $ownSurname = null)
    {
        $this->ownSurname = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->ownSurname->setValue($ownSurname);
    }

    /**
     * @param string $surnamePrefixFromPartner
     */
    public function setSurnamePrefixFromPartner(
        string $surnamePrefixFromPartner = null
    ) {
        $this->surnamePrefixFromPartner = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->surnamePrefixFromPartner->setValue($surnamePrefixFromPartner);
    }

    /**
     * @param string $surnameFromPartner
     */
    public function setSurnameFromPartner(string $surnameFromPartner = null)
    {
        $this->surnameFromPartner = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->surnameFromPartner->setValue($surnameFromPartner);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOwnSurnamePrefix()
    {
        return $this->ownSurnamePrefix;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOwnSurname()
    {
        return $this->ownSurname;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSurnamePrefixFromPartner()
    {
        return $this->surnamePrefixFromPartner;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSurnameFromPartner()
    {
        return $this->surnameFromPartner;
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

        if ($this->getSurname() && $this->getSurname()->hasValue()) {
            $s .= (string) $this->getSurname()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getOwnSurnamePrefix() || !$this->getOwnSurnamePrefix()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOwnSurnamePrefix()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getOwnSurname() || !$this->getOwnSurname()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getOwnSurname()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSurnamePrefixFromPartner() || !$this->getSurnamePrefixFromPartner()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSurnamePrefixFromPartner()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getSurnameFromPartner() || !$this->getSurnameFromPartner()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSurnameFromPartner()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
