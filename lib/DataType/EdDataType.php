<?php

namespace Hl7v2\DataType;

/**
 * Encapsulated Data (ED).
 */
class EdDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    private $sourceApplication;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $typeOfData;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $dataSubtype;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $encoding;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    private $data;

    /**
     * @param string $sourceApplicationNamespaceId
     * @param string $sourceApplicationUniversalId
     * @param string $sourceApplicationUniversalIdType
     */
    public function setSourceApplication(
        $sourceApplicationNamespaceId = null,
        $sourceApplicationUniversalId = null,
        $sourceApplicationUniversalIdType = null
    ) {
        $this->sourceApplication = $this
            ->dataTypeFactory
            ->create('HD', $this->encodingParameters, true)
        ;
        $this->sourceApplication->setNamespaceId($sourceApplicationNamespaceId);
        $this->sourceApplication->setUniversalId($sourceApplicationUniversalId);
        $this->sourceApplication->setUniversalIdType($sourceApplicationUniversalIdType);
    }

    /**
     * @param string $typeOfData
     */
    public function setTypeOfData($typeOfData)
    {
        $this->typeOfData = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->typeOfData->setValue($typeOfData);
    }

    /**
     * @param string $dataSubtype
     */
    public function setDataSubtype($dataSubtype = null)
    {
        $this->dataSubtype = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->dataSubtype->setValue($dataSubtype);
    }

    /**
     * @param string $encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->encoding->setValue($encoding);
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $this
            ->dataTypeFactory
            ->create('TX', $this->encodingParameters)
        ;
        $this->data->setValue($data);
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getSourceApplication()
    {
        return $this->sourceApplication;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getTypeOfData()
    {
        return $this->typeOfData;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDataSubtype()
    {
        return $this->dataSubtype;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getData()
    {
        return $this->data;
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

        if ($this->getSourceApplication()) {
            $s .= (string) $this->getSourceApplication();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getTypeOfData() || !$this->getTypeOfData()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getTypeOfData()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getDataSubtype() || !$this->getDataSubtype()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getDataSubtype()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getEncoding() || !$this->getEncoding()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getEncoding()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getData() || !$this->getData()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getData()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
