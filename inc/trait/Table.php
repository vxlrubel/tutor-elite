<?php

namespace Tutor\Inc\Trait;

defined('ABSPATH') || exit;

/**
 * This trait define table name;
 * 
 * @author Rubel Mahmud
 * @link https://github.com/vxlrubel
 * @version 1.0
 */

 trait Table{

    // define course table name
    private $courses = 'te_courses';

    // define lessons table name
    private $lessons = 'te_lessons';

    // define enrollments table name
    private $enrollments = 'te_enrollments';

    // define quizs table name
    private $quizs = 'te_quizs';

    // define quiz attempts table name
    private $quiz_attempts = 'te_quiz_attempts';

    // define user progress table name
    private $user_progress = 'te_user_progress';

    // define notifications table
    private $notifications = 'te_notifications';

    /**
     * get courses table name
     *
     * @return string table name
     */
    public function get_courses_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->courses;
    }

    /**
     * get lessons table name
     *
     * @return string table name
     */
    public function get_lessons_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->lessons;
    }

    /**
     * get enrollments table name
     *
     * @return string table name
     */
    public function get_enrollments_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->enrollments;
    }

    /**
     * get quizs table name
     *
     * @return string table name
     */
    public function get_quizs_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->quizs;
    }

    /**
     * get quiz_attempts table name
     *
     * @return string table name
     */
    public function get_quiz_attempts_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->quiz_attempts;
    }

    /**
     * get user_progress table name
     *
     * @return string table name
     */
    public function get_user_progress_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->user_progress;
    }

    /**
     * get notifications table name
     *
     * @return string table name
     */
    public function get_notifications_table(){
        global $wpdb;
        
        return $wpdb->prefix . $this->notifications;
    }
 }