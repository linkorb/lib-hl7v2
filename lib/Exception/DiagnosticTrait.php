<?php

namespace Hl7v2\Exception;

/**
 * A trait for use in Exception classes that need to implement DiagnosticInterface.
 */
trait DiagnosticTrait
{
    public function setDiagnosticInfo($diagnosticInfo)
    {
        $this->diagnosticInfo = $diagnosticInfo;
    }

    public function getDiagnosticInfo()
    {
        return $this->diagnosticInfo;
    }

    public function setSeverity($severity)
    {
        $this->severity = $severity;
    }

    public function getSeverity()
    {
        return $this->severity;
    }

    public function setUserMessage($userMessage)
    {
        $this->userMessage = $userMessage;
    }

    public function getUserMessage()
    {
        return $this->userMessage;
    }
}
