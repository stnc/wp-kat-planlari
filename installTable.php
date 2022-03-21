<?php

function stnc_wp_floor_database_install1()
{
    global $wpdb;
    $stncForm_tableNameMain = 'stnc_floor_building';
    $charset_collate = $wpdb->get_charset_collate();
     $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
            id INT NOT NULL AUTO_INCREMENT,
            building_id tinyint DEFAULT NULL,
            floor_id tinyint DEFAULT NULL,  
            door_number tinyint DEFAULT NULL,
            company_name varchar(255) DEFAULT NULL,
            square_meters varchar(255) DEFAULT NULL,
            email varchar(255) DEFAULT NULL,
            phone varchar(255) DEFAULT NULL,
            mobile_phone varchar(255) DEFAULT NULL,
     
            web_site varchar(255) DEFAULT NULL,
            map_location varchar(255) DEFAULT NULL,
            company_description TEXT DEFAULT NULL,
            address TEXT DEFAULT NULL,
            media_id INT DEFAULT NULL,
            add_date DATETIME NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta($sql);
    // echo $wpdb->last_error;
}

register_activation_hook(__FILE__, 'stnc_wp_floor_database_install1');

add_action('admin_init', 'stnc_wp_floor_database_install1');

function stnc_wp_floor_remove_database()
{

    global $wpdb;
    global $stncForm_tableNameMain;

    $sql = "DROP TABLE IF EXISTS " . $wpdb->prefix . $stncForm_tableNameMain . "";
    $wpdb->query($sql);
    //  delete_option("my_plugin_db_version");
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_uninstall_hook(__FILE__, 'stnc_wp_floor_remove_database');
register_deactivation_hook(__FILE__, 'stnc_wp_floor_remove_database');

// function stncForm_load_textdomain()
// {
//     load_plugin_textdomain('stnc', false, dirname(plugin_basename(__FILE__)) . '/i18n/languages/');
// }

// add_action('plugins_loaded', 'stncForm_load_textdomain');

// add_action('admin_init','stncForm_remove_database');