<?php
add_action('admin_menu', 'stnc_wp_floor_MainMenu',65);
function stnc_wp_floor_MainMenu(){
//     add_menu_page('Erciyes Teknopark Başvuruları','Teknopark Form', 'manage_options', 'stncTekForm', 'tt_render_list_page','dashicons-networking'); ////burası main menuyu ekler yani üst ksıım 
//  //   add_submenu_page( 'stncTekForm', 'Ayarlar', 'Ayarlar', 'manage_options', 'stGnlolOptions', 'stncForm_adminMenu_About_contents' ); ////burası alt kısım onun altında olacak olan bolum için 
//  add_submenu_page( "stncTekForm", 'Kat', 'Ayarlar', 'manage_options', 'stncFullPage', 'stncForm_adminMenu_About_contentsTest' ); ////burası alt kısım onun altında olacak olan bolum için 



 add_menu_page('Erciyes Teknopark Başvuruları','Teknopark KAtlar', 'manage_options', 'stncFullPage', 'stnc_wp_floor_adminMenu_About_contentsTest','dashicons-networking'); ////burası main menuyu ekler yani üst ksıım 
 //   add_submenu_page( 'stncTekForm', 'Ayarlar', 'Ayarlar', 'manage_options', 'stGnlolOptions', 'stncForm_adminMenu_About_contents' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stncFullPage", 'Kat', 'Ayarlar', 'manage_options', 'stncTekForm', 'stnc_wp_floor_render_list_page' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stncFullPage", 'Kat', 'Harita', 'manage_options', 'stncTekmap', 'stnc_wp_floor_adminMenu_map' ); ////burası alt kısım onun altında olacak olan bolum için 

}


