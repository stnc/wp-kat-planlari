<?php
/*
Plugin Name:  Teknopark Binalar
Plugin URI:	https://github.com/stnc/wp-kat-planlari		
Description: Erciyes Teknopark Kat Planları
Version: 2.0.0
Author: selman tunç
Text Domain: stnc-wp-floor-plans
Domain Path: /languages/
*/ 
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

header('Content-type: application/json');

$stnc_wp_floor_plans_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit
$stnc_wp_floor_post_type = get_post_type($stnc_wp_floor_plans_postID);//get type
$stnc_wp_floor_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new



// define('stnc_wp_floor_plans_PATH', plugin_dir_path(__FILE__) . 'metaBox/');

add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

include ('register_Pages.php');//mvc gibi düşün 

include ('register_css_js.php');

include ('installTable.php');

require("extraOptions.php");



include ('01-home.php');

include ('pages/stnc_map_company/actions.php');
include ('pages/stnc_map_editor_building/actions.php');
include ('pages/stnc_map_view/actions.php');
<<<<<<< HEAD
include ('pages/stnc_map_view/ajax.php');
=======
>>>>>>> 1980e93c9fd880dbb4b6a284676117b93502790e


require_once "helper.php";
require_once "pages/stncForm_company_list.php";
require_once "pages/stncForm-adminMenu_About.php";
require_once "pages/shortcut/shortcode_generate_page.php";
require_once "pages/shortcut/shortcode_embed.php";



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


