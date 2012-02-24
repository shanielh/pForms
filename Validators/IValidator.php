<?php

namespace pForms\Validators;

interface IValidator
{
    
    /**
     * Validates for the value and returns
     * True or false.
     *
     * @return true|string (For errors)
     **/
    function Validate($value);
    
    
}