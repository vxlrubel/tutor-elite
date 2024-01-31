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
            '/' . 'courses' . '/(?P<id>[\d]+)' . '/' . $this->rest_base,
            [
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_courses_lessons' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ]
            ]
        );
        
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

        // register route for single item
        register_rest_route( 
            $this->namespace,
            '/' . $this->rest_base . '/(?P<id>[\d]+)',
            [
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [ $this, 'get_item' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ],
                [
                    'methods'             => WP_REST_Server::EDITABLE,
                    'callback'            => [ $this, 'update_item' ],
                    'permission_callback' => [ $this, 'check_permission' ]
                ],
                [
                    'methods'             => WP_REST_Server::DELETABLE,
                    'callback'            => [ $this, 'delete_item' ],
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
     * get lesson by course id
     *
     * @param [type] $request
     * @return void
     */
    public function get_courses_lessons( $request ){
        
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

    /**
     * get single lesson item
     *
     * @param [type] $request
     * @return void
     */
    public function get_item( $request ){
        
    }

    /**
     * update single lesson item
     *
     * @param [type] $request
     * @return void
     */
    public function update_item( $request ){
        
    }

    /**
     * delete single lesson item
     *
     * @param [type] $request
     * @return void
     */
    public function delete_item( $request ){
        
    }

}