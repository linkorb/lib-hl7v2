<?php

namespace Hl7v2\Meta\Helper;

class SegmentField
{
    /**
     * Textual Field ID (e.g. MSH.18)
     * @var string
     */
    public $id;
    /**
     * Permitted length of Field.
     * @var null|int
     */
    public $len;
    /**
     * Name of Field (e.g. CharacterEncoding).
     * @var string
     */
    public $name;
    /**
     * Name of Segment object property (e.g. $characterEncoding).
     * @var string
     */
    public $nameForProperty;
    /**
     * Numerical index of Field (beginning with one).
     * @var int
     */
    public $num;
    /**
     * True when the value of the Field may repeat.
     * @var bool
     */
    public $repeated = false;
    /**
     * Maximum number of value repetitions.
     * @var null|int
     */
    public $repeatedCount;
    /**
     * True when a value of the Field is mandatory.
     * @var bool
     */
    public $required = false;
    /**
     * True when the Field is reserved for future use.
     * @var bool
     */
    public $reserved = false;
    /**
     * DataType type name (e.g. ID).
     * @var null|string
     */
    public $type;
    /**
     * @var \Hl7v2\Meta\Helper\DataTypeResolver
     */
    public $typeResolver;

    public function __construct($id, $num, DataTypeResolver $typeResolver, $fieldInfo)
    {
        $this->id = $id;
        $this->num = $num;
        $this->name = $this->prepareName($fieldInfo['name']);
        $this->nameForProperty = lcfirst($this->name);

        if (array_key_exists('reserved', $fieldInfo)
            && true === $fieldInfo['reserved']
        ) {
            $this->reserved = true;
            return;
        }

        $this->typeResolver = $typeResolver;
        $this->type = $fieldInfo['type'];
        if (array_key_exists('required', $fieldInfo)
            && true === $fieldInfo['required']
        ) {
            $this->required = true;
        }
        if (array_key_exists('len', $fieldInfo)
            && is_numeric($fieldInfo['len'])
        ) {
            $this->len = (int) $fieldInfo['len'];
        }
        if (array_key_exists('repeat', $fieldInfo)
            && true === $fieldInfo['repeat']
        ) {
            $this->repeated = true;
        }
        if (array_key_exists('max_repeat', $fieldInfo)
            && is_numeric($fieldInfo['max_repeat'])
        ) {
            $this->repeatedCount = (int) $fieldInfo['max_repeat'];
        }
    }

    public function isComponentType()
    {
        return $this->typeResolver->isComponentType($this->type);
    }

    public function getComponentInfo()
    {
        return $this->typeResolver->getMutatorsForCalling($this->type);
    }

    public function getSubcomponentInfo()
    {
        return $this->typeResolver->getSubcomponentInfo($this->type);
    }

    private function prepareName($name)
    {
        $parts = preg_split('/\s+/', $name, null, PREG_SPLIT_NO_EMPTY);
        foreach ($parts as &$part) {
            $part = $this->substituteName(ucfirst(strtolower($part)));
        }
        return implode('', $parts);
    }

    private function substituteName($name)
    {
        switch ($name) {
            case 'Alternate':
                return 'Alt';
            default:
                return $name;
        }
    }
}
