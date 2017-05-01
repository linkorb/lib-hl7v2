<?php

namespace Hl7v2\Encoding;

use Hl7v2\Exception\CodecError;

/**
 * HL7 Codec for version 2.5.1.
 *
 * Note: Encoding is not yet implemented.
 */
class Codec
{
    const DEFAULT_CHARACTER_ENCODING = '7bit';

    const SEP_SEGMENT = "\r";
    const SEQ_NULL = '""';

    const MSH_1_OFFSET = 3;
    const MSH_1_LEN = 1;
    const MSH_2_OFFSET = 4;
    const MSH_2_LEN = 4;

    /**
     * The number of field separators to skip, during bootstrapping, until
     * MSH.18 (character encoding) is reached.
     *
     * MSH.1 is the field separator itself, thus the value 17.
     *
     * @var integer
     */
    const SEP_BEFORE_MSH_18 = 17;

    /**
     * @var \Hl7v2\Encoding\CharacterEncodingNames
     */
    private $charEncNames;

    /**
     * @param \Hl7v2\Encoding\CharacterEncodingNames $charEncNames
     */
    public function __construct(CharacterEncodingNames $charEncNames)
    {
        $this->charEncNames = $charEncNames;
    }

    /**
     * Determine whether the supplied value is either NULL or an empty string.
     *
     * @see Codec::isNullValue
     *
     * @param mixed $value
     * @return boolean
     */
    public function isEmptyValue($value)
    {
        return ($this->isNullValue($value) || $value === '');
    }

    /**
     * Determine whether the supplied value is the NULL sequence of characters.
     *
     * @param mixed $value
     * @return boolean
     */
    public function isNullValue($value)
    {
        return $value === self::SEQ_NULL;
    }

    /**
     * Advance the supplied Datagram to the first character of the next Segment.
     *
     * The PositionalState property of the Datagram is updated to reflect the
     * new position and the start and end of the Segment, as string positions.
     *
     * Returns boolean false if it was not possible to advance to a Segment.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     *
     * @return boolean
     */
    public function advanceToSegment(Datagram $data)
    {
        $pos = $data->getPositionalState();

        $lkgPtr = $pos->ptr;
        $lkgState = $pos->state;

        $pos->resetSegmentBounds();
        $pos->resetFieldBounds();
        $pos->resetRepetitionBounds();
        $pos->resetComponentBounds();
        list($sos, $eos) = $this->locateNextSegment($data);
        if (false === $sos) {
            // no segment to which to advance
            return false;
        }

        $pos->ptr = $pos->sos = $sos;
        $pos->eos = $eos;
        $pos->state = PositionalState::BEGIN_SEGMENT;

        while (false !== $eos && $sos == $eos) {
            // skip empty segments
            list($sos, $eos) = $this->locateNextSegment($data);
            if (false === $sos) {
                return false;
            }
            $pos->ptr = $pos->sos = $sos;
            $pos->eos = $eos;
            $pos->state = PositionalState::BEGIN_SEGMENT;
        }

        return true;
    }

    /**
     * Advance the supplied Datagram to the first character of the next Field.
     *
     * The "increments" parameter may be used to advance to the Nth next Field
     * instead of the first.
     *
     * The PositionalState property of the Datagram is updated to reflect the
     * new position and the start and end of the Field, of the Repetition and
     * of the Component, as string positions.
     *
     * Returns boolean false if it was not possible to advance to the requested
     * Field.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param number $increments
     *
     * @return boolean
     */
    public function advanceToField(Datagram $data, $increments = 1)
    {
        $pos = $data->getPositionalState();

        $lkgPtr = $pos->ptr;
        $lkgState = $pos->state;

        if (false === $pos->eos) {
            $pos->eos = $this->locateEndOfSegment($data);
        }

        $pos->resetFieldBounds();
        $pos->resetRepetitionBounds();
        $pos->resetComponentBounds();
        $pos->resetSubcomponentBounds();
        list($sof, $eof) = $this->locateNextField($data);
        if (false === $sof) {
            // no field to which to advance
            return false;
        }

        $pos->ptr = $pos->sosc = $pos->soc = $pos->sor = $pos->sof = $sof;
        $pos->eof = (false !== $eof ? $eof : $pos->eos);
        $pos->state = PositionalState::BEGIN_FIELD;

        for ($i = 1; $i < $increments; $i++) {
            $pos->resetFieldBounds();
            $pos->resetRepetitionBounds();
            $pos->resetComponentBounds();
            $pos->resetSubcomponentBounds();
            list($sof, $eof) = $this->locateNextField($data);
            if (false === $sof) {
                $pos->ptr = $lkgPtr;
                $pos->state = $lkgState;
                return false;
            }
            $pos->ptr = $pos->sosc = $pos->soc = $pos->sor = $pos->sof = $sof;
            $pos->eof = (false !== $eof ? $eof : $pos->eos);
            $pos->state = PositionalState::BEGIN_FIELD;
        }

        list($nextSep,) = $this->locateNextRepetition($data);
        if (false !== $nextSep) {
            $pos->eor = $nextSep - 1;
        } else {
            $pos->eor = $pos->eof;
        }

        list($nextSep,) = $this->locateNextComponent($data);
        if (false !== $nextSep) {
            $pos->eoc = $nextSep - 1;
        } else {
            $pos->eoc = $pos->eor;
        }

        list($nextSep,) = $this->locateNextSubcomponent($data);
        if (false !== $nextSep) {
            $pos->eosc = $nextSep - 1;
        } else {
            $pos->eosc = $pos->eoc;
        }

        return true;
    }

