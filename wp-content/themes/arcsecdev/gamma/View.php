<?php


namespace gamma;


class View
{

    protected static $viewPath = VIEW_PATH;


    public static function render($template, $data = array()){

        global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

        if ( is_array( $wp_query->query_vars ) )
            extract( $wp_query->query_vars, EXTR_SKIP );

        if ( isset( $s ) )
            $s = esc_attr( $s );


        if(is_array($data))
            extract($data);

        include self::$viewPath.$template.'.php';
    }


    public static function getRender($template, $data = array()){
        ob_start();
        self::render($template, $data);
        return (ob_get_clean());
    }




    //log test data while makes debuging
    public static function log($string){

        $handle = fopen(INC_PATH . 'log.txt', 'a+');

        $string.= PHP_EOL;

        fwrite($handle, $string);

        fclose($handle);

    }
}
