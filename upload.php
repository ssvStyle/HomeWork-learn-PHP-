<?php session_start();
include_once __DIR__ . '/function.php';
authorizationByCookie();

include_once __DIR__ . '/function.php';

$file = isset($_FILES['newFile']) ? $_FILES['newFile'] : false;

            if (checkFileType($file) && fileExist($file)) {
            
                move_uploaded_file($file["tmp_name"], __DIR__ . '/img/gallery/' . $file["name"]);
                
                header('Location: http://'.$_SERVER['SERVER_NAME'].'/HomeWork/index.php');
                
            } else {
                
                header('Location: http://'.$_SERVER['SERVER_NAME'].'/HomeWork/index.php?file_upload_result=error');

            }