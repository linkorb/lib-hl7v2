<?php

namespace Hl7v2\Factory;

use Hl7v2\Exception\SegmentError;

class SegmentFactory
{
    private $dataTypeFactory;

    public function __construct(DataTypeFactory $dataTypeFactory)
    {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    public function create($segmentId, $characterEncoding)
    {
        $segmentClass = $this->determineClassname($segmentId);

        $segment = new $segmentClass($this->dataTypeFactory);
        $segment->setCharacterEncoding($characterEncoding);

        return $segment;
    }

    private function determineClassname($typeName)
    {
        $name = ucfirst(strtolower($typeName));
        $class = "\\Hl7v2\\Segment\\{$name}Segment";
        if (!class_exists($class)) {
            throw new SegmentError("Unknown Segment \"{$typeName}\".");
        }
        return $class;
    }
}
