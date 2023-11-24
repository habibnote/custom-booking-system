<div class="cbs-tab-section">
    <?php 
        if(is_page( 'booking' )){
            ?>
                <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Select Slots', 'cbs' ); ?></div> 
            <?php
        }else{
            ?>
                <div class="cbs-tab"><?php esc_html_e( 'Select Slots', 'cbs' ); ?></div> 
            <?php
        }
    ?>
    >
    <?php 
        if(is_page( 'review' )){
            ?>
                <div class="cbs-tab cbs-review-tab cbs-selected-tab"><?php esc_html_e( 'Review', 'cbs' ); ?></div>
            <?php
        }else{
            ?>
                <div class="cbs-tab"><?php esc_html_e( 'Review', 'cbs' ); ?></div>
            <?php
        }
    ?>
     >
     <?php 
        if(is_page( 'payment' )){
            ?>
                <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Payment', 'cbs' ); ?></div>
            <?php
        }else{
            ?>
                <div class="cbs-tab"><?php esc_html_e( 'Payment', 'cbs' ); ?></div>
            <?php
        }
    ?>
     >
     <?php 
        if(is_page( 'confirmation' )){
            ?>
                <div class="cbs-tab cbs-selected-tab"><?php esc_html_e( 'Confirmation', 'cbs' ); ?></div>
            <?php
        }else{
            ?>
                <div class="cbs-tab"><?php esc_html_e( 'Confirmation', 'cbs' ); ?></div>
            <?php
        }
    ?>
    
</div>