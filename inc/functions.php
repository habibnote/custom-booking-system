<?php 

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
        );
        $query = new \WP_Query($args);
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