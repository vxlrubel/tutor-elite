<?php

namespace Tutor\Inc\Api;

defined('ABSPATH') || exit;

use WP_REST_Server;
use WP_REST_Controller;

/**
 * this class use for register REST API
 * 
 * @author Rubel Mahmud
 * @link https://github.com/vxlrubel
 * @version 1.0
 */
class UserProgressControllerApi extends WP_REST_Controller {

    public function __construct(){
        $this->namespace = 'tutor-elite/v1';
        $this->rest_base = 'user-progress';
    }
    
    /**
     * register route for manage courses
     *
     * @return void
     */
    public function register_routes(){
        // get user progress for a lesson
        register_rest_route( 
            $this->namespace,
            '/' . $this->rest_base . '/(?P<user_id>[\d]+)' . '/(?P<lesson_id>[\d]+)',
            [
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_user_progress' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ],
                [
                    'methods'             => WP_REST_Server::EDITABLE,
                    'callback'            => [ $this, 'update_user_progress' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ]
            ]
        );
    }

    /**
     * check permission
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
     * get user progress
     *
     * @param [type] $request
     * @return void
     */
    public function get_user_progress( $request ){
        
    }

    /**
     * update user progress
     *
     * @param [type] $request
     * @return void
     */
    public function update_user_progress( $request ){
        
    }
    
}