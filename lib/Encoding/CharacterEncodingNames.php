<?php

namespace Hl7v2\Encoding;

use RuntimeException;

use Hl7v2\Exception\CodecError;

/**
 * Mapping between supported Hl7 character encoding names and native PHP names.
 */
class CharacterEncodingNames
{
    /**
     * Translate an Hl7 character encoding name to the native PHP name.
     *
     * @param string $hl7Name An Hl7 name, for example "8859/1".
     *
     * @return string The native PHP name, for example "ISO-8859-1".
     *
     * @throws \Hl7v2\Exception\CodecError
     */
    public function translateToNativeName($hl7Name)
    {
        if ($hl7Name === 'ASCII') {
            return '7bit';
        }

        if (substr($hl7Name, 0, 4) === '8859') {
            $c = [];
            if (!preg_match('@^8859/(\d*)@', $hl7Name, $c)) {
                throw new CodecError("The character encoding \"{$hl7Name}\" is unsupported.");
            }
            if ((int) $c[1] < 1 || (int) $c[1] > 16) {
                throw new CodecError("The character encoding \"{$hl7Name}\" is unsupported.");
            }
            return "ISO-8859-{$c[1]}";
        }

        if ($hl7Name === 'UNICODE UTF-8') {
            return 'UTF-8';
        }

        throw new CodecError("The character encoding \"{$hl7Name}\" is unsupported.");
    }

    public function translateToHl7Name($nativeName)
    {
        throw new RuntimeException("Method \"{__METHOD__}\" is not implemented.");
    }
}
