<?php


function stnc_wp_floor_stncStatus_ajax_request() {



    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'stnc-kiosk-ajax-script' ) ) {
        die( 'Nonce value cannot be verified.' );
    }
   // wp_send_json_success( 'It works' );
   global $wpdb;
   $id = $_POST['id'];
 

   $someJSON1 ='{"left":230,"top":293,"width":74.42500305175781,"height":26,"x":230,"y":293,"right":304.4250030517578,"bottom":319}';
//    print_r($someJSON1);

 $jsonText =$_POST['location'];
   $someJSON2 = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';
//    print_r($someJSON1);

    // echo  $tempData = html_entity_decode($_POST['location'] );
// echo $cleanData = json_decode($tempData);
// echo $jsonText = $_REQUEST['location'];
//  $d1='['.$_POST["location"].']';

// echo $d= json_encode( $_REQUEST['location']);
// echo $d= json_encode( $a);
// // var_dump(json_decode($d, true));


// Display replaced string


   $wpdb->update('wp_stnc_floor', array('location'=>$jsonText), array('id'=>$id));



   die;
}

add_action( 'wp_ajax_stnc_wp_floor_stncStatus_ajax_request', 'stnc_wp_floor_stncStatus_ajax_request' );
 
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_stnc_wp_floor_stncStatus_ajax_request', 'stnc_wp_floor_stncStatus_ajax_request' );