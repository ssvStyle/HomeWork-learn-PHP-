<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();
include_once __DIR__ . '/classes/View.php';
include_once __DIR__ . '/classes/News.php';



$index = new View();
$news = new News;

if (isset($_GET['id'])) {
    $index->assign('article', $news->getNewsById((int)($_GET['id'])));
    $index->display('article');
} else {
    $index->assign('news', $news);
    $index->display('news');
}



