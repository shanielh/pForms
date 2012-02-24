<?php

namespace pForms;

class Form
{
    
    private $mPluginProvider;
    
    private $mSource;
    
    private $mElements = array();
    
    private $mErrors = array();
    
    public function __construct($pluginProvider, $source)
    {
        $this->mPluginProvider = $pluginProvider;
        $this->mSource = $source;
    }
    
    public function Add($key)
    {
        $retVal = new FormElement($this->mPluginProvider);
        $this->mElements[$key] = $retVal;
        return $retVal;
    }
    
    public function Validate()
    {
        foreach ($this->mElements as $key => $element)
        {
            $value = null;
            if (array_key_exists($key, $this->mSource))
            {
                $value = $this->mSource[$key];
            }
            
            // Gets the full validation report
            $result = $element->Process($value);
            if ($result !== true)
            {
                $this->mErrors[$key] = $result;
            }
        }
        
        return count($this->mErrors) === 0;
    }
    
    public function GetErrors()
    {
        return $this->mErrors;
    }
    
    
}