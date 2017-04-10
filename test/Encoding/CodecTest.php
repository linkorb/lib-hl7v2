<?php

namespace Hl7v2\Test\Encoding;

use PHPUnit_Framework_TestCase;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\CharacterEncodingNames;
use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\EncodingParametersBuilder;
use Hl7v2\Exception\CodecError;

use Hl7v2\Test\DatagramBuilder;

class CodecTest extends PHPUnit_Framework_TestCase
{
    private $charEncNames;
    private $codec;
    private $datagramBuilder;
    private $paramBuilder;

    protected function setUp()
    {
        $this->paramBuilder = new EncodingParametersBuilder;
        $this->datagramBuilder = new DatagramBuilder($this->paramBuilder);
        $this->charEncNames = $this
            ->getMockBuilder(CharacterEncodingNames::class)
            ->getMock()
        ;
        $this->codec = new Codec($this->charEncNames);
    }

    /**
     * @expectedException \Hl7v2\Exception\CodecError
     * @expectedExceptionMessage Message Header is invalid.
     * @dataProvider invalidMshSegments
     * @covers \Hl7v2\Encoding\Codec::bootstrap
     */
    public function testBootstrapWithInvalidMSHWillThrowCodecError($messageData)
    {
        $datagram = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->build()
        ;
        $this->codec->bootstrap($datagram, $this->paramBuilder);
    }

    public function invalidMshSegments()
    {
        return [
            'Segment ID too short' => ["MS|wxyz|A|B\r"],
            'Segment ID too long' => ["IMSH|wxyz|A|B\r"],
            'Encoding Characters empty' => ["MSH||A|B\r"],
            'Encoding Characters too short' => ["MSH|xyz|A|B\r"],
            'Encoding Characters too long' => ["MSH|vwxyz|A|B\r"],
        ];
    }

    /**
     * @expectedException \Hl7v2\Exception\CodecError
     * @expectedExceptionMessage MSH.18 Character Encoding is invalid.
     * @covers \Hl7v2\Encoding\Codec::bootstrap
     */
    public function testBootsrapWithInvalidMSH18WillThrowCodecError()
    {
        $this
            ->charEncNames
            ->expects($this->once())
            ->method('translateToNativeName')
            ->with($this->equalTo('InvalidCharacterEncoding'))
            ->willThrowException(new CodecError)
        ;

        $datagram = $this
            ->datagramBuilder
            ->withMessage('MSH|^~\&|ACME|ACME||||||||||||||InvalidCharacterEncoding')
            ->build()
        ;
        $this->codec->bootstrap($datagram, $this->paramBuilder);
    }

    /**
     * @dataProvider mshSegments
     * @covers \Hl7v2\Encoding\Codec::bootstrap
     */
    public function testBootstrapWithValidMSHWillDetectCharacterEncoding(
        $messageData,
        $nativeEncoding,
        $expectedHl7Encoding = null
    ) {
        if ($expectedHl7Encoding) {
            $this
                ->charEncNames
                ->expects($this->once())
                ->method('translateToNativeName')
                ->with($this->equalTo($expectedHl7Encoding))
                ->willReturn($nativeEncoding)
            ;
        }

        $datagram = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->build()
        ;
        $this->codec->bootstrap($datagram, $this->paramBuilder);

        $this->assertSame(
            $nativeEncoding,
            $datagram->getEncodingParameters()->getCharacterEncoding(),
            'Codec bootstraps the name of character encoding to be used.'
        );
    }

