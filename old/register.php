
<?php

// load css into the website's front-end
function stncForm_enqueue_style3()
{
//    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    wp_enqueue_style('stnc-style-boot', plugins_url('assets/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('stnc-style-style2', plugins_url('assets/css/stnc.css', __FILE__));
 //   wp_enqueue_style('stnc-style-animate', plugins_url('assets/css/animate.css', __FILE__));
  //  wp_enqueue_style('stnc-style-kat', plugins_url('assets/css/kat-plani.css', __FILE__));
    
}

if ((isset($_GET['page'])) && ($_GET['page'] === 'stnc_map_homepage')) {
add_action('admin_enqueue_scripts', 'stncForm_enqueue_style3');
add_action('admin_enqueue_scripts', 'custom_script_in_admin');
}


function custom_script_in_admin($hook) {


    
    wp_register_script( 'stnc-bootstrap',plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.bundle.min.js', '',true );
    wp_enqueue_script('stnc-bootstrap');   
    
    wp_register_script( 'stnc-my',plugin_dir_url( __FILE__ ) . 'assets/js/my.js', '',true );
    wp_enqueue_script('stnc-my');
}




 function admin_body_class( $classes = '' ) {
    $onboarding_class = isset( $_GET['page'] ) && 'stnc_map_homepage' === $_GET['page'] ? 'stnc-header-page' : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $classes .= ' ' . $onboarding_class . ' ';

    return $classes;

}
add_action( 'admin_body_class',  'admin_body_class' );



include ('menu1.php');



/*
// load css into the login page
function mytheme_enqueue_login_style() {
    wp_enqueue_style( 'mytheme-options-style', get_template_directory_uri() . '/css/login.css' ); 
}
add_action( 'login_enqueue_scripts', 'mytheme_enqueue_login_style' );

*/


// Load plugin text-domain

// $locale = apply_filters('plugin_locale', get_locale(), 'CHfw-staff');

// load_textdomain('CHfw-staff', WP_LANG_DIR . 'CHfw-staff/CHfw-staff-' . $locale . '.mo');
// load_plugin_textdomain('CHfw-staff', false, plugin_basename(dirname(__FILE__)) . '/languages');






add_filter('manage_staff_posts_columns', 'CHfw_add_img_column');
add_filter('manage_staff_posts_custom_column', 'CHfw_manage_img_column', 10, 2);



if (isset( $_GET['page'] ) && 'stnc_map_homepage' === $_GET['page'] ){

    add_action('admin_notices', function () {
      echo 'My notice';
    });


    function my_hide_notices_to_all_but_super_admin(){
       
            remove_all_actions( 'user_admin_notices' );
            remove_all_actions( 'admin_notices' );
        
   }
   add_action('in_admin_header', 'my_hide_notices_to_all_but_super_admin', 99);
 
}


require_once "helper.php";
require_once "list_table.php";
require_once "stncForm-adminMenu-About.php";

/** ************************ Menu Defined  ****************************
 *******************************************************************************
 * Now we just need to define an admin page. For this example, we'll add a top-level
 * menu item to the bottom of the admin menus.
 */


 
add_action('admin_menu', 'StncMainMenu');
function StncMainMenu(){
//     add_menu_page('Erciyes Teknopark Başvuruları','Teknopark Form', 'manage_options', 'stncTekForm', 'tt_render_list_page','dashicons-networking'); ////burası main menuyu ekler yani üst ksıım 
//  //   add_submenu_page( 'stncTekForm', 'Ayarlar', 'Ayarlar', 'manage_options', 'stGnlolOptions', 'stncForm_adminMenu_About_contents' ); ////burası alt kısım onun altında olacak olan bolum için 
//  add_submenu_page( "stncTekForm", 'Kat', 'Ayarlar', 'manage_options', 'stnc_map_homepage', 'stncForm_adminMenu_About_contentsTest' ); ////burası alt kısım onun altında olacak olan bolum için 



 add_menu_page('Erciyes Teknopark Başvuruları','Teknopark KAtlar', 'manage_options', 'stnc_map_homepage', 'stncForm_adminMenu_About_contentsTest','dashicons-networking'); ////burası main menuyu ekler yani üst ksıım 
 //   add_submenu_page( 'stncTekForm', 'Ayarlar', 'Ayarlar', 'manage_options', 'stGnlolOptions', 'stncForm_adminMenu_About_contents' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stnc_map_homepage", 'Kat', 'Ayarlar', 'manage_options', 'stncTekForm', 'tt_render_list_page' ); ////burası alt kısım onun altında olacak olan bolum için 

}