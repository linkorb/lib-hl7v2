<?php

namespace Hl7v2\DataType;

/**
 * Specimen Source (SPS).
 */
class SpsDataType extends ComponentDataType
{
    const MAX_LEN = 4436;

    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $specimenSourceNameOrCode;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $additives;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    private $specimenCollectionMethod;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $bodySite;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $siteModifier;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $collectionMethodModifierCode;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    private $specimenRole;

    /**
     * @param string $specimenSourceNameOrCodeIdentifier
     * @param string $specimenSourceNameOrCodeText
     * @param string $specimenSourceNameOrCodeNameOfCodingSystem
     * @param string $specimenSourceNameOrCodeAltIdentifier
     * @param string $specimenSourceNameOrCodeAltText
     * @param string $specimenSourceNameOrCodeNameOfAltCodingSystem
     * @param string $specimenSourceNameOrCodeCodingSystemVersionId
     * @param string $specimenSourceNameOrCodeAltCodingSystemVersionId
     * @param string $specimenSourceNameOrCodeOriginalText
     */
    public function setSpecimenSourceNameOrCode(
        $specimenSourceNameOrCodeIdentifier = null,
        $specimenSourceNameOrCodeText = null,
        $specimenSourceNameOrCodeNameOfCodingSystem = null,
        $specimenSourceNameOrCodeAltIdentifier = null,
        $specimenSourceNameOrCodeAltText = null,
        $specimenSourceNameOrCodeNameOfAltCodingSystem = null,
        $specimenSourceNameOrCodeCodingSystemVersionId = null,
        $specimenSourceNameOrCodeAltCodingSystemVersionId = null,
        $specimenSourceNameOrCodeOriginalText = null
    ) {
        $this->specimenSourceNameOrCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenSourceNameOrCode->setIdentifier($specimenSourceNameOrCodeIdentifier);
        $this->specimenSourceNameOrCode->setText($specimenSourceNameOrCodeText);
        $this->specimenSourceNameOrCode->setNameOfCodingSystem(
            $specimenSourceNameOrCodeNameOfCodingSystem
        );
        $this->specimenSourceNameOrCode->setAltIdentifier($specimenSourceNameOrCodeAltIdentifier);
        $this->specimenSourceNameOrCode->setAltText($specimenSourceNameOrCodeAltText);
        $this->specimenSourceNameOrCode->setNameOfAltCodingSystem(
            $specimenSourceNameOrCodeNameOfAltCodingSystem
        );
        $this->specimenSourceNameOrCode->setCodingSystemVersionId(
            $specimenSourceNameOrCodeCodingSystemVersionId
        );
        $this->specimenSourceNameOrCode->setAltCodingSystemVersionId(
            $specimenSourceNameOrCodeAltCodingSystemVersionId
        );
        $this->specimenSourceNameOrCode->setOriginalText($specimenSourceNameOrCodeOriginalText);
    }

    /**
     * @param string $additivesIdentifier
     * @param string $additivesText
     * @param string $additivesNameOfCodingSystem
     * @param string $additivesAltIdentifier
     * @param string $additivesAltText
     * @param string $additivesNameOfAltCodingSystem
     * @param string $additivesCodingSystemVersionId
     * @param string $additivesAltCodingSystemVersionId
     * @param string $additivesOriginalText
     */
    public function setAdditives(
        $additivesIdentifier = null,
        $additivesText = null,
        $additivesNameOfCodingSystem = null,
        $additivesAltIdentifier = null,
        $additivesAltText = null,
        $additivesNameOfAltCodingSystem = null,
        $additivesCodingSystemVersionId = null,
        $additivesAltCodingSystemVersionId = null,
        $additivesOriginalText = null
    ) {
        $this->additives = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->additives->setIdentifier($additivesIdentifier);
        $this->additives->setText($additivesText);
        $this->additives->setNameOfCodingSystem($additivesNameOfCodingSystem);
        $this->additives->setAltIdentifier($additivesAltIdentifier);
        $this->additives->setAltText($additivesAltText);
        $this->additives->setNameOfAltCodingSystem($additivesNameOfAltCodingSystem);
        $this->additives->setCodingSystemVersionId($additivesCodingSystemVersionId);
        $this->additives->setAltCodingSystemVersionId($additivesAltCodingSystemVersionId);
        $this->additives->setOriginalText($additivesOriginalText);
    }

