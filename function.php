<?php

define("USERS_DB", __DIR__ . '/users.db');
define("LOG_DB", __DIR__ . '/log.db');

/****************Calculator start****************/

function A_plus_B($a, $b) {//A + B
    
    return $a . ' + ' . $b . ' = ' . ($a + $b);
    
}

function A_minus_B($a, $b) {//A - B
    
    return $a . ' - ' . $b . ' = ' . ($a - $b);
    
}

function A_multiplyBy_B($a, $b) { //A * B
    
    return $a . ' * ' . $b . ' = ' . ($a * $b);
    
}

function A_divideBy_B($a, $b) { //A / B
    
    return $a . ' / ' . $b . ' = ' . ($a / $b);
    
}

function emptyVariableCheck($a, $b) {
    
   return !empty($a) && !empty($b);
    
}

function typeVariableCheck($a, $b){
    
    return is_numeric($a) && is_numeric($b);
    
}

/****************Calculator end****************/

/****************gallery start****************/

function getImagelist() {
    
    return array_diff(scandir('img/gallery'), ['..', '.']);
}

function getImageById($id) {
    
    $imageList = getImagelist();
    return $imageList[$id];
    
}

/****************Gallery end****************/


/****************user list function start****************/

function getUsersList() //Функция возвращает массив всех пользователей и хэшей их паролей
    {
        //$filename = __DIR__ . '/bd.txt';

        $note = fopen(USERS_DB, 'r');

            while (!feof($note)) {

                $rez[] = fgets($note);

                }

                fclose($note);

                return $rez;

    }
        
        
    function existsUser($login)//Функция existsUser($login) проверяет - существует ли пользователь с заданным логином?
    {
    $users = getUsersList();//пеередаем в переменную массив пользователей и их паролей
    
        foreach ( $users as $value ) {//пребераем массив

            $userLogin = explode('-|-', $value);//Рзабиваем строку на логин и пароль

                if ($login === $userLogin[2]) {//сравниваем полученный логин с тем который в БД

                    return TRUE; //возвращаем TRUE если найденно совпадение

                    break;

                }
        }
    
    }
    
    function сheckPassword($login, $password) //Функция сheckPassword($login, $password) пусть возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку
{
    if (existsUser($login)) {//если пользовать существует проверяем пароль
        
        $users = getUsersList();//пеередаем в переменную массив пользователей и их паролей
        
            foreach ( $users as $value ) {//пребераем массив
        
                $userData = explode('-|-', $value);//Рзабиваем строку на логин и пароль
                
            if ($login === $userData[2]) {//сравниваем полученный логин с тем который в БД
                
                $passHash = $userData[3];//вытаскиваем пароль
                
            }
            
        }
        
        return password_verify($password, $passHash);//Верификация пароля и возврат TRUE || FALSE
        
    }
    
}


function getUserInfo($login) //Функция getUserInfo($login) возвращает массив с данными пользователя или false
{
        $users = getUsersList(); //пеередаем в переменную массив пользователей и их паролей
        
            foreach ( $users as $value ) { //пребераем массив
        
                    $userData = explode('-|-', $value); //Рзабиваем строку на ид логин имя и хеш пароля

                if ($login === $userData[2]) { //сравниваем полученный логин с тем который в БД

                    return ['id' => $userData[0], 'name' => $userData[1]]; //возвращяем массив

                }
            
            }
    
    
}

function getUserDataByID($id) //Функция getUserInfo($login) возвращает массив с данными пользователя или false
{
        $users = getUsersList(); //пеередаем в переменную массив пользователей и их паролей
        
            foreach ( $users as $value ) { //пребераем массив
        
                    $userData = explode('-|-', $value); //Рзабиваем строку на ид логин имя и хеш пароля

                if ($id === $userData[0]) { //сравниваем полученный логин с тем который в БД

                    return ['id' => $userData[0], 'name' => $userData[1]]; //возвращяем массив

                }
            
            }
    
    
}

function getCurrentUser() //Добавьте функцию getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null
    {
        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {

            return $_SESSION['name'];

        }

    }


/****************user lis function end****************/
    
/****************Authorization start****************/
    
    
    function getCookieUid() {
        
        $uId = $_COOKIE['uID'] ?? FALSE;
        
        return $uId;
        
    }
    
    function getUserIdByCookieUId(){//Функция existsUser($login) проверяет - существует ли пользователь с заданным id?
    
        $uID = getCookieUid();
        
        $id = FALSE;
        
        $users = getUsersList();//пеередаем в переменную массив данных пользователей

            foreach ( $users as $value ) {//пребераем массив

                $userID = explode('-|-', $value);//Рзабиваем строку значения

                if ($uID === $userID[4]) {//сравниваем полученный id с тем который в БД

                    $id = $userID[0]; //возвращаем id если найденно совпадение

                }
                
            }
            
            return $id;
    
    }
    
    function authorizationByCookie() {
        
        if (getUserIdByCookieUId()) {
            
            $userData = getUserDataByID(getUserIdByCookieUId());
            
            $_SESSION['id'] = sha1($userData['id']);
            $_SESSION['name'] = $userData['name'];
            
            
        }
    
    }
    
    function checkCookie() {
    
        $rezult = isset($_COOKIE['uID']) && !empty($_COOKIE['uID']) && empty($_SESSION);
        
        if ($rezult) {
            
            authorizationByCookie();
            
        }
        
    }
    
    
/****************Authorization end****************/

    function addTooLog( $id , $name , $imageName ,  $erors = 0) {
     
        $data = PHP_EOL . time() . '-|-'. $id . '-|-' . $name . '-|-' . $imageName . '-|-' . $erors;
     
        //$fn = __DIR__ . '/log.txt';
        
        $note = fopen(LOG_DB, 'a');
        
        fwrite($note, $data);
        
        fclose($note);
}

function stringLocationForHeader($pathTooPage, $resultName = '', $result = '') {
    
            preg_match('~\w+~', $_SERVER['REQUEST_URI'], $domen);
            
            //$path = 0;
            
            $checkPath = preg_match('~^[a-zA-Z0-9_-]*(^\s)?\.php\Z|\.html\Z]{1}~', $pathTooPage);
            
            $patternForResultName = '~^\w+[^\.]?(^\s)?\Z~';
            
            $checkResultName = preg_match($patternForResultName, $resultName);
            
            $checkResult = preg_match($patternForResultName, $result);
            
            $rezForGETParams = ($checkResultName && $checkResult);
            
            $allRezult  = ($checkPath && $rezForGETParams);
            
            if ($allRezult) {
                
                $path = 'Location: http://' . $_SERVER['SERVER_NAME'] . '/' . $domen[0] . '/' . $pathTooPage . '?' . $resultName . '=' . $result;
                
            } elseif ($checkPath) {
                
                $path = 'Location: http://' . $_SERVER['SERVER_NAME'] . '/' . $domen[0] . '/' . $pathTooPage;//["REQUEST_URI"]
                
            } else {
                
                $path = FALSE;
                        
            }
            
            return $path;
        }