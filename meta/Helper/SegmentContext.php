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

    public function segmentIdToFQClassName($segmentId)
    {
        $className = $this->segmentIdToClassName($segmentId);
        return "{$this->namespace}\\{$className}";
    }

    public function segmentIdToClassName($segmentId)
    {
        return ucfirst(strtolower($segmentId)) . self::CLASS_SUFFIX;
    }
}
