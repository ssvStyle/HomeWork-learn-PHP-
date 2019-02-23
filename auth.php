<?php session_start();

include_once __DIR__ . '/function.php';

var_dump($_POST);

$button = $_POST['button'] === 'submit';

    if ($button){
        
        $login = htmlspecialchars(trim($_POST['login']));
        $pass = $_POST['pass'];
        $rememberMe = $_POST['setCockie'] ?? FALSE;
        
        $emptyLoginOrPass = empty($login) || empty($pass);
        
            if ($emptyLoginOrPass){
                
                echo 'login or pass empty';
                
            }
        
        $userData = сheckPassword($login, $pass) ? getUserInfo($login) : FALSE;
        
            if ($userData) {
                
                $_SESSION['id'] = sha1($userData['id']);
                $_SESSION['name'] = $userData['name'];
            }
        
            
            if ($rememberMe){
                
                setcookie('uID', sha1($userData['id']), time() + 604800);
                
            }
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
        
        /*
        echo $login.'<br>';
        echo $pass.'<br>';
        echo $rememberMe.'<br>';
        var_dump(сheckPassword($login,$pass));*/
        
        
    }