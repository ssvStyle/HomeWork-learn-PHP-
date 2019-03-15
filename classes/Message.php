<?php
/**
 * Description of Massage
 *
 * @author ssv
 */
class Message
{
    protected $message = [];
    
    public function __construct($msg)
    {
        $this->message = $msg;
    }
    
    public function getMsg()
    {
        return $this->message['message'];
    }
    
    public function getName()
    {
        return $this->message['name'];
    }
    
    public function getDate()
    {
        return $this->message['DateTime'];
    }
    
    public function getNameAndMsg()
    {
        return ['name' => $this->getName(), 'message' => $this->getMsg()];
    }
}
