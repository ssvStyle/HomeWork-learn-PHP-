<?php


define("GUESTBOOK_DB", __DIR__ . "/guestbook.db");
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

/****************Guestbook start****************/

function getAllNotesFromGuestbookDB() {
    
        $note = fopen(GUESTBOOK_DB, 'r');
        
        while (!feof($note)) {
            
            $rezult[] = fgets($note);
                
        }
        
        fclose($note);
        
    return $rezult;
    
}

function addNewNoteTooGuestbookDB($newNote) {
    
        $allNotes = getAllNotesFromGuestbookDB();

        $allNotes[] =  PHP_EOL . $newNote;

        return writeNewNoteToGuestbookDB(implode($allNotes));
    
}

function writeNewNoteToGuestbookDB($newNote) {
    
        $file = fopen(GUESTBOOK_DB, 'w');
        
        $fwriteRezult = fwrite($file, $newNote);
        
        fclose($file);
        
        return $fwriteRezult;
    
}

/****************Guestbook end****************/

/****************Img upload start****************/

function lineLength($Line) {
    
    return mb_strlen($Line) > 5;
    
}

function fileExist($file) {
    
    return (!empty($file["name"]) && !empty($file["type"]) && !empty($file["size"]) );
    
}

function checkFileType($file) {
    
    return ($file["type"] == 'image/png' ||  $file["type"] == 'image/jpeg');
    
}

/****************Img upload end****************/

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

function getCurrentUser() //Добавьте функцию getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null
    {
        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {

            return $_SESSION['name'];

        }

    }


/****************user lis function end****************/
    
/****************Authorization end****************/
    
    
    
/****************Authorization end****************/

    
    function addTooLog( $id , $name , $imageName ,  $erors = 0) {
     
        $data = PHP_EOL . time() . '-|-'. $id . '-|-' . $name . '-|-' . $imageName . '-|-' . $erors;
     
        //$fn = __DIR__ . '/log.txt';
        
        $note = fopen(LOG_DB, 'a');
        
        fwrite($note, $data);
        
        fclose($note);
}