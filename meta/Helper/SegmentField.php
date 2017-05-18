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
     * True when the Field should be inaccessible.
     * @var bool
     */
    public $skipped = false;
    /**
     * Suffix for Field mutator method name (used for variable DataType Fields).
     * @var string
     */
    public $suffixForMutator = '';
    /**
     * DataType type name (e.g. ID).
     * @var null|string
     */
    public $type;
    /**
     * @var \Hl7v2\Meta\Helper\DataTypeResolver
     */
    public $typeResolver;
    /**
     * True when the Field is of variable DataType.
     * @var bool
     */
    public $variable = false;
    /**
     * List of DataType permitted for a variable Type field.
     * @var array[]
     */
    public $variableTypes = [];
    /**
     * The index number of the accompanying type indicator Field.
     * @var null|int
     */
    public $variableTypesIndicatorFieldnum;

    private $pos;

    public function __construct($id, $num, DataTypeResolver $typeResolver, $fieldInfo)
    {
        $this->id = $id;
        $this->num = $num;
        $this->name = $this->prepareName($fieldInfo['name']);
        $this->nameForProperty = lcfirst($this->name);

        if ((!array_key_exists('type', $fieldInfo) || empty($fieldInfo['type']))
            || (array_key_exists('reserved', $fieldInfo) && true === $fieldInfo['reserved'])
        ) {
            $this->skipped = true;
            return;
        }

        $this->typeResolver = $typeResolver;

        if ($fieldInfo['type'] !== 'variable') {
            $this->type = $fieldInfo['type'];
        } elseif (array_key_exists('types', $fieldInfo) && is_array($fieldInfo['types'])) {
            $this->variable = true;
            $this->variableTypes = $fieldInfo['types'];
            $this->variableTypesIndicatorFieldnum = $fieldInfo['fieldIdentifiesType'];
        }

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

    public function rewindVariableTypes()
    {
        $this->pos = 0;
    }

    public function advanceVariableTypes()
    {
        $this->pos = ($this->pos + 1) % sizeof($this->variableTypes);
    }

    public function currentVariableType()
    {
        $this->type = $this->variableTypes[$this->pos]['type'];
        $this->suffixForMutator = "As{$this->type}";

        if (array_key_exists('len', $this->variableTypes[$this->pos])
            && is_numeric($this->variableTypes[$this->pos]['len'])
        ) {
            $this->len = (int) $this->variableTypes[$this->pos]['len'];
        } else {
            $this->len = null;
        }
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
