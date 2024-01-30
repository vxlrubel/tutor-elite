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
class CoursesApi{

    public function __construct(){
        $this->namespace = 'tutor-elite/v1';
        $this->rest_base = 'courses';
    }
    
    /**
     * register route for manage courses
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
     * check permission
     *
     * @return void
     */
    private function check_permission(){
        return current_user_can( 'manage_options' );
    }

    /**
     * insert course
     *
     * @param [type] $request
     * @return void
     */
    public function insert_item( $request ){
        
    }

    /**
     * get all courses item
     *
     * @param [type] $request
     * @return void
     */
    public function get_items( $request ){
        
    }

    /**
     * get single courses item
     *
     * @param [type] $request
     * @return void
     */
    public function get_item( $request ){
        
    }

    /**
     * update single courses item
     *
     * @param [type] $request
     * @return void
     */
    public function update_item( $request ){
        
    }

    /**
     * delete single courses item
     *
     * @param [type] $request
     * @return void
     */
    public function delete_item( $request ){
        
    }
    
}