    /**
     * Advance the supplied Datagram to the first character of the next Repetition.
     *
     * The "increments" parameter may be used to advance to the Nth next
     * Repetition instead of the first.
     *
     * The PositionalState property of the Datagram is updated to reflect the
     * new position and the start and end of the Repetition and of the Component,
     * as string positions.
     *
     * Returns boolean false if it was not possible to advance to the requested
     * Repetition.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param number $increments
     *
     * @return boolean
     */
    public function advanceToRepetition(Datagram $data, $increments = 1)
    {
        $pos = $data->getPositionalState();

        $lkgPtr = $pos->ptr;
        $lkgState = $pos->state;

        $pos->resetRepetitionBounds();
        $pos->resetComponentBounds();

        list($sor, $eor) = $this->locateNextRepetition($data);
        if (false === $sor) {
            // no repetition to which to advance
            return false;
        }

        $pos->ptr = $pos->soc = $pos->sor = $sor;
        if (false === $eor && false === $pos->eof) {
            $pos->eor = $pos->eos; // whether or not it is false
        } elseif (false === $eor && false !== $pos->eof) {
            $pos->eor = $pos->eof;
        } else {
            $pos->eor = $eor;
        }
        $pos->state = PositionalState::BEGIN_REPETITION;

        for ($i = 1; $i < $increments; $i++) {
            $pos->resetRepetitionBounds();
            $pos->resetComponentBounds();
            list($sor, $eor) = $this->locateNextRepetition($data);
            if (false === $sor) {
                $pos->ptr = $lkgPtr;
                $pos->state = $lkgState;
                return false;
            }
            $pos->ptr = $pos->soc = $pos->sor = $sor;
            if (false === $eor && false === $pos->eof) {
                $pos->eor = $pos->eos; // whether or not it is false
            } elseif (false === $eor && false !== $pos->eof) {
                $pos->eor = $pos->eof;
            } else {
                $pos->eor = $eor;
            }
            $pos->state = PositionalState::BEGIN_REPETITION;
        }

        list($nextSep,) = $this->locateNextComponent($data);
        if (false !== $nextSep) {
            $pos->eoc = $nextSep - 1;
        } else {
            $pos->eoc = $pos->eor;
        }

        return true;
    }

