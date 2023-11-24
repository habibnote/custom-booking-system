<div class="cbs-all-slots-cart">
    <h3><?php esc_html_e( 'Selected Slots: ', 'cbs' ); ?></h3>
    <div class="cbs-all-slot-list">
        <?php 
            // Get the WC Cart instance
            $cart = WC()->cart;
            // Get cart items
            $cart_items = $cart->get_cart();
            if( ! empty( $cart_items ) ){
                foreach ( $cart_items as $cart_item_key => $cart_item ) {

                    $product_id     = $cart_item['product_id'];
                    $slot           = get_field( 'slot_date', $product_id, true );
                    $product        = wc_get_product( $product_id );
                    $product_name   = $product->get_name();
                    $slot_hours     = wp_get_post_terms( $product_id, 'slot_hour' );
                    $slot_hour      = $slot_hours[0]->name;

                    ?>
                    <div class="cbs-single-slot">
                        
                        <div class="cbs-slot-date">
                            <p> <?php esc_html_e( '▪ ' . $slot ); ?> </p>
                        </div>
                        /
                        <div class="cbs-slot-hour">
                            <p><?php esc_html_e( $slot_hour, 'esc' ); ?></p>
                        </div>
                        /
                        <div class="cbs-room-name">
                            <p><?php esc_html_e( $product_name, 'esc' ); ?></p>
                        </div>
                        /
                        <div class="cbs-remove-room">
                            <button class="cbs-btn" id="<?php esc_html_e( $product_id );?>"><?php esc_html_e( 'Remove', 'cbs' ); ?></button>
                        </div>
                    </div>
                    <?php 
                }
            } else {
                esc_attr_e( 'Nothing Found!', 'cbs' );
            }   
        ?>
    </div>
    
    <?php 
        if( ! empty( $cart_items ) ){
            ?>
                <div class="cbs-total-and-discount-code-area">
                    <div class="cbs-total-area">
                        <div class="cbs-single-cost cbs-sub-total-label">
                            <label><?php esc_html_e( 'Total Cost', 'cbs' );?></label>
                            <?php 

                                $cart       = WC()->cart;
                                $cart_total = $cart->get_cart_total();
                                $total      = $cart->total;
                            ?>

                            <span><?php echo wp_kses_post( $cart_total ) ?></span>
                        </div>
                        <div class="cbs-single-cost discount-code-area">
                            <div class="cbs-label">
                                <label><?php esc_html_e( 'Discount Code', 'cbs' ); ?></label>
                                <input id="cbs-apply-copuon" type="text">
                                <button type="button"> <?php esc_html_e( 'Apply' ); ?> </button>
                            </div>
                            <div class="price">
                                <span> - $ 8</span>
                            </div>
                        </div>
                        <div class="cbs-single-cost cbs-total-price">
                            <p>Total : <span> <?php echo wp_kses_post( $total ); ?> </span></p>
                        </div>
                    </div>
                </div>
            <?php 
        }
    ?>
    
</div>