    /**
     * @param string $specimenCollectionMethod
     */
    public function setSpecimenCollectionMethod($specimenCollectionMethod = null)
    {
        $this->specimenCollectionMethod = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $this->specimenCollectionMethod->setValue($specimenCollectionMethod);
    }

    /**
     * @param string $bodySiteIdentifier
     * @param string $bodySiteText
     * @param string $bodySiteNameOfCodingSystem
     * @param string $bodySiteAltIdentifier
     * @param string $bodySiteAltText
     * @param string $bodySiteNameOfAltCodingSystem
     * @param string $bodySiteCodingSystemVersionId
     * @param string $bodySiteAltCodingSystemVersionId
     * @param string $bodySiteOriginalText
     */
    public function setBodySite(
        $bodySiteIdentifier = null,
        $bodySiteText = null,
        $bodySiteNameOfCodingSystem = null,
        $bodySiteAltIdentifier = null,
        $bodySiteAltText = null,
        $bodySiteNameOfAltCodingSystem = null,
        $bodySiteCodingSystemVersionId = null,
        $bodySiteAltCodingSystemVersionId = null,
        $bodySiteOriginalText = null
    ) {
        $this->bodySite = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->bodySite->setIdentifier($bodySiteIdentifier);
        $this->bodySite->setText($bodySiteText);
        $this->bodySite->setNameOfCodingSystem($bodySiteNameOfCodingSystem);
        $this->bodySite->setAltIdentifier($bodySiteAltIdentifier);
        $this->bodySite->setAltText($bodySiteAltText);
        $this->bodySite->setNameOfAltCodingSystem($bodySiteNameOfAltCodingSystem);
        $this->bodySite->setCodingSystemVersionId($bodySiteCodingSystemVersionId);
        $this->bodySite->setAltCodingSystemVersionId($bodySiteAltCodingSystemVersionId);
        $this->bodySite->setOriginalText($bodySiteOriginalText);
    }

    /**
     * @param string $siteModifierIdentifier
     * @param string $siteModifierText
     * @param string $siteModifierNameOfCodingSystem
     * @param string $siteModifierAltIdentifier
     * @param string $siteModifierAltText
     * @param string $siteModifierNameOfAltCodingSystem
     * @param string $siteModifierCodingSystemVersionId
     * @param string $siteModifierAltCodingSystemVersionId
     * @param string $siteModifierOriginalText
     */
    public function setSiteModifier(
        $siteModifierIdentifier = null,
        $siteModifierText = null,
        $siteModifierNameOfCodingSystem = null,
        $siteModifierAltIdentifier = null,
        $siteModifierAltText = null,
        $siteModifierNameOfAltCodingSystem = null,
        $siteModifierCodingSystemVersionId = null,
        $siteModifierAltCodingSystemVersionId = null,
        $siteModifierOriginalText = null
    ) {
        $this->siteModifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->siteModifier->setIdentifier($siteModifierIdentifier);
        $this->siteModifier->setText($siteModifierText);
        $this->siteModifier->setNameOfCodingSystem($siteModifierNameOfCodingSystem);
        $this->siteModifier->setAltIdentifier($siteModifierAltIdentifier);
        $this->siteModifier->setAltText($siteModifierAltText);
        $this->siteModifier->setNameOfAltCodingSystem($siteModifierNameOfAltCodingSystem);
        $this->siteModifier->setCodingSystemVersionId($siteModifierCodingSystemVersionId);
        $this->siteModifier->setAltCodingSystemVersionId($siteModifierAltCodingSystemVersionId);
        $this->siteModifier->setOriginalText($siteModifierOriginalText);
    }

