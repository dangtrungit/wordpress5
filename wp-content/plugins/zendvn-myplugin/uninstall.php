<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}
// register_uninstall_hook(__FILE__, zendvn_mp_uninstall());
zendvn_mp_uninstall();
function zendvn_mp_uninstall()
{
    global $wpdb;
    // OPTION API
    delete_option('zendvn_mp_active_version');
    delete_option('zendvn_mp_active_option');
    delete_option('zendvn_mp_options');
    delete_option('zendvn_mp_version');
    delete_option('zend_mp_version');
    delete_option('zend_mp_options');

    $table_name = $wpdb ->prefix .'zendvn_mp_test';
    $sql = 'DROP TABLE IF EXISTS '.$table_name;
    $wpdb->query($sql);
  
}
