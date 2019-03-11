<?php session_start();
include_once '../function.php';
checkCookie();

$button = isset($_POST['button']) && $_POST['button'] === 'submit';

    if ($button){
        
        $login = htmlspecialchars(trim($_POST['login']));
        $pass = $_POST['pass'];
        $rememberMe = $_POST['setCockie'] ?? FALSE;
        
        $emptyLoginOrPass = empty($login) || empty($pass);
        
            if ($emptyLoginOrPass){
                
                header(stringLocationForHeader('login.php', 'signInError', 'emptyLoginOrPass'));
                
            }
        
        $userData = сheckPassword($login, $pass) ? getUserInfo($login) : FALSE;
        
            if ($userData) {
                
                $_SESSION['id'] = sha1($userData['id']);
                $_SESSION['name'] = $userData['name'];
           
                    if ($rememberMe && getUserIdByCookieUId() == NULL){

                        setcookie('uID', sha1($userData['id']), time() + 604800);

                    }
                    
                    header(stringLocationForHeader('index.php'));
                    
            } else {
                
                header(stringLocationForHeader('login.php', 'signInError', 'wrongLoginOrPass'));
                
            }
            
            
        
    } else {
        
        header(stringLocationForHeader('login.php'));
        
    }