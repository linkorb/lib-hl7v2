<?php

namespace Hl7v2\DataType;

/**
 * Name with Date and Location (NDL).
 */
class NdlDataType extends ComponentDataType
{
    const MAX_LEN = 835;

    /**
     * @var \Hl7v2\DataType\CnnDataType
     */
    private $name;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $startDateTime;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $endDateTime;
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
    private $patientLocationType;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $building;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $floor;

    /**
     * @param string $nameIdNumber
     * @param string $nameFamilyName
     * @param string $nameGivenName
     * @param string $nameSecondNames
     * @param string $nameSuffix
     * @param string $namePrefix
     * @param string $nameDegree
     * @param string $nameSourceTable
     * @param string $nameAssigningAuthorityNamespaceId
     * @param string $nameAssigningAuthorityUniversalId
     * @param string $nameAssigningAuthorityUniversalIdType
     */
    public function setName(
        $nameIdNumber = null,
        $nameFamilyName = null,
        $nameGivenName = null,
        $nameSecondNames = null,
        $nameSuffix = null,
        $namePrefix = null,
        $nameDegree = null,
        $nameSourceTable = null,
        $nameAssigningAuthorityNamespaceId = null,
        $nameAssigningAuthorityUniversalId = null,
        $nameAssigningAuthorityUniversalIdType = null
    ) {
        $this->name = $this
            ->dataTypeFactory
            ->create('CNN', $this->characterEncoding)
        ;
        $this->name->setIdNumber($nameIdNumber);
        $this->name->setFamilyName($nameFamilyName);
        $this->name->setGivenName($nameGivenName);
        $this->name->setSecondNames($nameSecondNames);
        $this->name->setSuffix($nameSuffix);
        $this->name->setPrefix($namePrefix);
        $this->name->setDegree($nameDegree);
        $this->name->setSourceTable($nameSourceTable);
        $this->name->setAssigningAuthorityNamespaceId($nameAssigningAuthorityNamespaceId);
        $this->name->setAssigningAuthorityUniversalId($nameAssigningAuthorityUniversalId);
        $this->name->setAssigningAuthorityUniversalIdType($nameAssigningAuthorityUniversalIdType);
    }

    /**
     * @param string $startDateTimeTime
     * @param string $startDateTimeDegreeOfPrecision
     */
    public function setStartDateTime($startDateTimeTime, $startDateTimeDegreeOfPrecision = null)
    {
        $this->startDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->startDateTime->setTime($startDateTimeTime);
        $this->startDateTime->setDegreeOfPrecision($startDateTimeDegreeOfPrecision);
    }

    /**
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     */
    public function setEndDateTime($endDateTimeTime, $endDateTimeDegreeOfPrecision = null)
    {
        $this->endDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->endDateTime->setTime($endDateTimeTime);
        $this->endDateTime->setDegreeOfPrecision($endDateTimeDegreeOfPrecision);
    }

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
     * @param string $patientLocationType
     */
    public function setPatientLocationType($patientLocationType = null)
    {
        $this->patientLocationType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->patientLocationType->setValue($patientLocationType);
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
     * @return \Hl7v2\DataType\CnnDataType
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
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
    public function getPatientLocationType()
    {
        return $this->patientLocationType;
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
}
