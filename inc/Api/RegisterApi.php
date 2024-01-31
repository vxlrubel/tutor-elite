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

        // register enrolments controller api
        add_action( 'rest_api_init', [ $this, 'register_enrollment_api' ] );

        // register quizzes api
        add_action( 'rest_api_init', [ $this, 'register_quizz_api'] );

        // register user progress api
        add_action( 'rest_api_init', [ $this, 'register_user_progress_api'] );


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

    /**
     * register course api routes for manage the lessons
     *
     * @return void
     */
    public function register_enrollment_api(){
        $enrollment_api = new EnrollmentsControllerApi;
        $enrollment_api->register_routes();
    }

    /**
     * register quiz api routes for manage the quizzes
     *
     * @return void
     */
    public function register_quizz_api(){
        $quizzes = new QuizControllerApi;
        $quizzes->register_routes();
    }

    /**
     * register user progress api routes for manage user progress
     *
     * @return void
     */
    public function register_user_progress_api(){
        $user_progress = new UserProgressControllerApi;
        $user_progress->register_routes();
    }
}