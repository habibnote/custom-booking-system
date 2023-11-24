<?php 

namespace CBS\Src;

class Ajax{

    function __construct(){
        add_action( 'wp_ajax_cbs_add_product_into_cart', [$this, 'cbs_add_product_into_cart_with_ajax'] );

        add_action( 'wp_ajax_cbs_apply_oupon_code', [$this, 'cbs_apply_oupon_code'] );
    }

    /**
     * apply copouon code
     */
    function cbs_apply_oupon_code() {
        $nonce          = $_POST['_nonce'];
        $coupon_code    = $_POST['copouon_code'];

        if( wp_verify_nonce( $nonce, 'cbs_nonce' ) ) {

            // Get the WC_Cart instance
            $cart = WC()->cart;

            // Check if the coupon is not already applied
            $applied_coupons = $cart->get_applied_coupons();
            
            if ( ! in_array( $coupon_code, $applied_coupons ) ) {

                //apply coupon
                $applied_coupons[] = $coupon_code;
                WC()->cart->set_applied_coupons( $applied_coupons );

                //get coupon discount amount
                $discount_amount = $cart->get_coupon_discount_amount( $coupon_code );
                $discount_amount = wc_price( $discount_amount );

                wp_send_json_success(
                    [
                        'message'   => 'Coupon is Applied',
                        'amount'    => $discount_amount,
                    ]
                );
            }else{
                wp_send_json_error( 
                    [
                        'message'   => 'Coupon is not valid!',
                    ] 
                );
            }
        }
        die();
     }

    /**
     * adding product by ajax
     */
    public function cbs_add_product_into_cart_with_ajax() {
        $product_id = $_POST['productId'];
        $nonce      = $_POST['_nonce'];

        //verify nonce 
        if( wp_verify_nonce( $nonce, 'cbs_nonce' ) ) {
            // echo $product_id;

            if( wc_get_product( $product_id ) ) {
                // Add the product to the cart
                WC()->cart->add_to_cart( $product_id );

                wp_send_json_success();
            }else{
                wp_send_json_error();
            }
            die();
        }
    }
    
}