    /**
     * Advance the supplied Datagram to the first character of the next Component.
     *
     * The "increments" parameter may be used to advance to the Nth next
     * Component instead of the first.
     *
     * The PositionalState property of the Datagram is updated to reflect the
     * new position and the start and end of the Component, as string positions.
     *
     * Returns boolean false if it was not possible to advance to the requested
     * Component.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @param number $increments
     *
     * @return boolean
     */
    public function advanceToComponent(Datagram $data, $increments = 1)
    {
        $pos = $data->getPositionalState();

        $lkgPtr = $pos->ptr;
        $lkgState = $pos->state;

        $pos->resetComponentBounds();

        list($soc, $eoc) = $this->locateNextComponent($data);
        if (false === $soc) {
            // no component to which to advance
            return false;
        }

        $pos->ptr = $pos->soc = $soc;
        if (false === $eoc && false === $pos->eor && false === $pos->eof) {
            $pos->eoc = $pos->eos; // whether or not it is false
        } elseif (false === $eoc && false === $pos->eor && false !== $pos->eof) {
            $pos->eoc = $pos->eof;
        } elseif (false === $eoc && false !== $pos->eor) {
            $pos->eoc = $pos->eor;
        } else {
            $pos->eoc = $eoc;
        }
        $pos->state = PositionalState::BEGIN_COMPONENT;

        for ($i = 1; $i < $increments; $i++) {
            $pos->resetComponentBounds();
            list($soc, $eoc) = $this->locateNextComponent($data);
            if (false === $soc) {
                $pos->ptr = $lkgPtr;
                $pos->state = $lkgState;
                return false;
            }
            $pos->ptr = $pos->soc = $soc;
            if (false === $eoc && false === $pos->eor && false === $pos->eof) {
                $pos->eoc = $pos->eos;
            } elseif (false === $eoc && false === $pos->eor && false !== $pos->eof) {
                $pos->eoc = $pos->eof;
            } elseif (false === $eoc && false !== $pos->eor) {
                $pos->eoc = $pos->eor;
            } else {
                $pos->eoc = $eoc;
            }
            $pos->state = PositionalState::BEGIN_COMPONENT;
        }

        return true;
    }

    /**
     * Advance the supplied Datagram to the first character of the next
     * Subcomponent.
     *
     * The PositionalState property of the Datagram is updated to reflect the
     * new position and the start and end of the Subcomponent, as string
     * positions.
     *
     * Returns boolean false if it was not possible to advance to the requested
     * Subcomponent.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     *
     * @return boolean
     */
    public function advanceToSubcomponent(Datagram $data)
    {
        $pos = $data->getPositionalState();

        $lkgPtr = $pos->ptr;
        $lkgState = $pos->state;

        $pos->resetSubcomponentBounds();

        list($sosc, $eosc) = $this->locateNextSubcomponent($data);
        if (false === $sosc) {
            // no subcomponent to which to advance
            return false;
        }

        $pos->ptr = $pos->sosc = $sosc;
        if (false === $eosc && false === $pos->eoc && false === $pos->eor && false === $pos->eof) {
            $pos->eosc = $pos->eos; // whether or not it is false
        } elseif (false === $eosc && false === $pos->eoc && false === $pos->eor && false !== $pos->eof) {
            $pos->eosc = $pos->eof;
        } elseif (false === $eosc && false === $pos->eoc && false !== $pos->eor) {
            $pos->eosc = $pos->eor;
        } elseif (false === $eosc && false !== $pos->eoc) {
            $pos->eosc = $pos->eoc;
        } else {
            $pos->eosc = $eosc;
        }
        $pos->state = PositionalState::BEGIN_SUBCOMPONENT;

        return true;
    }

    /**
     * Extract the Segment ID from the beginning of a Segment.
     *
     * @param Datagram $data
     * @return string|bool False if the Segment ID can not be extracted.
     */
    public function extractSegmentId(Datagram $data)
    {
        $candidate = mb_substr(
            $data->value,
            $data->getPositionalState()->ptr,
            3,
            $data->getEncodingParameters()->getCharacterEncoding()
        );
        return preg_match('/^[A-Y]{2,2}[A-Z0-9]$|^Z[A-Z0-9]{2,2}$/', $candidate)
            ? $candidate
            : false
        ;
    }

    /**
     * Extract the content of a Component (or single-component Field).
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @return string
     * @throws CodecError
     */
    public function extractComponent(Datagram $data)
    {
        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        if ($pos->state !== PositionalState::BEGIN_FIELD
            && $pos->state !== PositionalState::BEGIN_REPETITION
            && $pos->state !== PositionalState::BEGIN_COMPONENT
        ) {
            throw new CodecError(
                'Cannot extract component when not at the beginning of a field, repetition or component. Did you forget to call "advanceTo{Field,Repetition,Component}"?'
            );
        }

        if ($pos->state === PositionalState::BEGIN_FIELD) {
            $pos->resetComponentBounds();
            $pos->soc = $pos->sof;
        } elseif ($pos->state === PositionalState::BEGIN_REPETITION) {
            $pos->resetComponentBounds();
            $pos->soc = $pos->sor;
        }

        $eoc = $pos->eoc;

        if (false === $eoc) {
            list($nextComponent,) = $this->locateNextComponent($data);
            if (false !== $nextComponent) {
                $eoc = $nextComponent - 1;
            }
        }

        if (false === $eoc && false === $pos->eor && false === $pos->eof && false !== $pos->eos) {
            $pos->eoc = $pos->eos;
        } elseif (false === $eoc && false === $pos->eor && false !== $pos->eof) {
            $pos->eoc = $pos->eof;
        } elseif (false === $eoc && false !== $pos->eor) {
            $pos->eoc = $pos->eor;
        } elseif (false !== $eoc) {
            $pos->eoc = $eoc;
        }

        $length = null;
        if (false !== $pos->eoc) {
            $length = $pos->eoc - $pos->soc;
        }

        return mb_substr($data->value, $pos->soc, $length, $param->getCharacterEncoding());
    }

