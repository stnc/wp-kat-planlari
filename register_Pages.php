<?php
add_action('admin_menu', 'stnc_wp_floor_MainMenu',65);
function stnc_wp_floor_MainMenu(){


 add_menu_page('Erciyes Teknopark Başvuruları','Teknopark Binalar', 'manage_options', 'map_homepage_stnc', 'stnc_wp_floor_adminMenu_homepage','dashicons-networking'); ////burası main menuyu ekler yani üst ksıım 
 add_submenu_page( "map_homepage_stnc", 'Kat', 'Ayarlar', 'manage_options', 'stncTekForm', 'stnc_wp_floor_render_list_page' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( null, 'Kat', 'Harita Sabit', 'manage_options', 'map_view_stnc', 'stnc_wp_floor_adminMenu_map_view_stnc' ); ////burası alt kısım onun altında olacak olan bolum için 


 add_submenu_page( null, 'Kat', 'Harita', 'manage_options', 'map_editor_stnc', 'stnc_wp_floor_adminMenu_map_editor' ); ////burası alt kısım onun altında olacak olan bolum için 

 add_submenu_page( null, 'Kat', 'Harita Sabit', 'manage_options', 'building_map_editor_stnc', 'stnc_wp_floor_adminMenu_map_editor_stnc' ); ////binannın kat panı haritası ekleme düzenleme yeri
//  add_submenu_page( "map_homepage_stnc", 'Kat', 'Harita', 'manage_options', 'map_editor_stnc', 'stnc_wp_floor_adminMenu_map' ); ////burası alt kısım onun altında olacak olan bolum için 
//  add_submenu_page( "map_homepage_stnc", 'Kat', 'Harita Sabit', 'manage_options', 'map_view_stnc', 'stnc_wp_floor_adminMenu_map_view_stnc' ); ////burası alt kısım onun altında olacak olan bolum için 

}


