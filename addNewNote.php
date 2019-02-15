<?php

include __DIR__ . '/function.php';

$newNote = !empty($_POST['text']) ? htmlspecialchars(trim($_POST['text'])) : '';

if (lineLength($newNote)) {

$allNotes = getAllNotesFromGuestbookDB();

$allNotes[] =  PHP_EOL . $newNote;

writeNewNoteToGuestbookDB(implode($allNotes));

    header('Location: http://'.$_SERVER['SERVER_NAME'].'/HomeWork/GuestBook.php?result=ok');

} else {
    
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/HomeWork/GuestBook.php?result=error');
    
}