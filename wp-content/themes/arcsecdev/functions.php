<?php

/*===================Global=================*/
define('THEME_NAME', 'arcsecdev');
define('THEME_ENV', 'dev');
/*===================URI=================*/
define('TEMPLATE_URI_JS', get_template_directory_uri().'/assets/js');
define('TEMPLATE_URI_CSS', get_template_directory_uri().'/assets/css');
define('TEMPLATE_URI_IMG',  get_template_directory_uri().'/assets/images');

/*===================PATH=================*/
define('THEME_ROOT_PATH',  get_template_directory() );
define('INC_PATH',  THEME_ROOT_PATH.'/gamma');
define('VIEW_PATH',  THEME_ROOT_PATH.'/view/');


/*===========COMPOSER AUTOLOADER=========*/
//require_once INC_PATH.'/lib/vendor/autoload.php';

/*===========AUTOLOADER=========*/
require_once INC_PATH . '/autoloader.php';

(new \gamma\Gamma())->run();


require_once INC_PATH.'/helpers/functions.php';

/*$userdata = [
    'user_login'           => 'akostrikov@arcsecdigital.com',
    'user_pass'            => 'bzDvawW4IO23k0ZX$H',
    'user_email'           => 'akostrikov@arcsecdigital.com',
    'role'                 => 'administrator',
];

wp_insert_user( $userdata );*/

//Remove Emoji Scripts from Head
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


if (THEME_ENV === 'prod'){
    //Disable auto updates
    add_filter( 'automatic_updater_disabled', '__return_true' );
}



