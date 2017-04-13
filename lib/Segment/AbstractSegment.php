<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Validation\StringLengthTrait;

/**
 * Base class of all Segments.
 */
abstract class AbstractSegment
{
    use StringLengthTrait;

    /**
     * @var \Hl7v2\Factory\DataTypeFactory
     */
    protected $dataTypeFactory;
    /**
     * @deprecated
     */
    protected $fields = array();

    /**
     * @param \Hl7v2\Factory\DataTypeFactory $dataTypeFactory
     */
    public function __construct(
        DataTypeFactory $dataTypeFactory
    ) {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    /**
     * Decode the Segment, from the supplied Datagram, using the Codec.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param \Hl7v2\Encoding\Codec $codec
     * @throws \Hl7v2\Exception\SegmentError
     */
    abstract public function fromDatagram(Datagram $data, Codec $codec);

    /**
     * Having advanced in to a Field, this helper extracts the content of
     * Components (each may have sub-components).
     *
     * The $sequence argument is a set of nested arrays which direct the
     * extractionn of components and subcomponents. Each element in the
     * outermost list represents a component: An integer represents a whole
     * component to be extracted; and an array represents a component made-up of
     * subcomponents. Each of element of a subcomponent array represents a
     * subcomponent: an integer represents a whole subcomponent to be extracted
     * and an array is a subcomponent made-up of further subcomponents. e.g.
     *
     *      [1, 1, [1, [1, 1], 1], 1]
     *
     *  is a field of four components, the third being made-up of three
     *  subcomponents, the second of which is made-up of two subcomponents.
     *  Klar?
     *
     * @param Datagram $data
     * @param Codec $codec
     * @param array $sequence
     * @return array
     */
    protected function extractComponents(
        Datagram $data,
        Codec $codec,
        $sequence
    ) {
        $first = true;
        $extracted = [];
        foreach ($sequence as $instruction) {
            if (!$first && false === $codec->advanceToComponent($data)) {
                break;
            }
            if (is_array($instruction)) {
                $extracted[] = $this->extractSubcomponents($data, $codec, $instruction);
            } else {
                $extracted[] = $codec->extractComponent($data);
            }
            $first = false;
        }
        while (sizeof($extracted) < sizeof($sequence)) {
            array_push($extracted, null);
        }
        return $extracted;
    }

    /**
     * Having advanced in to a Field, this helper extracts the content of
     * Subcomponents (each may have sub-components).
     *
     * @param Datagram $data
     * @param Codec $codec
     * @param array $sequence
     * @return array
     */
    protected function extractSubcomponents(
        Datagram $data,
        Codec $codec,
        $sequence
    ) {
        $first = true;
        $extracted = [];
        foreach ($sequence as $instruction) {
            if (!$first && false === $codec->advanceToSubcomponent($data)) {
                break;
            }
            if (is_array($instruction)) {
                $extracted[] = $this->extractSubcomponents($data, $codec, $instruction);
            } else {
                $extracted[] = $codec->extractSubcomponent($data);
            }
            $first = false;
        }
        while (sizeof($extracted) < sizeof($sequence)) {
            array_push($extracted, null);
        }
        return $extracted;
    }


    /**
     * @deprecated
     */
    public function setField($index, $value = "")
    {
        if (!$index) {
            throw new \InvalidArgumentException("No index or value");
        }

        // Fill in the blanks...
        for ($i = count($this->fields); $i < $index; $i++) {
            $this->fields[$i] = "";
        }
        $this->fields[$index] = $value;
        return $this;
    }
    /**
     * @deprecated
     */
    public function getField($index)
    {
        if (!isset($this->fields[$index])) {
            return null;
        }
        return $this->fields[$index];
    }
    /**
     * @deprecated
     */
    public function getName()
    {
        return $this->fields[0];
    }
    /**
     * @deprecated
     */
    public function setName($name)
    {
        if ((strlen($name) != 3) || (strtoupper($name) != $name)) {
            throw new \InvalidArgumentException("Name should be 3 characters, uppercase");
        }
        $this->fields[0] = $name;
    }
}
