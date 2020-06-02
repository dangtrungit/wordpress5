<?php

/**
 * @package Zendvn Myplugin
 * @version 1.0
 */
/*
Plugin Name: Hello Zend Myplugin
Plugin URI: http://wordpress.org/plugins/
Description: Tim hieu quy trinh chuan xay dung Plugin
Author: Trung hi
Version: 1.0
Author URI: http://wordpress.org/plugins/
 */

/* action hook */

add_action('wp_footer', 'zendvn_mp_new_data',9);
add_action('wp_footer', 'zendvn_mp_hello',10);

function zendvn_mp_new_data()
{

	echo '<div>Chao mung cac ban den voi khoa lap 
			trinh Wordpress chuyen nghiep cua 
			<a href="http://facebook.com/TrungHi0">ZendVN group</a>
		</div>';
} 


function zendvn_mp_hello()
{

	echo '<div>HELLO WORLD!
		</div>';
} 

/*	DELETE 
	register_activation_hook(__FILE__, zendvn_mp_active());

function zendvn_mp_active() {
	global $wpdb;
	// TAO TABLE
	$table_name = $wpdb->prefix . "zendvn_mp_test";
	if ($wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name) {

		$sql = "CREATE TABLE `" . $table_name . "`(
        `myid` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
        `my_name` varchar(50) DEFAULT NULL,
        PRIMARY KEY (`myid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

		// echo "<br/>" . $sql;	
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta($sql);
	}

	$zendvn_mp_options = array(
		'course' => "Zend VN",
		'author' => "Zend Group",
		'website' => "www.zend.vn",
	);
	// Option API
	add_option("zendvn_mp_options", $zendvn_mp_options, "", "yes");
	$zendvn_mp_version = "1.0";
	// Option API
	add_option("zendvn_mp_version", $zendvn_mp_version, "", "yes");

	// KICH HOAT AUTOLOAD TREN DATABASE QUA HAM update cua $wpdb
	$table_name = $wpdb->prefix . "options";
	$wpdb->update(
		$table_name,
		array(
			"autoload" => 'yes',
		),
		array('option_name' => 'zendvn_mp_options'),
		// %s format ve chuoi, %d la so
		array('%s'),
		array('%s'),
	);
}	
*/
// //  Tien To
// // echo '<pre>';
// // print_r($wpdb->prefix);
// // echo '</pre>';
// // duong dan tuyet doi
// // echo ABSPATH . 'wp-admin/includes/upgrade.php';

/*
============== VI DU 2 =============
 */
// $str = 'a:3:{s:6:"course";s:7:"Zend VN";s:6:"author";s:10:"Zend Group";s:7:"website";s:11:"www.zend.vn";}';
// echo '<pre>';
// // unserialize:  DIch nguoc chuoi database ve mang
// print_r(unserialize($str));
// echo '</pre>';

// function zend_mp_active()
// {
//     $zend_mp_options = array(
//         'course'    => "Zend VN",
//         'author'    => "Zend Group",
//         'website'    => "www.zend.vn"
//     );
//     // Option API
//     add_option("zend_mp_options", $zend_mp_options, "", "yes");
// }
/*
============== VI DU 1 =============
 */

// ------------------
// function zend_mp_active(){
//         $zend_mp_version = "1.0";
//         // Option API
//         add_option("zendvn_mp_version",$zend_mp_version,"","yes");
// }
