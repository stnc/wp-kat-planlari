<?php


//onyuze ekleme yapacak 
add_action( 'wp_enqueue_scripts', 'stnc_wp_floor_front' );
function stnc_wp_floor_front() {
    wp_enqueue_style( 'custom-gallery', plugins_url( '/assets/css/stnc-building-front.css' , __FILE__ ) );
    // wp_enqueue_script( 'custom-gallery', plugins_url( '/js/gallery.js' , __FILE__ ) );
    wp_register_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css' );
    wp_enqueue_style('Font_Awesome');
}




// load css into the website's front-end
function stnc_wp_floor_MainMenu_enqueue_style()
{
//    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    wp_enqueue_style('stnc-style-boot', plugins_url('assets/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('stnc-style-style2', plugins_url('assets/css/stnc-admin.css', __FILE__));


}



function stnc_wp_floor_script_in_admin($hook) {
 



    wp_register_script( 'stnc-bootstrap',plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.bundle.min.js', '',true );
    wp_enqueue_script('stnc-bootstrap');   
    

    wp_register_script( 'stnc-my',plugin_dir_url( __FILE__ ) . 'assets/js/my.js', array('jquery') );
    wp_enqueue_script('stnc-my');

    wp_enqueue_media();

}


function stnc_wp_floor_map_script_in_admin($hook) {    
    wp_register_script( 'stnc-map',plugin_dir_url( __FILE__ ) . 'assets/js/plain-draggable.js', '',true );
    wp_enqueue_script('stnc-map');
}





if ((isset($_GET['page'])) && ($_GET['page'] === 'stnc_map_homepage')) {
    stnc_wp_floor_all_scritps();
}

if ((isset($_GET['page'])) && ($_GET['page'] === 'stnc_map_editor_stnc')) {

    stnc_wp_floor_all_scritps();
    add_action('admin_enqueue_scripts', 'stnc_wp_floor_map_script_in_admin');
   
}

if ((isset($_GET['page'])) && ($_GET['page'] === 'stnc_map_view')) {  

    stnc_wp_floor_all_scritps();
    add_action('admin_enqueue_scripts', 'stnc_wp_floor_map_script_in_admin');

 }


 if ((isset($_GET['page'])) && ($_GET['page'] === 'stnc_map_editor_building')) {

    stnc_wp_floor_all_scritps();
    add_action('admin_enqueue_scripts', 'stnc_wp_floor_map_script_in_admin');
   
}

 function stnc_wp_floor_all_scritps(){
    add_action('admin_enqueue_scripts', 'stnc_wp_floor_MainMenu_enqueue_style');
    add_action('admin_enqueue_scripts', 'stnc_wp_floor_script_in_admin');
 }