    /**
     * Extract the content of a Subomponent.
     *
     * @param \Hl7v2\Encoding\Datagram $data
     * @return string
     * @throws CodecError
     */
    public function extractSubcomponent(Datagram $data)
    {
        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        if ($pos->state !== PositionalState::BEGIN_FIELD
            && $pos->state !== PositionalState::BEGIN_REPETITION
            && $pos->state !== PositionalState::BEGIN_COMPONENT
            && $pos->state !== PositionalState::BEGIN_SUBCOMPONENT
        ) {
            throw new CodecError(
                'Cannot extract component when not at the beginning of segment subdivision. Did you forget to call "advanceTo{Field,Repetition,Component,Subcomponent}"?'
            );
        }

        if ($pos->state === PositionalState::BEGIN_FIELD) {
            $pos->resetSubcomponentBounds();
            $pos->sosc = $pos->sof;
        } elseif ($pos->state === PositionalState::BEGIN_REPETITION) {
            $pos->resetSubcomponentBounds();
            $pos->sosc = $pos->sor;
        } elseif ($pos->state === PositionalState::BEGIN_COMPONENT) {
            $pos->resetSubcomponentBounds();
            $pos->sosc = $pos->soc;
        }

        $eosc = $pos->eosc;

        if (false === $eosc) {
            list($nextComponent,) = $this->locateNextSubcomponent($data);
            if (false !== $nextComponent) {
                $eosc = $nextComponent - 1;
            }
        }

        if (false === $eosc && false === $pos->eoc && false === $pos->eor && false === $pos->eof && false !== $pos->eos) {
            $pos->eosc = $pos->eos;
        } elseif (false === $eosc && false === $pos->eoc && false === $pos->eor && false !== $pos->eof) {
            $pos->eosc = $pos->eof;
        } elseif (false === $eosc && false === $pos->eoc && false !== $pos->eor) {
            $pos->eosc = $pos->eor;
        } elseif (false === $eosc && false !== $pos->eoc) {
            $pos->eosc = $pos->eoc;
        } elseif (false !== $eosc) {
            $pos->eosc = $eosc;
        }

        $length = null;
        if (false !== $pos->eosc) {
            $length = $pos->eosc - $pos->sosc;
        }

        return mb_substr($data->value, $pos->sosc, $length, $param->getCharacterEncoding());
    }

