<?php
add_action('admin_menu', 'stnc_wp_floor_MainMenu');
function stnc_wp_floor_MainMenu(){


 add_menu_page('Erciyes Teknopark Başvuruları','Teknopark Binalar', 'manage_options', 'stnc_map_homepage', 'stnc_wp_floor_adminMenu_stnc_map_homepage','dashicons-networking',67); ////burası main menuyu ekler yani üst ksıım 
 add_submenu_page( "stnc_map_homepage", 'Kat', 'Firmalar Listesi', 'manage_options', 'stnc_map_firmalar', 'stnc_wp_floor_render_list_page',null ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stnc_map_homepage", 'Kat', 'Shortcut', 'manage_options', 'stncShort', 'stnc_wp_floor_shortcut_page' ,null); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stnc_map_homepage", 'Kat', 'Hakkında', 'manage_options', 'stncHakknda', 'stnc_wp_floor_plans_adminMenu_About_contents',null ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( null, 'Kat', 'Harita Sabit', 'manage_options', 'stnc_map_view', 'stnc_wp_floor_adminMenu_stnc_map_view',null ); ////burası alt kısım onun altında olacak olan bolum için 


 add_submenu_page( null, 'Kat', 'Harita', 'manage_options', 'stnc_map_company', 'stnc_wp_floor_adminMenu_stnc_map_company',null ); ////burası alt kısım onun altında olacak olan bolum için 

 add_submenu_page( null, 'Kat', 'Harita Sabit', 'manage_options', 'stnc_map_editor_building', 'stnc_wp_floor_adminMenu_stnc_map_editor_stnc',null ); ////binannın kat panı haritası ekleme düzenleme yeri
//  add_submenu_page( "stnc_map_homepage", 'Kat', 'Harita', 'manage_options', 'stnc_map_company', 'stnc_wp_floor_adminMenu_map' ); ////burası alt kısım onun altında olacak olan bolum için 
//  add_submenu_page( "stnc_map_homepage", 'Kat', 'Harita Sabit', 'manage_options', 'stnc_map_view', 'stnc_wp_floor_adminMenu_stnc_map_view' ); ////burası alt kısım onun altında olacak olan bolum için 

}
