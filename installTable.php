<?php
$stncForm_tableNameMain = 'wp_stnc_floor';
function stnc_wp_floor_database_install()
{
    global $wpdb;
    global $stncForm_tableNameMain;
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
            id INT NOT NULL AUTO_INCREMENT,
            bina_id tinyint DEFAULT NULL,
            kat_id tinyint DEFAULT NULL,  
            kat_numarasi tinyint DEFAULT NULL,
            firma_adi varchar(255) DEFAULT NULL,
            metrekare varchar(255) DEFAULT NULL,
            email varchar(255) DEFAULT NULL,
            telefon varchar(255) DEFAULT NULL,
            mobile_telefon varchar(255) DEFAULT NULL,
            mail_adresi varchar(255) DEFAULT NULL,
            web_site varchar(255) DEFAULT NULL,
            harita_konumu varchar(255) DEFAULT NULL,
            firma_aciklama TEXT DEFAULT NULL,
            adresi TEXT DEFAULT NULL,
            media_id INT DEFAULT NULL,
            eklenme_tarihi DATETIME NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    //  dbDelta($sql);
    // echo $wpdb->last_error;
}

register_activation_hook(__FILE__, 'stnc_wp_floor_database_install');

add_action('admin_init', 'stnc_wp_floor_database_install');

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