    /**
     * Determine some encoding parameters of the supplied Datagram.
     *
     * The supplied Datagram is furnished with an instance of EncodingParameters.
     *
     * Several assumptions are made about the data to avoid potential
     * chicken-and-egg madness around the determination of character encoding,
     * because PHP strings are byte arrays:-
     *
     * 1. Datagram position is at the beginning of an MSH segment.
     * 2. Field separator character is of the printable 7-bit ASCII set.
     * 3. Character encoding is 8-bit clean.
     * 4. MSH.18 is a single character encoding name (not a list).
     *
     * @param \Hl7v2\Encoding\Datagram $data
     */
    public function bootstrap(
        Datagram $data,
        EncodingParametersBuilder $paramBuilder
    ) {
        if (self::MSH_1_OFFSET + self::MSH_1_LEN > strlen($data->value)) {
            throw new CodecError('Message Header is invalid.');
        }

        $pos = $data->getPositionalState();

        $fieldSep = substr($data->value, $pos->ptr + self::MSH_1_OFFSET, self::MSH_1_LEN);

        // attempt to extract character encoding from MSH.18
        $characterEncoding = null;
        // do not examine data beyond end-of-segment
        $eos = strpos($data->value, self::SEP_SEGMENT, $pos->ptr);
        $hasCharEncField = true;
        $posNextField = $pos->ptr;
        for ($i = 0; $i < self::SEP_BEFORE_MSH_18; $i++) {
            $posNextField = strpos($data->value, $fieldSep, $posNextField + 1);
            if ($posNextField === false || ($eos && $posNextField > $eos)) {
                // MSH.18 is absent; assume default encoding.
                $hasCharEncField = false;
                $characterEncoding = self::DEFAULT_CHARACTER_ENCODING;
                break;
            }
        }
        if ($hasCharEncField) {
            $start = $posNextField + 1;
            $length = null;
            $candidate = '';
            $posNextField = strpos($data->value, $fieldSep, $start);
            if ($eos && ($posNextField === false || $posNextField > $eos)) {
                // MSH.18 is at the end of segment
                $length = $eos - $start;
            } elseif ($posNextField) {
                // MSH.18 is not at the end of segment
                $length = $posNextField - $start;
            }
            if ($length === null) {
                $candidate = substr($data->value, $start);
            } else {
                $candidate = substr($data->value, $start, $length);
            }
            if ($this->isEmptyValue($candidate)) {
                $characterEncoding = self::DEFAULT_CHARACTER_ENCODING;
            } else {
                try {
                    $characterEncoding = $this
                        ->charEncNames
                        ->translateToNativeName($candidate)
                    ;
                } catch (CodecError $e) {
                    throw new CodecError('MSH.18 Character Encoding is invalid.', null, $e);
                }
            }
        }

        // it is now possible to do a soupçon of sanity checking
        $fieldSep2pos = self::MSH_2_OFFSET + self::MSH_2_LEN;
        if ($fieldSep2pos + 1 > mb_strlen($data->value, $characterEncoding)
            || $fieldSep !== mb_substr($data->value, $fieldSep2pos, 1, $characterEncoding)
        ) {
            throw new CodecError('Message Header is invalid.');
        }

        // note that MSH still might be invalid, but it appears good enough to
        // obtain the encoding characters
        $ptr = $pos->ptr + self::MSH_2_OFFSET;
        $param = $paramBuilder
            ->withComponentSep(mb_substr($data->value, $ptr, 1, $characterEncoding))
            ->withRepetitionSep(mb_substr($data->value, ++$ptr, 1, $characterEncoding))
            ->withEscapeChar(mb_substr($data->value, ++$ptr, 1, $characterEncoding))
            ->withSubcomponentSep(mb_substr($data->value, ++$ptr, 1, $characterEncoding))
            ->withFieldSep($fieldSep)
            ->withSegmentSep(self::SEP_SEGMENT)
            ->withCharacterEncoding($characterEncoding)
            ->build()
        ;

        // set the last position and inject the encoding params into the data
        $pos->eod = mb_strlen($data->value, $characterEncoding) - 1;
        $data->setEncodingParameters($param);
    }

    /*
     * Locate the first character and the end of a Segment, relative to the
     * current position in Datagram.PositionalState.ptr.
     */
    private function locateNextSegment(Datagram $data)
    {
        $sos = $eos = false;

        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        $nextSep = mb_strpos(
            $data->value,
            $param->getSegmentSep(),
            $pos->ptr,
            $param->getCharacterEncoding()
        );

        if (false === $nextSep) {
            // not found
            return [false, false];
        }

        $sos = $nextSep + 1;

        if ($pos->eod === $sos) {
            // next segment is empty and at end of data
            return [$sos, false];
        }

        $eos = mb_strpos(
            $data->value,
            $param->getSegmentSep(),
            $sos,
            $param->getCharacterEncoding()
        );

        return [$sos, $eos];
    }

    /*
     * Return the position of the next Segment separator.
     */
    private function locateEndOfSegment(Datagram $data)
    {
        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        $eos = mb_strpos(
            $data->value,
            $param->getSegmentSep(),
            $pos->ptr,
            $param->getCharacterEncoding()
        );
        return $eos;
    }

    /*
     * Locate the first character and the end of a Field, relative to the
     * current position in Datagram.PositionalState.ptr.
     */
    private function locateNextField(Datagram $data)
    {
        $sof = $eof = false;

        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        $nextSep = mb_strpos(
            $data->value,
            $param->getFieldSep(),
            $pos->ptr,
            $param->getCharacterEncoding()
        );

        if (false === $nextSep || false !== $pos->eos && $pos->eos < $nextSep) {
            // not found, or found beyond eos
            return [false, false];
        }

        $sof = $nextSep + 1;

        if ($pos->eod === $sof) {
            // next field is empty and at end of data
            return [$sof, false];
        }

        $eof = mb_strpos(
            $data->value,
            $param->getFieldSep(),
            $sof,
            $param->getCharacterEncoding()
        );

        if (false === $eof || false !== $pos->eos && $pos->eos < $eof) {
            // not found, or found beyond eos
            return [$sof, false];
        }

        return [$sof, $eof];
    }

