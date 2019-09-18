<?php

namespace Hl7v2\Meta\Helper;

use Memio\Model\File;
use Memio\Model\FullyQualifiedName;
use Memio\Model\Structure;

class Util
{
    public static function indentBodyParts(array $parts, $indentLen = 8)
    {
        $indent = str_repeat(' ', $indentLen);
        return array_map(
            function ($x) use ($indent) {
                return empty($x) ? $x : "{$indent}{$x}";
            },
            $parts
        );
    }

    /**
     * Insert, into the supplied array, lines of text corresponding to a method
     * call.
     *
     * @param array $body Reference to the array
     * @param string $stmt The opening line of the method call, up to the first parens.
     * @param array $params List of method parameters e.g. ['$foo', '$bar']
     * @param number $indent Optional number of spaces to indent the method call
     * @param number $offset Included in calculation of line length
     * @param number $maxLineLength
     */
    public static function addMethodCallToBody(&$body, $stmt, $params, $indent = 0, $offset = 8, $maxLineLength = 100)
    {
        $paramString = implode(', ', $params);
        if ($maxLineLength < $offset + $indent + strlen($stmt) + strlen($paramString) + 2) {
            $body[] = str_repeat(' ', $indent) . $stmt;
            while (sizeof($params) > 1) {
                $p = array_shift($params);
                $body[] = str_repeat(' ', $indent+4) . "{$p},";
            }
            $p = array_shift($params);
            $body[] = str_repeat(' ', $indent+4) . "{$p}";
            $body[] = str_repeat(' ', $indent) . ');';
        } else {
            $body[] = str_repeat(' ', $indent) . "{$stmt}{$paramString});";
        }
    }

    public static function mkOutDir($pathname)
    {
        if (is_dir($pathname)) {
            return;
        }
        mkdir($pathname, 0750, true);
    }

    public static function insertUseStatements(File $file)
    {
        $parent = $file->getStructure()->getParent();

        if (!$parent instanceof Structure
            || $file->getNamespace() === $parent->getNamespace()
        ) {
            return;
        }

        $file->addFullyQualifiedName(new FullyQualifiedName($parent->getFullyQualifiedName()));
    }
}
