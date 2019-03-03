<?php
/**
 * Description of View
 *
 * @author ssv
 */
class View
{
    protected $data = [];
    
    public function __construct()
    {
        //
    }
    
    public function assign($name, $value)
    {
        //
    }
    
    public function display(string $template)
    {
        
        if (file_exists('./templates/' . $template . '.php')){
            include_once './templates/' . $template . '.php';
        }  else {
            include_once './templates/404.php';
        }
        
    }
    
    public function render($template)//*
    {
        //
    }
}
