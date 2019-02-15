<?php


define("GUESTBOOK_DB", __DIR__ . "/guestbook.db");

          
function A_plus_B($a, $b) {//A plus B
    
    return $a . ' + ' . $b . ' = ' . ($a + $b);
    
}

function A_minus_B($a, $b) {//A minus B
    
    return $a . ' - ' . $b . ' = ' . ($a - $b);
    
}

function A_multiplyBy_B($a, $b) { //A multiply by B
    
    return $a . ' * ' . $b . ' = ' . ($a * $b);
    
}

function A_divideBy_B($a, $b) { //A divide by B
    
    return $a . ' / ' . $b . ' = ' . ($a / $b);
    
}

function emptyVariableCheck($a, $b) {
    
   return !empty($a) && !empty($b);
    
}

function numericCheck($variable) {
    
    return is_numeric($variable);
    
}

function operationChecking($operation) {
    
    return !empty($operation);
    
}

function CheckingAllArguments($array) {//Checking All Arguments
    
            return emptyVariableCheck($array['firstNumber'], $array['secondNumber']) && numericCheck($array['firstNumber']) && numericCheck($array['secondNumber']) && operationChecking($array['operation']);
        
    
}

function getImagelist() {
    
    return array_diff(scandir('img/gallery'), ['..', '.']);
}

function getImageById($id) {
    
    $imageList = getImagelist();
    return $imageList[$id];
    
}

function getAllNotesFromGuestbookDB() {
    
        $note = fopen(GUESTBOOK_DB, 'r');
        
        while (!feof($note)) {
            
            $rezult[] = fgets($note);
                
        }
        
        fclose($note);
        
    return $rezult;
    
}

function writeNewNoteToGuestbookDB($newNote) {
    
        $file = fopen(GUESTBOOK_DB, 'w');
        
        fwrite($file, $newNote);
        
        fclose($file);
    
}

function lineLength($Line) {
    
    return mb_strlen($Line) > 5;
    
}