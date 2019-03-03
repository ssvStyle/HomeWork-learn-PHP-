<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();

include_once __DIR__ . '/classes/View.php';


$login = new View();

$login->display('login');