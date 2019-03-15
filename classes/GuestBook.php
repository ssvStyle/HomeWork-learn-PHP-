<?php

include_once 'Message.php';
include_once __DIR__ . '/../app/models/DB.php';
/**
 * Description of GuestBook
 *
 * @author ssv
 */
class GuestBook
{
    protected $allMessage = [];
    protected $db;
    protected $newMsg = [];

    public function __construct()
    {
        
        $this->db = new DB();
        $GBmsg = $this->db->query('SELECT DateTime, name, message FROM guestbook ORDER by DateTime DESC', []);
        
        foreach ($GBmsg as $message){
            $this->allMessage[] = new Message($message);
        }
        
    }
    
    public function getAllMsg()
    {
        return $this->allMessage;
    }
    
    public function append(Message $msg)
    {
        $this->newMsg = $msg->getNameAndMsg();
    }
    
    public function save()
    {
        $this->db->query('INSERT INTO guestbook (name, message) VALUES (:name, :message)', $this->newMsg);
    }
}