    public function mshSegments()
    {
        return [
            'MSH only datagram; MSH.18 is not present; No EOS delimiter.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL|",
                '7bit',
            ],
            'MSH only datagram; MSH.18 is not present.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL|\r",
                '7bit',
            ],
            'MSH only datagram; MSH.18 is at the end of the segment; No EOS delimiter.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1",
                'ISO-8859-1',
                '8859/1',
            ],
            'MSH only datagram; MSH.18 is at the end of the segment.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1\r",
                'ISO-8859-1',
                '8859/1',
            ],
            'MSH only datagram; MSH.18 is not at the end of the segment; No EOS delimiter.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1|blah",
                'ISO-8859-1',
                '8859/1',
            ],
            'MSH only datagram; MSH.18 is not at the end of the segment.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1|blah\r",
                'ISO-8859-1',
                '8859/1',
            ],
            'MSH.18 is at the end of the segment.' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1\rPID|foo\r",
                'ISO-8859-1',
                '8859/1',
            ],
            'MSH.18 is not at the end of the segment' => [
                "MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1|blah\rPID|foo\r",
                'ISO-8859-1',
                '8859/1',
            ],
        ];
    }

    /**
     * @dataProvider delimiters
     * @covers \Hl7v2\Encoding\Codec::bootstrap
     */
    public function testBootstrapWithValidMSH18WillDetectDelimiters(
        $messageData,
        $delimiters,
        $hl7Encoding = null,
        $nativeEncoding = null
    ) {
        if ($hl7Encoding) {
            $this
                ->charEncNames
                ->expects($this->once())
                ->method('translateToNativeName')
                ->with($this->equalTo($hl7Encoding))
                ->willReturn($nativeEncoding)
            ;
        }

        $datagram = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->build()
        ;
        $this->codec->bootstrap($datagram, $this->paramBuilder);

        $this->assertSame(
            $delimiters[0],
            $datagram->getEncodingParameters()->getComponentSep(),
            'Codec bootstraps the name of Component Separator to be used.'
        );
        $this->assertSame(
            $delimiters[1],
            $datagram->getEncodingParameters()->getRepetitionSep(),
            'Codec bootstraps the name of Repetition Separator to be used.'
        );
        $this->assertSame(
            $delimiters[2],
            $datagram->getEncodingParameters()->getEscapeChar(),
            'Codec bootstraps the name of Escape Character to be used.'
        );
        $this->assertSame(
            $delimiters[3],
            $datagram->getEncodingParameters()->getSubcomponentSep(),
            'Codec bootstraps the name of Subcomponent Separator to be used.'
        );
    }

    public function delimiters()
    {
        return [
            '7-bit ASCII encoded' => [
                "MSH|^~\&|ACME|ACME||||||||||||||ASCII\r",
                ['^', '~', '\\', '&'],
                'ASCII',
                '7bit',
            ],
            'UTF-8 encoded' => [
                "MSH|✓Å℉⨀|ACME|ACME||||||||||||||UNICODE UTF-8\r",
                ['✓', 'Å', '℉', '⨀'],
                'UNICODE UTF-8',
                'UTF-8',
            ],
            'ISO-8859-1 encoded' => [ # ['£', '¥', '¶', '»'] (PHP sees this .php file as UTF-8)
                "MSH|\xA3\xA5\xB6\xBB|ACME|ACME||||||||||||||8859/1\r",
                ["\xA3", "\xA5", "\xB6", "\xBB"],
                '8859/1',
                'ISO-8859-1',
            ],
        ];
    }

    /**
     * @dataProvider advanceToSegmentData
     * @covers \Hl7v2\Encoding\Codec::advanceToSegment
     * @covers \Hl7v2\Encoding\Codec::locateNextSegment
     */
    public function testAdvanceToSegment($messageData, $retval, $state)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->withParams()
            ->build()
        ;

        $this->assertSame(
            $retval,
            $this->codec->advanceToSegment($data),
            'The method advanceToSegment returns boolean to indicate whether it was able to advance into a Segment.'
        );

        $this->assertSame(
            $state['ptr'],
            $data->getPositionalState()->ptr,
            'The method advanceToSegment updates PositionalState with the ptr location.'
        );

        $this->assertSame(
            $state['sos'],
            $data->getPositionalState()->sos,
            'The method advanceToSegment updates PositionalState with the sos location.'
        );

        $this->assertSame(
            $state['eos'],
            $data->getPositionalState()->eos,
            'The method advanceToSegment updates PositionalState with the eos location.'
        );
    }

    public function advanceToSegmentData()
    {
        return [
            '00 No Segment' => [
                "NOPE",
                false, ['ptr' => 0, 'sos' => false, 'eos' => false],
            ],
            '01 Has Segment. No end of Segment.' => [
                "FOO\rPID|1234",
                true, ['ptr' => 4, 'sos' => 4, 'eos' => false],
            ],
            '02 Has Segment.' => [
                "FOO\rPID|1234\r",
                true, ['ptr' => 4, 'sos' => 4, 'eos' => 12],
            ],
            '03 Has Segment. Skips empty Segment. No end of Segment.' => [
                "FOO\r\rPID|1234",
                true, ['ptr' => 5, 'sos' => 5, 'eos' => false],
            ],
            '04 Has Segment. Skips empty Segment.' => [
                "FOO\r\rPID|1234\r",
                true, ['ptr' => 5, 'sos' => 5, 'eos' => 13],
            ],
        ];
    }

    /**
     * @dataProvider advanceToFieldData
     * @covers \Hl7v2\Encoding\Codec::advanceToField
     * @covers \Hl7v2\Encoding\Codec::locateEndOfSegment
     * @covers \Hl7v2\Encoding\Codec::locateNextField
     * @covers \Hl7v2\Encoding\Codec::locateNextRepetition
     * @covers \Hl7v2\Encoding\Codec::locateNextComponent
     */
    public function testAdvanceToField($messageData, $retval, $state)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->withParams()
            ->build()
        ;

        $this->assertSame(
            $retval,
            $this->codec->advanceToField($data),
            'The method advanceToField returns boolean to indicate whether it was able to advance into a field.'
        );

        $this->assertSame(
            $state['ptr'],
            $data->getPositionalState()->ptr,
            'The method advanceToField updates PositionalState with the ptr location.'
        );

        $this->assertSame(
            $state['sof'],
            $data->getPositionalState()->sof,
            'The method advanceToField updates PositionalState with the sof location.'
        );

        $this->assertSame(
            $state['sor'],
            $data->getPositionalState()->sor,
            'The method advanceToField updates PositionalState with the sor location.'
        );

        $this->assertSame(
            $state['soc'],
            $data->getPositionalState()->soc,
            'The method advanceToField updates PositionalState with the soc location.'
        );

        $this->assertSame(
            $state['eoc'],
            $data->getPositionalState()->eoc,
            'The method advanceToField updates PositionalState with the eoc location.'
        );

        $this->assertSame(
            $state['eor'],
            $data->getPositionalState()->eor,
            'The method advanceToField updates PositionalState with the eor location.'
        );

        $this->assertSame(
            $state['eof'],
            $data->getPositionalState()->eof,
            'The method advanceToField updates PositionalState with the eof location.'
        );

        $this->assertSame(
            $state['eos'],
            $data->getPositionalState()->eos,
            'The method advanceToField updates PositionalState with the eos location.'
        );
    }

    public function advanceToFieldData()
    {
        return [
            '00 Attempt advance to field. No field. No end of segment.' => [
                "MSH", false,
                ['ptr' => 0,
                    'sof' => false, 'sor' => false, 'soc' => false,
                    'eoc' => false, 'eor' => false, 'eof' => false, 'eos' => false]
            ],
            '01 Attempt advance to field. No field.' => [
                "MSH\r", false,
                ['ptr' => 0,
                    'sof' => false, 'sor' => false, 'soc' => false,
                    'eoc' => false, 'eor' => false, 'eof' => false, 'eos' => 3]
            ],
            '02 Attempt advance to field. No field (one exists in next segment).' => [
                "MSH\r\PID|1234\r", false,
                ['ptr' => 0,
                    'sof' => false, 'sor' => false, 'soc' => false,
                    'eoc' => false, 'eor' => false, 'eof' => false, 'eos' => 3]
            ],
            '03 Attempt advance to field. Has one field. No end of segment.' => [
                "MSH|^~\&", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 4, 'eor' => 5, 'eof' => false, 'eos' => false]
            ], #             ^-----------^-- nothing we can do about it.
            '04 Attempt advance to field. Has one field.' => [
                "PID|ACME\r", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 8, 'eor' => 8, 'eof' => 8, 'eos' => 8]
            ],
            '05 Attempt advance to field. Has two fields. No end of segment.' => [
                "PID|ACME|BEEF", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 8, 'eor' => 8, 'eof' => 8, 'eos' => false]
            ],
            '06 Attempt advance to field. Has two fields.' => [
                "PID|ACME|BEEF\r", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 8, 'eor' => 8, 'eof' => 8, 'eos' => 13]
            ],
            '07 Attempt advance to field. Has one field with repetition. No end of segment.' => [
                "MSH|ACME~FOO", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 8, 'eor' => 8, 'eof' => false, 'eos' => false]
            ],
            '08 Attempt advance to field. Has one field with repetition.' => [
                "MSH|ACME~FOO\r", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 8, 'eor' => 8, 'eof' => 12, 'eos' => 12]
            ],
            '09 Attempt advance to field. Has two fields with repetition and components.' => [
                "MSH|ACME^MAGIC~FOO^MACHINE|A^C~D^C\r", true,
                ['ptr' => 4,
                    'sof' => 4, 'sor' => 4, 'soc' => 4,
                    'eoc' => 8, 'eor' => 14, 'eof' => 26, 'eos' => 34]
            ],
        ];
    }

    /**
     * @dataProvider advanceToRepetitionData
     * @covers \Hl7v2\Encoding\Codec::advanceToRepetition
     * @covers \Hl7v2\Encoding\Codec::locateNextRepetition
     * @covers \Hl7v2\Encoding\Codec::locateNextComponent
     */
    public function testAdvanceToRepetition($messageData, $retval, $state)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->withParams()
            ->build()
        ;

        $this->codec->advanceToField($data);

        $this->assertSame(
            $retval,
            $this->codec->advanceToRepetition($data),
            'The method advanceToRepetition returns boolean to indicate whether it was able to advance into a repetition.'
        );

        $this->assertSame(
            $state['ptr'],
            $data->getPositionalState()->ptr,
            'The method advanceToRepetition updates PositionalState with the ptr location.'
        );

        $this->assertSame(
            $state['sor'],
            $data->getPositionalState()->sor,
            'The method advanceToRepetition updates PositionalState with the sor location.'
        );

        $this->assertSame(
            $state['soc'],
            $data->getPositionalState()->soc,
            'The method advanceToRepetition updates PositionalState with the soc location.'
        );

        $this->assertSame(
            $state['eoc'],
            $data->getPositionalState()->eoc,
            'The method advanceToRepetition updates PositionalState with the eoc location.'
        );

        $this->assertSame(
            $state['eor'],
            $data->getPositionalState()->eor,
            'The method advanceToRepetition updates PositionalState with the eor location.'
        );
    }

    /*
     * Note, when looking at these, that the test first calls advanceToField (to
     * set-up eor, eof and eos), so that advanceToRepetition sees ptr as inside
     * the field.
     */
    public function advanceToRepetitionData()
    {
        return [
            '00 Attempt advance to repetition. No repetition. No end of segment.' => [
                "|ACME", false,
                ['ptr' => 1,
                    'sor' => false, 'soc' => false,
                    'eoc' => false, 'eor' => false,]
            ],
            '01 Attempt advance to repetition. No repetition.' => [
                "|ACME\r", false,
                ['ptr' => 1,
                    'sor' => false, 'soc' => false,
                    'eoc' => false, 'eor' => false,]
            ],
            '02 Attempt advance to repetition. No repetition (one exists in next field).' => [
                "|ACME|DEAD~1337", false,
                ['ptr' => 1,
                    'sor' => false, 'soc' => false,
                    'eoc' => false, 'eor' => false,]
            ],
            '03 Attempt advance to repetition. Has one repetition. No end of field.' => [
                "|ACME~DEAD", true,
                ['ptr' => 6,
                    'sor' => 6, 'soc' => 6,
                    'eoc' => false, 'eor' => false]
            ],
            '04 Attempt advance to repetition. Has one repetition.' => [
                "|ACME~DEAD|", true,
                ['ptr' => 6,
                    'sor' => 6, 'soc' => 6,
                    'eoc' => 10, 'eor' => 10,]
            ],
            '05 Attempt advance to repetition. Has two repetitions. No end of field.' => [
                "|ACME~DEAD~BEEF", true,
                ['ptr' => 6,
                    'sor' => 6, 'soc' => 6,
                    'eoc' => 10, 'eor' => 10,]
            ],
            '06 Attempt advance to repetition. Has two repetitions.' => [
                "|ACME~DEAD~BEEF|FOO", true,
                ['ptr' => 6,
                    'sor' => 6, 'soc' => 6,
                    'eoc' => 10, 'eor' => 10,]
            ],
            '07 Attempt advance to repetition. Has one repetition with components. No end of segment.' => [
                "|ACME^DEAD~BEEF^CAFE", true,
                ['ptr' => 11,
                    'sor' => 11, 'soc' => 11,
                    'eoc' => 15, 'eor' => false,]
            ],
            '08 Attempt advance to repetition. Has one repetition with components.' => [
                "|ACME^DEAD~BEEF^CAFE|FOO", true,
                ['ptr' => 11,
                    'sor' => 11, 'soc' => 11,
                    'eoc' => 15, 'eor' => 20,]
            ],
        ];
    }

    /**
     * @dataProvider advanceToComponentData
     * @covers \Hl7v2\Encoding\Codec::advanceToComponent
     * @covers \Hl7v2\Encoding\Codec::locateNextComponent
     */
    public function testAdvanceToComponent($messageData, $retval, $state)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->withParams()
            ->build()
        ;

        $this->codec->advanceToField($data);

        $this->assertSame(
            $retval,
            $this->codec->advanceToComponent($data),
            'The method advanceToComponent returns boolean to indicate whether it was able to advance into a component.'
        );

        $this->assertSame(
            $state['ptr'],
            $data->getPositionalState()->ptr,
            'The method advanceToComponent updates PositionalState with the ptr location.'
        );

        $this->assertSame(
            $state['soc'],
            $data->getPositionalState()->soc,
            'The method advanceToComponent updates PositionalState with the soc location.'
        );

        $this->assertSame(
            $state['eoc'],
            $data->getPositionalState()->eoc,
            'The method advanceToComponent updates PositionalState with the eoc location.'
        );
    }

    /*
     * Note, when looking at these, that the test first calls advanceToField (to
     * set-up eof and eos), so that advanceToComponent sees ptr as inside the
     * field.
     */
    public function advanceToComponentData()
    {
        return [
            '00 Attempt advance to next component, but no next component.' => [
                "|FOO", false,
                ['ptr' => 1, 'soc' => false, 'eoc' => false]
            ],
            '01 Attempt advance to next component, but no component (one exists in next repetition).' => [
                "|FOO~1234^5678", false,
                ['ptr' => 1, 'soc' => false, 'eoc' => false]
            ],
            '02 Attempt advance to next component, but no component (one exists in next field).' => [
                "|FOO|1234^5678", false,
                ['ptr' => 1, 'soc' => false, 'eoc' => false]
            ],
            '03 Attempt advance to next component, but no component (one exists in next segment).' => [
                "|FOO\rBAR|1234^5678", false,
                ['ptr' => 1, 'soc' => false, 'eoc' => false]
            ],
            '04 Attempt advance to next component, has next component, but no end of field/segment.' => [
                "|1234^5678", true,
                ['ptr' => 6, 'soc' => 6, 'eoc' => false]
            ],
            '05 Attempt advance to next component, has next component, but no next field.' => [
                "|1234^5678\r", true,
                ['ptr' => 6, 'soc' => 6, 'eoc' => 10]
            ],
            '06 Attempt advance to next component, has next component.' => [
                "|1234^5678~FOO", true,
                ['ptr' => 6, 'soc' => 6, 'eoc' => 10]
            ],
            '07 Attempt advance to next component, has next component.' => [
                "|1234^5678|FOO", true,
                ['ptr' => 6, 'soc' => 6, 'eoc' => 10]
            ],
            '08 Attempt advance to next component, has several components.' => [
                "|1234^5678^1337^DEAD|BEEF", true,
                ['ptr' => 6, 'soc' => 6, 'eoc' => 10]
            ],
        ];
    }

    /**
     * @dataProvider advanceToSubcomponentData
     * @covers \Hl7v2\Encoding\Codec::advanceToSubcomponent
     * @covers \Hl7v2\Encoding\Codec::locateNextSubcomponent
     */
    public function testAdvanceToSubcomponent($messageData, $retval, $state)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->withParams()
            ->build()
        ;

        $this->codec->advanceToField($data);

        $this->assertSame(
            $retval,
            $this->codec->advanceToSubcomponent($data),
            'The method advanceToSubcomponent returns boolean to indicate whether it was able to advance into a Subcomponent.'
        );

        $this->assertSame(
            $state['ptr'],
            $data->getPositionalState()->ptr,
            'The method advanceToSubcomponent updates PositionalState with the ptr location.'
        );

        $this->assertSame(
            $state['sosc'],
            $data->getPositionalState()->sosc,
            'The method advanceToSubcomponent updates PositionalState with the sosc location.'
        );

        $this->assertSame(
            $state['eosc'],
            $data->getPositionalState()->eosc,
            'The method advanceToSubcomponent updates PositionalState with the eosc location.'
        );
    }

    /*
     * Note, when looking at these, that the test first calls advanceToField (to
     * set-up eof and eos), so that advanceToSubcomponent sees ptr as inside the
     * field.
     */
    public function advanceToSubcomponentData()
    {
        return [
            '00 Attempt advance to next Subcomponent, but no next Subcomponent.' => [
                "|FOO", false,
                ['ptr' => 1, 'sosc' => false, 'eosc' => false]
            ],
            '01 Attempt advance to next Subcomponent, but no Subcomponent (one exists in next component).' => [
                "|FOO^1234&5678", false,
                ['ptr' => 1, 'sosc' => false, 'eosc' => false]
            ],
            '02 Attempt advance to next Subcomponent, but no Subcomponent (one exists in next repetition).' => [
                "|FOO~1234&5678", false,
                ['ptr' => 1, 'sosc' => false, 'eosc' => false]
            ],
            '03 Attempt advance to next Subcomponent, but no Subcomponent (one exists in next field).' => [
                "|FOO|1234&5678", false,
                ['ptr' => 1, 'sosc' => false, 'eosc' => false]
            ],
            '04 Attempt advance to next Subcomponent, but no Subcomponent (one exists in next segment).' => [
                "|FOO\rBAR|1234&5678", false,
                ['ptr' => 1, 'sosc' => false, 'eosc' => false]
            ],
            '05 Attempt advance to next Subcomponent, has next Subcomponent, but no end of component/field/segment.' => [
                "|1234&5678", true,
                ['ptr' => 6, 'sosc' => 6, 'eosc' => false]
            ],
            '06 Attempt advance to next Subcomponent, has next Subcomponent, but no end of field/segment.' => [
                "|1234&5678^", true,
                ['ptr' => 6, 'sosc' => 6, 'eosc' => 10]
            ],
            '07 Attempt advance to next Subcomponent, has next Subcomponent, but no next field.' => [
                "|1234&5678\r", true,
                ['ptr' => 6, 'sosc' => 6, 'eosc' => 10]
            ],
            '08 Attempt advance to next Subcomponent, has next Subcomponent.' => [
                "|1234&5678^FOO", true,
                ['ptr' => 6, 'sosc' => 6, 'eosc' => 10]
            ],
            '09 Attempt advance to next Subcomponent, has next Subcomponent.' => [
                "|1234&5678|FOO", true,
                ['ptr' => 6, 'sosc' => 6, 'eosc' => 10]
            ],
            '10 Attempt advance to next Subcomponent, has several Subcomponents.' => [
                "|1234&5678&1337^DEAD|BEEF", true,
                ['ptr' => 6, 'sosc' => 6, 'eosc' => 10]
            ],
        ];
    }

    /**
     * @dataProvider extractSegmentIdData
     * @covers \Hl7v2\Encoding\Codec::extractSegmentId
     */
    public function testExtractSegmentId($messageData, $retval)
    {
        $data = $this
            ->datagramBuilder
            ->withMessage($messageData)
            ->withParams()
            ->build()
        ;

        $this->assertSame(
            $retval,
            $this->codec->extractSegmentId($data),
            'The method extractSegmentId returns boolean false or the extracted string Segment ID.'
        );
    }

    public function extractSegmentIdData()
    {
        return [
            '00 Empty.' => ["", false],
            '01 Not Uppercase.' => ["msh", false],
            '02 Mixed Case.' => ["MSh", false],
            '03 Not A-Z.' => ["MS.", false],
            '04 Still not A-Z.' => ["M5H", false],
            '05 MSH.' => ["MSH", 'MSH'],
            '06 Not only MSH.' => ["PID", 'PID'],
            '07 Does not check the Segment ID is defined.' => ["XYZ", 'XYZ'],
        ];
    }
}
