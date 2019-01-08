<?php

namespace Hl7v2\DataType;

/**
 * Specimen Source (SPS).
 */
class SpsDataType extends ComponentDataType
{
    const MAX_LEN = 4436;

    /**
     * @var CweDataType
     */
    private $specimenSourceNameOrCode;
    /**
     * @var CweDataType
     */
    private $additives;
    /**
     * @var TxDataType
     */
    private $specimenCollectionMethod;
    /**
     * @var CweDataType
     */
    private $bodySite;
    /**
     * @var CweDataType
     */
    private $siteModifier;
    /**
     * @var CweDataType
     */
    private $collectionMethodModifierCode;
    /**
     * @var CweDataType
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
        string $specimenSourceNameOrCodeIdentifier = null,
        string $specimenSourceNameOrCodeText = null,
        string $specimenSourceNameOrCodeNameOfCodingSystem = null,
        string $specimenSourceNameOrCodeAltIdentifier = null,
        string $specimenSourceNameOrCodeAltText = null,
        string $specimenSourceNameOrCodeNameOfAltCodingSystem = null,
        string $specimenSourceNameOrCodeCodingSystemVersionId = null,
        string $specimenSourceNameOrCodeAltCodingSystemVersionId = null,
        string $specimenSourceNameOrCodeOriginalText = null
    ) {
        $this->specimenSourceNameOrCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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
        string $additivesIdentifier = null,
        string $additivesText = null,
        string $additivesNameOfCodingSystem = null,
        string $additivesAltIdentifier = null,
        string $additivesAltText = null,
        string $additivesNameOfAltCodingSystem = null,
        string $additivesCodingSystemVersionId = null,
        string $additivesAltCodingSystemVersionId = null,
        string $additivesOriginalText = null
    ) {
        $this->additives = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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
    public function setSpecimenCollectionMethod(
        string $specimenCollectionMethod = null
    ) {
        $this->specimenCollectionMethod = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
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
        string $bodySiteIdentifier = null,
        string $bodySiteText = null,
        string $bodySiteNameOfCodingSystem = null,
        string $bodySiteAltIdentifier = null,
        string $bodySiteAltText = null,
        string $bodySiteNameOfAltCodingSystem = null,
        string $bodySiteCodingSystemVersionId = null,
        string $bodySiteAltCodingSystemVersionId = null,
        string $bodySiteOriginalText = null
    ) {
        $this->bodySite = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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
        string $siteModifierIdentifier = null,
        string $siteModifierText = null,
        string $siteModifierNameOfCodingSystem = null,
        string $siteModifierAltIdentifier = null,
        string $siteModifierAltText = null,
        string $siteModifierNameOfAltCodingSystem = null,
        string $siteModifierCodingSystemVersionId = null,
        string $siteModifierAltCodingSystemVersionId = null,
        string $siteModifierOriginalText = null
    ) {
        $this->siteModifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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
        string $collectionMethodModifierCodeIdentifier = null,
        string $collectionMethodModifierCodeText = null,
        string $collectionMethodModifierCodeNameOfCodingSystem = null,
        string $collectionMethodModifierCodeAltIdentifier = null,
        string $collectionMethodModifierCodeAltText = null,
        string $collectionMethodModifierCodeNameOfAltCodingSystem = null,
        string $collectionMethodModifierCodeCodingSystemVersionId = null,
        string $collectionMethodModifierCodeAltCodingSystemVersionId = null,
        string $collectionMethodModifierCodeOriginalText = null
    ) {
        $this->collectionMethodModifierCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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
        string $specimenRoleIdentifier = null,
        string $specimenRoleText = null,
        string $specimenRoleNameOfCodingSystem = null,
        string $specimenRoleAltIdentifier = null,
        string $specimenRoleAltText = null,
        string $specimenRoleNameOfAltCodingSystem = null,
        string $specimenRoleCodingSystemVersionId = null,
        string $specimenRoleAltCodingSystemVersionId = null,
        string $specimenRoleOriginalText = null
    ) {
        $this->specimenRole = $this
            ->dataTypeFactory
            ->create('CWE', $this->encodingParameters, true)
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

        if ($this->getSpecimenSourceNameOrCode()) {
            $s .= (string) $this->getSpecimenSourceNameOrCode();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getAdditives()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getAdditives();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getSpecimenCollectionMethod() || !$this->getSpecimenCollectionMethod()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getSpecimenCollectionMethod()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getBodySite()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getBodySite();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getSiteModifier()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getSiteModifier();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getCollectionMethodModifierCode()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getCollectionMethodModifierCode();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getSpecimenRole()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getSpecimenRole();
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
