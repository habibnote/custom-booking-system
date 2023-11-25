<?php

namespace CBS\Src;

class Test{

    function __construct() {
        add_action( 'wp_head', [$this, 'habib_test'] );
    }

    function habib_test(){
        echo "<pre>";
        
        $registration_date = get_user_meta( 5 , 'cbs_registration_date', true );

        $date = date( "Y-m-d", $registration_date );

        echo $date;

        echo "</pre>";
    }
}