<?php

namespace gamma\ajax;

use gamma\helpers\ArrayHelper;
use gamma\traits\FormReaderTrait;

abstract class GammaAjax
{

    use FormReaderTrait;

    protected function prepare($nonceAction)
    {
        /*if(!is_user_logged_in())
            wp_send_json_error( 'Sorry, you need sign in!');*/

        $this->readData();

        if(!$this->checkNonce($this->nonce, $nonceAction))
            wp_send_json_error( 'Sorry, can not process!');

        ArrayHelper::removeMultiple($this->data, ['action', 'nonce']);
    }

    protected function getRequestParam($name){
        if(isset($_REQUEST[$name]))
            return sanitize_text_field( $_REQUEST[$name] );
        else
            return null;
    }

    protected function sendResponse($data, $type = 'json'){

        if($type == 'json'){
            wp_send_json( $data );
        }
        elseif($type == 'html'){
            echo $data;
        }

        exit();

    }



    public function checkNonce($nonceValue, $nonceAction){
        return ( !empty( $nonceValue ) && wp_verify_nonce( $nonceValue, $nonceAction ) );
    }
}
