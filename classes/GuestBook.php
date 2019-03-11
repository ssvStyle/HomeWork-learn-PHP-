<?php

include_once 'Message.php';
/**
 * Description of GuestBook
 *
 * @author ssv
 */
class GuestBook
{
    protected $allMessage = [];
    protected $pathToFile = './db/guestbook.db';


    public function __construct()
    {
        $allMessage = file($this->pathToFile, FILE_IGNORE_NEW_LINES);
        
        foreach ($allMessage as $message){
            $this->allMessage[] = new Message($message);
        }
    }
    
    public function getAllMsg()
    {
        return $this->allMessage;
    }
    
    public function append(Message $msg)
    {
        $this->allMessage[] = $msg;
    }
    
    public function save()
    {
        $msgArray =[];
        foreach ($this->allMessage as $message){
            $msgArray[] = $message->showMsg();
        }
        
        file_put_contents($this->pathToFile, implode(PHP_EOL, $msgArray));
    }
}
