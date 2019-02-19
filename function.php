<?php


define("GUESTBOOK_DB", __DIR__ . "/guestbook.db");

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