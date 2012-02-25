<?php

namespace pForms;

class Loader
{
    
    private function __construct()
    {
        
    }
    
    public static function TryLoad($className)
    {
        $namespace = __NAMESPACE__;
        $len = strlen($namespace) + 1;
        
        // Strip the 'pForms' namespace out of the class and include it.
        $stripedName = substr($className, $len) . '.php';
        $stripedName = str_replace('\\', '/', $stripedName);
        
        if (!file_exists($stripedName))
        {
            return;
        }
        
        include_once($stripedName);
        
    }

}

spl_autoload_register('\pForms\Loader::TryLoad');