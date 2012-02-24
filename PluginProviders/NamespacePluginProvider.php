<?php

namespace pForms\PluginProviders;

class NamespacePluginProvider implements IPluginProvider
{
    
    private $mNamespace;
    
    public function __construct($namespace)
    {
        $this->mNamespace = $namespace;
    }
    
    public function Get($name, $args)
    {
        $name = ucfirst($name);
        $fullName = $this->mNamespace . '\\' . $name;
        
        if (class_exists($fullName)) 
        {
            $rc = new \ReflectionClass($fullName);
            $retVal = $rc->newInstanceArgs($args);
            return $retVal;
        }
        
        return null;
    }
    
}