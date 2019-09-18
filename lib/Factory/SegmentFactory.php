<?php

namespace Hl7v2\Factory;

use Hl7v2\Encoding\EncodingParameters;
use Hl7v2\Exception\CapabilityError;

class SegmentFactory
{
    private $classmap = [];
    private $dataTypeFactory;
    private $defaultVersion;

    /**
     * @param DataTypeFactory $dataTypeFactory
     * @param string $defaultVersion the version of Segment to create when a
     *                               version is not supplied to create()
     */
    public function __construct(DataTypeFactory $dataTypeFactory, $defaultVersion = 'v251')
    {
        $this->dataTypeFactory = $dataTypeFactory;
        $this->defaultVersion = $defaultVersion;
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
        EncodingParameters $encodingParameters,
        $version = null
    ) {
        if (null === $version) {
            $version = $this->defaultVersion;
        }
        $segmentClass = $this->determineClassname($segmentId, $version);

        $segment = new $segmentClass($this->dataTypeFactory);
        $segment->setCharacterEncoding($encodingParameters->getCharacterEncoding());
        $segment->setEncodingParameters($encodingParameters);

        return $segment;
    }

    private function determineClassname($typeName, $version)
    {
        $classMapKey = $typeName . $version;
        if (array_key_exists($classMapKey, $this->classmap)) {
            return $this->classmap[$classMapKey];
        }
        $name = ucfirst(strtolower($typeName));
        $versionSubNs = strtoupper($version);
        $class = "\\Hl7v2\\Segment\\{$versionSubNs}\\{$name}Segment";
        if (!class_exists($class)) {
            throw new CapabilityError("Unable to create a {$version} segment of type \"{$typeName}\".");
        }
        $this->classmap[$classMapKey] = $class;

        return $class;
    }
}
