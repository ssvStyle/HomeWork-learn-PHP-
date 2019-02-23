<?php

include_once __DIR__ . '/function.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';



$button = $_POST['button'] === 'submit';

    if ($button){

        echo 'button pressed !!!';

    }