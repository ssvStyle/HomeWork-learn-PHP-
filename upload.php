<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();
?>

include_once __DIR__ . '/autoload.php';

$file = isset($_FILES['newFile']) ? $_FILES['newFile'] : false;

$uploader = new Uploader($file);

        if ($uploader->isUploaded()) {
            
            $uploader->upload();
                
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/HomeWork/index.php');
                
        } else {
                
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/HomeWork/index.php?file_upload_result=error');

        }