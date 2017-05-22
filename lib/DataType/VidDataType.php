<?php

namespace Hl7v2\DataType;

/**
 * Version Identifier (VID).
 */
class VidDataType extends ComponentDataType
{
    const MAX_LEN = 60;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $versionId;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $internationalisationCode;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $internationalisationVersionId;

    /**
     * @param string $versionId
     */
    public function setVersionId($versionId = null)
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
        $internationalisationCodeIdentifier = null,
        $internationalisationCodeText = null,
        $internationalisationCodeNameOfCodingSystem = null,
        $internationalisationCodeAltIdentifier = null,
        $internationalisationCodeAltText = null,
        $internationalisationCodeNameOfAltCodingSystem = null
    ) {
        $this->internationalisationCode = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
        $internationalisationVersionIdIdentifier = null,
        $internationalisationVersionIdText = null,
        $internationalisationVersionIdNameOfCodingSystem = null,
        $internationalisationVersionIdAltIdentifier = null,
        $internationalisationVersionIdAltText = null,
        $internationalisationVersionIdNameOfAltCodingSystem = null
    ) {
        $this->internationalisationVersionId = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
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
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getVersionId()
    {
        return $this->versionId;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getInternationalisationCode()
    {
        return $this->internationalisationCode;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getInternationalisationVersionId()
    {
        return $this->internationalisationVersionId;
    }
}
