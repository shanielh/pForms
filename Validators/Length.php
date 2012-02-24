<?php

namespace pForms\Validators;

class Length implements IValidator
{
    
    private $mMin;
    
    private $mMax;
    
    private $mError;
    
    public function __construct($min, $max, $error)
    {
        $this->mMin = $min;
        $this->mMax = $max;
        $this->mError = $error;
    }
    
    public function Validate($value)
    {
        $length = strlen($value);
        if ($length < $this->mMin || $length > $this->mMax)
        {
            return $this->mError;
        }
        return true;
    }
    
}