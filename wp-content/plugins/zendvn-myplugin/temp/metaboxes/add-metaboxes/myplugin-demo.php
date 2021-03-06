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
define('ZEND_MP_IMAGES_URL', ZEND_MP_PLUGIN_URL . 'images');
define('ZEND_MP_CSS_URL', ZEND_MP_PLUGIN_URL . 'css');
define('ZEND_MP_JS_URL', ZEND_MP_PLUGIN_URL . 'js');

define('ZEND_MP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ZEND_MP_VIEWS_DIR', ZEND_MP_PLUGIN_DIR . 'views');
define('ZEND_MP_UPLOADS_DIR', ZEND_MP_PLUGIN_DIR . 'uploads');
define('ZEND_MP_INCLUDES_DIR', ZEND_MP_PLUGIN_DIR . 'includes');
define('ZEND_MP_WIDGET_DIR', ZEND_MP_PLUGIN_DIR . 'widgets');
define('ZEND_MP_SHORTCODE_DIR', ZEND_MP_PLUGIN_DIR . 'shortcodes');
define('ZEND_MP_METABOX_DIR', ZEND_MP_PLUGIN_DIR . 'metaboxes');
// echo '<br/>'. ZEND_MP_VIEWS_DIR;
// echo '<br/>'. ZEND_MP_PLUGIN_URL;


if (!is_admin()) {
	require_once ZEND_MP_PLUGIN_DIR . '/includes/public.php';
	// new ZendvnMP();
} else {
	require_once ZEND_MP_PLUGIN_DIR . '/includes/admin.php';
	require_once ZEND_MP_PLUGIN_DIR . '/includes/html.php';
	new ZendvnMpAdmin();

	require_once ZEND_MP_WIDGET_DIR . '/db_simple.php';
	new Zendvn_Widget_Db_Simple();
	
	// Đăng kí widget
	add_action('widgets_init', function () {
		register_widget('Zendvn_Mp_Widget_Simple');
	});
}
// ============================ ĐĂNG KÍ WIDGET ============================
// Đăng kí widget
require_once ZEND_MP_WIDGET_DIR . '/simple.php';
// CAch 1 regis
add_action('widgets_init', function () {
	register_widget('Zendvn_Mp_Widget_Simple');
});

// Đăng kí widget
require_once ZEND_MP_WIDGET_DIR . '/last_post.php';
add_action(
	'widgets_init',
	function () {
		register_widget('Zendvn_Mp_Widget_Last_Post');
	}
);


// ============================ META BOX ============================
require_once ZEND_MP_METABOX_DIR . '/main.php';
new Zendvn_Mp_MB_Main();
// ============================ SHORTCODE ============================
//show date time
require_once ZEND_MP_SHORTCODE_DIR . '/main.php';
new Zendvn_Mp_SC_Main();


// ============================ ============================
// CAch 2 regis
// add_action('widgets_init','zendvn_mp_register_widge}t');
// function zendvn_mp_register_widget()
// {
// 	register_widget('Zendvn_Mp_Widget_Simple');
// }

// CAch 1 unregis
// add_action('widgets_init', function () {
// 	unregister_widget('Zendvn_Mp_Widget_Simple');
// });
// CAch 2 unregis
// add_action('widgets_init','zendvn_mp_remove_widget');
// function zendvn_mp_remove_widget()
// {
// 	unregister_widget('Zendvn_Mp_Widget_Simple');
// }
