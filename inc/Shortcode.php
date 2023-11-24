<?php 

namespace CBS\Src;

class Shortcode{

    function __construct(){
        add_shortcode( 'cbs_booking', [$this, 'cbs_booking'] );
        add_shortcode( 'cbs_review', [$this, 'cbs_review'] );
        add_shortcode( 'cbs_payment', [$this, 'cbs_payment'] );
        add_shortcode( 'cbs_conformation', [$this, 'cbs_conformation'] );

        add_action( 'wp_ajax_cbs_get_posts_by_date', [$this, 'cbs_date_meta_process'] );
        add_action( 'wp_ajax_cbs_remove_product_from_cart', [$this, 'cbs_remove_product_from_cart'] );
    }

    /**
     * Main Shortcode
     */
    function cbs_booking() {
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
                                            <?php cbs_slot_loop( $term->name, date('Ymd') ); ?>
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
                        <div class="cbs-hour disable"><?php esc_html_e( 'Afrernoon', 'cbs' ); ?></div>
                        <?php 

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
                                            <?php cbs_slot_loop( $term->name, date('Ymd') ); ?>
                                        </div>
                                    </div>
                                <?php 
                            }
                        ?>
                    </div>
                </div>
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

    /**
     * 
     */
    function cbs_review() {
        ?>

            <div class="cbs-container">

                <div class="cbs-tab-section">
                    <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Select Slots', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-review-tab"><?php esc_html_e( 'Review', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-payment-tab"><?php esc_html_e( 'Payment', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-confirm-tab"><?php esc_html_e( 'Confirmation', 'cbs' ); ?></div>
                </div>

                <div class="review-area content">
                    <?php include_once( CBS_DIR . "/template/review.php" );?>
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

    /**
     * 
     */
    function cbs_payment() {
        ?>

            <div class="cbs-container">

                <div class="cbs-tab-section">
                    <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Select Slots', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-review-tab"><?php esc_html_e( 'Review', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-payment-tab"><?php esc_html_e( 'Payment', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-confirm-tab"><?php esc_html_e( 'Confirmation', 'cbs' ); ?></div>
                </div>

                <div class="payment-area content">
                    <?php include_once( CBS_DIR . "/template/payment.php" );?>
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

    function cbs_conformation() {
        ?>

            <div class="cbs-container">

                <div class="cbs-tab-section">
                    <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Select Slots', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-review-tab"><?php esc_html_e( 'Review', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-payment-tab"><?php esc_html_e( 'Payment', 'cbs' ); ?></div> >
                    <div class="cbs-tab cbs-confirm-tab"><?php esc_html_e( 'Confirmation', 'cbs' ); ?></div>
                </div>

                <div class="confirm-area content">
                    <h3>Thanks for your confirmation</h3>
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



    /**
     * Remove product form cart
     */
    function cbs_remove_product_from_cart() {
        $nonce      = $_POST['_nonce'];
        $product_id = $_POST['product_ID_r'];

        if( wp_verify_nonce( $nonce, 'cbs_nonce' ) ) {
            
            // if ( is_admin() ) return;
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                if ( $cart_item['product_id'] == $product_id ) {
                    WC()->cart->remove_cart_item( $cart_item_key );
                    wp_send_json_success();
                    break;
                }
            }
            die();
        }
    }

     /**
     * Date meta process
     */
    function cbs_date_meta_process() {

        $cbs_date   = $_POST['cbs_date'];
        $cbs_nonce  = $_POST['_nonce'];

        if( wp_verify_nonce( $cbs_nonce, 'cbs_nonce' ) ) {
            ?>
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
                                        <?php cbs_slot_loop( $term->name, $cbs_date ); ?>
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
                    <div class="cbs-hour disable"><?php esc_html_e( 'Afrernoon', 'cbs' ); ?></div>
                    <?php 

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
                                        <?php cbs_slot_loop( $term->name, $cbs_date ); ?>
                                    </div>
                                </div>

                            <?php 
                        }
                    ?>
                </div>
            <?php
        }
        die();
    }
}