    /*
     * Locate the first character and the end of a Repetition, relative to the
     * current position in Datagram.PositionalState.ptr.
     */
    private function locateNextRepetition(Datagram $data)
    {
        $sor = $eor = false;

        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        $nextSep = mb_strpos(
            $data->value,
            $param->getRepetitionSep(),
            $pos->ptr,
            $param->getCharacterEncoding()
        );

        if (false === $nextSep
            || false !== $pos->eof && $pos->eof < $nextSep
            || false !== $pos->eos && $pos->eos < $nextSep
        ) {
            // not found, or found beyond eof/eos
            return [false, false];
        }

        $sor = $nextSep + 1;

        if ($pos->eod === $sor) {
            // next repetition is empty and at end of data
            return [$sor, false];
        }

        $eor = mb_strpos(
            $data->value,
            $param->getRepetitionSep(),
            $sor,
            $param->getCharacterEncoding()
        );

        if (false === $nextSep
            || false !== $pos->eof && $pos->eof < $nextSep
            || false !== $pos->eos && $pos->eos < $nextSep
        ) {
            // not found, or found beyond eof/eos
            return [$sor, false];
        }

        return [$sor, $eor];
    }

    /*
     * Locate the first character and the end of a Component, relative to the
     * current position in Datagram.PositionalState.ptr.
     */
    private function locateNextComponent(Datagram $data)
    {
        $soc = $eoc = false;

        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        $nextSep = mb_strpos(
            $data->value,
            $param->getComponentSep(),
            $pos->ptr,
            $param->getCharacterEncoding()
        );

        if (false === $nextSep
            || (false !== $pos->eor && $pos->eor < $nextSep)
            || (false !== $pos->eof && $pos->eof < $nextSep)
            || (false !== $pos->eos && $pos->eos < $nextSep)
        ) {
            // component not found, or found beyond eof/eos
            return [false, false];
        }

        $soc = $nextSep + 1;

        if ($pos->eod === $soc) {
            // next component is empty and at end of data
            return [$soc, false];
        }

        $eoc = mb_strpos(
            $data->value,
            $param->getComponentSep(),
            $soc,
            $param->getCharacterEncoding()
        );

        if (false === $eoc
            || (false !== $pos->eor && $pos->eor < $eoc)
            || (false !== $pos->eof && $pos->eof < $eoc)
            || (false !== $pos->eos && $pos->eos < $eoc)
        ) {
            // eoc not found, or found beyond eof/eos
            return [$soc, false];
        }

        return [$soc, $eoc];
    }

    /*
     * Locate the first character and the end of a Subcomponent, relative to the
     * current position in Datagram.PositionalState.ptr.
     */
    private function locateNextSubcomponent(Datagram $data)
    {
        $sosc = $esoc = false;

        $pos = $data->getPositionalState();
        $param = $data->getEncodingParameters();

        $nextSep = mb_strpos(
            $data->value,
            $param->getSubcomponentSep(),
            $pos->ptr,
            $param->getCharacterEncoding()
        );

        if (false === $nextSep
            || (false !== $pos->eoc && $pos->eoc < $nextSep)
            || (false !== $pos->eor && $pos->eor < $nextSep)
            || (false !== $pos->eof && $pos->eof < $nextSep)
            || (false !== $pos->eos && $pos->eos < $nextSep)
        ) {
            // subcomponent not found, or found beyond eoc/r/f/s
            return [false, false];
        }

        $sosc = $nextSep + 1;

        if ($pos->eod === $sosc) {
            // next component is empty and at end of data
            return [$sosc, false];
        }

        $eosc = mb_strpos(
            $data->value,
            $param->getSubcomponentSep(),
            $sosc,
            $param->getCharacterEncoding()
        );

        if (false === $eosc
            || (false !== $pos->eoc && $pos->eoc < $eosc)
            || (false !== $pos->eor && $pos->eor < $eosc)
            || (false !== $pos->eof && $pos->eof < $eosc)
            || (false !== $pos->eos && $pos->eos < $eosc)
        ) {
            // eoc not found, or found beyond eof/eos
            return [$sosc, false];
        }

        return [$sosc, $eosc];
    }
}
