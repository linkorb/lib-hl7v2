<?php

namespace Hl7v2\Segment\V231;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;
use Hl7v2\Segment\AbstractSegment;

/**
 * Observation/Result (OBX).
 */
class ObxSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\V231\SiDataType
     */
    private $setId = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $valueType = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $observationIdentifier;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $observationSubid = null;
    /**
     * @var \Hl7v2\DataType\DataTypeInterface[]
     */
    private $observationValue = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $units = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $referencesRange = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType[]
     */
    private $abnormalFlags = [];
    /**
     * @var \Hl7v2\DataType\V231\NmDataType
     */
    private $probability = null;
    /**
     * @var \Hl7v2\DataType\V231\IdDataType[]
     */
    private $natureOfAbnormalTest = [];
    /**
     * @var \Hl7v2\DataType\V231\IdDataType
     */
    private $observationResultStatus;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $dateLastObsNormalValues = null;
    /**
     * @var \Hl7v2\DataType\V231\StDataType
     */
    private $userDefinedAccessChecks = null;
    /**
     * @var \Hl7v2\DataType\V231\TsDataType
     */
    private $datetimeOfTheObservation = null;
    /**
     * @var \Hl7v2\DataType\V231\CeDataType
     */
    private $producersId = null;
    /**
     * @var \Hl7v2\DataType\V231\XcnDataType[]
     */
    private $responsibleObserver = [];
    /**
     * @var \Hl7v2\DataType\V231\CeDataType[]
     */
    private $observationMethod = [];

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
    public function setFieldValueType(string $value)
    {
        $this->valueType = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->valueType->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldObservationIdentifier(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->observationIdentifier = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->observationIdentifier->setIdentifier($identifier);
        $this->observationIdentifier->setText($text);
        $this->observationIdentifier->setNameOfCodingSystem($nameOfCodingSystem);
        $this->observationIdentifier->setAltIdentifier($altIdentifier);
        $this->observationIdentifier->setAltText($altText);
        $this->observationIdentifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldObservationSubid(string $value)
    {
        $this->observationSubid = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->observationSubid->setValue($value);
    }

    /**
     * @param string $sourceApplicationNamespaceId
     * @param string $sourceApplicationUniversalId
     * @param string $sourceApplicationUniversalIdType
     * @param string $typeOfData
     * @param string $dataSubtype
     * @param string $encoding
     * @param string $data
     */
    public function addFieldObservationValueAsED(
        string $sourceApplicationNamespaceId = null,
        string $sourceApplicationUniversalId = null,
        string $sourceApplicationUniversalIdType = null,
        string $typeOfData = null,
        string $dataSubtype = null,
        string $encoding = null,
        string $data = null
    ) {
        $observationValue = $this
            ->dataTypeFactory
            ->create('ED', $this->encodingParameters)
        ;
        $this->observationValue[] = $observationValue;
        $observationValue->setSourceApplication(
            $sourceApplicationNamespaceId,
            $sourceApplicationUniversalId,
            $sourceApplicationUniversalIdType
        );
        $observationValue->setTypeOfData($typeOfData);
        $observationValue->setDataSubtype($dataSubtype);
        $observationValue->setEncoding($encoding);
        $observationValue->setData($data);
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsFT(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('FT', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsNM(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsST(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function addFieldObservationValueAsTS(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $observationValue = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->observationValue[] = $observationValue;
        $observationValue->setTime($time);
        $observationValue->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function addFieldObservationValueAsTX(string $value)
    {
        $observationValue = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
        ;
        $observationValue->setValue($value);
        $this->observationValue[] = $observationValue;
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldUnits(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->units = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->units->setIdentifier($identifier);
        $this->units->setText($text);
        $this->units->setNameOfCodingSystem($nameOfCodingSystem);
        $this->units->setAltIdentifier($altIdentifier);
        $this->units->setAltText($altText);
        $this->units->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldReferencesRange(string $value)
    {
        $this->referencesRange = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->referencesRange->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldAbnormalFlags(string $value)
    {
        $abnormalFlags = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $abnormalFlags->setValue($value);
        $this->abnormalFlags[] = $abnormalFlags;
    }

    /**
     * @param string $value
     */
    public function setFieldProbability(string $value)
    {
        $this->probability = $this
            ->dataTypeFactory
            ->create('NM', $this->encodingParameters)
        ;
        $this->probability->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldNatureOfAbnormalTest(string $value)
    {
        $natureOfAbnormalTest = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $natureOfAbnormalTest->setValue($value);
        $this->natureOfAbnormalTest[] = $natureOfAbnormalTest;
    }

    /**
     * @param string $value
     */
    public function setFieldObservationResultStatus(string $value)
    {
        $this->observationResultStatus = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->observationResultStatus->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDateLastObsNormalValues(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->dateLastObsNormalValues = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->dateLastObsNormalValues->setTime($time);
        $this->dateLastObsNormalValues->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldUserDefinedAccessChecks(string $value)
    {
        $this->userDefinedAccessChecks = $this
            ->dataTypeFactory
            ->create('ST', $this->encodingParameters)
        ;
        $this->userDefinedAccessChecks->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimeOfTheObservation(
        string $time = null,
        string $degreeOfPrecision = null
    ) {
        $this->datetimeOfTheObservation = $this
            ->dataTypeFactory
            ->create('TS', $this->encodingParameters)
        ;
        $this->datetimeOfTheObservation->setTime($time);
        $this->datetimeOfTheObservation->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldProducersId(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $this->producersId = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->producersId->setIdentifier($identifier);
        $this->producersId->setText($text);
        $this->producersId->setNameOfCodingSystem($nameOfCodingSystem);
        $this->producersId->setAltIdentifier($altIdentifier);
        $this->producersId->setAltText($altText);
        $this->producersId->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldResponsibleObserver(
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
        $responsibleObserver = $this
            ->dataTypeFactory
            ->create('XCN', $this->encodingParameters)
        ;
        $this->responsibleObserver[] = $responsibleObserver;
        $responsibleObserver->setIdNumber($idNumber);
        $responsibleObserver->setFamilyName($familyName);
        $responsibleObserver->setGivenName($givenName);
        $responsibleObserver->setMiddleInitialOrName($middleInitialOrName);
        $responsibleObserver->setSuffix($suffix);
        $responsibleObserver->setPrefix($prefix);
        $responsibleObserver->setDegree($degree);
        $responsibleObserver->setSourceTable($sourceTable);
        $responsibleObserver->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $responsibleObserver->setNameTypeCode($nameTypeCode);
        $responsibleObserver->setIdentifierCheckDigit($identifierCheckDigit);
        $responsibleObserver->setCheckDigitScheme($checkDigitScheme);
        $responsibleObserver->setIdentifierTypeCode($identifierTypeCode);
        $responsibleObserver->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $responsibleObserver->setNameRepresentationCode($nameRepresentationCode);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldObservationMethod(
        string $identifier = null,
        string $text = null,
        string $nameOfCodingSystem = null,
        string $altIdentifier = null,
        string $altText = null,
        string $nameOfAltCodingSystem = null
    ) {
        $observationMethod = $this
            ->dataTypeFactory
            ->create('CE', $this->encodingParameters)
        ;
        $this->observationMethod[] = $observationMethod;
        $observationMethod->setIdentifier($identifier);
        $observationMethod->setText($text);
        $observationMethod->setNameOfCodingSystem($nameOfCodingSystem);
        $observationMethod->setAltIdentifier($altIdentifier);
        $observationMethod->setAltText($altText);
        $observationMethod->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\V231\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldValueType()
    {
        return $this->valueType;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldObservationIdentifier()
    {
        return $this->observationIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldObservationSubid()
    {
        return $this->observationSubid;
    }

    /**
     * @return \Hl7v2\DataType\DataTypeInterface[]
     */
    public function getFieldObservationValue()
    {
        return $this->observationValue;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldUnits()
    {
        return $this->units;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldReferencesRange()
    {
        return $this->referencesRange;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType[]
     */
    public function getFieldAbnormalFlags()
    {
        return $this->abnormalFlags;
    }

    /**
     * @return \Hl7v2\DataType\V231\NmDataType
     */
    public function getFieldProbability()
    {
        return $this->probability;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType[]
     */
    public function getFieldNatureOfAbnormalTest()
    {
        return $this->natureOfAbnormalTest;
    }

    /**
     * @return \Hl7v2\DataType\V231\IdDataType
     */
    public function getFieldObservationResultStatus()
    {
        return $this->observationResultStatus;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldDateLastObsNormalValues()
    {
        return $this->dateLastObsNormalValues;
    }

    /**
     * @return \Hl7v2\DataType\V231\StDataType
     */
    public function getFieldUserDefinedAccessChecks()
    {
        return $this->userDefinedAccessChecks;
    }

    /**
     * @return \Hl7v2\DataType\V231\TsDataType
     */
    public function getFieldDatetimeOfTheObservation()
    {
        return $this->datetimeOfTheObservation;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType
     */
    public function getFieldProducersId()
    {
        return $this->producersId;
    }

    /**
     * @return \Hl7v2\DataType\V231\XcnDataType[]
     */
    public function getFieldResponsibleObserver()
    {
        return $this->responsibleObserver;
    }

    /**
     * @return \Hl7v2\DataType\V231\CeDataType[]
     */
    public function getFieldObservationMethod()
    {
        return $this->observationMethod;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // OBX.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetId($codec->extractComponent($datagram));

        // OBX.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ValueType', 3, $datagram->getPositionalState());
        $this->setFieldValueType($codec->extractComponent($datagram));

        // OBX.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ObservationIdentifier', 80, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldObservationIdentifier(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBX.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ObservationSubid', 20, $datagram->getPositionalState());
        $this->setFieldObservationSubid($codec->extractComponent($datagram));

        // OBX.5
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        if ('ED' === $this->getFieldValueType()->getValue()) {
            $sequence = [[1,1,1],1,1,1,1];
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
                $first = false;
            }
            foreach ($repetitions as $components) {
                list(
                    list(
                        $sourceApplicationNamespaceId,
                        $sourceApplicationUniversalId,
                        $sourceApplicationUniversalIdType,
                    ),
                    $typeOfData,
                    $dataSubtype,
                    $encoding,
                    $data,
                ) = $components;
                $this->addFieldObservationValueAsED(
                    $sourceApplicationNamespaceId,
                    $sourceApplicationUniversalId,
                    $sourceApplicationUniversalIdType,
                    $typeOfData,
                    $dataSubtype,
                    $encoding,
                    $data
                );
            }
        } elseif ('FT' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsFT($value);
            }
        } elseif ('NM' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $this->checkRepetitionLength('ObservationValue', 16, $datagram->getPositionalState());
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsNM($value);
            }
        } elseif ('ST' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $this->checkRepetitionLength('ObservationValue', 199, $datagram->getPositionalState());
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsST($value);
            }
        } elseif ('TS' === $this->getFieldValueType()->getValue()) {
            $sequence = [1,1];
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $this->checkRepetitionLength('ObservationValue', 26, $datagram->getPositionalState());
                $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
                $first = false;
            }
            foreach ($repetitions as $components) {
                list(
                    $time,
                    $degreeOfPrecision,
                ) = $components;
                $this->addFieldObservationValueAsTS(
                    $time,
                    $degreeOfPrecision
                );
            }
        } elseif ('TX' === $this->getFieldValueType()->getValue()) {
            $repetitions = [];
            $first = true;
            while ($first || false !== $codec->advanceToRepetition($datagram)) {
                $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
                $first = false;
            }
            foreach ($repetitions as list($value,)) {
                $this->addFieldObservationValueAsTX($value);
            }
        }

        // OBX.6
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Units', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldUnits(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBX.7
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ReferencesRange', 60, $datagram->getPositionalState());
        $this->setFieldReferencesRange($codec->extractComponent($datagram));

        // OBX.8
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AbnormalFlags', 5, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldAbnormalFlags($value);
        }

        // OBX.9
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Probability', 5, $datagram->getPositionalState());
        $this->setFieldProbability($codec->extractComponent($datagram));

        // OBX.10
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('NatureOfAbnormalTest', 2, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldNatureOfAbnormalTest($value);
        }

        // OBX.11
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ObservationResultStatus', 1, $datagram->getPositionalState());
        $this->setFieldObservationResultStatus($codec->extractComponent($datagram));

        // OBX.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DateLastObsNormalValues', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDateLastObsNormalValues(
            $time,
            $degreeOfPrecision
        );

        // OBX.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('UserDefinedAccessChecks', 20, $datagram->getPositionalState());
        $this->setFieldUserDefinedAccessChecks($codec->extractComponent($datagram));

        // OBX.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DatetimeOfTheObservation', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDatetimeOfTheObservation(
            $time,
            $degreeOfPrecision
        );

        // OBX.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ProducersId', 60, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldProducersId(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // OBX.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ResponsibleObserver', 80, $datagram->getPositionalState());
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
            $this->addFieldResponsibleObserver(
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

        // OBX.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ObservationMethod', 60, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
            ) = $components;
            $this->addFieldObservationMethod(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = 'OBX';
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

        if (!$this->getFieldValueType() || !$this->getFieldValueType()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldValueType()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldObservationIdentifier()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldObservationIdentifier();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldObservationSubid() || !$this->getFieldObservationSubid()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldObservationSubid()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldObservationValue())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldObservationValue() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
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

        if (!$this->getFieldUnits()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldUnits();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldReferencesRange() || !$this->getFieldReferencesRange()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldReferencesRange()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldAbnormalFlags())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldAbnormalFlags() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
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

        if (!$this->getFieldProbability() || !$this->getFieldProbability()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldProbability()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (empty($this->getFieldNatureOfAbnormalTest())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldNatureOfAbnormalTest() as $repetition) {
                if (!$repetition->hasValue()) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
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

        if (!$this->getFieldObservationResultStatus() || !$this->getFieldObservationResultStatus()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldObservationResultStatus()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDateLastObsNormalValues()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDateLastObsNormalValues();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldUserDefinedAccessChecks() || !$this->getFieldUserDefinedAccessChecks()->hasValue()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $s .= str_repeat(
                $this->encodingParameters->getFieldSep(),
                1 + $emptyFieldsSinceLastField
            ) . (string) $this->getFieldUserDefinedAccessChecks()->getValue();
            $emptyFieldsSinceLastField = 0;
        }

        if (!$this->getFieldDatetimeOfTheObservation()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldDatetimeOfTheObservation();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (!$this->getFieldProducersId()) {
            ++$emptyFieldsSinceLastField;
        } else {
            $value = (string) $this->getFieldProducersId();
            if ('' === $value) {
                ++$emptyFieldsSinceLastField;
            } else {
                $s .= str_repeat(
                    $this->encodingParameters->getFieldSep(),
                    1 + $emptyFieldsSinceLastField
                ) . $value;
                $emptyFieldsSinceLastField = 0;
            }
        }

        if (empty($this->getFieldResponsibleObserver())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldResponsibleObserver() as $repetition) {
                $value = (string) $repetition;
                if ('' === $value) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
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

        if (empty($this->getFieldObservationMethod())) {
            ++$emptyFieldsSinceLastField;
        } else {
            $nonEmptyReps = 0;
            foreach ($this->getFieldObservationMethod() as $repetition) {
                $value = (string) $repetition;
                if ('' === $value) {
                    continue;
                }
                if (0 == $nonEmptyReps) {
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
