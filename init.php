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

include ('stnc-kiosk-ajax.php');//ajax

include ('01-home.php');

include ('pages/business/edit_delete/actions.php');
include ('pages/business/view/actions.php');
include ('pages/building/edit_delete/actions.php');


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



/**
 * Add the shortcode '[wpcfu2_form]'.
 */

add_shortcode( 'wpcfu2_form', 'wpcfu2_output_file_upload_form' );


if ( ! function_exists( 'wpcfu2_output_file_upload_form' ) ) {

	/**
	 * Output the form.
	 *
	 * @param      array  $atts   User defined attributes in shortcode tag
	 */
	function wpcfu2_output_file_upload_form( $atts ) {
		$atts = shortcode_atts( array(), $atts ); ?>
        <style>

.business-container figure {
  position: relative;
  width: 100%;
}
.business-container a {
  text-decoration: none;
  box-shadow: none;
  border: none !important;
}

.business-container .img-responsive {
  display: block;
  max-width: 100%;
  width: 100%;
  height: auto;
}

.business-container a {
  text-decoration: none;
  box-shadow: none;
  border: none !important;
}

.business-container figure {
  position: relative;
  width: 100%;
}
.business-container  .short-bio p {
  margin-bottom: 10px;
}

.business-container .contact-info {
  margin: 0px;
  padding: 0px 0px 10px 0px;
}

.business-container .contact-info ul {
  margin: 0px;
  padding: 0px;
  list-style: none;
}

.business-container .contact-info ul li {
  margin: 0px;
  padding: 0px;
  line-height: 22px;
  list-style: none !important;
  border: none;
  background: no-repeat;
}
.business-container a {
  text-decoration: none;
  box-shadow: none;
  border: none !important;
}
.business-container .contact-info i {
  width: 20px;
  margin-right: 4px;
  text-align: center;
  color: #0367bf;
}
.business-container .contact-info ul li + li {
  margin-top: 10px;
}
.team-name a{
    font-size: 30px;
font-size: 3rem;
font-family: 'Poppins',sans-serif;
line-height: 1.3;color: #3B69E1;
}
.business-container{
    padding-bottom:10px;
}
        </style>
<div class="business-container">
<div class="grid-display">
  <div class="row">
 
      <div class="img-area col-3 cl-left">
        <figure>
          <a class="" data-id="8889" target="_self" href="http://yeni.erciyesteknopark.com/firma/abis-teknoloji/">
            <img src="http://yeni.erciyesteknopark.com/wp-content/uploads/2022/02/abislogo.png" class="img-responsive rt-team-img" alt="ABİS TEKNOLOJİ" loading="lazy" width="197" height="78">
          </a>
        </figure>
      </div>
      <div class="rttm-content-area col-9 cl-left">
       
          <span class="team-name">
            <a class="" data-id="8889" target="_self" title="ABİS TEKNOLOJİ" href="http://yeni.erciyesteknopark.com/firma/abis-teknoloji/">ABİS TEKNOLOJİ</a>
          </span>
        
        <div class="short-bio">
          <p>ABİS TEKNOLOJİ LTD.ŞTİ.</p>
        </div>
        <div class="contact-info">
          <ul>
            <li>
              <i class="far fa-envelope"></i>
              <a href="mailto:info@abisteknoloji.com.tr">
                <span class="tlp-email">info@abisteknoloji.com.tr</span>
              </a>
            </li>
            <li>
              <i class="fa fa-phone"></i>
              <a href="tel:+90 (352) 380 00 10" class="tlp-phone">+90 (352) 380 00 10</a>
            </li>
            <li class="tlp-fax">
              <i class="fa fa-fax"></i>
              <a href="fax:+90 (352) 380 00 11">
                <span>+90 (352) 380 00 11</span>
              </a>
            </li>
            <li>
              <i class="fa fa-map-marker"></i>
              <span class="tlp-location">Erciyes Üniversitesi Teknoloji Geliştirme Bölgesi Tekno-1 Binası Giriş Kat No:11, KAYSERİ</span>
            </li>
            <li>
              <a target="_blank" href="https://www.abisteknoloji.com.tr/">
                <i class="fa fa-globe"></i>
                <span class="tlp-url">https://www.abisteknoloji.com.tr/</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
 
<?php
	}
}
