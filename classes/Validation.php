<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
