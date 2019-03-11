<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();
include_once __DIR__ . '/classes/View.php';

$index = new View();

$index->display('news');