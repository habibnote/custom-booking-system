<div class="cbs-all-slots-cart">
    <h3><?php esc_html_e( 'Selected Slots: ', 'cbs' ); ?></h3>
    <div class="cbs-all-slot-list">
            <?php 
                // Get the WC Cart instance
                $cart = WC()->cart;
                // Get cart items
                $cart_items = $cart->get_cart();
                foreach ($cart_items as $cart_item_key => $cart_item) {
                    ?>
                    <div class="cbs-single-slot">
                        
                        <div class="cbs-slot-date">
                            <p> 2023/03/12</p>
                        </div>
                        /
                        <div class="cbs-slot-hour">
                            <p>07h - 09h</p>
                        </div>
                        /
                        <div class="cbs-room-name">
                            <p>room 1</p>
                        </div>
                        /
                        <div class="cbs-remove-room">
                            <button product-id=""><?php esc_html_e( 'Remove', 'cbs' ); ?></button>
                        </div>
                    </div>
                    <?php 
                }
            ?>
        
    </div>
</div>