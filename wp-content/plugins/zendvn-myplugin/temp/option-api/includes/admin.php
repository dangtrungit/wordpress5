<?php
require_once ZEND_MP_PLUGIN_DIR . '/includes/support.php';

class ZendvnMpAdmin
{

    public function __construct()
    {
        // them option
        // add_action('admin_init', array($this, 'add_new_option'));

        // xoa option
        // add_action('admin_init',array($this,'delete_option'));

        // Them mang option
        // add_action('admin_init', array($this, 'add_array_option'));

        // add_action hook get option
        // add_action('admin_init', array($this, 'get_options'));

        // add_action hook update option
        add_action('admin_init', array($this, 'UpdateOption'));

        // chueyn doi chuoi
        // $temp = unserialize('a:3:{s:6:"course";s:8:"WP 5.4.1";s:6:"author";s:8:"Trung Hi";s:7:"website";s:29:"https://facebook.com/TrungHi0";}');
        // echo '<pre>';
        // print_r( $temp);
        // echo '</pre>';

    }
    
    // delete option
    public function delete_option()
    {
        // add_option('zendvn_mp_plugin_version','2.0','','yes');

        delete_option('zendvn_mp_wp_course');
    }
    // update option
    public function UpdateOption()
    {
        update_option('zendvn_mp_wp_version', '5.4.0');
        update_option('zendvn_mp_plugin_version', '2.0','','yes');
    }

    // get option

    public function get_options()
    {
        global $wpdb;
        $temp = get_option('zendvn_mp_wp_version', '');
        echo '<br> ' . $temp;
    }
    // add array option
    public function add_array_option()

    {
        $arrOption = array(
            'course' => 'WP 5.4.1',
            'author' => 'Trung Hi',
            'website' => 'https://facebook.com/TrungHi0'
        );
        add_option('zendvn_mp_wp_course', $arrOption, '', 'yes');
    }
    // add option
    public function add_new_option()
    {
        add_option('zendvn_mp_wp_version', '5.4.1', '', 'yes');
        // add_option('myplugin_demo','1.0','','no');
    }
    
}
