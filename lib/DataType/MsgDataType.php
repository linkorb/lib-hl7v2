<?php

namespace Hl7v2\DataType;

/**
 * Message Type (MSG).
 */
class MsgDataType extends ComponentDataType
{
    const MAX_LEN = 15;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $messageCode;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $triggerEvent;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    private $messageStructure;

    /**
     * @param string $messageCode
     */
    public function setMessageCode($messageCode)
    {
        $this->messageCode = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->messageCode->setValue($messageCode);
    }

    /**
     * @param string $triggerEvent
     */
    public function setTriggerEvent($triggerEvent)
    {
        $this->triggerEvent = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->triggerEvent->setValue($triggerEvent);
    }

    /**
     * @param string $messageStructure
     */
    public function setMessageStructure($messageStructure)
    {
        $this->messageStructure = $this
            ->dataTypeFactory
            ->create('ID', $this->encodingParameters)
        ;
        $this->messageStructure->setValue($messageStructure);
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getMessageCode()
    {
        return $this->messageCode;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getTriggerEvent()
    {
        return $this->triggerEvent;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getMessageStructure()
    {
        return $this->messageStructure;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $s = '';

        $sep = $this->isSubcomponent
            ? $this->encodingParameters->getSubcomponentSep()
            : $this->encodingParameters->getComponentSep()
        ;

        if ($this->getMessageCode() && $this->getMessageCode()->hasValue()) {
            $s .= (string) $this->getMessageCode()->getValue();
        }

        $emptyComponentsSinceLastComponent = 0;

        if (!$this->getTriggerEvent() || !$this->getTriggerEvent()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getTriggerEvent()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        if (!$this->getMessageStructure() || !$this->getMessageStructure()->hasValue()) {
            ++$emptyComponentsSinceLastComponent;
        } else {
            $s .= str_repeat($sep, 1 + $emptyComponentsSinceLastComponent)
                . (string) $this->getMessageStructure()->getValue();
            ;
            $emptyComponentsSinceLastComponent = 0;
        }

        return $s;
    }
}
