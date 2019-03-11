<?php
/**
 * Description of Massage
 *
 * @author ssv
 */
class Message
{
    protected $message;
    
    public function __construct($msg)
    {
        $this->message = $msg;
    }
    
    public function showMsg()
    {
        return $this->message;
    }
}
