<?php


namespace gamma;

use gamma\ajax\GammaAjax;

class AjaxRegister
{


    /**
     * @param array ['action_name' => 'controller_class_name::method_name']
     */
    private $actions = [
        'newsroom_load_more_posts' => 'PostAjax::newsroomLoadMore',
    ];

    public function __construct(){
        foreach ($this->actions as $action_name => $action_data){
            $action_data = explode('::', $action_data);
            $controller_class = array_shift($action_data);
            $controller_method = array_shift($action_data);

            $controller_class = '\gamma\ajax\\'.$controller_class;
            if(class_exists($controller_class)){

                $controller = new $controller_class();


                if( $controller instanceof GammaAjax){
                    add_action( 'wp_ajax_'.$action_name, array($controller, $controller_method) );
                    add_action( 'wp_ajax_nopriv_'.$action_name, array($controller, $controller_method) );
                }
                else
                    throw new \Exception("Error: $controller_class should be extends gamma\ajax\GammaAjax", 20);

            }
            else{
                throw new \Exception("Error: $controller_class do not exist", 21);
            }
        }
    }
}
