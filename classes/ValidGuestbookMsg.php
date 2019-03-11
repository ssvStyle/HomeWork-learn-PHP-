<?php

include_once 'Validation.php';

/**
 * Description of check
 *
 * @author ssv
 */
class ValidGuestbookMsg extends Validation
{
    
    public function __construct(array $form_data)
    {
        parent::__construct($form_data);
        $this->checkEmptyForm();
    }
    
    public function name()
    {
        $this->checkEmptyField();
        $this->formData['name'] = htmlspecialchars($this->formData['name']);
            
    }
    
    public function email()
    {
        
        $email = filter_var($this->formData['email'], FILTER_VALIDATE_EMAIL);
        
        if (!$email){
            $this->errors[] =  'Не верный формат Email';
        }
        
    }
    
    public function massage()
    {
        if (iconv_strlen($this->formData['text']) < 5){
            
            $this->errors[] =  'Сообщение должно содержать не менее 5 символов';
            
        }
    }
    
    public function getData()
    {
        return $this->formData;
    }
}
