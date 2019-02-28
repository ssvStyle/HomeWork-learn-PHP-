<?php

/**
 * Description of Uploader
 *
 * @author ssv
 */
class Uploader
{
    protected $fileTmpName;


    public function __construct($file_tmp_name)/*$_FILES['newFile']['tmp_name']*/
    {
        $this->fileTmpName = $file_tmp_name;
    }
    
    public function isUploaded()
    {
        return is_uploaded_file($this->fileTmpName);
    }
    
    public function upload()
    {
        $result = \FALSE;
        
            if ($this->isUploaded()){

                $result = move_uploaded_file();

            } 
        
        return $result;
    }
}

