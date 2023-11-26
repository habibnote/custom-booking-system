<?php

namespace CBS\Src;

class Test{

    function __construct() {
        add_action( 'wp_head', [$this, 'habib_test'] );
    }

    function habib_test(){
        global $wpdb;

        echo "<pre>";  
        
        

        echo "</pre>";


    }
}