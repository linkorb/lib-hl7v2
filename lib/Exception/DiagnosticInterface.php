<?php

namespace Hl7v2\Exception;

interface DiagnosticInterface
{
    const ESEGMENT = 100;
    const EFIELD = 101;
    const ETYPE = 102;
    const ETABLE = 103;
    const EUNSUPMSGTYPE = 200;
    const EUNSUPEVTCODE = 201;
    const EUNSUPPRCSSID = 202;
    const EUNSUPVERSNID = 203;
    const EKEYIDUNKNOWN = 204;
    const EKEYIDDUPE = 205;
    const EAPPRECORDLOCK = 206;
    const EAPPINTERNAL = 207;

    const ERROR = 'E';
    const INFO = 'I';
    const WARNING = 'W';

    /**
     * @param string $diagnosticInfo
     */
    public function setDiagnosticInfo($diagnosticInfo);

    /**
     * @return string
     */
    public function getDiagnosticInfo();

    /**
     * @param string $severity
     */
    public function setSeverity($severity);

    /**
     * @return string
     */
    public function getSeverity();

    /**
     * @param string $userMessage
     */
    public function setUserMessage($userMessage);

    /**
     * @return string
     */
    public function getUserMessage();
}
