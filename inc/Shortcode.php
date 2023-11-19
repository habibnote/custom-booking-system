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
                <div class="cbs-tab cbs-selected-tab">Select Slots</div> >
                <div class="cbs-tab cbs-review-tab">Review</div> >
                <div class="cbs-tab cbs-payment-tab">Payment</div> >
                <div class="cbs-tab cbs-confirm-tab">Confirmation</div>
            </div>
            
            <div class="cbs-form-area">
                <div class="calender-area">
                    <div class="date-picker-container">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="hour-picker">
                    <div class="left-area">
                        <div class="cbs-hour">Morning</div>
                        <div class="cbs-hour">
                            <p>07h-08h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>08h-09h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>09h-10h</p>
                        <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>10h-11h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>11h-12h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>12h-13h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>13h-14h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                    </div>
                    <div class="right-area">
                        <div class="cbs-hour disable">Afrernoon</div>
                        <div class="cbs-hour">
                            <p>07h-08h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>08h-09h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>09h-10h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>10h-11h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>11h-12h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>12h-13h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
                        <div class="cbs-hour">
                            <p>13h-14h</p>
                            <div class="cbs-room">
                                <p>Room: 01</p>
                                <p>Room: 02</p>
                                <p>Room: 03</p>
                                <p>Room: 04</p>
                            </div>
                        </div>
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