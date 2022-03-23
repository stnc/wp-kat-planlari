<?php

    //allow redirection, even if my theme starts to send output to the browser

    function stnc_wp_floor_adminMenu_map_view_stnc()
    {

        global $wpdb;
    $binaId=$_GET['binaid'];
    $katId=$_GET['kat'];

    $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors';
    $wp_stnc_map_building =$wpdb->prefix . 'stnc_map_building';
   
     $map = $wpdb->get_row($wpdb->prepare("SELECT bina.name AS bina,kat.name kat_adi,kat.tekno_id,kat.scheme,bina.id
      AS bina_id,kat.id AS katid  FROM ".   $wp_stnc_map_floors." AS kat INNER JOIN ".$wp_stnc_map_building."  AS bina  ON  bina.id=%d AND kat.id = %d", $binaId,$katId));
        //    print_r( $thepost );
        //   $door_number = isset($_POST["door_number"]) ? sanitize_text_field($_POST["door_number"]) : "0";
        echo  $scheme = $map->scheme;
        echo '<br>';
    echo     $binaName = $map->bina;
    echo '<br>';
    echo $kat_adi = $map->kat_adi;
         die;

       $results = array();
        $stncForm_tableNameMain = $wpdb->prefix . 'stnc_map_floors_locations';
          $sql = "SELECT * FROM " . $stncForm_tableNameMain . ' WHERE building_id='.$binaId.' and  floor_id='.$katId.'';

        $results = $wpdb->get_results($sql);
        $i = 0;
        $top = 88;

        
        if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
            include ('map_view.php');
        }
    
        if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'map_editor')) {
          
            include ('map_draggrable-map-editor.php');
        }
    }

    