<?php


namespace gamma;


class ThemeOptionRegister
{

    public function __construct(){

        add_action( 'after_setup_theme', array( $this, 'registerOptions' ) );

        add_action( 'widgets_init', array( $this, 'registerWidgetSidebars') );
    }


    public function registerOptions(){
        //load_theme_textdomain( 'gamma', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support('widgets');

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        register_nav_menus( array(
            'primary_menu' => "Primary menu",
            'footer_menu'  => "Footer menu",
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );


        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );

        add_theme_support( 'woocommerce' );


        //Theme options
        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page(array(
                'page_title' 	=> ucfirst(THEME_NAME).' General Settings',
                'menu_title'	=> ucfirst(THEME_NAME).' Settings',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));

            /*acf_add_options_sub_page(array(
                'page_title' 	=> ucfirst(THEME_NAME).' Header Settings',
                'menu_title'	=> 'Header',
                'parent_slug'	=> 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> ucfirst(THEME_NAME).' Footer Settings',
                'menu_title'	=> 'Footer',
                'parent_slug'	=> 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> ucfirst(THEME_NAME).' Sidebar Settings',
                'menu_title'	=> 'Sidebar',
                'parent_slug'	=> 'theme-general-settings',
            ));*/

        }
    }


    public function registerWidgetSidebars(){
        /*register_sidebar( array(
            'name' => "Widgets in the site header",
            'id' => 'header-widget',
            'description' => 'These widgets will be displayed in the site header',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title' => '<h2 class="title-header">',
            'after_title' => '</h2>'
        ) );
        register_sidebar( array(
            'name' => "Widgets in site footer",
            'id' => 'footer-widget',
            'description' => 'These widgets will be displayed in the site footer',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>\n",
            'before_title' => '<h5 class="title-header">',
            'after_title' => '</h5>'
        ) );*/

    }
}
