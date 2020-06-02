<?php
/*
Plugin Name: Myplugin Demo
Plugin URI: http://wordpress.org/plugins/
Description: Tim hieu quy trinh chuan xay dung Plugin
Author: Trung hi
Version: 1.0
Author URI: https://www.facebook.com/TrungHi0
 */

/**
 * filter hook
 * */

define('ZEND_MP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ZEND_MP_PLUGIN_DIR', plugin_dir_path(__FILE__));
echo '<br/>'. ZEND_MP_PLUGIN_DIR;
echo '<br/>'. ZEND_MP_PLUGIN_URL;


if (!is_admin()) {
	require_once ZEND_MP_PLUGIN_DIR . '/includes/public.php';
	new ZendvnMP();
}else{
	
}