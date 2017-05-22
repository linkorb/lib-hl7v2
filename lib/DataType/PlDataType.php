<?php

namespace Hl7v2\DataType;

/**
 * Person Location (PL).
 */
class PlDataType extends ComponentDataType
{
    const MAX_LEN = 1230;

    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $pointOfCare;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $room;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $bed;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    private $facility;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $locationStatus;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $personLocationType;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $building;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $floor;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    private $locationDescription;
    /**
     * @var \Hl7v2\DataType\EiDataType
     */
    private $comprehensiveLocationIdentifier;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    private $assigningAuthorityForLocation;

    /**
     * @param string $pointOfCare
     */
    public function setPointOfCare($pointOfCare = null)
    {
        $this->pointOfCare = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->pointOfCare->setValue($pointOfCare);
    }

    /**
     * @param string $room
     */
    public function setRoom($room = null)
    {
        $this->room = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->room->setValue($room);
    }

    /**
     * @param string $bed
     */
    public function setBed($bed = null)
    {
        $this->bed = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->bed->setValue($bed);
    }

    /**
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     */
    public function setFacility(
        $facilityNamespaceId = null,
        $facilityUniversalId = null,
        $facilityUniversalIdType = null
    ) {
        $this->facility = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->facility->setNamespaceId($facilityNamespaceId);
        $this->facility->setUniversalId($facilityUniversalId);
        $this->facility->setUniversalIdType($facilityUniversalIdType);
    }

    /**
     * @param string $locationStatus
     */
    public function setLocationStatus($locationStatus = null)
    {
        $this->locationStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->locationStatus->setValue($locationStatus);
    }

    /**
     * @param string $personLocationType
     */
    public function setPersonLocationType($personLocationType = null)
    {
        $this->personLocationType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->personLocationType->setValue($personLocationType);
    }

    /**
     * @param string $building
     */
    public function setBuilding($building = null)
    {
        $this->building = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->building->setValue($building);
    }

    /**
     * @param string $floor
     */
    public function setFloor($floor = null)
    {
        $this->floor = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->floor->setValue($floor);
    }

    /**
     * @param string $locationDescription
     */
    public function setLocationDescription($locationDescription = null)
    {
        $this->locationDescription = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->locationDescription->setValue($locationDescription);
    }

    /**
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     */
    public function setComprehensiveLocationIdentifier(
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null
    ) {
        $this->comprehensiveLocationIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->comprehensiveLocationIdentifier->setEntityIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier
        );
        $this->comprehensiveLocationIdentifier->setNamespaceId(
            $comprehensiveLocationIdentifierNamespaceId
        );
        $this->comprehensiveLocationIdentifier->setUniversalId(
            $comprehensiveLocationIdentifierUniversalId
        );
        $this->comprehensiveLocationIdentifier->setUniversalIdType(
            $comprehensiveLocationIdentifierUniversalIdType
        );
    }

    /**
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setAssigningAuthorityForLocation(
        $assigningAuthorityForLocationNamespaceId = null,
        $assigningAuthorityForLocationUniversalId = null,
        $assigningAuthorityForLocationUniversalIdType = null
    ) {
        $this->assigningAuthorityForLocation = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->assigningAuthorityForLocation->setNamespaceId(
            $assigningAuthorityForLocationNamespaceId
        );
        $this->assigningAuthorityForLocation->setUniversalId(
            $assigningAuthorityForLocationUniversalId
        );
        $this->assigningAuthorityForLocation->setUniversalIdType(
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getPointOfCare()
    {
        return $this->pointOfCare;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getBed()
    {
        return $this->bed;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getLocationStatus()
    {
        return $this->locationStatus;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getPersonLocationType()
    {
        return $this->personLocationType;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getLocationDescription()
    {
        return $this->locationDescription;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType
     */
    public function getComprehensiveLocationIdentifier()
    {
        return $this->comprehensiveLocationIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getAssigningAuthorityForLocation()
    {
        return $this->assigningAuthorityForLocation;
    }
}
