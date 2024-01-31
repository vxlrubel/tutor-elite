<?php

namespace Tutor\Inc\Api;

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

        // register course api end point
        add_action( 'rest_api_init', [ $this, 'register_course_api' ] );

        // register lessons controller api 
        add_action( 'rest_api_init', [ $this, 'register_lesson_api' ] );


    }

    /**
     * register course api routes for manage the courses
     *
     * @return void
     */
    public function register_course_api(){
        $course_api = new CoursesControllerApi;
        $course_api->register_routes();
    }

    /**
     * register course api routes for manage the lessons
     *
     * @return void
     */
    public function register_lesson_api(){
        $lesson_api = new LessonsControllerApi;
        $lesson_api->register_routes();
    }
}