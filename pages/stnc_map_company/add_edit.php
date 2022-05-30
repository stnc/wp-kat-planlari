<?php

$binaId=$_GET['binaid'];
$katId=$_GET['kat'];

    $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors';
    $wp_stnc_map_building =$wpdb->prefix . 'stnc_map_building';

//    echo "SELECT bina.name AS bina,kat.name kat_adi,kat.tekno_id,kat.scheme,bina.id
//    AS bina_id,kat.id AS katid  FROM ".   $wp_stnc_map_floors." AS kat INNER JOIN ".$wp_stnc_map_building."  AS bina  ON  bina.id=1 AND kat.id = 5";
// die;
$map = $wpdb->get_row($wpdb->prepare("SELECT bina.name AS bina,kat.name kat_adi,kat.tekno_id,kat.scheme,bina.id
 AS bina_id,kat.id AS katid  FROM ".   $wp_stnc_map_floors." AS kat INNER JOIN ".$wp_stnc_map_building."  AS bina  ON  bina.id=%d AND kat.id = %d", $binaId,$katId));
  
         $scheme = $map->scheme;
    
         $binaName = $map->bina;
    
         $kat_adi = $map->kat_adi;

      
         $title ="Ekleme";
         $form = '<form action="/wp-admin/admin.php?page=stnc_map_company&st_trigger=add_save&binaid='. $_GET['binaid'] .'&kat='. $_GET['kat'] .'" method="post">';

         if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
            $title ="Düzenleme";
            $form = '<form action="/wp-admin/admin.php?page=stnc_map_company&st_trigger=update&binaid='. $_GET['binaid'] .'&kat='. $_GET['kat'] .'&id='. $_GET['id'] .'" method="post">';
         }
         include ("_header-show.php");


         $door_number_permission_check="";
         $square_meters_permission_check="";
         $email_permission_check="";
         $phone_permission_check="";
         $mobile_phone_permission_check="";
         $web_site_permission_check="";
         $company_description_permission_check="";
         $address_permission_check="";

     if ($web_permission!=""){
    
         if ($web_permission[0]["door_number_permission"]!="" && $web_permission[0]["door_number_permission"]){
             $door_number_permission_check="checked";
         }

         if ($web_permission[0]["square_meters_permission"]!="" && $web_permission[0]["square_meters_permission"]){
             $square_meters_permission_check="checked";
         }

         
         if ($web_permission[0]["email_permission"]!="" && $web_permission[0]["email_permission"]){
             $email_permission_check="checked";
         }
         
        
         if ($web_permission[0]["phone_permission"]!="" && $web_permission[0]["phone_permission"]){
             $phone_permission_check="checked";
         }
 

               
   
         if ($web_permission[0]["mobile_phone_permission"]!="" && $web_permission[0]["mobile_phone_permission"]){
             $mobile_phone_permission_check="checked";
         }
 
        
         if ($web_permission[0]["web_site_permission"]!="" && $web_permission[0]["web_site_permission"]){
             $web_site_permission_check="checked";
         }
 
 

     
         if ($web_permission[0]["company_description_permission"]!="" && $web_permission[0]["company_description_permission"]){
             $company_description_permission_check="checked";
         }

    
         if ($web_permission[0]["address_permission"]!="" && $web_permission[0]["address_permission"]){
             $address_permission_check="checked";
         }
        
     }   
    

?>

<main class="flex-shrink-0" style="margin-top:88px">


    <div class="container-fluid">


        <div> <span style="color:red"><?php echo $binaName ?> / <?php  echo $kat_adi ?> </span> için firma <?php  echo $title?> işlemi

        </div>

        <?php
                if (isset($_SESSION['stnc_map_flash_msg'] )) {
                ?>
        <p class="alert alert-danger">
            <?php echo $_SESSION['stnc_map_flash_msg']; ?>
        </p>
        <?php unset($_SESSION['stnc_map_flash_msg']); ?>
        <?php } ?>

        <?php echo $form  ?>

        <div class="row">

            <div class="col-md-4">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Firma <?php  echo $title?></h5>


                        <div class="form-group">
                            <label for="door_number"><strong>Kapi Numarasi</strong> </label>
                            <input type="number" name="door_number" value="<?php echo $door_number ?>"
                                class="form-control" id="door_number" min="1" max="100">
                            <small id="kat_numarasiHelp" class="form-text text-muted">kat numarasi sayisal olmalidir</small>
                            <br>
                         <input type="checkbox"  <?php  echo  $door_number_permission_check?>  id="door_number_permission"> Web önyüzünde görünmesin
 
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="company_name"><strong>Firma adi</strong> </label>
                            <input type="text" name="company_name" value="<?php echo $company_name ?>" class="form-control" id="company_name" min="1" max="50">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="square_meters"> <strong>Bina metrekare</strong> </label>
                            <input type="text" name="square_meters" value="<?php echo $square_meters ?>"  class="form-control" id="square_meters" min="1" max="50">
                         
                            <input type="checkbox"  <?php  echo  $square_meters_permission_check?>  id="square_meters_permission"> Web önyüzünde görünmesin
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="email"> <strong>Firma email adresi</strong> </label>
                            <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="email">
                            <input type="checkbox"   <?php  echo  $email_permission_check?>  id="email_permission"> Web önyüzünde görünmesin
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="phone"> <strong>Firma telefon</strong> </label>
                            <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" id="phone">
                            <input type="checkbox"  <?php  echo  $phone_permission_check?>   id="phone_permission"> Web önyüzünde görünmesin
                        </div>





                    </div>
                </div>

            </div>



            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="mobile_phone"> <strong>Firma cep telefon</strong> </label>
                            <input type="text" name="mobile_phone" value="<?php echo $mobile_phone ?>"
                                class="form-control" id="mobile_phone">
                                <input type="checkbox" <?php  echo  $mobile_phone_permission_check?>   id="mobile_phone_permission"> Web önyüzünde görünmesin
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="web_site"> <strong>Firma WEB sitesi</strong>  </label>
                            <input type="text" name="web_site" value="<?php echo $web_site ?>" class="form-control" id="web_site">
                            <input type="checkbox"  <?php  echo  $web_site_permission_check?>   id="web_site_permission"> Web önyüzünde görünmesin
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="company_description"> <strong>Firma hakkında detaylı bilgi</strong> </label>
                            <textarea class="form-control" name="company_description" id="company_description"
                                rows="3"><?php echo $company_description ?></textarea>
                                <input type="checkbox"  <?php  echo  $company_description_permission_check?>   id="company_description_permission"> Web önyüzünde görünmesin
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="address"><strong>Adres</strong></label>

                            <textarea class="form-control" name="address" id="address" rows="3"><?php echo $address ?></textarea>
                            <input type="checkbox"  <?php  echo  $address_permission_check?>   id="address_permission"> Web önyüzünde görünmesin
                        </div>
                        <hr>

                    </div>
                </div>
            </div>


            <div class="col-md-4">
      
            <br>
                    <br>

                <div class="form-group">
                    <input type="hidden" value="<?php echo $media_id ?>" name="media_id" id="media_id">
                    <input id="stnc_wp_kiosk_Metabox_video_extra"
                        class="page_upload_trigger_element button btn btn-warning"
                        name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="Resim Yükle / Seç" style="">
                  
                   <?php  if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) : 
                             $image = wp_get_attachment_image_src(    $media_id  ,'full' );
                    
                    ?>
                    <div class="background_attachment_metabox_container">  <img class="img-fluid" src=" <?php echo $image[0]; ?> " alt="">  </div>
                    <?php else : ?>
                    <div class="background_attachment_metabox_container">  </div>
                    <?php endif ; ?>
                </div>
                <br>
                
                <textarea id="web_permission" name="web_permission" style="display:none"></textarea>

                    <div class="form-group">
                     <button type="submit" value="Kaydet" id="savebtn-stncMap" class="btn btn-success">Kaydet</button>
                     <!-- <a  href="#" id="savebtn-stncMap2" class="btn btn-primary">json</a> -->
                    </div>


           


            </div>
        </div>

        <?php echo   '</form>' ?>
    </div>


</main>


