<?php
/**
 * Description of View
 *
 * @author ssv
 */
class View
{
    protected $data = [];

    public function assign($name, $value)
    {
        //
    }
    
    public function display(string $template)
    {
        
        if (file_exists('./templates/' . $template . '.php')){
            include_once './templates/header.php';
            include_once './templates/' . $template . '.php';
            include_once './templates/footer.php';
        }  else {
            include_once './templates/header.php';
            include_once './templates/404.php';
            include_once './templates/footer.php';
        }
        
    }
    
    public function render(string $template)
    {
        ob_start();
            $this->display($template);
            $rezult = ob_get_contents();
        ob_end_clean();
        
        return $rezult;
    }
}
