<?php


function stnc_wp_floor_stncStatus_ajax_request() {
    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'stnc-kiosk-ajax-script' ) ) {
        die( 'Nonce value cannot be verified.' );
    }
   // wp_send_json_success( 'It works' );
   global $wpdb;
   $location = $_POST['location'];
   $location = $_POST['location'];
   $wpdb->update('wp_stnc_floor', array('id'=>$id, 'title'=>$title, 'location'=>$position), array('id'=>$id));



   die;
}

add_action( 'wp_ajax_stnc_wp_floor_stncStatus_ajax_request', 'stnc_wp_floor_stncStatus_ajax_request' );
 
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_stnc_wp_floor_stncStatus_ajax_request', 'stnc_wp_floor_stncStatus_ajax_request' );