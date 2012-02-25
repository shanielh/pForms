<?php

use pUnit\Assert as Assert;

class FormTests
{
    
    public function Add_Should_Return_FormElement()
    {
        $form = new pForms\Form(null, null);
        $retVal = $form->Add('Hey');
        
        Assert::IsInstanceOf('pForms\FormElement', $retVal);
    }
    
}