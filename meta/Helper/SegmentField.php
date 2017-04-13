<?php

namespace Hl7v2\Meta\Helper;

class SegmentField
{
    public $id;
    public $len;
    public $name;
    public $num;
    public $repeated = false;
    public $repeatedCount;
    public $required = false;
    public $reserved = false;
    public $type;
    public $typeResolver;

    public function __construct($id, $num, DataTypeResolver $typeResolver, $fieldInfo)
    {
        $this->id = $id;
        $this->num = $num;
        $this->name = $this->prepareName($fieldInfo['name']);
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
