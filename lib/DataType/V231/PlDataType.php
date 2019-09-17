<?php

namespace Hl7v2\DataType\V231;

use Hl7v2\DataType\ComponentDataType;

/**
 * Person Location (PL).
 */
class PlDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $pointOfCare;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $room;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $bed;
    /**
     * @var \Hl7v2\DataType\V231\HdDataType
     */
    private $facility;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $locationStatus;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $personLocationType;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $building;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $floor;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $locationDescription;

    /**
     * @param string $pointOfCare
     */
    public function setPointOfCare(string $pointOfCare = null)
    {
        $this->pointOfCare = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->pointOfCare->setValue($pointOfCare);
    }

    /**
     * @param string $room
     */
    public function setRoom(string $room = null)
    {
        $this->room = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->room->setValue($room);
    }

    /**
     * @param string $bed
     */
    public function setBed(string $bed = null)
    {
        $this->bed = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->bed->setValue($bed);
    }

    /**
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     */
    public function setFacility(
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null
    ) {
        $this->facility = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters, true)
        ;
        $this->facility->setNamespaceId($facilityNamespaceId);
        $this->facility->setUniversalId($facilityUniversalId);
        $this->facility->setUniversalIdType($facilityUniversalIdType);
    }

    /**
     * @param string $locationStatus
     */
    public function setLocationStatus(string $locationStatus = null)
    {
        $this->locationStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->locationStatus->setValue($locationStatus);
    }

    /**
     * @param string $personLocationType
     */
    public function setPersonLocationType(string $personLocationType = null)
    {
        $this->personLocationType = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->personLocationType->setValue($personLocationType);
    }

    /**
     * @param string $building
     */
    public function setBuilding(string $building = null)
    {
        $this->building = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->building->setValue($building);
    }

    /**
     * @param string $floor
     */
    public function setFloor(string $floor = null)
    {
        $this->floor = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->floor->setValue($floor);
    }

    /**
     * @param string $locationDescription
     */
    public function setLocationDescription(string $locationDescription = null)
    {
        $this->locationDescription = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->locationDescription->setValue($locationDescription);
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getPointOfCare()
    {
        return $this->pointOfCare;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getBed()
    {
        return $this->bed;
    }

    /**
     * @return \Hl7v2\DataType\V231\HdDataType
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getLocationStatus()
    {
        return $this->locationStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getPersonLocationType()
    {
        return $this->personLocationType;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getLocationDescription()
    {
        return $this->locationDescription;
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

        if ($this->getPointOfCare() && $this->getPointOfCare()->hasValue()) {
            $s .= (string) $this->getPointOfCare()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getRoom() || !$this->getRoom()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getRoom()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getBed() || !$this->getBed()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getBed()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFacility()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getFacility();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getLocationStatus() || !$this->getLocationStatus()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getLocationStatus()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getPersonLocationType() || !$this->getPersonLocationType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPersonLocationType()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getBuilding() || !$this->getBuilding()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getBuilding()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getFloor() || !$this->getFloor()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getFloor()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getLocationDescription() || !$this->getLocationDescription()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getLocationDescription()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
