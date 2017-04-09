<?php

namespace Hl7v2\Test\Encoding;

use PHPUnit_Framework_TestCase;

use Hl7v2\Encoding\CharacterEncodingNames;
use Hl7v2\Exception\CodecError;

class BasicTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider unsupportedHl7Names
     * @covers \Hl7v2\Encoding\CharacterEncodingNames::translateToNativeName
     */
    public function testTranslateToNativeNameWithUnsupportedNameWillThrowCodecError($name)
    {
        $this->setExpectedException(
            CodecError::class,
            "The character encoding \"{$name}\" is unsupported."
        );

        $uut = new CharacterEncodingNames;
        $uut->translateToNativeName($name);
    }

    public function unsupportedHl7Names()
    {
        return [
            ['ThisIsNotASupportedName'],
            ['88591'],
            ['8859/x'],
            ['8859/-1'],
            ['8859/0'],
            ['8859/17'],
        ];
    }

    /**
     * @dataProvider supportedHl7Names
     * @covers \Hl7v2\Encoding\CharacterEncodingNames::translateToNativeName
     */
    public function testTranslateToNativeNameWithHl7NameWillReturnNativeName($name, $expectedName)
    {
        $uut = new CharacterEncodingNames;
        $this->assertSame(
            $expectedName,
            $uut->translateToNativeName($name),
            'The Hl7 name is translated into the native PHP name.'
        );
    }

    public function supportedHl7Names()
    {
        return [
            ['ASCII', '7bit'],
            ['8859/1', 'ISO-8859-1'],
            ['8859/16', 'ISO-8859-16'],
            ['UNICODE UTF-8', 'UTF-8'],
        ];
    }

    public function testTranslateToHl7NameWithUnsupportedNameWillThrowRuntimeError()
    {
        $this->markTestSkipped('The method "translateToHl7Name" is not implemented.');
    }
}
