<?php

require_once('AutoLoader.php');

$form = new pForms\Form(new pForms\PluginProviders\NamespacePluginProvider('pForms\Validators'), $_POST);

$form->Add('username')->required('This field is required')
     ->length(4,10, 'Length must be between 4 and 10');

var_dump($form->Validate());
var_dump($form->GetErrors());