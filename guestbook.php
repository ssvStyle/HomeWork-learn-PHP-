<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();
include_once __DIR__ . '/classes/GuestBook.php';
include_once __DIR__ . '/classes/View.php';


$guestBook = new GuestBook();
$guestBookView = new View();

$guestBookView->assign('guestBook', $guestBook);
$guestBookView->display('guestbook');