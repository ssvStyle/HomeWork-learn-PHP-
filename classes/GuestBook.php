<?php

/**
 * Description of GuestBook
 *
 * @author ssv
 */
class GuestBook 
{
    protected $pathToFile;
    protected $allNotes = [];


    public function __construct($pathToFile)
    {
        $this->pathToFile = $pathToFile;
        
        $note = fopen($this->pathToFile, 'r');

            while (!feof($note)) {
                $this->allNotes[] = fgets($note);
            }
            fclose($note);
    }


    public function getData()
    {
        return $this->allNotes;   
    }
    
    public function append($newNote)
    {
        $this->allNotes[] =  PHP_EOL.$newNote;
        
        return $this->allNotes;
    }
    
    public function save()
    {
        $file = fopen($this->pathToFile, 'w');
        
        $fwriteRezult = fwrite($file, implode($this->allNotes));
        
        fclose($file);
        
        return $fwriteRezult;
    }
}
