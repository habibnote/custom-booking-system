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
        add_action('woocommerce_before_checkout_process', [ $this,  'custom_fill_address_fields'] );
        
        // add_filter('woocommerce_checkout_fields', [$this, 'custom_override_checkout_fields'] );
        
        
        // Remove address validation
        // add_filter('woocommerce_checkout_process', '__return_false');

        new Src\Admin();
        new Src\Shortcode();
        new Src\Ajax();
    }

    /**
     * FUll up all before order
     */
    function custom_fill_address_fields() {
        // Get the current user
        $user = wp_get_current_user();
    
        // Check if the user is logged in
        if ($user->ID > 0) {
            // Get the user's billing address
            $billing_address = get_user_meta($user->ID, 'billing_address', true);
    
            // Get the user's shipping address
            $shipping_address = get_user_meta($user->ID, 'shipping_address', true);
    
            // Set the billing address
            WC()->customer->set_billing_address($billing_address['address_1'], $billing_address['address_2'], $billing_address['city'], $billing_address['postcode'], $billing_address['country'], $billing_address['state']);
    
            // Set the shipping address
            WC()->customer->set_shipping_address($shipping_address['address_1'], $shipping_address['address_2'], $shipping_address['city'], $shipping_address['postcode'], $shipping_address['country'], $shipping_address['state']);
        }
    }

    /**
     * 
     */
    // function custom_override_checkout_fields($fields) {
    //     unset($fields['billing']);
    //     unset($fields['shipping']);
    //     return $fields;
    // }

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

            //put data into javascript file
            wp_localize_script( 'cbs-front-js', 'CBS_ajax', array(
                'url'       => admin_url( 'admin-ajax.php' ),
                'nonce'     => wp_create_nonce( 'cbs_nonce' ),
            ) );
            wp_localize_script( 'cbs-ajax-js', 'CBS_ajax', array(
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

