<?php

namespace Hl7v2\Encoding;

use Hl7v2\Exception\CodecError;

/**
 * Mapping between supported Hl7 character encoding names and native PHP names.
 */
class CharacterEncodingNames
{
    /**
     * Translate an Hl7 character encoding name to the native PHP name.
     *
     * @param string $hl7Name an Hl7 name, for example "8859/1"
     *
     * @return string the native PHP name, for example "ISO-8859-1"
     *
     * @throws \Hl7v2\Exception\CodecError
     */
    public function translateToNativeName($hl7Name)
    {
        if ('ASCII' === $hl7Name) {
            return '7bit';
        }

        if ('8859' === substr($hl7Name, 0, 4)) {
            $c = [];
            if (!preg_match('@^8859/(\d*)@', $hl7Name, $c)) {
                throw new CodecError("The character encoding \"{$hl7Name}\" is unsupported.");
            }
            if ((int) $c[1] < 1 || (int) $c[1] > 16) {
                throw new CodecError("The character encoding \"{$hl7Name}\" is unsupported.");
            }

            return "ISO-8859-{$c[1]}";
        }

        if ('UNICODE UTF-8' === $hl7Name) {
            return 'UTF-8';
        }

        if (preg_match('@^windows\-125[12]$@i', $hl7Name)) {
            return ucfirst($hl7Name);
        }

        throw new CodecError("The character encoding \"{$hl7Name}\" is unsupported.");
    }

    public function translateToHl7Name($nativeName)
    {
        throw new \RuntimeException(__METHOD__ . ' is not implemented.');
    }
}
