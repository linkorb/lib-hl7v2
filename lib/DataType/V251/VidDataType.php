<?php

namespace Hl7v2\DataType\V251;

use Hl7v2\DataType\ComponentDataType;

/**
 * Version Identifier (VID).
 */
class VidDataType extends ComponentDataType
{
    const MAX_LEN = 60;

    /**
     * @var \Hl7v2\DataType\V251\IdDataType
     */
    private $versionId;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $internationalisationCode;
    /**
     * @var \Hl7v2\DataType\V251\CeDataType
     */
    private $internationalisationVersionId;

    /**
     * @param string $versionId
     */
    public function setVersionId(string $versionId = null)
    {
        $this->versionId = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->versionId->setValue($versionId);
    }

    /**
     * @param string $internationalisationCodeIdentifier
     * @param string $internationalisationCodeText
     * @param string $internationalisationCodeNameOfCodingSystem
     * @param string $internationalisationCodeAltIdentifier
     * @param string $internationalisationCodeAltText
     * @param string $internationalisationCodeNameOfAltCodingSystem
     */
    public function setInternationalisationCode(
        string $internationalisationCodeIdentifier = null,
        string $internationalisationCodeText = null,
        string $internationalisationCodeNameOfCodingSystem = null,
        string $internationalisationCodeAltIdentifier = null,
        string $internationalisationCodeAltText = null,
        string $internationalisationCodeNameOfAltCodingSystem = null
    ) {
        $this->internationalisationCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
        ;
        $this->internationalisationCode->setIdentifier($internationalisationCodeIdentifier);
        $this->internationalisationCode->setText($internationalisationCodeText);
        $this->internationalisationCode->setNameOfCodingSystem(
            $internationalisationCodeNameOfCodingSystem
        );
        $this->internationalisationCode->setAltIdentifier($internationalisationCodeAltIdentifier);
        $this->internationalisationCode->setAltText($internationalisationCodeAltText);
        $this->internationalisationCode->setNameOfAltCodingSystem(
            $internationalisationCodeNameOfAltCodingSystem
        );
    }

    /**
     * @param string $internationalisationVersionIdIdentifier
     * @param string $internationalisationVersionIdText
     * @param string $internationalisationVersionIdNameOfCodingSystem
     * @param string $internationalisationVersionIdAltIdentifier
     * @param string $internationalisationVersionIdAltText
     * @param string $internationalisationVersionIdNameOfAltCodingSystem
     */
    public function setInternationalisationVersionId(
        string $internationalisationVersionIdIdentifier = null,
        string $internationalisationVersionIdText = null,
        string $internationalisationVersionIdNameOfCodingSystem = null,
        string $internationalisationVersionIdAltIdentifier = null,
        string $internationalisationVersionIdAltText = null,
        string $internationalisationVersionIdNameOfAltCodingSystem = null
    ) {
        $this->internationalisationVersionId = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters, true)
        ;
        $this->internationalisationVersionId->setIdentifier(
            $internationalisationVersionIdIdentifier
        );
        $this->internationalisationVersionId->setText($internationalisationVersionIdText);
        $this->internationalisationVersionId->setNameOfCodingSystem(
            $internationalisationVersionIdNameOfCodingSystem
        );
        $this->internationalisationVersionId->setAltIdentifier(
            $internationalisationVersionIdAltIdentifier
        );
        $this->internationalisationVersionId->setAltText($internationalisationVersionIdAltText);
        $this->internationalisationVersionId->setNameOfAltCodingSystem(
            $internationalisationVersionIdNameOfAltCodingSystem
        );
    }

    /**
     * @return \Hl7v2\DataType\V251\IdDataType
     */
    public function getVersionId()
    {
        return $this->versionId;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getInternationalisationCode()
    {
        return $this->internationalisationCode;
    }

    /**
     * @return \Hl7v2\DataType\V251\CeDataType
     */
    public function getInternationalisationVersionId()
    {
        return $this->internationalisationVersionId;
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

        if ($this->getVersionId() && $this->getVersionId()->hasValue()) {
            $s .= (string) $this->getVersionId()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getInternationalisationCode()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getInternationalisationCode();
            if ('' === $value) {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getInternationalisationVersionId()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getInternationalisationVersionId();
            if ('' === $value) {
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
