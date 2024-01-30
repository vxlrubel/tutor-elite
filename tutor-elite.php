<?php
/*
 * Plugin Name:       Tutor Elite
 * Plugin URI:        https://github.com/vxlrubel/tutor-elite
 * Description:       Transform your WordPress site into a dynamic educational platform with Tutor Elite—an advanced LMS plugin. Effortlessly create courses, quizzes, and assignments, all while enjoying a user-friendly interface, robust analytics, and customizable design options for an enhanced teaching and learning experience.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rubel Mahmud ( Sujan )
 * Author URI:        https://www.linkedin.com/in/vxlrubel/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain:       tutor-elite
 * Domain Path:       /lang
 */

//  directly access denied
defined('ABSPATH') || exit;

if ( file_exists( dirname(__FILE__) . '/vendor/autoload.php' ) ){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

final class TutorElite{
    
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
        $this-define_constant();
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
}

function tutor_elite(){
    return TutorElite::get_instance();
}

tutor_elite();