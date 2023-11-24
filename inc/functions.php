<?php 

if( ! function_exists( 'cbs_all_ordered_product' ) ) {
    function cbs_all_ordered_product() {

        $orders = wc_get_orders(
            [
                'limit' => -1,
            ]
        );
        
        $item_ids = [];
        
        foreach ( $orders as $order ) {
            
            $items = $order->get_items();
            // Loop through items
            foreach ( $items as $item ) {
                $item_id = $item->get_product_id(); //this is not a error
                // Add item ID to the array
                $item_ids[] = $item_id;
            }
        }
        
        if( ! empty($item_ids) ) {
            $item_ids = array_unique($item_ids);
        }
        
        return $item_ids; 
    }
}

if( ! function_exists( 'cbs_slot_loop' ) ) {
    function cbs_slot_loop( $term_name, $meta_value ) {

        $args = array(
            'post_type' => 'product',
            'post_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'slot_hour',
                    'field'     => 'slug',
                    'terms'     => $term_name,
                ),
            ),
            'meta_query' => array(
                array(
                    'key'       => 'slot_date',
                    'value'     => $meta_value,
                    'compare'   => '=',
                ),
            ),
            'order' => 'ASC',
        );
        $query = new WP_Query($args);
        if( $query->have_posts() ) {
            while( $query->have_posts() ) {
                $query->the_post();
                ?>
                    <p class="cbs-single-room" id="<?php esc_html_e( get_the_ID() ); ?>"><?php the_title(); ?></p>
                <?php 
            }
            wp_reset_postdata();
        }
        else{
            echo "<p>No Room Avaiable here</p>";
        }
            
    }
}