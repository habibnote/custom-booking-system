<?php 

namespace CBS\Src;

class Ajax{

    function __construct(){
        add_action( 'wp_ajax_cbs_add_product_into_cart', [$this, 'cbs_add_product_into_cart_with_ajax'] );
    }

    /**
     * adding product by ajax
     */
    public function cbs_add_product_into_cart_with_ajax() {
        $product_id = $_POST['productId'];
        $nonce      = $_POST['_nonce'];

        //verify nonce 
        if( wp_verify_nonce( $nonce, 'cbs_nonce_p' ) ) {
            echo $product_id;

            die();
        }
    }
    
}