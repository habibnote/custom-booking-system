<?php 
/*
 * Plugin Name:       Custom Booking System
 * Plugin URI:        https://me.habibnote.com
 * Description:       This pluign used for custom bookign system.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7
 * Author:            Md. Habib
 * Author URI:        https://me.habibnote.com
 * Text Domain:       cbs
 * Domain Path:       /languages
*/

namespace CBS;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Plugin Main class
 */
final class CBS {
    
    static $instance = false;

    function __construct() {

        //load autoloader
        require_once "vendor/autoload.php";
        require_once "inc/functions.php";
        require_once "inc/ACF.php";

        $this->define();
        //load all hooks
        $this->hooks();
    }

    /**
     * define all constant
     */
    private function define() {
        define( 'CBS', __FILE__ );
        define( 'CBS_DIR', dirname( CBS ) );
        define( 'CBS_ASSET', plugins_url( 'assets', CBS ) );
    }

    /**
     * All hooks
     */
    private function hooks() {

        //load all assets
        add_action( 'wp_enqueue_scripts', [$this, 'cbs_load_front_assets'] );

        new Src\Admin();
        new Src\Shortcode();
        new Src\Ajax();
        new Src\User();
        new Src\Test();
    }

    /**
     * Load Front Assets
     */
    function cbs_load_front_assets() {

        //load front assets
        if( ! is_admin() ) {

            //load all css
            wp_enqueue_style( 'cbs-front-css',  plugins_url( '/assets/front/css/front.css', __FILE__ ), array(), time(), 'all' );

            //load all js
            wp_enqueue_script( 'cbs-front-js', plugins_url( 'assets/front/js/front.js', __FILE__ ), ['jquery','jquery-ui-datepicker'], time(), true );
            wp_enqueue_script( 'cbs-ajax-js', plugins_url( 'assets/front/js/ajax.js', __FILE__ ), ['jquery'], time(), true );

            /**
             * Current user subscription date
             */
            global $wpdb;

            $cbs_user_id    = get_current_user_id();
            $cbs_user_info  = get_user_by( 'ID', $cbs_user_id );

            if ( $cbs_user_info ) {

                //get user email
                $user_email         = $cbs_user_info->user_email;
                //get Member record from Simple WordPress Membership
                $cbs_memberRecord   = $wpdb->get_row("SELECT * FROM `wp_swpm_members_tbl` WHERE email=$user_email");

                //get Data
                $cbs_subscribe_date     = $cbs_memberRecord->subscription_starts ?? '';
                $cbs_subscribe_label    = $cbs_memberRecord->membership_level ?? '';
                $cbs_subscribe_status   = $cbs_memberRecord->account_state ?? '';
            }

            $cbs_start_date = '2023-10-11';
            $cbs_end_date   = '2023-10-12';

            // label = 2 basic, label = 3 pro, label = 4 premium
            if( $cbs_subscribe_label == 2 && $cbs_subscribe_status == 'active' ) {
                $cbs_start_date = $cbs_subscribe_date;  
                $cbs_end_date   = cbs_get_after_date( $cbs_subscribe_date, 'P6W' );
            }
            else if( $cbs_subscribe_label == 3 && $cbs_subscribe_status == 'active' ) {
                $cbs_start_date = $cbs_subscribe_date;  
                $cbs_end_date   = cbs_get_after_date( $cbs_subscribe_date, 'P11W' );
            }
            else if( $cbs_subscribe_label == 4 && $cbs_subscribe_status == 'active' ) {
                $cbs_start_date = $cbs_subscribe_date;  
                $cbs_end_date   = cbs_get_after_date( $cbs_subscribe_date, 'P6M' );
            }

            $user = wp_get_current_user();

            if ( in_array('administrator', $user->roles) ) {
                $cbs_start_date = '';
                $cbs_end_date   = '';
            }

            //put data into javascript file
            wp_localize_script( 'cbs-front-js', 'CBS_ajax', array(
                'url'       => admin_url( 'admin-ajax.php' ),
                'nonce'     => wp_create_nonce( 'cbs_nonce' ),
                'user_start'=> $cbs_start_date,
                'user_end'  => $cbs_end_date,
            ) );
            wp_localize_script( 'cbs-ajax-js', 'CBS_ajax_a', array(
                'url'       => admin_url( 'admin-ajax.php' ),
                'nonce'     => wp_create_nonce( 'cbs_nonce' ),
            ) );
        }
    }

    /**
     * Singleton Instance
     */
    static function get_cbs() {
        
        if( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/**
 * Cick off the plugin
 */
CBS::get_cbs();

