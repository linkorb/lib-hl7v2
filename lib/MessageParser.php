<?php

namespace Hl7v2;

use Hl7v2\Message;
use Hl7v2\Segment\GenericSegment;
use RuntimeException;

class MessageParser
{
    // Control characters and other HL7 properties
    private $segmentSeparator = "\015";
    private $fieldSeparator = "|";
    private $componentSeperator = "^";
    private $subcomponentSeperator = "&";
    private $repetitionSeparator = "~";
    private $escapeChar = "\\";
    private $hl7Version = "2.2";
    
    public function parse($msgStr)
    {
        $message = new Message();
        
        $segments = preg_split("/[\n\\" . $this->segmentSeparator . "]/", $msgStr, -1, PREG_SPLIT_NO_EMPTY);
        
        // The first segment should be the control segment
        preg_match("/^([A-Z0-9]{3})(.)(.)(.)(.)(.)(.)/", $segments[0], $matches);
        $hdr = $matches[1];
        $fldSep = $matches[2];
        $compSep = $matches[3];
        $repSep = $matches[4];
        $esc = $matches[5];
        $subCompSep = $matches[6];
        $fldSepCtrl = $matches[7];
        
        // Check whether field separator is repeated after 4 control characters
        //
        if ($fldSep != $fldSepCtrl) {
            throw new RuntimeException("Not a valid message: field separator invalid");
        }
        // Set field separator based on control segment
        $this->fieldSeparator        = $fldSep;
        // Set other separators
        $this->componentSeparator    = $compSep;
        $this->subcomponentSeparator = $subCompSep;
        $this->escapeChar            = $esc;
        $this->repetitionSeparator   = $repSep;
        
        // Do all segments
        for ($i = 0; $i < count($segments); $i++) {
            $fields = preg_split("/\\" . $this->fieldSeparator . "/", $segments[$i]);
            $name = array_shift($fields);
            // Now decompose fields if necessary, into arrays
            for ($j = 0; $j < count($fields); $j++) {
                // Skip control field
                if ($i == 0 && $j == 0) {
                    continue;
                }
                $comps = preg_split("/\\" . $this->componentSeparator ."/", $fields[$j], -1, PREG_SPLIT_NO_EMPTY);
                for ($k = 0; $k < count($comps); $k++) {
                    $subComps = preg_split("/\\" . $this->subcomponentSeparator . "/", $comps[$k]);
                    // Make it a ref or just the value
                    (count($subComps) == 1) ? ($comps[$k] = $subComps[0]) : ($comps[$k] = $subComps);
                }
                (count($comps) == 1) ? ($fields[$j] = $comps[0]) : ($fields[$j] = $comps);
            }
            $seg = null;
            
            /*
            $segClass = "HL7v2\\Segments\\$name";
            // Let's see whether it's the a special segment
            if (class_exists('HL7v2\\Segments\\' . $name)) {
                array_unshift($fields, $this->fieldSeparator);
                $seg = new $segClass($fields);
            } else {
            }
            */
            $segment = new GenericSegment($name, $fields);
            $message->addSegment($segment);
        }
        
        
        return $message;
    }
}
