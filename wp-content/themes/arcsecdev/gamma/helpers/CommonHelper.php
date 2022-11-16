<?php

namespace gamma\helpers;


class CommonHelper
{
    public static function getRealIp(){

        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['HTTP_X_REAL_IP'])){
            return $_SERVER['HTTP_X_REAL_IP'];
        }

        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @param string $recaptcha $_POST['g-recaptcha-response'] or other if ajax
     * @return bool true/false
     */
    public static function verifyGoogleCaptcha($recaptcha){
        /*$captchaSecret = '';

        if(!$recaptcha)
            return false;

        $ReCaptcha = new \ReCaptcha\ReCaptcha($captchaSecret);

        $responseRecaptcha = $ReCaptcha->verify($recaptcha, self::getRealIp());

        return $responseRecaptcha->isSuccess();*/
    }
}
