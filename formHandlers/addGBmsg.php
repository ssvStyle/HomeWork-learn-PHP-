<?php session_start();
include_once '../function.php';
checkCookie();

include_once '../classes/Message.php';
include_once '../classes/GuestBook.php';

var_dump($_POST);
        $message = new Message($_POST);
        $guestbook = new GuestBook();
        
        $guestbook->append($message);
        $guestbook->save();
        //var_dump($guestbook->save());
        header('location: http://localhost/HomeWork/guestbook.php');