<?php


namespace gamma;


class AssetRegister
{

    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'register' ) );

        if(is_admin()){
            add_action('enqueue_block_editor_assets', [$this, 'gutenbergFilters'] );
        }
    }

    public function register()
    {
        if (THEME_ENV === 'prod'){
            //wp_deregister_script( 'jquery' );
            /*================================STYLES===================================*/

            wp_enqueue_style( 'gamma-master', get_template_directory_uri().'/main.css', array(), '1.0');

            /*===============================SCRIPTS=================================*/

            wp_enqueue_script( 'gamma-js', TEMPLATE_URI_JS . '/build.js', array(), '1.0', true );
        }
        else{
            //wp_deregister_script( 'jquery' );
            /*================================STYLES===================================*/

            wp_enqueue_style( 'gamma-master', get_template_directory_uri().'/main.css', array(), time());

            /*===============================SCRIPTS=================================*/

            wp_enqueue_script( 'gamma-js', TEMPLATE_URI_JS . '/build.js', array(), time(), true );
        }



        wp_localize_script( 'gamma-js', 'gammaajax',
            array(
                'url' => admin_url('admin-ajax.php')
            )
        );
    }

    public function gutenbergFilters()
    {
        wp_enqueue_script('awp-gutenberg-filters', get_template_directory_uri() . '/assets/js/admin-gutenberg.js', ['wp-blocks', 'wp-dom-ready', 'wp-edit-post']);
    }
}
