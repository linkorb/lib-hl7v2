<?php

namespace Hl7v2\Meta\Helper;

class SegmentContext
{
    const CLASS_SUFFIX = 'Segment';

    protected $namespace;

    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Fully qualified class name of the Segment with the specified $segmentId.
     *
     * @param string $typeId
     * @return string
     */
    public function segmentIdToClass($segmentId)
    {
        $className = $this->segmentIdToClassName($segmentId);
        return "{$this->namespace}\\{$className}";
    }

    /**
     * Class name of the Segment with the specified $segmentId.
     *
     * @param string $typeId
     * @return string
     */
    public function segmentIdToClassName($segmentId)
    {
        return ucfirst(strtolower($segmentId)) . self::CLASS_SUFFIX;
    }
}
