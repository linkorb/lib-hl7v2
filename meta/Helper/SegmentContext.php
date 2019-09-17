<?php

namespace Hl7v2\Meta\Helper;

class SegmentContext
{
    const CLASS_SUFFIX = 'Segment';

    protected $rootNamespace;
    protected $versionedNamespace;

    public function __construct($rootNamespace, $versionedSubNamespace)
    {
        $this->rootNamespace = $rootNamespace;
        $this->versionedNamespace = $rootNamespace . '\\' . $versionedSubNamespace;
    }

    public function getRootNamespace()
    {
        return $this->rootNamespace;
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
        return "{$this->versionedNamespace}\\{$className}";
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
