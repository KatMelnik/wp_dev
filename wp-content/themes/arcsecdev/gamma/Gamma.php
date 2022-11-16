<?php


namespace gamma;

use gamma\gutenberg\GutenbergRegisterBlocks;

class Gamma
{

    public static $wpdb;

    public function __construct(){
        global $wpdb;

        self::$wpdb = $wpdb;
    }

    public function run(){

        //Register Ajax actions
        new AjaxRegister();

        //Register actions
        new ActionRegister();

        //Register filters
        new FilterRegister();

        //Woocommerce actions
        //new \gamma\classes\woocommerce\WoocommerceActions();

        //Setup theme options
        new ThemeOptionRegister();

        //Register assets
        new AssetRegister();

        //Register controllers
        //new ControllersRegister();

        //Register Gutenberg Blocks and Categories
        new GutenbergRegisterBlocks();

        //Register Shortcodes
        //new \gamma\shortcodes\ShortcodeRegister();


        /*=========================ADMIN===========================*/



        /*=========================FORMS===========================*/

        //new \gamma\landing\FormProcessing();
        //new \gamma\useCases\FormProcessing();
    }
}
