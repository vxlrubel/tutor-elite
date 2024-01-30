<?php

namespace Tutor\Inc;

defined('ABSPATH') || exit;

/**
 * create Assets class for load scripts file
 * 
 * @author Rubel Mahmud
 * @link https://github.com/vxlrubel
 * @version 1.0
 */
class Assets{

    public function __construct(){

        // register frontend scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'register_frontend_scripts' ] );

        // register admin scripts
        add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_scripts' ] );
    }

    /**
     * register and enqueue frontend scripts
     *
     * @return void
     */
    public function register_frontend_scripts(){

        $get_style   = $this->get_frontend_style();
        $get_scripts = $this->get_frontend_scripts();

        // enqueue style
        foreach ( $get_style as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : '';
            wp_enqueue_style(
                $handle,
                $style['src'],
                $deps,
                TE_VERSION,
                'all'
            );
        }

        // enqueue scripts
        foreach ( $get_scripts as $handle => $script ) {
            wp_enqueue_script(
                $handle,
                $script['src'],
                $deps,
                TE_VERSION,
                true
            );
        }
    }

    /**
     * register admin scripts
     *
     * @return void
     */
    public function register_admin_scripts(){
        $get_style   = $this->get_admin_style();
        $get_scripts = $this->get_admin_script();

        // enqueue style
        foreach ( $get_style as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : '';
            wp_enqueue_style(
                $handle,
                $style['src'],
                $deps,
                TE_VERSION,
                'all'
            );
        }

        // enqueue scripts
        foreach ( $get_scripts as $handle => $script ) {
            wp_enqueue_script(
                $handle,
                $script['src'],
                $deps,
                TE_VERSION,
                true
            );
        }
    }

    /**
     * get frontend style for enqueue
     *
     * @return [type] (array) $style
     */
    private function get_frontend_style(){
        $style = [
            'te-style' => [
                'src'=> TE_ASSETS . 'css/main.css'
            ]
        ];

        return $style;
    }

    /**
     * get frontend style for enqueue
     *
     * @return [type] (array) $style
     */
    private function get_admin_style(){
        $style = [
            'te-admin-style' => [
                'src'=> TE_ASSETS_ADMIN . 'css/admin-style.css'
            ]
        ];

        return $style;
    }
    
    /**
     * get frontend scripts for enqueue
     *
     * @return [type] (array) $scripts
     */
    private function get_frontend_scripts(){
        $scripts = [
            'te-script' =>[
                'src'  => TE_ASSETS . 'js/custom.js',
                'deps' => ['jquery']
            ]
        ];

        return $scripts;
    }

    /**
     * get frontend scripts for enqueue
     *
     * @return [type] (array) $scripts
     */
    private function get_admin_script(){
        $scripts = [
            'te-admin-script' =>[
                'src'  => TE_ASSETS_ADMIN . 'js/admin-script.js',
                'deps' => ['jquery']
            ]
        ];

        return $scripts;
    }
}