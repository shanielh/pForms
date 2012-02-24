<?php

namespace pForms;

class FormElement
{
    
    private $mPluginProvider;
    
    private $mChain = array();
    
    public function __construct($pluginProvider)
    {
        $this->mPluginProvider = $pluginProvider;
    }
    
    public function Process($value)
    {
        $retVal = array();
        foreach ($this->mChain as $plugin)
        {
            if ($plugin instanceof Validators\IValidator)
            {
                $result = $plugin->Validate($value);
                if ($result !== true)
                {
                    $retVal[] = $result;
                }
            } 
            else if ($plugin instanceof Filters\IFilter)
            {
                $value = $plugin->Filter($value);
            }
        }
        
        if (count($retVal) === 0)
        {
            return true;
        }
        return $retVal;
    }
    
    /**
     * Adds the wanted filter / validator to the chain.
     *
     * @return FormElement
     **/
    public function __call($name, $args) 
    {
        // We should get the validator $name with params.
        $plugin = $this->mPluginProvider->Get($name, $args);
        
        if ($plugin === null)
        {
            throw new \InvalidArgumentException('No plugin returned for ' . $name);
        }
        
        // Push it.
        array_push($this->mChain, $plugin);
        
        // Return our selfs.
        return $this;
    }
    
}