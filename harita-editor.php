<?php

$stncForm_tableNameMain = $wpdb->prefix . 'stnc_floor_building';

function stnc_wp_floor_adminMenu_map()
{
    global $wpdb;
    global $stncForm_tableNameMain;

    date_default_timezone_set('Europe/Istanbul');
    $date = date('Y-m-d h:i:s');


    if ((isset($_GET['add'])) && ($_GET['add'] === 'ok')) {
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
        include ('haritaHtml.php');
     
    }

    if ((isset($_GET['show'])) && ($_GET['show'] === 'ok')) {
        $thepost = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_tableNameMain . "  WHERE id = %d", $_GET['edit']));
        //    print_r( $thepost );
        //   $floor_no = isset($_POST["floor_no"]) ? sanitize_text_field($_POST["floor_no"]) : "0";
        $floor_no = $thepost->floor_no;
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
        include ('haritaHtml.php');
 
    }

    if ((isset($_POST['kaydet'])) && ($_POST['kaydet'] === 'guncelle')) {
        $floor_no = isset($_POST["floor_no"]) ? sanitize_text_field($_POST["floor_no"]) : "0";
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
        $success =   $wpdb->update(
            $stncForm_tableNameMain,
            array(
                'building_id' => 1,
                'floor_id' => 1,
                'floor_no' =>   $floor_no,
                'company_name' => $company_name,
                'square_meters' => $square_meters,
                'email' =>   $email,
                'phone' =>   $phone,
                'mobile_phone' => $mobile_phone,

                'web_site' =>   $web_site,

                'company_description' =>   $company_description,
                'address' =>   $address,
                'media_id' =>   1,
                'add_date' =>   $date,
            ),
            array('id' => $_POST['id'])
        );

        //   echo $wpdb->last_query;
        //   die;


        if ($success) {
            echo '<h3>Kayıt güncellendi</h3>';
        }

       include ('haritaHtml.php');
 
    }

    if ((isset($_POST['kaydet'])) && ($_POST['kaydet'] === 'yeniKaydet')) {
        $floor_no = isset($_POST["floor_no"]) ? sanitize_text_field($_POST["floor_no"]) : "0";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : " isim eklenmemiş";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : 0;
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = isset($_POST["map_location"]) ? sanitize_text_field($_POST["map_location"]) : '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";

        $success =   $wpdb->insert(
            $stncForm_tableNameMain,
            array(
                'building_id' => 1,
                'floor_id' => 1,
                'floor_no' =>   $floor_no,
                'company_name' => $company_name,
                'email' =>   $email,
                'phone' =>   $phone,
                'mobile_phone' => $mobile_phone,
                'square_meters' => $square_meters,
                'web_site' =>   $web_site,
                'map_location' =>   $map_location,
                'company_description' =>   $company_description,
                'address' =>   $address,
                'media_id' =>   1,
                'add_date' =>   $date,
            ),
        );



        if ($success) {
            echo '<h3>Kayıt yapıldı</h3>';
        }

        include ('haritaHtml.php');
 
    }
}