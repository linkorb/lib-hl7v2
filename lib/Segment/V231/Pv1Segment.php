<?php

namespace Hl7v2\Segment\V231;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Patient Visit (PV1).
 */
class Pv1Segment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V231\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $patientClass;
    /**
     * @var \Hl7v2\DataType\V231\PlDataType
     */
    private $assignedPatientLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $admissionType = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType
     */
    private $preadmitNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\PlDataType
     */
    private $priorPatientLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $attendingDoctor = [];
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $referringDoctor = [];
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $consultingDoctor = [];
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $hospitalService = null;
    /**
     * @var \Hl7v2\DataType\V231\PlDataType
     */
    private $temporaryLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $preadmitTestIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $readmissionIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $admitSource = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType[]
     */
    private $ambulatoryStatus = [];
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $vipIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $admittingDoctor = [];
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $patientType = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType
     */
    private $visitNumber = null;
    /**
     * @var \Hl7v2\DataType\V231\FcDataType[]
     */
    private $financialClass = [];
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $chargePriceIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $courtesyCode = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $creditRating = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType[]
     */
    private $contractCode = [];
    /**
     * @var \Hl7v2\DataType\V231\DtDataType[]
     */
    private $contractEffectiveDate = [];
    /**
     * @var \Hl7v2\DataType\V231\NmDataType[]
     */
    private $contractAmount = [];
    /**
     * @var \Hl7v2\DataType\V231\NmDataType[]
     */
    private $contractPeriod = [];
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $interestCode = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $transferToBadDebtCode = null;
    /**
     * @var \Hl7v2\DataType\V231\DtDataType
     */
    private $transferToBadDebtDate = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $badDebtAgencyCode = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $badDebtTransferAmount = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $badDebtRecoveryAmount = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $deleteAccountIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\DtDataType
     */
    private $deleteAccountDate = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $dischargeDisposition = null;
    /**
     * @var \Hl7v2\DataType\V231\CmDataType
     */
    private $dischargedToLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $dietType = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $servicingFacility = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $bedStatus = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $accountStatus = null;
    /**
     * @var \Hl7v2\DataType\V231\PlDataType
     */
    private $pendingLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\PlDataType
     */
    private $priorTemporaryLocation = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $admitDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $dischargeDatetime = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $currentPatientBalance = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $totalCharges = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $totalAdjustments = null;
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $totalPayments = null;
    /**
     * @var \Hl7v2\DataType\V231\CxDataType
     */
    private $altVisitId = null;
    /**
     * @var \Hl7v2\DataType\V231\IsDataType
     */
    private $visitIndicator = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $otherHealthcareProvider = [];

    /**
     * @param string $value
     */
    public function setFieldSetId(string $value)
    {
        $this->setId = $this
            ->dataTypeFactory
            ->create('SI', $this->encodingParameters)
        ;
        $this->setId->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldPatientClass(string $value)
    {
        $this->patientClass = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->patientClass->setValue($value);
    }

    /**
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     */
    public function setFieldAssignedPatientLocation(
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $personLocationType = null,
        string $building = null,
        string $floor = null,
        string $locationDescription = null
    ) {
        $this->assignedPatientLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->encodingParameters)
        ;
        $this->assignedPatientLocation->setPointOfCare($pointOfCare);
        $this->assignedPatientLocation->setRoom($room);
        $this->assignedPatientLocation->setBed($bed);
        $this->assignedPatientLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->assignedPatientLocation->setLocationStatus($locationStatus);
        $this->assignedPatientLocation->setPersonLocationType($personLocationType);
        $this->assignedPatientLocation->setBuilding($building);
        $this->assignedPatientLocation->setFloor($floor);
        $this->assignedPatientLocation->setLocationDescription($locationDescription);
    }

    /**
     * @param string $value
     */
    public function setFieldAdmissionType(string $value)
    {
        $this->admissionType = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->admissionType->setValue($value);
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setFieldPreadmitNumber(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $this->preadmitNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->preadmitNumber->setId($id);
        $this->preadmitNumber->setCheckDigit($checkDigit);
        $this->preadmitNumber->setCheckDigitScheme($checkDigitScheme);
        $this->preadmitNumber->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->preadmitNumber->setIdentifierTypeCode($identifierTypeCode);
        $this->preadmitNumber->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     */
    public function setFieldPriorPatientLocation(
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $personLocationType = null,
        string $building = null,
        string $floor = null,
        string $locationDescription = null
    ) {
        $this->priorPatientLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->encodingParameters)
        ;
        $this->priorPatientLocation->setPointOfCare($pointOfCare);
        $this->priorPatientLocation->setRoom($room);
        $this->priorPatientLocation->setBed($bed);
        $this->priorPatientLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->priorPatientLocation->setLocationStatus($locationStatus);
        $this->priorPatientLocation->setPersonLocationType($personLocationType);
        $this->priorPatientLocation->setBuilding($building);
        $this->priorPatientLocation->setFloor($floor);
        $this->priorPatientLocation->setLocationDescription($locationDescription);
    }

    /**
     * @param string $idNumber
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     */
    public function addFieldAttendingDoctor(
        string $idNumber = null,
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $sourceTable = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $nameTypeCode = null,
        string $identifierCheckDigit = null,
        string $checkDigitScheme = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null
    ) {
        $attendingDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->attendingDoctor[] = $attendingDoctor;
        $attendingDoctor->setIdNumber($idNumber);
        $attendingDoctor->setFamilyName($familyName);
        $attendingDoctor->setGivenName($givenName);
        $attendingDoctor->setMiddleInitialOrName($middleInitialOrName);
        $attendingDoctor->setSuffix($suffix);
        $attendingDoctor->setPrefix($prefix);
        $attendingDoctor->setDegree($degree);
        $attendingDoctor->setSourceTable($sourceTable);
        $attendingDoctor->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $attendingDoctor->setNameTypeCode($nameTypeCode);
        $attendingDoctor->setIdentifierCheckDigit($identifierCheckDigit);
        $attendingDoctor->setCheckDigitScheme($checkDigitScheme);
        $attendingDoctor->setIdentifierTypeCode($identifierTypeCode);
        $attendingDoctor->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $attendingDoctor->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $idNumber
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     */
    public function addFieldReferringDoctor(
        string $idNumber = null,
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $sourceTable = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $nameTypeCode = null,
        string $identifierCheckDigit = null,
        string $checkDigitScheme = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null
    ) {
        $referringDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->referringDoctor[] = $referringDoctor;
        $referringDoctor->setIdNumber($idNumber);
        $referringDoctor->setFamilyName($familyName);
        $referringDoctor->setGivenName($givenName);
        $referringDoctor->setMiddleInitialOrName($middleInitialOrName);
        $referringDoctor->setSuffix($suffix);
        $referringDoctor->setPrefix($prefix);
        $referringDoctor->setDegree($degree);
        $referringDoctor->setSourceTable($sourceTable);
        $referringDoctor->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $referringDoctor->setNameTypeCode($nameTypeCode);
        $referringDoctor->setIdentifierCheckDigit($identifierCheckDigit);
        $referringDoctor->setCheckDigitScheme($checkDigitScheme);
        $referringDoctor->setIdentifierTypeCode($identifierTypeCode);
        $referringDoctor->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $referringDoctor->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $idNumber
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     */
    public function addFieldConsultingDoctor(
        string $idNumber = null,
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $sourceTable = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $nameTypeCode = null,
        string $identifierCheckDigit = null,
        string $checkDigitScheme = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null
    ) {
        $consultingDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->consultingDoctor[] = $consultingDoctor;
        $consultingDoctor->setIdNumber($idNumber);
        $consultingDoctor->setFamilyName($familyName);
        $consultingDoctor->setGivenName($givenName);
        $consultingDoctor->setMiddleInitialOrName($middleInitialOrName);
        $consultingDoctor->setSuffix($suffix);
        $consultingDoctor->setPrefix($prefix);
        $consultingDoctor->setDegree($degree);
        $consultingDoctor->setSourceTable($sourceTable);
        $consultingDoctor->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $consultingDoctor->setNameTypeCode($nameTypeCode);
        $consultingDoctor->setIdentifierCheckDigit($identifierCheckDigit);
        $consultingDoctor->setCheckDigitScheme($checkDigitScheme);
        $consultingDoctor->setIdentifierTypeCode($identifierTypeCode);
        $consultingDoctor->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $consultingDoctor->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $value
     */
    public function setFieldHospitalService(string $value)
    {
        $this->hospitalService = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->hospitalService->setValue($value);
    }

    /**
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     */
    public function setFieldTemporaryLocation(
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $personLocationType = null,
        string $building = null,
        string $floor = null,
        string $locationDescription = null
    ) {
        $this->temporaryLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->encodingParameters)
        ;
        $this->temporaryLocation->setPointOfCare($pointOfCare);
        $this->temporaryLocation->setRoom($room);
        $this->temporaryLocation->setBed($bed);
        $this->temporaryLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->temporaryLocation->setLocationStatus($locationStatus);
        $this->temporaryLocation->setPersonLocationType($personLocationType);
        $this->temporaryLocation->setBuilding($building);
        $this->temporaryLocation->setFloor($floor);
        $this->temporaryLocation->setLocationDescription($locationDescription);
    }

    /**
     * @param string $value
     */
    public function setFieldPreadmitTestIndicator(string $value)
    {
        $this->preadmitTestIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->preadmitTestIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldReadmissionIndicator(string $value)
    {
        $this->readmissionIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->readmissionIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAdmitSource(string $value)
    {
        $this->admitSource = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->admitSource->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldAmbulatoryStatus(string $value)
    {
        $ambulatoryStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $ambulatoryStatus->setValue($value);
        $this->ambulatoryStatus[] = $ambulatoryStatus;
    }

    /**
     * @param string $value
     */
    public function setFieldVipIndicator(string $value)
    {
        $this->vipIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->vipIndicator->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     */
    public function addFieldAdmittingDoctor(
        string $idNumber = null,
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $sourceTable = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $nameTypeCode = null,
        string $identifierCheckDigit = null,
        string $checkDigitScheme = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null
    ) {
        $admittingDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->admittingDoctor[] = $admittingDoctor;
        $admittingDoctor->setIdNumber($idNumber);
        $admittingDoctor->setFamilyName($familyName);
        $admittingDoctor->setGivenName($givenName);
        $admittingDoctor->setMiddleInitialOrName($middleInitialOrName);
        $admittingDoctor->setSuffix($suffix);
        $admittingDoctor->setPrefix($prefix);
        $admittingDoctor->setDegree($degree);
        $admittingDoctor->setSourceTable($sourceTable);
        $admittingDoctor->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $admittingDoctor->setNameTypeCode($nameTypeCode);
        $admittingDoctor->setIdentifierCheckDigit($identifierCheckDigit);
        $admittingDoctor->setCheckDigitScheme($checkDigitScheme);
        $admittingDoctor->setIdentifierTypeCode($identifierTypeCode);
        $admittingDoctor->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $admittingDoctor->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $value
     */
    public function setFieldPatientType(string $value)
    {
        $this->patientType = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->patientType->setValue($value);
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setFieldVisitNumber(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $this->visitNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->visitNumber->setId($id);
        $this->visitNumber->setCheckDigit($checkDigit);
        $this->visitNumber->setCheckDigitScheme($checkDigitScheme);
        $this->visitNumber->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->visitNumber->setIdentifierTypeCode($identifierTypeCode);
        $this->visitNumber->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $financialClassCode
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function addFieldFinancialClass(
        string $financialClassCode = null,
        string $effectiveDateTime = null,
        string $effectiveDateDegreeOfPrecision = null
    ) {
        $financialClass = $this
            ->dataTypeFactory
            ->create('FC', $this->encodingParameters)
        ;
        $this->financialClass[] = $financialClass;
        $financialClass->setFinancialClassCode($financialClassCode);
        $financialClass->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldChargePriceIndicator(string $value)
    {
        $this->chargePriceIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->chargePriceIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCourtesyCode(string $value)
    {
        $this->courtesyCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->courtesyCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCreditRating(string $value)
    {
        $this->creditRating = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->creditRating->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldContractCode(string $value)
    {
        $contractCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $contractCode->setValue($value);
        $this->contractCode[] = $contractCode;
    }

    /**
     * @param string $value
     */
    public function addFieldContractEffectiveDate(string $value)
    {
        $contractEffectiveDate = $this
            ->dataTypeFactory
            ->create('DT', $this->encodingParameters)
        ;
        $contractEffectiveDate->setValue($value);
        $this->contractEffectiveDate[] = $contractEffectiveDate;
    }

    /**
     * @param string $value
     */
    public function addFieldContractAmount(string $value)
    {
        $contractAmount = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $contractAmount->setValue($value);
        $this->contractAmount[] = $contractAmount;
    }

    /**
     * @param string $value
     */
    public function addFieldContractPeriod(string $value)
    {
        $contractPeriod = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $contractPeriod->setValue($value);
        $this->contractPeriod[] = $contractPeriod;
    }

    /**
     * @param string $value
     */
    public function setFieldInterestCode(string $value)
    {
        $this->interestCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->interestCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTransferToBadDebtCode(string $value)
    {
        $this->transferToBadDebtCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->transferToBadDebtCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTransferToBadDebtDate(string $value)
    {
        $this->transferToBadDebtDate = $this
            ->dataTypeFactory
            ->create('DT', $this->encodingParameters)
        ;
        $this->transferToBadDebtDate->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBadDebtAgencyCode(string $value)
    {
        $this->badDebtAgencyCode = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->badDebtAgencyCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBadDebtTransferAmount(string $value)
    {
        $this->badDebtTransferAmount = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->badDebtTransferAmount->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBadDebtRecoveryAmount(string $value)
    {
        $this->badDebtRecoveryAmount = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->badDebtRecoveryAmount->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDeleteAccountIndicator(string $value)
    {
        $this->deleteAccountIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->deleteAccountIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDeleteAccountDate(string $value)
    {
        $this->deleteAccountDate = $this
            ->dataTypeFactory
            ->create('DT', $this->encodingParameters)
        ;
        $this->deleteAccountDate->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDischargeDisposition(string $value)
    {
        $this->dischargeDisposition = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->dischargeDisposition->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDischargedToLocation(string $value)
    {
        $this->dischargedToLocation = $this
            ->dataTypeFactory
            ->create('CM', $this->encodingParameters)
        ;
        $this->dischargedToLocation->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldDietType(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->dietType = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->dietType->setIdentifier($identifier);
        $this->dietType->setText($text);
        $this->dietType->setNameOfCodingSystem($nameOfCodingSystem);
        $this->dietType->setAltIdentifier($altIdentifier);
        $this->dietType->setAltText($altText);
        $this->dietType->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldServicingFacility(string $value)
    {
        $this->servicingFacility = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->servicingFacility->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBedStatus(string $value)
    {
        $this->bedStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->bedStatus->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAccountStatus(string $value)
    {
        $this->accountStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->accountStatus->setValue($value);
    }

    /**
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     */
    public function setFieldPendingLocation(
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $personLocationType = null,
        string $building = null,
        string $floor = null,
        string $locationDescription = null
    ) {
        $this->pendingLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->encodingParameters)
        ;
        $this->pendingLocation->setPointOfCare($pointOfCare);
        $this->pendingLocation->setRoom($room);
        $this->pendingLocation->setBed($bed);
        $this->pendingLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->pendingLocation->setLocationStatus($locationStatus);
        $this->pendingLocation->setPersonLocationType($personLocationType);
        $this->pendingLocation->setBuilding($building);
        $this->pendingLocation->setFloor($floor);
        $this->pendingLocation->setLocationDescription($locationDescription);
    }

    /**
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     */
    public function setFieldPriorTemporaryLocation(
        string $pointOfCare = null,
        string $room = null,
        string $bed = null,
        string $facilityNamespaceId = null,
        string $facilityUniversalId = null,
        string $facilityUniversalIdType = null,
        string $locationStatus = null,
        string $personLocationType = null,
        string $building = null,
        string $floor = null,
        string $locationDescription = null
    ) {
        $this->priorTemporaryLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->encodingParameters)
        ;
        $this->priorTemporaryLocation->setPointOfCare($pointOfCare);
        $this->priorTemporaryLocation->setRoom($room);
        $this->priorTemporaryLocation->setBed($bed);
        $this->priorTemporaryLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->priorTemporaryLocation->setLocationStatus($locationStatus);
        $this->priorTemporaryLocation->setPersonLocationType($personLocationType);
        $this->priorTemporaryLocation->setBuilding($building);
        $this->priorTemporaryLocation->setFloor($floor);
        $this->priorTemporaryLocation->setLocationDescription($locationDescription);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldAdmitDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->admitDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->admitDatetime->setTime($time);
        $this->admitDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDischargeDatetime(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->dischargeDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->dischargeDatetime->setTime($time);
        $this->dischargeDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldCurrentPatientBalance(string $value)
    {
        $this->currentPatientBalance = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->currentPatientBalance->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTotalCharges(string $value)
    {
        $this->totalCharges = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->totalCharges->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTotalAdjustments(string $value)
    {
        $this->totalAdjustments = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->totalAdjustments->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTotalPayments(string $value)
    {
        $this->totalPayments = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->totalPayments->setValue($value);
    }

    /**
     * @param string $id
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     */
    public function setFieldAltVisitId(
        string $id = null,
        string $checkDigit = null,
        string $checkDigitScheme = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null
    ) {
        $this->altVisitId = $this
            ->dataTypeFactory
            ->create('CX', $this->encodingParameters)
        ;
        $this->altVisitId->setId($id);
        $this->altVisitId->setCheckDigit($checkDigit);
        $this->altVisitId->setCheckDigitScheme($checkDigitScheme);
        $this->altVisitId->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->altVisitId->setIdentifierTypeCode($identifierTypeCode);
        $this->altVisitId->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
    }

    /**
     * @param string $value
     */
    public function setFieldVisitIndicator(string $value)
    {
        $this->visitIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->encodingParameters)
        ;
        $this->visitIndicator->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $familyName
     * @param string $givenName
     * @param string $middleInitialOrName
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     */
    public function addFieldOtherHealthcareProvider(
        string $idNumber = null,
        string $familyName = null,
        string $givenName = null,
        string $middleInitialOrName = null,
        string $suffix = null,
        string $prefix = null,
        string $degree = null,
        string $sourceTable = null,
        string $assigningAuthorityNamespaceId = null,
        string $assigningAuthorityUniversalId = null,
        string $assigningAuthorityUniversalIdType = null,
        string $nameTypeCode = null,
        string $identifierCheckDigit = null,
        string $checkDigitScheme = null,
        string $identifierTypeCode = null,
        string $assigningFacilityNamespaceId = null,
        string $assigningFacilityUniversalId = null,
        string $assigningFacilityUniversalIdType = null,
        string $nameRepresentationCode = null
    ) {
        $otherHealthcareProvider = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->otherHealthcareProvider[] = $otherHealthcareProvider;
        $otherHealthcareProvider->setIdNumber($idNumber);
        $otherHealthcareProvider->setFamilyName($familyName);
        $otherHealthcareProvider->setGivenName($givenName);
        $otherHealthcareProvider->setMiddleInitialOrName($middleInitialOrName);
        $otherHealthcareProvider->setSuffix($suffix);
        $otherHealthcareProvider->setPrefix($prefix);
        $otherHealthcareProvider->setDegree($degree);
        $otherHealthcareProvider->setSourceTable($sourceTable);
        $otherHealthcareProvider->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $otherHealthcareProvider->setNameTypeCode($nameTypeCode);
        $otherHealthcareProvider->setIdentifierCheckDigit($identifierCheckDigit);
        $otherHealthcareProvider->setCheckDigitScheme($checkDigitScheme);
        $otherHealthcareProvider->setIdentifierTypeCode($identifierTypeCode);
        $otherHealthcareProvider->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $otherHealthcareProvider->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @return \Hl7v2\DataType\V231\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldPatientClass()
    {
        return $this->patientClass;
    }

    /**
     * @return \Hl7v2\DataType\V231\PlDataType
     */
    public function getFieldAssignedPatientLocation()
    {
        return $this->assignedPatientLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldAdmissionType()
    {
        return $this->admissionType;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType
     */
    public function getFieldPreadmitNumber()
    {
        return $this->preadmitNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\PlDataType
     */
    public function getFieldPriorPatientLocation()
    {
        return $this->priorPatientLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldAttendingDoctor()
    {
        return $this->attendingDoctor;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldReferringDoctor()
    {
        return $this->referringDoctor;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldConsultingDoctor()
    {
        return $this->consultingDoctor;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldHospitalService()
    {
        return $this->hospitalService;
    }

    /**
     * @return \Hl7v2\DataType\V231\PlDataType
     */
    public function getFieldTemporaryLocation()
    {
        return $this->temporaryLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldPreadmitTestIndicator()
    {
        return $this->preadmitTestIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldReadmissionIndicator()
    {
        return $this->readmissionIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldAdmitSource()
    {
        return $this->admitSource;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType[]
     */
    public function getFieldAmbulatoryStatus()
    {
        return $this->ambulatoryStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldVipIndicator()
    {
        return $this->vipIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldAdmittingDoctor()
    {
        return $this->admittingDoctor;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldPatientType()
    {
        return $this->patientType;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType
     */
    public function getFieldVisitNumber()
    {
        return $this->visitNumber;
    }

    /**
     * @return \Hl7v2\DataType\V231\FcDataType[]
     */
    public function getFieldFinancialClass()
    {
        return $this->financialClass;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldChargePriceIndicator()
    {
        return $this->chargePriceIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldCourtesyCode()
    {
        return $this->courtesyCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldCreditRating()
    {
        return $this->creditRating;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType[]
     */
    public function getFieldContractCode()
    {
        return $this->contractCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\DtDataType[]
     */
    public function getFieldContractEffectiveDate()
    {
        return $this->contractEffectiveDate;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType[]
     */
    public function getFieldContractAmount()
    {
        return $this->contractAmount;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType[]
     */
    public function getFieldContractPeriod()
    {
        return $this->contractPeriod;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldInterestCode()
    {
        return $this->interestCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldTransferToBadDebtCode()
    {
        return $this->transferToBadDebtCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\DtDataType
     */
    public function getFieldTransferToBadDebtDate()
    {
        return $this->transferToBadDebtDate;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldBadDebtAgencyCode()
    {
        return $this->badDebtAgencyCode;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldBadDebtTransferAmount()
    {
        return $this->badDebtTransferAmount;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldBadDebtRecoveryAmount()
    {
        return $this->badDebtRecoveryAmount;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldDeleteAccountIndicator()
    {
        return $this->deleteAccountIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\DtDataType
     */
    public function getFieldDeleteAccountDate()
    {
        return $this->deleteAccountDate;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldDischargeDisposition()
    {
        return $this->dischargeDisposition;
    }

    /**
     * @return \Hl7v2\DataType\V231\CmDataType
     */
    public function getFieldDischargedToLocation()
    {
        return $this->dischargedToLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldDietType()
    {
        return $this->dietType;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldServicingFacility()
    {
        return $this->servicingFacility;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldBedStatus()
    {
        return $this->bedStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldAccountStatus()
    {
        return $this->accountStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\PlDataType
     */
    public function getFieldPendingLocation()
    {
        return $this->pendingLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\PlDataType
     */
    public function getFieldPriorTemporaryLocation()
    {
        return $this->priorTemporaryLocation;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldAdmitDatetime()
    {
        return $this->admitDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldDischargeDatetime()
    {
        return $this->dischargeDatetime;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldCurrentPatientBalance()
    {
        return $this->currentPatientBalance;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldTotalCharges()
    {
        return $this->totalCharges;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldTotalAdjustments()
    {
        return $this->totalAdjustments;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldTotalPayments()
    {
        return $this->totalPayments;
    }

    /**
     * @return \Hl7v2\DataType\V231\CxDataType
     */
    public function getFieldAltVisitId()
    {
        return $this->altVisitId;
    }

    /**
     * @return \Hl7v2\DataType\V231\IsDataType
     */
    public function getFieldVisitIndicator()
    {
        return $this->visitIndicator;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldOtherHealthcareProvider()
    {
        return $this->otherHealthcareProvider;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // PV1.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PV1 Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetId($codec->extractComponent($datagram));

        // PV1.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PV1 Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('PatientClass', 1, $datagram->getPositionalState());
        $this->setFieldPatientClass($codec->extractComponent($datagram));

        // PV1.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AssignedPatientLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1];
        list(
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAssignedPatientLocation(
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription
        );

        // PV1.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdmissionType', 2, $datagram->getPositionalState());
        $this->setFieldAdmissionType($codec->extractComponent($datagram));

        // PV1.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PreadmitNumber', 20, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        list(
            $id,
            $checkDigit,
            $checkDigitScheme,
            list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
            ),
            $identifierTypeCode,
            list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPreadmitNumber(
            $id,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );

        // PV1.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PriorPatientLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1];
        list(
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPriorPatientLocation(
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription
        );

        // PV1.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AttendingDoctor', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldAttendingDoctor(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode
            );
        }

        // PV1.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ReferringDoctor', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldReferringDoctor(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode
            );
        }

        // PV1.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ConsultingDoctor', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldConsultingDoctor(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode
            );
        }

        // PV1.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('HospitalService', 3, $datagram->getPositionalState());
        $this->setFieldHospitalService($codec->extractComponent($datagram));

        // PV1.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TemporaryLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1];
        list(
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldTemporaryLocation(
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription
        );

        // PV1.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PreadmitTestIndicator', 2, $datagram->getPositionalState());
        $this->setFieldPreadmitTestIndicator($codec->extractComponent($datagram));

        // PV1.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ReadmissionIndicator', 2, $datagram->getPositionalState());
        $this->setFieldReadmissionIndicator($codec->extractComponent($datagram));

        // PV1.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdmitSource', 3, $datagram->getPositionalState());
        $this->setFieldAdmitSource($codec->extractComponent($datagram));

        // PV1.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AmbulatoryStatus', 2, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldAmbulatoryStatus($value);
        }

        // PV1.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VipIndicator', 2, $datagram->getPositionalState());
        $this->setFieldVipIndicator($codec->extractComponent($datagram));

        // PV1.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AdmittingDoctor', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldAdmittingDoctor(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode
            );
        }

        // PV1.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PatientType', 2, $datagram->getPositionalState());
        $this->setFieldPatientType($codec->extractComponent($datagram));

        // PV1.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VisitNumber', 20, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        list(
            $id,
            $checkDigit,
            $checkDigitScheme,
            list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
            ),
            $identifierTypeCode,
            list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVisitNumber(
            $id,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );

        // PV1.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('FinancialClass', 50, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $financialClassCode,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
            ) = $components;
            $this->addFieldFinancialClass(
                $financialClassCode,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision
            );
        }

        // PV1.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ChargePriceIndicator', 2, $datagram->getPositionalState());
        $this->setFieldChargePriceIndicator($codec->extractComponent($datagram));

        // PV1.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CourtesyCode', 2, $datagram->getPositionalState());
        $this->setFieldCourtesyCode($codec->extractComponent($datagram));

        // PV1.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CreditRating', 2, $datagram->getPositionalState());
        $this->setFieldCreditRating($codec->extractComponent($datagram));

        // PV1.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ContractCode', 2, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldContractCode($value);
        }

        // PV1.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ContractEffectiveDate', 8, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldContractEffectiveDate($value);
        }

        // PV1.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ContractAmount', 12, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldContractAmount($value);
        }

        // PV1.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ContractPeriod', 3, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldContractPeriod($value);
        }

        // PV1.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('InterestCode', 2, $datagram->getPositionalState());
        $this->setFieldInterestCode($codec->extractComponent($datagram));

        // PV1.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TransferToBadDebtCode', 1, $datagram->getPositionalState());
        $this->setFieldTransferToBadDebtCode($codec->extractComponent($datagram));

        // PV1.30
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TransferToBadDebtDate', 8, $datagram->getPositionalState());
        $this->setFieldTransferToBadDebtDate($codec->extractComponent($datagram));

        // PV1.31
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BadDebtAgencyCode', 10, $datagram->getPositionalState());
        $this->setFieldBadDebtAgencyCode($codec->extractComponent($datagram));

        // PV1.32
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BadDebtTransferAmount', 12, $datagram->getPositionalState());
        $this->setFieldBadDebtTransferAmount($codec->extractComponent($datagram));

        // PV1.33
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BadDebtRecoveryAmount', 12, $datagram->getPositionalState());
        $this->setFieldBadDebtRecoveryAmount($codec->extractComponent($datagram));

        // PV1.34
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DeleteAccountIndicator', 1, $datagram->getPositionalState());
        $this->setFieldDeleteAccountIndicator($codec->extractComponent($datagram));

        // PV1.35
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DeleteAccountDate', 8, $datagram->getPositionalState());
        $this->setFieldDeleteAccountDate($codec->extractComponent($datagram));

        // PV1.36
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DischargeDisposition', 3, $datagram->getPositionalState());
        $this->setFieldDischargeDisposition($codec->extractComponent($datagram));

        // PV1.37
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DischargedToLocation', 25, $datagram->getPositionalState());
        $this->setFieldDischargedToLocation($codec->extractComponent($datagram));

        // PV1.38
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DietType', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDietType(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PV1.39
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ServicingFacility', 2, $datagram->getPositionalState());
        $this->setFieldServicingFacility($codec->extractComponent($datagram));

        // PV1.40
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BedStatus', 1, $datagram->getPositionalState());
        $this->setFieldBedStatus($codec->extractComponent($datagram));

        // PV1.41
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AccountStatus', 2, $datagram->getPositionalState());
        $this->setFieldAccountStatus($codec->extractComponent($datagram));

        // PV1.42
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PendingLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1];
        list(
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPendingLocation(
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription
        );

        // PV1.43
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PriorTemporaryLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1];
        list(
            $pointOfCare,
            $room,
            $bed,
            list(
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
            ),
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPriorTemporaryLocation(
            $pointOfCare,
            $room,
            $bed,
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType,
            $locationStatus,
            $personLocationType,
            $building,
            $floor,
            $locationDescription
        );

        // PV1.44
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdmitDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAdmitDatetime(
            $time,
            $degreeOfPrecision
        );

        // PV1.45
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DischargeDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDischargeDatetime(
            $time,
            $degreeOfPrecision
        );

        // PV1.46
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CurrentPatientBalance', 12, $datagram->getPositionalState());
        $this->setFieldCurrentPatientBalance($codec->extractComponent($datagram));

        // PV1.47
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TotalCharges', 12, $datagram->getPositionalState());
        $this->setFieldTotalCharges($codec->extractComponent($datagram));

        // PV1.48
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TotalAdjustments', 12, $datagram->getPositionalState());
        $this->setFieldTotalAdjustments($codec->extractComponent($datagram));

        // PV1.49
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TotalPayments', 12, $datagram->getPositionalState());
        $this->setFieldTotalPayments($codec->extractComponent($datagram));

        // PV1.50
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AltVisitId', 20, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1]];
        list(
            $id,
            $checkDigit,
            $checkDigitScheme,
            list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
            ),
            $identifierTypeCode,
            list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAltVisitId(
            $id,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );

        // PV1.51
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VisitIndicator', 1, $datagram->getPositionalState());
        $this->setFieldVisitIndicator($codec->extractComponent($datagram));

        // PV1.52
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OtherHealthcareProvider', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                    $assigningAuthorityNamespaceId,
                    $assigningAuthorityUniversalId,
                    $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                    $assigningFacilityNamespaceId,
                    $assigningFacilityUniversalId,
                    $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
            ) = $components;
            $this->addFieldOtherHealthcareProvider(
                $idNumber,
                $familyName,
                $givenName,
                $middleInitialOrName,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode
            );
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'PV1';
        $emptyFieldsSinceLastField = 0;

        if (!$this->getFieldSetId() || !$this->getFieldSetId()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldSetId()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldPatientClass() || !$this->getFieldPatientClass()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPatientClass()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldAssignedPatientLocation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldAssignedPatientLocation();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldAdmissionType() || !$this->getFieldAdmissionType()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldAdmissionType()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldPreadmitNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPreadmitNumber();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldPriorPatientLocation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPriorPatientLocation();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (empty($this->getFieldAttendingDoctor())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAttendingDoctor() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (empty($this->getFieldReferringDoctor())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldReferringDoctor() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (empty($this->getFieldConsultingDoctor())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldConsultingDoctor() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldHospitalService() || !$this->getFieldHospitalService()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldHospitalService()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTemporaryLocation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldTemporaryLocation();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldPreadmitTestIndicator() || !$this->getFieldPreadmitTestIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPreadmitTestIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldReadmissionIndicator() || !$this->getFieldReadmissionIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldReadmissionIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldAdmitSource() || !$this->getFieldAdmitSource()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldAdmitSource()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldAmbulatoryStatus())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAmbulatoryStatus() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldVipIndicator() || !$this->getFieldVipIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldVipIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldAdmittingDoctor())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAdmittingDoctor() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldPatientType() || !$this->getFieldPatientType()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldPatientType()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldVisitNumber()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldVisitNumber();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (empty($this->getFieldFinancialClass())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldFinancialClass() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldChargePriceIndicator() || !$this->getFieldChargePriceIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldChargePriceIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldCourtesyCode() || !$this->getFieldCourtesyCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldCourtesyCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldCreditRating() || !$this->getFieldCreditRating()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldCreditRating()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldContractCode())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldContractCode() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (empty($this->getFieldContractEffectiveDate())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldContractEffectiveDate() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (empty($this->getFieldContractAmount())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldContractAmount() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (empty($this->getFieldContractPeriod())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldContractPeriod() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . (string) $repetition->getValue();
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                        . (string) $repetition->getValue()
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        if (!$this->getFieldInterestCode() || !$this->getFieldInterestCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldInterestCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTransferToBadDebtCode() || !$this->getFieldTransferToBadDebtCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTransferToBadDebtCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTransferToBadDebtDate() || !$this->getFieldTransferToBadDebtDate()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTransferToBadDebtDate()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldBadDebtAgencyCode() || !$this->getFieldBadDebtAgencyCode()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldBadDebtAgencyCode()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldBadDebtTransferAmount() || !$this->getFieldBadDebtTransferAmount()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldBadDebtTransferAmount()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldBadDebtRecoveryAmount() || !$this->getFieldBadDebtRecoveryAmount()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldBadDebtRecoveryAmount()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDeleteAccountIndicator() || !$this->getFieldDeleteAccountIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldDeleteAccountIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDeleteAccountDate() || !$this->getFieldDeleteAccountDate()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldDeleteAccountDate()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDischargeDisposition() || !$this->getFieldDischargeDisposition()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldDischargeDisposition()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDischargedToLocation() || !$this->getFieldDischargedToLocation()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldDischargedToLocation()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDietType()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDietType();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldServicingFacility() || !$this->getFieldServicingFacility()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldServicingFacility()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldBedStatus() || !$this->getFieldBedStatus()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldBedStatus()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldAccountStatus() || !$this->getFieldAccountStatus()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldAccountStatus()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldPendingLocation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPendingLocation();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldPriorTemporaryLocation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldPriorTemporaryLocation();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldAdmitDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldAdmitDatetime();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldDischargeDatetime()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDischargeDatetime();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldCurrentPatientBalance() || !$this->getFieldCurrentPatientBalance()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldCurrentPatientBalance()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTotalCharges() || !$this->getFieldTotalCharges()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTotalCharges()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTotalAdjustments() || !$this->getFieldTotalAdjustments()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTotalAdjustments()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldTotalPayments() || !$this->getFieldTotalPayments()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldTotalPayments()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldAltVisitId()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldAltVisitId();
            if ($value === '') {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldVisitIndicator() || !$this->getFieldVisitIndicator()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldVisitIndicator()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldOtherHealthcareProvider())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldOtherHealthcareProvider() as $repetition) {
                $value = (string) $repetition;
                if ($value === '') {
                    continue;
                }
                if ($nonEmptyReps == 0) {
                    $s .= str_repeat(
                        $this->encodingParameters->getFieldSep(),
                        1 + $emptyFieldsSinceLastField
                    ) . $value;
                    $emptyFieldsSinceLastField = 0;
                } else {
                    $s .= $this->encodingParameters->getRepetitionSep()
                       . (string) $value
                    ;
                }
                ++$nonEmptyReps;
            }
        }

        return $s;
    }
}
