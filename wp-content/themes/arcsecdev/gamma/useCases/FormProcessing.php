<?php

namespace gamma\useCases;


use gamma\helpers\CommonHelper;

class FormProcessing
{
    public function __construct()
    {
        //add_action( 'gamma_get_in_touch', array($this, 'getInTouch') );
    }

    public function getInTouch()
    {

    }

    protected function addError($errorMsg){

        $_POST['error_msg'] = $errorMsg;

    }
}
