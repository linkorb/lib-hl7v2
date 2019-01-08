<?php

namespace Hl7v2\DataType;

/**
 * Name with Date and Location (NDL).
 */
class NdlDataType extends ComponentDataType
{
    const MAX_LEN = 835;

    /**
     * @var CnnDataType
     */
    private $name;
    /**
     * @var TsDataType
     */
    private $startDateTime;
    /**
     * @var TsDataType
     */
    private $endDateTime;
    /**
     * @var IsDataType
     */
    private $pointOfCare;
    /**
     * @var IsDataType
     */
    private $room;
    /**
     * @var IsDataType
     */
    private $bed;
    /**
     * @var HdDataType
     */
    private $facility;
    /**
     * @var IsDataType
     */
    private $locationStatus;
    /**
     * @var IsDataType
     */
    private $patientLocationType;
    /**
     * @var IsDataType
     */
    private $building;
    /**
     * @var IsDataType
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
        string $nameIdNumber = null,
        string $nameFamilyName = null,
        string $nameGivenName = null,
        string $nameSecondNames = null,
        string $nameSuffix = null,
        string $namePrefix = null,
        string $nameDegree = null,
        string $nameSourceTable = null,
        string $nameAssigningAuthorityNamespaceId = null,
        string $nameAssigningAuthorityUniversalId = null,
        string $nameAssigningAuthorityUniversalIdType = null
    ) {
        $this->name = $this
            ->dataTypeFactory
            ->create('CNN', $this->encodingParameters, true)
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
    public function setStartDateTime(
        string $startDateTimeTime,
        string $startDateTimeDegreeOfPrecision = null
    ) {
        $this->startDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->startDateTime->setTime($startDateTimeTime);
        $this->startDateTime->setDegreeOfPrecision($startDateTimeDegreeOfPrecision);
    }

    /**
     * @param string $endDateTimeTime
     * @param string $endDateTimeDegreeOfPrecision
     */
    public function setEndDateTime(
        string $endDateTimeTime,
        string $endDateTimeDegreeOfPrecision = null
    ) {
        $this->endDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters, true)
        ;
        $this->endDateTime->setTime($endDateTimeTime);
        $this->endDateTime->setDegreeOfPrecision($endDateTimeDegreeOfPrecision);
    }

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
     * @param string $patientLocationType
     */
    public function setPatientLocationType(string $patientLocationType = null)
    {
        $this->patientLocationType = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->patientLocationType->setValue($patientLocationType);
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

        if ($this->getName()) {
            $s .= (string) $this->getName();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getStartDateTime()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getStartDateTime();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getEndDateTime()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $value = (string) $this->getEndDateTime();
            if ($value === '') {
                ++$emptyComponentsSinceLastComponent;
            } else {
                $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                    . $value
                ;
                $emptyComponentsSinceLastComponent = 0;
            }
        }

        if (!$this->getPointOfCare() || !$this->getPointOfCare()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPointOfCare()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

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

        if (!$this->getPatientLocationType() || !$this->getPatientLocationType()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getPatientLocationType()->getValue();
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

        return $s;
    }
}
