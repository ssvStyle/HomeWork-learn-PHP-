<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();


setcookie('uID', $_SESSION['id'], time() - 86400);
session_destroy();
header(stringLocationForHeader('index.php'));