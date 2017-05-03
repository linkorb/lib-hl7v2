<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;

/**
 * Patient Visit (PV1).
 */
class Pv1Segment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $patientClass;
    /**
     * @var \Hl7v2\DataType\PlDataType
     */
    private $assignedPatientLocation = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $admissionType = null;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    private $preadmitNumber = null;
    /**
     * @var \Hl7v2\DataType\PlDataType
     */
    private $priorPatientLocation = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    private $attendingDoctor = [];
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    private $referringDoctor = [];
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    private $consultingDoctor = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $hospitalService = null;
    /**
     * @var \Hl7v2\DataType\PlDataType
     */
    private $temporaryLocation = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $preadmitTestIndicator = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $readmissionIndicator = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $admitSource = null;
    /**
     * @var \Hl7v2\DataType\IsDataType[]
     */
    private $ambulatoryStatus = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $vipIndicator = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    private $admittingDoctor = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $patientType = null;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    private $visitNumber = null;
    /**
     * @var \Hl7v2\DataType\FcDataType[]
     */
    private $financialClass = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $chargePriceIndicator = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $courtesyCode = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $creditRating = null;
    /**
     * @var \Hl7v2\DataType\IsDataType[]
     */
    private $contractCode = [];
    /**
     * @var \Hl7v2\DataType\DtDataType[]
     */
    private $contractEffectiveDate = [];
    /**
     * @var \Hl7v2\DataType\NmDataType[]
     */
    private $contractAmount = [];
    /**
     * @var \Hl7v2\DataType\NmDataType[]
     */
    private $contractPeriod = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $interestCode = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $transferToBadDebtCode = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    private $transferToBadDebtDate = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $badDebtAgencyCode = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $badDebtTransferAmount = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $badDebtRecoveryAmount = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $deleteAccountIndicator = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    private $deleteAccountDate = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $dischargeDisposition = null;
    /**
     * @var \Hl7v2\DataType\DldDataType
     */
    private $dischargedToLocation = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    private $dietType = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $servicingFacility = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $bedStatus = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $accountStatus = null;
    /**
     * @var \Hl7v2\DataType\PlDataType
     */
    private $pendingLocation = null;
    /**
     * @var \Hl7v2\DataType\PlDataType
     */
    private $priorTemporaryLocation = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    private $admitDatetime = null;
    /**
     * @var \Hl7v2\DataType\TsDataType[]
     */
    private $dischargeDatetime = [];
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $currentPatientBalance = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $totalCharges = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $totalAdjustments = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    private $totalPayments = null;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    private $altVisitId = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    private $visitIndicator = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    private $otherHealthcareProvider = [];

    /**
     * @param string $value
     */
    public function setFieldSetId($value)
    {
        $this->setId = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setId->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldPatientClass($value)
    {
        $this->patientClass = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
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
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldAssignedPatientLocation(
        $pointOfCare = null,
        $room = null,
        $bed = null,
        $facilityNamespaceId,
        $facilityUniversalId,
        $facilityUniversalIdType,
        $locationStatus = null,
        $personLocationType = null,
        $building = null,
        $floor = null,
        $locationDescription = null,
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null,
        $assigningAuthorityForLocationNamespaceId,
        $assigningAuthorityForLocationUniversalId,
        $assigningAuthorityForLocationUniversalIdType
    ) {
        $this->assignedPatientLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->characterEncoding)
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
        $this->assignedPatientLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->assignedPatientLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @param string $value
     */
    public function setFieldAdmissionType($value)
    {
        $this->admissionType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->admissionType->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $effectiveDate
     * @param string $expirationDate
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function setFieldPreadmitNumber(
        $idNumber,
        $checkDigit = null,
        $checkDigitScheme = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $effectiveDate = null,
        $expirationDate = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $this->preadmitNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->preadmitNumber->setIdNumber($idNumber);
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
        $this->preadmitNumber->setEffectiveDate($effectiveDate);
        $this->preadmitNumber->setExpirationDate($expirationDate);
        $this->preadmitNumber->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $this->preadmitNumber->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
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
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldPriorPatientLocation(
        $pointOfCare = null,
        $room = null,
        $bed = null,
        $facilityNamespaceId,
        $facilityUniversalId,
        $facilityUniversalIdType,
        $locationStatus = null,
        $personLocationType = null,
        $building = null,
        $floor = null,
        $locationDescription = null,
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null,
        $assigningAuthorityForLocationNamespaceId,
        $assigningAuthorityForLocationUniversalId,
        $assigningAuthorityForLocationUniversalIdType
    ) {
        $this->priorPatientLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->characterEncoding)
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
        $this->priorPatientLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->priorPatientLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
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
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldAttendingDoctor(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $attendingDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->attendingDoctor[] = $attendingDoctor;
        $attendingDoctor->setIdNumber($idNumber);
        $attendingDoctor->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $attendingDoctor->setGivenName($givenName);
        $attendingDoctor->setSecondNames($secondNames);
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
        $attendingDoctor->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $attendingDoctor->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $attendingDoctor->setNameAssemblyOrder($nameAssemblyOrder);
        $attendingDoctor->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $attendingDoctor->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $attendingDoctor->setProfessionalSuffix($professionalSuffix);
        $attendingDoctor->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $attendingDoctor->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
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
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldReferringDoctor(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $referringDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->referringDoctor[] = $referringDoctor;
        $referringDoctor->setIdNumber($idNumber);
        $referringDoctor->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $referringDoctor->setGivenName($givenName);
        $referringDoctor->setSecondNames($secondNames);
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
        $referringDoctor->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $referringDoctor->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $referringDoctor->setNameAssemblyOrder($nameAssemblyOrder);
        $referringDoctor->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $referringDoctor->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $referringDoctor->setProfessionalSuffix($professionalSuffix);
        $referringDoctor->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $referringDoctor->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
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
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldConsultingDoctor(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $consultingDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->consultingDoctor[] = $consultingDoctor;
        $consultingDoctor->setIdNumber($idNumber);
        $consultingDoctor->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $consultingDoctor->setGivenName($givenName);
        $consultingDoctor->setSecondNames($secondNames);
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
        $consultingDoctor->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $consultingDoctor->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $consultingDoctor->setNameAssemblyOrder($nameAssemblyOrder);
        $consultingDoctor->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $consultingDoctor->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $consultingDoctor->setProfessionalSuffix($professionalSuffix);
        $consultingDoctor->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $consultingDoctor->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $value
     */
    public function setFieldHospitalService($value)
    {
        $this->hospitalService = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
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
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldTemporaryLocation(
        $pointOfCare = null,
        $room = null,
        $bed = null,
        $facilityNamespaceId,
        $facilityUniversalId,
        $facilityUniversalIdType,
        $locationStatus = null,
        $personLocationType = null,
        $building = null,
        $floor = null,
        $locationDescription = null,
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null,
        $assigningAuthorityForLocationNamespaceId,
        $assigningAuthorityForLocationUniversalId,
        $assigningAuthorityForLocationUniversalIdType
    ) {
        $this->temporaryLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->characterEncoding)
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
        $this->temporaryLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->temporaryLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @param string $value
     */
    public function setFieldPreadmitTestIndicator($value)
    {
        $this->preadmitTestIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->preadmitTestIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldReadmissionIndicator($value)
    {
        $this->readmissionIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->readmissionIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAdmitSource($value)
    {
        $this->admitSource = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->admitSource->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldAmbulatoryStatus($value)
    {
        $ambulatoryStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $ambulatoryStatus->setValue($value);
        $this->ambulatoryStatus[] = $ambulatoryStatus;
    }

    /**
     * @param string $value
     */
    public function setFieldVipIndicator($value)
    {
        $this->vipIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->vipIndicator->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
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
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldAdmittingDoctor(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $admittingDoctor = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->admittingDoctor[] = $admittingDoctor;
        $admittingDoctor->setIdNumber($idNumber);
        $admittingDoctor->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $admittingDoctor->setGivenName($givenName);
        $admittingDoctor->setSecondNames($secondNames);
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
        $admittingDoctor->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $admittingDoctor->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $admittingDoctor->setNameAssemblyOrder($nameAssemblyOrder);
        $admittingDoctor->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $admittingDoctor->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $admittingDoctor->setProfessionalSuffix($professionalSuffix);
        $admittingDoctor->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $admittingDoctor->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $value
     */
    public function setFieldPatientType($value)
    {
        $this->patientType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->patientType->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $effectiveDate
     * @param string $expirationDate
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function setFieldVisitNumber(
        $idNumber,
        $checkDigit = null,
        $checkDigitScheme = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $effectiveDate = null,
        $expirationDate = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $this->visitNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->visitNumber->setIdNumber($idNumber);
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
        $this->visitNumber->setEffectiveDate($effectiveDate);
        $this->visitNumber->setExpirationDate($expirationDate);
        $this->visitNumber->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $this->visitNumber->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $financialClassCode
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function addFieldFinancialClass(
        $financialClassCode,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null
    ) {
        $financialClass = $this
            ->dataTypeFactory
            ->create('FC', $this->characterEncoding)
        ;
        $this->financialClass[] = $financialClass;
        $financialClass->setFinancialClassCode($financialClassCode);
        $financialClass->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldChargePriceIndicator($value)
    {
        $this->chargePriceIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->chargePriceIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCourtesyCode($value)
    {
        $this->courtesyCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->courtesyCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCreditRating($value)
    {
        $this->creditRating = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->creditRating->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldContractCode($value)
    {
        $contractCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $contractCode->setValue($value);
        $this->contractCode[] = $contractCode;
    }

    /**
     * @param string $value
     */
    public function addFieldContractEffectiveDate($value)
    {
        $contractEffectiveDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $contractEffectiveDate->setValue($value);
        $this->contractEffectiveDate[] = $contractEffectiveDate;
    }

    /**
     * @param string $value
     */
    public function addFieldContractAmount($value)
    {
        $contractAmount = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $contractAmount->setValue($value);
        $this->contractAmount[] = $contractAmount;
    }

    /**
     * @param string $value
     */
    public function addFieldContractPeriod($value)
    {
        $contractPeriod = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $contractPeriod->setValue($value);
        $this->contractPeriod[] = $contractPeriod;
    }

    /**
     * @param string $value
     */
    public function setFieldInterestCode($value)
    {
        $this->interestCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->interestCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTransferToBadDebtCode($value)
    {
        $this->transferToBadDebtCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->transferToBadDebtCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTransferToBadDebtDate($value)
    {
        $this->transferToBadDebtDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->transferToBadDebtDate->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBadDebtAgencyCode($value)
    {
        $this->badDebtAgencyCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->badDebtAgencyCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBadDebtTransferAmount($value)
    {
        $this->badDebtTransferAmount = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->badDebtTransferAmount->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBadDebtRecoveryAmount($value)
    {
        $this->badDebtRecoveryAmount = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->badDebtRecoveryAmount->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDeleteAccountIndicator($value)
    {
        $this->deleteAccountIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->deleteAccountIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDeleteAccountDate($value)
    {
        $this->deleteAccountDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->deleteAccountDate->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDischargeDisposition($value)
    {
        $this->dischargeDisposition = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->dischargeDisposition->setValue($value);
    }

    /**
     * @param string $dischargeLocation
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function setFieldDischargedToLocation(
        $dischargeLocation,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null
    ) {
        $this->dischargedToLocation = $this
            ->dataTypeFactory
            ->create('DLD', $this->characterEncoding)
        ;
        $this->dischargedToLocation->setDischargeLocation($dischargeLocation);
        $this->dischargedToLocation->setEffectiveDate(
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );
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
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->dietType = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
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
    public function setFieldServicingFacility($value)
    {
        $this->servicingFacility = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->servicingFacility->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBedStatus($value)
    {
        $this->bedStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->bedStatus->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAccountStatus($value)
    {
        $this->accountStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
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
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldPendingLocation(
        $pointOfCare = null,
        $room = null,
        $bed = null,
        $facilityNamespaceId,
        $facilityUniversalId,
        $facilityUniversalIdType,
        $locationStatus = null,
        $personLocationType = null,
        $building = null,
        $floor = null,
        $locationDescription = null,
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null,
        $assigningAuthorityForLocationNamespaceId,
        $assigningAuthorityForLocationUniversalId,
        $assigningAuthorityForLocationUniversalIdType
    ) {
        $this->pendingLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->characterEncoding)
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
        $this->pendingLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->pendingLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
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
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldPriorTemporaryLocation(
        $pointOfCare = null,
        $room = null,
        $bed = null,
        $facilityNamespaceId,
        $facilityUniversalId,
        $facilityUniversalIdType,
        $locationStatus = null,
        $personLocationType = null,
        $building = null,
        $floor = null,
        $locationDescription = null,
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null,
        $assigningAuthorityForLocationNamespaceId,
        $assigningAuthorityForLocationUniversalId,
        $assigningAuthorityForLocationUniversalIdType
    ) {
        $this->priorTemporaryLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->characterEncoding)
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
        $this->priorTemporaryLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->priorTemporaryLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldAdmitDatetime($time, $degreeOfPrecision = null)
    {
        $this->admitDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->admitDatetime->setTime($time);
        $this->admitDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function addFieldDischargeDatetime($time, $degreeOfPrecision = null)
    {
        $dischargeDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->dischargeDatetime[] = $dischargeDatetime;
        $dischargeDatetime->setTime($time);
        $dischargeDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldCurrentPatientBalance($value)
    {
        $this->currentPatientBalance = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->currentPatientBalance->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTotalCharges($value)
    {
        $this->totalCharges = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->totalCharges->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTotalAdjustments($value)
    {
        $this->totalAdjustments = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->totalAdjustments->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTotalPayments($value)
    {
        $this->totalPayments = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->totalPayments->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $effectiveDate
     * @param string $expirationDate
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function setFieldAltVisitId(
        $idNumber,
        $checkDigit = null,
        $checkDigitScheme = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $effectiveDate = null,
        $expirationDate = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $this->altVisitId = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->altVisitId->setIdNumber($idNumber);
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
        $this->altVisitId->setEffectiveDate($effectiveDate);
        $this->altVisitId->setExpirationDate($expirationDate);
        $this->altVisitId->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $this->altVisitId->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $value
     */
    public function setFieldVisitIndicator($value)
    {
        $this->visitIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->visitIndicator->setValue($value);
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
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
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldOtherHealthcareProvider(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $otherHealthcareProvider = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->otherHealthcareProvider[] = $otherHealthcareProvider;
        $otherHealthcareProvider->setIdNumber($idNumber);
        $otherHealthcareProvider->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $otherHealthcareProvider->setGivenName($givenName);
        $otherHealthcareProvider->setSecondNames($secondNames);
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
        $otherHealthcareProvider->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $otherHealthcareProvider->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $otherHealthcareProvider->setNameAssemblyOrder($nameAssemblyOrder);
        $otherHealthcareProvider->setEffectiveDate(
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );
        $otherHealthcareProvider->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $otherHealthcareProvider->setProfessionalSuffix($professionalSuffix);
        $otherHealthcareProvider->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $otherHealthcareProvider->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldPatientClass()
    {
        return $this->patientClass;
    }

    /**
     * @return \Hl7v2\DataType\PlDataType
     */
    public function getFieldAssignedPatientLocation()
    {
        return $this->assignedPatientLocation;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldAdmissionType()
    {
        return $this->admissionType;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getFieldPreadmitNumber()
    {
        return $this->preadmitNumber;
    }

    /**
     * @return \Hl7v2\DataType\PlDataType
     */
    public function getFieldPriorPatientLocation()
    {
        return $this->priorPatientLocation;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getFieldAttendingDoctor()
    {
        return $this->attendingDoctor;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getFieldReferringDoctor()
    {
        return $this->referringDoctor;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getFieldConsultingDoctor()
    {
        return $this->consultingDoctor;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldHospitalService()
    {
        return $this->hospitalService;
    }

    /**
     * @return \Hl7v2\DataType\PlDataType
     */
    public function getFieldTemporaryLocation()
    {
        return $this->temporaryLocation;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldPreadmitTestIndicator()
    {
        return $this->preadmitTestIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldReadmissionIndicator()
    {
        return $this->readmissionIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldAdmitSource()
    {
        return $this->admitSource;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType[]
     */
    public function getFieldAmbulatoryStatus()
    {
        return $this->ambulatoryStatus;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldVipIndicator()
    {
        return $this->vipIndicator;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getFieldAdmittingDoctor()
    {
        return $this->admittingDoctor;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldPatientType()
    {
        return $this->patientType;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getFieldVisitNumber()
    {
        return $this->visitNumber;
    }

    /**
     * @return \Hl7v2\DataType\FcDataType[]
     */
    public function getFieldFinancialClass()
    {
        return $this->financialClass;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldChargePriceIndicator()
    {
        return $this->chargePriceIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldCourtesyCode()
    {
        return $this->courtesyCode;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldCreditRating()
    {
        return $this->creditRating;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType[]
     */
    public function getFieldContractCode()
    {
        return $this->contractCode;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType[]
     */
    public function getFieldContractEffectiveDate()
    {
        return $this->contractEffectiveDate;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType[]
     */
    public function getFieldContractAmount()
    {
        return $this->contractAmount;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType[]
     */
    public function getFieldContractPeriod()
    {
        return $this->contractPeriod;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldInterestCode()
    {
        return $this->interestCode;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldTransferToBadDebtCode()
    {
        return $this->transferToBadDebtCode;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getFieldTransferToBadDebtDate()
    {
        return $this->transferToBadDebtDate;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldBadDebtAgencyCode()
    {
        return $this->badDebtAgencyCode;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldBadDebtTransferAmount()
    {
        return $this->badDebtTransferAmount;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldBadDebtRecoveryAmount()
    {
        return $this->badDebtRecoveryAmount;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldDeleteAccountIndicator()
    {
        return $this->deleteAccountIndicator;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getFieldDeleteAccountDate()
    {
        return $this->deleteAccountDate;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldDischargeDisposition()
    {
        return $this->dischargeDisposition;
    }

    /**
     * @return \Hl7v2\DataType\DldDataType
     */
    public function getFieldDischargedToLocation()
    {
        return $this->dischargedToLocation;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldDietType()
    {
        return $this->dietType;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldServicingFacility()
    {
        return $this->servicingFacility;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldBedStatus()
    {
        return $this->bedStatus;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldAccountStatus()
    {
        return $this->accountStatus;
    }

    /**
     * @return \Hl7v2\DataType\PlDataType
     */
    public function getFieldPendingLocation()
    {
        return $this->pendingLocation;
    }

    /**
     * @return \Hl7v2\DataType\PlDataType
     */
    public function getFieldPriorTemporaryLocation()
    {
        return $this->priorTemporaryLocation;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldAdmitDatetime()
    {
        return $this->admitDatetime;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType[]
     */
    public function getFieldDischargeDatetime()
    {
        return $this->dischargeDatetime;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldCurrentPatientBalance()
    {
        return $this->currentPatientBalance;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldTotalCharges()
    {
        return $this->totalCharges;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldTotalAdjustments()
    {
        return $this->totalAdjustments;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldTotalPayments()
    {
        return $this->totalPayments;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getFieldAltVisitId()
    {
        return $this->altVisitId;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldVisitIndicator()
    {
        return $this->visitIndicator;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
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
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
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
            list(
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
            ),
            list(
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType,
            ),
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
            $locationDescription,
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType,
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
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
        $this->checkFieldLength('PreadmitNumber', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        list(
            $idNumber,
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
            $effectiveDate,
            $expirationDate,
            list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
            ),
            list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPreadmitNumber(
            $idNumber,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType,
            $effectiveDate,
            $expirationDate,
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText,
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );

        // PV1.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PriorPatientLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
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
            list(
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
            ),
            list(
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType,
            ),
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
            $locationDescription,
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType,
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );

        // PV1.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AttendingDoctor', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                    $familyNameSurname,
                    $familyNameOwnSurnamePrefix,
                    $familyNameOwnSurname,
                    $familyNameSurnamePrefixFromPartner,
                    $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
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
                list(
                    $nameContextIdentifier,
                    $nameContextText,
                    $nameContextNameOfCodingSystem,
                    $nameContextAltIdentifier,
                    $nameContextAltText,
                    $nameContextNameOfAltCodingSystem,
                ),
                list(
                    list(
                        $nameValidityRangeRangeStartDateTimeTime,
                        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $nameValidityRangeRangeEndDateTimeTime,
                        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                $nameAssemblyOrder,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                    $assigningJurisdictionIdentifier,
                    $assigningJurisdictionText,
                    $assigningJurisdictionNameOfCodingSystem,
                    $assigningJurisdictionAltIdentifier,
                    $assigningJurisdictionAltText,
                    $assigningJurisdictionNameOfAltCodingSystem,
                    $assigningJurisdictionCodingSystemVersionId,
                    $assigningJurisdictionAltCodingSystemVersionId,
                    $assigningJurisdictionOriginalText,
                ),
                list(
                    $assigningAgencyIdentifier,
                    $assigningAgencyText,
                    $assigningAgencyNameOfCodingSystem,
                    $assigningAgencyAltIdentifier,
                    $assigningAgencyAltText,
                    $assigningAgencyNameOfAltCodingSystem,
                    $assigningAgencyCodingSystemVersionId,
                    $assigningAgencyAltCodingSystemVersionId,
                    $assigningAgencyOriginalText,
                ),
            ) = $components;
            $this->addFieldAttendingDoctor(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
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
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }

        // PV1.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ReferringDoctor', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                    $familyNameSurname,
                    $familyNameOwnSurnamePrefix,
                    $familyNameOwnSurname,
                    $familyNameSurnamePrefixFromPartner,
                    $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
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
                list(
                    $nameContextIdentifier,
                    $nameContextText,
                    $nameContextNameOfCodingSystem,
                    $nameContextAltIdentifier,
                    $nameContextAltText,
                    $nameContextNameOfAltCodingSystem,
                ),
                list(
                    list(
                        $nameValidityRangeRangeStartDateTimeTime,
                        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $nameValidityRangeRangeEndDateTimeTime,
                        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                $nameAssemblyOrder,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                    $assigningJurisdictionIdentifier,
                    $assigningJurisdictionText,
                    $assigningJurisdictionNameOfCodingSystem,
                    $assigningJurisdictionAltIdentifier,
                    $assigningJurisdictionAltText,
                    $assigningJurisdictionNameOfAltCodingSystem,
                    $assigningJurisdictionCodingSystemVersionId,
                    $assigningJurisdictionAltCodingSystemVersionId,
                    $assigningJurisdictionOriginalText,
                ),
                list(
                    $assigningAgencyIdentifier,
                    $assigningAgencyText,
                    $assigningAgencyNameOfCodingSystem,
                    $assigningAgencyAltIdentifier,
                    $assigningAgencyAltText,
                    $assigningAgencyNameOfAltCodingSystem,
                    $assigningAgencyCodingSystemVersionId,
                    $assigningAgencyAltCodingSystemVersionId,
                    $assigningAgencyOriginalText,
                ),
            ) = $components;
            $this->addFieldReferringDoctor(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
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
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }

        // PV1.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ConsultingDoctor', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                    $familyNameSurname,
                    $familyNameOwnSurnamePrefix,
                    $familyNameOwnSurname,
                    $familyNameSurnamePrefixFromPartner,
                    $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
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
                list(
                    $nameContextIdentifier,
                    $nameContextText,
                    $nameContextNameOfCodingSystem,
                    $nameContextAltIdentifier,
                    $nameContextAltText,
                    $nameContextNameOfAltCodingSystem,
                ),
                list(
                    list(
                        $nameValidityRangeRangeStartDateTimeTime,
                        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $nameValidityRangeRangeEndDateTimeTime,
                        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                $nameAssemblyOrder,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                    $assigningJurisdictionIdentifier,
                    $assigningJurisdictionText,
                    $assigningJurisdictionNameOfCodingSystem,
                    $assigningJurisdictionAltIdentifier,
                    $assigningJurisdictionAltText,
                    $assigningJurisdictionNameOfAltCodingSystem,
                    $assigningJurisdictionCodingSystemVersionId,
                    $assigningJurisdictionAltCodingSystemVersionId,
                    $assigningJurisdictionOriginalText,
                ),
                list(
                    $assigningAgencyIdentifier,
                    $assigningAgencyText,
                    $assigningAgencyNameOfCodingSystem,
                    $assigningAgencyAltIdentifier,
                    $assigningAgencyAltText,
                    $assigningAgencyNameOfAltCodingSystem,
                    $assigningAgencyCodingSystemVersionId,
                    $assigningAgencyAltCodingSystemVersionId,
                    $assigningAgencyOriginalText,
                ),
            ) = $components;
            $this->addFieldConsultingDoctor(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
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
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
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
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
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
            list(
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
            ),
            list(
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType,
            ),
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
            $locationDescription,
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType,
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
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
        $this->checkFieldLength('AdmitSource', 6, $datagram->getPositionalState());
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
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AdmittingDoctor', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                    $familyNameSurname,
                    $familyNameOwnSurnamePrefix,
                    $familyNameOwnSurname,
                    $familyNameSurnamePrefixFromPartner,
                    $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
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
                list(
                    $nameContextIdentifier,
                    $nameContextText,
                    $nameContextNameOfCodingSystem,
                    $nameContextAltIdentifier,
                    $nameContextAltText,
                    $nameContextNameOfAltCodingSystem,
                ),
                list(
                    list(
                        $nameValidityRangeRangeStartDateTimeTime,
                        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $nameValidityRangeRangeEndDateTimeTime,
                        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                $nameAssemblyOrder,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                    $assigningJurisdictionIdentifier,
                    $assigningJurisdictionText,
                    $assigningJurisdictionNameOfCodingSystem,
                    $assigningJurisdictionAltIdentifier,
                    $assigningJurisdictionAltText,
                    $assigningJurisdictionNameOfAltCodingSystem,
                    $assigningJurisdictionCodingSystemVersionId,
                    $assigningJurisdictionAltCodingSystemVersionId,
                    $assigningJurisdictionOriginalText,
                ),
                list(
                    $assigningAgencyIdentifier,
                    $assigningAgencyText,
                    $assigningAgencyNameOfCodingSystem,
                    $assigningAgencyAltIdentifier,
                    $assigningAgencyAltText,
                    $assigningAgencyNameOfAltCodingSystem,
                    $assigningAgencyCodingSystemVersionId,
                    $assigningAgencyAltCodingSystemVersionId,
                    $assigningAgencyOriginalText,
                ),
            ) = $components;
            $this->addFieldAdmittingDoctor(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
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
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
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
        $this->checkFieldLength('VisitNumber', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        list(
            $idNumber,
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
            $effectiveDate,
            $expirationDate,
            list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
            ),
            list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVisitNumber(
            $idNumber,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType,
            $effectiveDate,
            $expirationDate,
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText,
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
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
        $this->checkFieldLength('TransferToBadDebtCode', 4, $datagram->getPositionalState());
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
        $this->checkFieldLength('DischargedToLocation', 47, $datagram->getPositionalState());
        $sequence = [1,[1,1]];
        list(
            $dischargeLocation,
            list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDischargedToLocation(
            $dischargeLocation,
            $effectiveDateTime,
            $effectiveDateDegreeOfPrecision
        );

        // PV1.38
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DietType', 250, $datagram->getPositionalState());
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
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
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
            list(
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
            ),
            list(
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType,
            ),
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
            $locationDescription,
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType,
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );

        // PV1.43
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PriorTemporaryLocation', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
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
            list(
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
            ),
            list(
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType,
            ),
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
            $locationDescription,
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType,
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
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
        $sequence = [1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('DischargeDatetime', 26, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $time,
                $degreeOfPrecision,
            ) = $components;
            $this->addFieldDischargeDatetime(
                $time,
                $degreeOfPrecision
            );
        }

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
        $this->checkFieldLength('AltVisitId', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        list(
            $idNumber,
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
            $effectiveDate,
            $expirationDate,
            list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
            ),
            list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAltVisitId(
            $idNumber,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType,
            $effectiveDate,
            $expirationDate,
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText,
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
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
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OtherHealthcareProvider', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                    $familyNameSurname,
                    $familyNameOwnSurnamePrefix,
                    $familyNameOwnSurname,
                    $familyNameSurnamePrefixFromPartner,
                    $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
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
                list(
                    $nameContextIdentifier,
                    $nameContextText,
                    $nameContextNameOfCodingSystem,
                    $nameContextAltIdentifier,
                    $nameContextAltText,
                    $nameContextNameOfAltCodingSystem,
                ),
                list(
                    list(
                        $nameValidityRangeRangeStartDateTimeTime,
                        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                    ),
                    list(
                        $nameValidityRangeRangeEndDateTimeTime,
                        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                    ),
                ),
                $nameAssemblyOrder,
                list(
                    $effectiveDateTime,
                    $effectiveDateDegreeOfPrecision,
                ),
                list(
                    $expirationDateTime,
                    $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                    $assigningJurisdictionIdentifier,
                    $assigningJurisdictionText,
                    $assigningJurisdictionNameOfCodingSystem,
                    $assigningJurisdictionAltIdentifier,
                    $assigningJurisdictionAltText,
                    $assigningJurisdictionNameOfAltCodingSystem,
                    $assigningJurisdictionCodingSystemVersionId,
                    $assigningJurisdictionAltCodingSystemVersionId,
                    $assigningJurisdictionOriginalText,
                ),
                list(
                    $assigningAgencyIdentifier,
                    $assigningAgencyText,
                    $assigningAgencyNameOfCodingSystem,
                    $assigningAgencyAltIdentifier,
                    $assigningAgencyAltText,
                    $assigningAgencyNameOfAltCodingSystem,
                    $assigningAgencyCodingSystemVersionId,
                    $assigningAgencyAltCodingSystemVersionId,
                    $assigningAgencyOriginalText,
                ),
            ) = $components;
            $this->addFieldOtherHealthcareProvider(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
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
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }
    }
}
