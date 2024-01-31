<?php

namespace Tutor\Inc\Api;

defined('ABSPATH') || exit;

use WP_REST_Server;
use WP_REST_Controller;

/**
 * this class use for register REST API fpr lessons management
 * 
 * @author Rubel Mahmud
 * @link https://github.com/vxlrubel
 * @version 1.0
 */
class LessonsControllerApi extends WP_REST_Controller {

    public function __construct(){
        $this->namespace = 'tutor-elite/v1';
        $this->rest_base = 'lessons';
    }

    /**
     * register routes
     *
     * @return void
     */
    public function register_routes(){
        register_rest_route( 
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods'             => WP_REST_Server::CREATABLE,
                    'callback'            => [ $this, 'insert_item' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ],
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_items' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ]
            ]
        );
    }

    /**
     * define  permission
     *
     * @return void
     */
    public function check_permission(){
        
        if ( current_user_can( 'manage_options' ) ){
            return true;
        }
        return false;
    }

    /**
     * insert lesson
     *
     * @return void
     */
    public function insert_item( $request ){
        
    }

    /**
     * get items of lessons
     *
     * @param [type] $request
     * @return void
     */
    public function get_items( $request ){

    }

}