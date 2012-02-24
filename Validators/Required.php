<?php

namespace pForms\Validators;

class Required implements IValidator
{
        
    private $mError;
    
    public function __construct($error)
    {
        $this->mError = $error;    
    }
    
    public function Validate($value)
    {
        if ($value === null)
        {
            return $this->mError;
        }
        return true;
    }
    
}