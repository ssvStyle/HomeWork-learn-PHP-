<?php
/**
 * Description of CheckForm
 *
 * @author ssv
 */
class Validation
{
    protected $formData = [];
    protected $errors = [];
    
    public function __construct(array $form_data)
    {
        $this->formData = $form_data;
    }
    
    
    public function checkEmptyField()
    {
            return empty(trim($value));
    }

    public function getErrors()
    {
        return $this->errors; 
    }
    
}
