<?php session_start();
include_once '../function.php';
checkCookie();

include_once '../classes/Message.php';
include_once '../classes/GuestBook.php';

        $message = new Message($_POST['text']);
        $guestbook = new GuestBook();
        
        $guestbook->append($message);
        $guestbook->save();

        header('location: http://localhost/HomeWork/guestbook.php');