<?php
/*
Plugin Name:  yeni Teknopark Kat Planları 
Plugin URI:			
Description: Erciyes Teknopark Kat Planları  (by stnc)
Version: 2.0.0
Author: https://github.com/stnc/wp-kat-planlari
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




include ('register_css_js.php');

require("extraOptions.php");

include ('register_Pages.php');//ek 1
include ('stnc-kiosk-ajax.php');//ajax

// include("pages/configurationPages/init.php");//ek 2
// include("pages/about/about.php");//ek 2
// include("pages/onizleme/onizleme.php");//ek 2
// include("stnc-kiosk-ajax.php");

include ('mockup-liste.php');
include ('harita.php');
include ('haritaSabit.php');

require_once "helper.php";
require_once "list_table.php";
require_once "stncForm-adminMenu-About.php";




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













