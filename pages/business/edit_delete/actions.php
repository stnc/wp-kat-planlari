<?php


    
function stnc_wp_floor_adminMenu_map_editor()
{
    //  map_editor_stnc



    global $wpdb;
    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors_locations' ;

    date_default_timezone_set('Europe/Istanbul');
    $date = date('Y-m-d h:i:s');

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
        $thepost = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_tableNameMain . "  WHERE id = %d", $_GET['id']));
        $door_number = $thepost->door_number;
        $company_name = $thepost->company_name;
        $square_meters = $thepost->square_meters;
        $email =  $thepost->email;
        $phone = $thepost->phone;
        $mobile_phone = $thepost->mobile_phone;
        $web_site = $thepost->web_site;
        $map_location = $thepost->map_location;
        $company_description =  $thepost->company_description;
        $address =  $thepost->address;
        $id =  $thepost->id;
          $media_id =  $thepost->media_id;
    
         $image = wp_get_attachment_image_src(    $media_id  ,'thumbnail' );
    
        include ('harita-ekle-duzenle.php');
    }

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'update')) {
        session_start();
        $door_number = isset($_POST["door_number"]) ? sanitize_text_field($_POST["door_number"]) : "0";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : " isim eklenmemiş";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : 0;
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = isset($_POST["map_location"]) ? sanitize_text_field($_POST["map_location"]) : '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : " ";
        $building_id = isset($_GET["binaid"]) ? sanitize_text_field($_GET["binaid"]) : " ";
        $floor_id = isset($_GET["kat"]) ? sanitize_text_field($_GET["kat"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : 0;
        $success =   $wpdb->update(
            $stncForm_tableNameMain,
            array(
                'building_id' =>  $building_id,
                'floor_id' =>  $floor_id,
                'door_number' =>   $door_number,
                'company_name' => $company_name,
                'square_meters' => $square_meters,
                'email' =>   $email,
                'phone' =>   $phone,
                'mobile_phone' => $mobile_phone,
                'web_site' =>   $web_site,
                'company_description' =>   $company_description,
                'address' =>   $address,
                'media_id' =>    $media_id,
                'add_date' =>   $date,
            ),
            array('id' => $_GET['id'])
        );


        if ($success) {
            $_SESSION['stnc_map_flash_msg'] = 'Kayıt Güncellendi';
            wp_redirect('/wp-admin/admin.php?page=map_editor_stnc&binaid='.$building_id.'&kat='. $floor_id.'&st_trigger=show&id='.$_GET['id'], 302);
            die;
        }
        // include ('harita-ekle-duzenle.php');
    }


    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'new')) {
        $floor_no = isset($_POST["floor_no"]) ? sanitize_text_field($_POST["floor_no"]) : "";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : "";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : '';
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = isset($_POST["map_location"]) ? sanitize_text_field($_POST["map_location"]) : '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : " ";
        include ('harita-ekle-duzenle.php');
    }



    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'add_save')) {
        session_start();
        $door_number = isset($_POST["door_number"]) ? sanitize_text_field($_POST["door_number"]) : "0";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : " isim eklenmemiş";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : 0;
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";
        $building_id = isset($_GET["binaid"]) ? sanitize_text_field($_GET["binaid"]) : " ";
        $floor_id = isset($_GET["kat"]) ? sanitize_text_field($_GET["kat"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : 0;

        $success =   $wpdb->insert(
            $stncForm_tableNameMain,
            array(
                'building_id' =>   $building_id,
                'floor_id' =>   $floor_id,
                'door_number' =>   $door_number,
                'company_name' => $company_name,
                'email' =>   $email,
                'phone' =>   $phone,
                'mobile_phone' => $mobile_phone,
                'square_meters' => $square_meters,
                'web_site' =>   $web_site,
                'map_location' =>   $map_location,
                'company_description' =>   $company_description,
                'address' =>   $address,
                'media_id' =>      $media_id ,
                'add_date' =>   $date,
            ),
        );

        // echo $wpdb->last_query;
        //  die;


        if ($success) {
            $_SESSION['stnc_map_flash_msg'] = 'Kayıt Yapıldı';
            $lastid = $wpdb->insert_id;
            wp_redirect('/wp-admin/admin.php?page=map_editor_stnc&binaid='.$building_id.'&kat='. $floor_id.'&st_trigger=show&id='. $lastid, 302);
            die;
        }

   
 
    }

}