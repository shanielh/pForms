<?php

namespace pForms\PluginProviders;

class CompositePluginProivder implements IPluginProvider
{
    
    private $mThrowException;
    
    private $mChildren;
    
    public __construct($throwException, $children)
    {
        $this->mThrowException = $throwException;
        $this->mChildren = $children;
    }
    
    public function Get($name, $args)
    {
        
        foreach ($this->mChildren as $pluginProvider)
        {
            $retVal = $pluginProvider->Get($name, $args);
            if ($retVal !== null)
            {
                return $retVal;
            }
        }
        
        if ($this->mThrowException)
        {
            throw new InvalidArgumentException('Could not find plugin for ' . $name);
        }
        
        return null;
    }
}