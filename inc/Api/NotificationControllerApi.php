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
class NotificationControllerApi extends WP_REST_Controller {

    public function __construct(){
        $this->namespace = 'tutor-elite/v1';
        $this->rest_base = 'notifications';
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
            '/' . $this->rest_base . '/(?P<user_id>[\d]+)',
            [
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_notification' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ],
            ]
        );

        // get user progress for a lesson
        register_rest_route( 
            $this->namespace,
            '/' . $this->rest_base . '/(?P<notification_id>[\d]+)' . '/read',
            [
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'mark_as_read_notificatin' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ],
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
    public function get_notification( $request ){
        
    }

    /**
     * mark as read notification
     *
     * @param [type] $request
     * @return void
     */
    public function mark_as_read_notificatin( $request ){
        
    }
    
}