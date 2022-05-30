<?php 

add_shortcode( 'stnc_building', 'stnc_map_building_shortcode' );
//https://diveinwp.com/create-shortcode-in-wordpress-multiple-parameters/ 

// [stnc_building title="tekno 1" id="12"]



	/**
	 * Output the form.
	 *
	 * @param      array  $atts   User defined attributes in shortcode tag
	 */
	function stnc_map_building_shortcode( $attr ) {

    global $wpdb;
    
    $args = shortcode_atts( array(
      'title' => '#',
      'id' => '1',
    ), $attr );

    if ($args['id']==""){
    return 'Missing parameter';
    }

    // if (isset( $_GET['firma'] ) ){
    //   echo "sdds";
     
    // } else {


    // }

   $wp_stnc_map_floors1 =$wpdb->prefix . 'stnc_map_floors_locations WHERE floor_id='.$args['id'].'';
   echo $sql = "SELECT * FROM " . $wp_stnc_map_floors1 . ' ';


    $buildingsList = $wpdb->get_results($sql);



    $door_number_permission_check=false;
    $square_meters_permission_check=false;
    $email_permission_check=false;
    $phone_permission_check=false;
    $mobile_phone_permission_check=false;
    $web_site_permission_check=false;
    $company_description_permission_check=false;
    $address_permission_check=false;

  


?>
   
<div class="business-container">
<?php
foreach ($buildingsList as $building) : 

  $web_permission= $building -> web_permission;
  
  if ($web_permission!=""){

    if ($web_permission[0]["door_number_permission"]!="" && $web_permission[0]["door_number_permission"]){
        $door_number_permission_check=true;
    }

    if ($web_permission[0]["square_meters_permission"]!="" && $web_permission[0]["square_meters_permission"]){
        $square_meters_permission_check=true;
    }

    if ($web_permission[0]["email_permission"]!="" && $web_permission[0]["email_permission"]){
        $email_permission_check=true;
    }
    
    if ($web_permission[0]["phone_permission"]!="" && $web_permission[0]["phone_permission"]){
        $phone_permission_check=true;
    }

    if ($web_permission[0]["mobile_phone_permission"]!="" && $web_permission[0]["mobile_phone_permission"]){
        $mobile_phone_permission_check=true;
    }

    if ($web_permission[0]["web_site_permission"]!="" && $web_permission[0]["web_site_permission"]){
        $web_site_permission_check=true;
    }

    if ($web_permission[0]["company_description_permission"]!="" && $web_permission[0]["company_description_permission"]){
        $company_description_permission_check=true;
    }

    if ($web_permission[0]["address_permission"]!="" && $web_permission[0]["address_permission"]){
        $address_permission_check=true;
    }
}

    $image = wp_get_attachment_image_src(   $building -> media_id ,'full' );
 ?>
  <div class="grid-display">

    <div class="row">
  
        <div class="img-area col-3 cl-left">
          <figure>
            <a  target="_target" href="http://yeni.erciyesteknopark.com/firma/abis-teknoloji/">
              <img src="<?php echo  $image[0] ?>" class="img-responsive- rt-team-img" alt="<?php echo $building->company_name ?>" loading="lazy" width="197" height="78">
            </a>
          </figure>
        </div>

        <div class="rttm-content-area col-9 cl-left">
        
            <span class="team-name">
              <a  target="_blank" title="<?php echo $building->company_name ?>" href="<?php echo $building->web_site ?>"><?php echo $building->company_name ?></a>
            </span>



  



          <?php if  ($company_description_permission_check) : ?>
            <?php if  ($building->company_description!="") : ?>
            <div class="short-bio">
              <p><?php echo $building->company_description ?></p>
            </div>
            <?php endif; ?>
          <?php endif; ?>

          <div class="contact-info">
            <ul>
            <?php if  ($email_permission_check) : ?>  
            <?php if ($building->email!="") : ?>
              <li>
                <i class="far fa-envelope"></i>
                <a href="mailto:<?php echo $building->email ?>">
                  <span class="tlp-email"><?php echo $building->email ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if  ($phone_permission_check) : ?>  
              <?php if ($building->phone!="") : ?>
              <li>
                <i class="fa fa-phone"></i>
                <a href="tel:<?php echo $building->phone ?>" class="tlp-phone"><?php echo $building->phone ?></a>
              </li>
              <?php endif; ?>
              <?php endif; ?>

              <?php if  ($mobile_phone_permission_check) : ?>  
              <?php if ($building->mobile_phone!="") : ?>
              <li class="tlp-fax">
                <i class="fa fa-fax"></i>
                <a href="fax:<?php echo $building->mobile_phone ?>">
                  <span>Cep Telefonu: <?php echo $building->mobile_phone ?></span>
                </a>
              </li>
              <?php endif; ?>
              <?php endif; ?>
              
              <?php if  ($address_permission_check) : ?>  
              <?php if ($building->address!="") : ?>
              <li>
                <i class="fa fa-map-marker"></i>
                <span class="tlp-location"><?php echo $building->address ?></span>
              </li>
              <?php endif; ?>
              <?php endif; ?>

              <?php if  ($web_site_permission_check) : ?>  
              <?php if ($building->web_site!="") : ?>
              <li>
                <a target="_blank" href="<?php echo $building->web_site ?>">
                  <i class="fa fa-globe"></i>
                  <span class="tlp-url"><?php echo $building->web_site ?></span>
                </a>
              </li>
              <?php endif; ?>
              <?php endif; ?>
            </ul>


          </div>




        </div>
        
    </div>
    
  </div>
  <?php endforeach ; ?>
</div>



    <?php
	}

