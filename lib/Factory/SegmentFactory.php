<?php

namespace Hl7v2\Factory;

use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Exception\CapabilityError;

class SegmentFactory
{
    private $dataTypeFactory;

    public function __construct(DataTypeFactory $dataTypeFactory)
    {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    /**
     * @param string $segmentId
     * @param \Hl7v2\Encoding\EncodingParameters $encodingParameters
     *
     * @return \Hl7v2\Segment\SegmentInterface
     *
     * @throws \Hl7v2\Exception\CapabilityError;
     */
    public function create(
        $segmentId,
        EncodingParameters $encodingParameters
    ) {
        $segmentClass = $this->determineClassname($segmentId);

        $segment = new $segmentClass($this->dataTypeFactory);
        $segment->setCharacterEncoding($encodingParameters->getCharacterEncoding());
        $segment->setEncodingParameters($encodingParameters);

        return $segment;
    }

    private function determineClassname($typeName)
    {
        $name = ucfirst(strtolower($typeName));
        $class = "\\Hl7v2\\Segment\\{$name}Segment";
        if (!class_exists($class)) {
            throw new CapabilityError("Unable to create a segment of type \"{$typeName}\".");
        }
        return $class;
    }
}