    /**
     * @param string $collectionMethodModifierCodeIdentifier
     * @param string $collectionMethodModifierCodeText
     * @param string $collectionMethodModifierCodeNameOfCodingSystem
     * @param string $collectionMethodModifierCodeAltIdentifier
     * @param string $collectionMethodModifierCodeAltText
     * @param string $collectionMethodModifierCodeNameOfAltCodingSystem
     * @param string $collectionMethodModifierCodeCodingSystemVersionId
     * @param string $collectionMethodModifierCodeAltCodingSystemVersionId
     * @param string $collectionMethodModifierCodeOriginalText
     */
    public function setCollectionMethodModifierCode(
        $collectionMethodModifierCodeIdentifier = null,
        $collectionMethodModifierCodeText = null,
        $collectionMethodModifierCodeNameOfCodingSystem = null,
        $collectionMethodModifierCodeAltIdentifier = null,
        $collectionMethodModifierCodeAltText = null,
        $collectionMethodModifierCodeNameOfAltCodingSystem = null,
        $collectionMethodModifierCodeCodingSystemVersionId = null,
        $collectionMethodModifierCodeAltCodingSystemVersionId = null,
        $collectionMethodModifierCodeOriginalText = null
    ) {
        $this->collectionMethodModifierCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->collectionMethodModifierCode->setIdentifier($collectionMethodModifierCodeIdentifier);
        $this->collectionMethodModifierCode->setText($collectionMethodModifierCodeText);
        $this->collectionMethodModifierCode->setNameOfCodingSystem(
            $collectionMethodModifierCodeNameOfCodingSystem
        );
        $this->collectionMethodModifierCode->setAltIdentifier(
            $collectionMethodModifierCodeAltIdentifier
        );
        $this->collectionMethodModifierCode->setAltText($collectionMethodModifierCodeAltText);
        $this->collectionMethodModifierCode->setNameOfAltCodingSystem(
            $collectionMethodModifierCodeNameOfAltCodingSystem
        );
        $this->collectionMethodModifierCode->setCodingSystemVersionId(
            $collectionMethodModifierCodeCodingSystemVersionId
        );
        $this->collectionMethodModifierCode->setAltCodingSystemVersionId(
            $collectionMethodModifierCodeAltCodingSystemVersionId
        );
        $this->collectionMethodModifierCode->setOriginalText(
            $collectionMethodModifierCodeOriginalText
        );
    }

    /**
     * @param string $specimenRoleIdentifier
     * @param string $specimenRoleText
     * @param string $specimenRoleNameOfCodingSystem
     * @param string $specimenRoleAltIdentifier
     * @param string $specimenRoleAltText
     * @param string $specimenRoleNameOfAltCodingSystem
     * @param string $specimenRoleCodingSystemVersionId
     * @param string $specimenRoleAltCodingSystemVersionId
     * @param string $specimenRoleOriginalText
     */
    public function setSpecimenRole(
        $specimenRoleIdentifier = null,
        $specimenRoleText = null,
        $specimenRoleNameOfCodingSystem = null,
        $specimenRoleAltIdentifier = null,
        $specimenRoleAltText = null,
        $specimenRoleNameOfAltCodingSystem = null,
        $specimenRoleCodingSystemVersionId = null,
        $specimenRoleAltCodingSystemVersionId = null,
        $specimenRoleOriginalText = null
    ) {
        $this->specimenRole = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenRole->setIdentifier($specimenRoleIdentifier);
        $this->specimenRole->setText($specimenRoleText);
        $this->specimenRole->setNameOfCodingSystem($specimenRoleNameOfCodingSystem);
        $this->specimenRole->setAltIdentifier($specimenRoleAltIdentifier);
        $this->specimenRole->setAltText($specimenRoleAltText);
        $this->specimenRole->setNameOfAltCodingSystem($specimenRoleNameOfAltCodingSystem);
        $this->specimenRole->setCodingSystemVersionId($specimenRoleCodingSystemVersionId);
        $this->specimenRole->setAltCodingSystemVersionId($specimenRoleAltCodingSystemVersionId);
        $this->specimenRole->setOriginalText($specimenRoleOriginalText);
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenSourceNameOrCode()
    {
        return $this->specimenSourceNameOrCode;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getAdditives()
    {
        return $this->additives;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getSpecimenCollectionMethod()
    {
        return $this->specimenCollectionMethod;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getBodySite()
    {
        return $this->bodySite;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSiteModifier()
    {
        return $this->siteModifier;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getCollectionMethodModifierCode()
    {
        return $this->collectionMethodModifierCode;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenRole()
    {
        return $this->specimenRole;
    }
}
