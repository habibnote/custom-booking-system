<?php 

namespace CBS\Src;

class Shortcode{

    function __construct(){
        add_shortcode( 'cbs_main', [$this, 'cbs_shortcode'] );
    }
    /**
     * Main Shortcode
     */
    function cbs_shortcode() {
        ?>
        <div class="cbs-container">

            <div class="cbs-tab-section">
                <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Select Slots', 'cbs' ); ?></div> >
                <div class="cbs-tab cbs-review-tab"><?php esc_html_e( 'Review', 'cbs' ); ?></div> >
                <div class="cbs-tab cbs-payment-tab"><?php esc_html_e( 'Payment', 'cbs' ); ?></div> >
                <div class="cbs-tab cbs-confirm-tab"><?php esc_html_e( 'Confirmation', 'cbs' ); ?></div>
            </div>
            
            <div class="cbs-form-area">
                <div class="calender-area">
                    <div class="date-picker-container">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="hour-picker">
                    <div class="left-area">
                        <div class="cbs-hour"><?php esc_attr_e( 'Morning', 'cbs' ); ?></div>
                        <?php 
                            $terms = get_terms( 'slot_hour', array( 'hide_empty' => false ) );
                            $i = 0;
                            foreach( $terms as $term ) {
                                ?>
                                    <div class="cbs-hour">
                                        <p><?php esc_html_e( $term->name ); ?></p>

                                        <div class="cbs-room">

                                            <?php 
                                                $args = array(
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy'  => 'slot_hour',
                                                            'field'     => 'slug',
                                                            'terms'     => $term->name,
                                                        ),
                                                    ),
                                                );
                                                $query = new \WP_Query($args);
                                                while( $query->have_posts() ) {
                                                    $query->the_post();

                                                    ?>
                                                        <p id="<?php esc_html_e( get_the_ID() ); ?>"><?php the_title(); ?></p>
                                                    <?php 
                                                }
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>

                                <?php 
                                $i++;
                                if( $i > 6 ) {
                                    break;
                                }
                            }
                        ?>
                    </div>
                    <div class="right-area">
                        <div class="cbs-hour disable">Afrernoon</div>
                        <?php 
                            $terms = get_terms( 'slot_hour', array( 'hide_empty' => false ) );

                            $i = 0;
                            foreach( $terms as $term ) {
                                $i++;
                                if( $i < 8 ) {
                                    continue;
                                }
                                ?>
                                    <div class="cbs-hour">
                                        <p><?php esc_html_e( $term->name ); ?></p>
                                        <div class="cbs-room">
                                            <?php 
                                                $args = array(
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy'  => 'slot_hour',
                                                            'field'     => 'slug',
                                                            'terms'     => $term->name,
                                                        ),
                                                    ),
                                                );
                                                $query = new \WP_Query($args);
                                                while( $query->have_posts() ) {
                                                    $query->the_post();
                                                    ?>
                                                        <p id="<?php esc_html_e( get_the_ID() ); ?>"><?php the_title(); ?></p>
                                                    <?php 
                                                }
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>

                                <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="review-area content">
                <h3>This is review area</h3>
            </div>

            <div class="payment-area content">
                <h3>This is Payment area</h3>
            </div>

            <div class="confirm-area content">
                <h3>This is Confirm area</h3>
            </div>

            <div class="all-button">
                <div class="prev-area">
                    <button type="button" id="btn">Prev</button>
                </div>
                <div class="btn-area">
                    <button type="button" id="btn">Next</button>
                </div>
            </div>

        </div>
       <?php 
    }
}