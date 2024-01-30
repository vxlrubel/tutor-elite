<?php
/*
 * Plugin Name: Tutor Elite
 * Plugin URI: https://github.com/vxlrubel/tutor-elite
 * Description: Transform your WordPress site into a dynamic educational platform with Tutor Elite—an advanced LMS plugin. Effortlessly create courses, quizzes, and assignments, all while enjoying a user-friendly interface, robust analytics, and customizable design options for an enhanced teaching and learning experience.
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Rubel Mahmud ( Sujan )
 * Author URI: https://www.linkedin.com/in/vxlrubel/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain: tutor-elite
 * Domain Path: /lang
 */

//  directly access denied
defined('ABSPATH') || exit;

if ( file_exists( dirname(__FILE__) . '/vendor/autoload.php' ) ){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Tutor\Inc\Assets;
USE Tutor\Inc\Trait\Table;

/**
 * This is the final class it's not extendable
 * 
 * @version 1.0
 * @author Rubel Mahmud
 * @link https://www.linkedin.com/in/vxlrubel/
 */
final class TutorElite{

    use Table;

    // set plugin version
    private $version = '1.0.0';

    // set instance
    private static $instance;

    /**
     * create single tone evil
     *
     * @return void
     */
    public static function get_instance(){
        if ( is_null( self::$instance ) ){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * create default method
     */
    public function __construct(){

        // define constant
        $this->define_constant();

        new Assets;

        register_activation_hook( __FILE__, [ $this, 'create_database_table' ] );
    }

    /**
     * define constant
     *
     * @return void
     */
    public function define_constant(){
        define( 'TE_VERSION', $this->version );
        define( 'TE_ASSETS', trailingslashit( plugins_url( 'assets', __FILE__ ) ) );
        define( 'TE_ASSETS_ADMIN', trailingslashit( TE_ASSETS . 'admin' ) );
    }

    /**
     * create database table
     *
     * @return void
     */
    public function create_database_table(){
        
        // create courses table
        $this->create_courses_table();

        // create lessons table
        $this->create_lessons_table();

        // create enrollments table
        $this->create_enrollments_table();

        // create quiz table
        $this->create_quiz_table();

        // create quiz_attempts table
        $this->create_quiz_attempts_table();

        // create user progress table
        $this->create_user_progress_table();

        // create notifications table
        $this->create_notifications_table();
    }

    /**
     * create quiz_attempts table
     *
     * @return void
     */
    private function create_notifications_table(){
        global $wpdb;
        $table           = $this->get_notifications_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            user_id INT,
            content TEXT,
            timestamp DATETIME,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }
    
    /**
     * create quiz_attempts table
     *
     * @return void
     */
    private function create_user_progress_table(){
        global $wpdb;
        $table           = $this->get_user_progress_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            user_id INT,
            lesson_id INT,
            progress_percentage INT,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }

    /**
     * create quiz_attempts table
     *
     * @return void
     */
    private function create_quiz_attempts_table(){
        global $wpdb;
        $table           = $this->get_quiz_attempts_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            quiz_id INT,
            user_id INT,
            attempt_date DATETIME,
            score INT,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }

    /**
     * create quiz table
     *
     * @return void
     */
    private function create_quiz_table(){
        global $wpdb;
        $table           = $this->get_quizs_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            lesson_id INT,
            title VARCHAR(255),
            questions_count INT, 
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }

    /**
     * create enrollments table
     *
     * @return void
     */
    private function create_enrollments_table(){
        global $wpdb;
        $table           = $this->get_enrollments_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            course_id INT,
            user_id INT,
            enrollment_date DATETIME,
            completion_status VARCHAR(20), 
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }

    /**
     * create lessons table
     *
     * @return void
     */
    private function create_lessons_table(){
        global $wpdb;
        $table           = $this->get_lessons_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            course_id BIGINT(20) DEFAULT NULL,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }

    /**
     * create courses table
     *
     * @return void
     */
    private function create_courses_table(){
        global $wpdb;
        $table           = $this->get_courses_table();
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table(
            id INT NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            instructor_id BIGINT(20) DEFAULT NULL,
            price DECIMAL(10, 2),
            status VARCHAR(20) NOT NULL DEFAULT 'publish',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        $wpdb->query( $sql );
    }

}

function tutor_elite(){
    return TutorElite::get_instance();
}

tutor_elite();