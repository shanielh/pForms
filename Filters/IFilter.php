<?php

namespace pForms\Filters;

interface IFilter
{
    
    /**
     * Filters the value
     *
     * @return string
     **/
    function Filter($value);
    
}