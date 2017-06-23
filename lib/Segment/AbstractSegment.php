<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Validation\StringLengthTrait;

/**
 * Base class of all Segments.
 */
abstract class AbstractSegment implements SegmentInterface
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
     * @var \Hl7v2\Encoding\EncodingParameters
     */
    protected $encodingParameters;

    /**
     * @param \Hl7v2\Factory\DataTypeFactory $dataTypeFactory
     */
    public function __construct(
        DataTypeFactory $dataTypeFactory
    ) {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    abstract public function fromDatagram(Datagram $datagram, Codec $codec);

    public function setEncodingParameters(EncodingParameters $encodingParameters)
    {
        $this->encodingParameters = $encodingParameters;
    }

    public function getEncodingParameters()
    {
        return $this->encodingParameters;
    }

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
}
