<?php

namespace Hl7v2\Exception;

class ParseError extends MessageError implements DiagnosticInterface
{
    use DiagnosticTrait;

    protected $diagnosticInfo;
    protected $severity;
    protected $userMessage;

    public function __construct(
        $message = '',
        $code = DiagnosticInterface::EAPPINTERNAL,
        $previous = null,
        $severity = DiagnosticInterface::ERROR,
        $userMessage = '',
        $diagnosticInfo = ''
    ) {
        $this->diagnosticInfo = $diagnosticInfo;
        $this->severity = $severity;
        $this->userMessage = $userMessage;
        parent::__construct($message, $code, $previous);
    }
}
