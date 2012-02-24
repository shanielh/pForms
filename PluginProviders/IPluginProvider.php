<?php

namespace pForms\PluginProviders;

interface IPluginProvider
{
    
    /**
     * Gets the wanted plugin with the given args.
     *
     * @return object|null
     * @throws InvalidArgumentException when no plugin found
     **/
    function Get($name, $args);
    
}