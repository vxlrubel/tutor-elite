<?php

namespace Tutor\Inc;

defined('ABSPATH') || exit;

/**
 * this class use for register REST API
 * 
 * @author Rubel Mahmud
 * @link https://github.com/vxlrubel
 * @version 1.0
 */
class RegisterApi{

    public function __construct(){
        add_action( 'rest_api_init', [ $this, 'register_course_api' ] );
    }

    /**
     * register course api routes for manage the courses
     *
     * @return void
     */
    public function register_course_api(){
        $course_api = new CoursesApi;
        $course_api->register_routes();
    }
}