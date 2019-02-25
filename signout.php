<?php session_start();
include_once __DIR__ . '/function.php';
checkCookie();


$button = isset($_POST['button']) && $_POST['button'] === 'submit';

    if ($button){
        
        $login = htmlspecialchars(trim($_POST['login']));
        $pass = $_POST['pass'];
        $rememberMe = $_POST['setCockie'] ?? FALSE;
        
        $emptyLoginOrPass = empty($login) || empty($pass);
        
            if ($emptyLoginOrPass){
                
                header(stringLocationForHeader('login.php', 'signInError', 'emptyPassOrLogin'));
                
            }
        
        $userData = сheckPassword($login, $pass) ? getUserInfo($login) : FALSE;
        
            if ($userData) {
                
                $_SESSION['id'] = sha1($userData['id']);
                $_SESSION['name'] = $userData['name'];
            }
        
            
            if ($rememberMe && getUserIdByCookieUId() == NULL){
                
                setcookie('uID', sha1($userData['id']), time() + 604800);
                
            }
        
    } else {
        
        header(stringLocationForHeader('login.php'));
        
    }