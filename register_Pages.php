<?php
add_action('admin_menu', 'stnc_wp_floor_MainMenu');
function stnc_wp_floor_MainMenu(){


 add_menu_page('Erciyes Teknopark Başvuruları','Teknopark Binalar', 'manage_options', 'map_homepage_stnc', 'stnc_wp_floor_adminMenu_map_homepage_stnc','dashicons-networking',67); ////burası main menuyu ekler yani üst ksıım 
 add_submenu_page( "map_homepage_stnc", 'Kat', 'Ayarlar', 'manage_options', 'stncTekForm', 'stnc_wp_floor_render_list_page' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "map_homepage_stnc", 'Kat', 'Shortcut', 'manage_options', 'stncShort', 'stnc_wp_floor_shortcut_page' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( null, 'Kat', 'Harita Sabit', 'manage_options', 'map_view_stnc', 'stnc_wp_floor_adminMenu_map_view_stnc' ); ////burası alt kısım onun altında olacak olan bolum için 


 add_submenu_page( null, 'Kat', 'Harita', 'manage_options', 'map_editor_stnc', 'stnc_wp_floor_adminMenu_map_editor' ); ////burası alt kısım onun altında olacak olan bolum için 

 add_submenu_page( null, 'Kat', 'Harita Sabit', 'manage_options', 'building_map_editor_stnc', 'stnc_wp_floor_adminMenu_map_editor_stnc' ); ////binannın kat panı haritası ekleme düzenleme yeri
//  add_submenu_page( "map_homepage_stnc", 'Kat', 'Harita', 'manage_options', 'map_editor_stnc', 'stnc_wp_floor_adminMenu_map' ); ////burası alt kısım onun altında olacak olan bolum için 
//  add_submenu_page( "map_homepage_stnc", 'Kat', 'Harita Sabit', 'manage_options', 'map_view_stnc', 'stnc_wp_floor_adminMenu_map_view_stnc' ); ////burası alt kısım onun altında olacak olan bolum için 

}


function stnc_wp_floor_shortcut_page()
{
    global $wpdb;

//https://diveinwp.com/create-shortcode-in-wordpress-multiple-parameters/ 

$wp_stnc_map_floors1 =$wpdb->prefix . 'stnc_map_building';
$sql = "SELECT * FROM " . $wp_stnc_map_floors1 . ' ';
    $buildingsList = $wpdb->get_results($sql);
    foreach ($buildingsList as $building) :
?>
        <?php echo "<div style='color:red'>"?> <?php echo $building->name ?> <?php echo "</div>"?>
      
        <?php  $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors where tekno_id='.$building->id.'';
        $sql = "SELECT * FROM " . $wp_stnc_map_floors . ' ';
    
        $buildingsList = $wpdb->get_results($sql);
            foreach ($buildingsList as $building) : ?>
               <?php echo $building->name ?>
               <?php echo "<br>"?>
             <?php endforeach ; ?>
          
    <?php endforeach ;


 } 
?>