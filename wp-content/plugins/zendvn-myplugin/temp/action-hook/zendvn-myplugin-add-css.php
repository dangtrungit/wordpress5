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


/**
 * show vi tri page dang o dau ???
 */
add_action('wp_footer', 'zendvn_mp_footer');

function zendvn_mp_footer()
{
	echo  "<br> PAge : " . is_page();
}
/* action hook add css*/
add_action('wp_head', 'zendvn_mp_new_css');

function zendvn_mp_new_css()
{
	if (is_page() == true) {
		$cssUrl = plugins_url('/css/abc.css', __FILE__);
		$cssUrl2 = plugins_url('', __FILE__);
		$css = "<link rel = 'stylesheet' type='text/css' media='all' href= '" . $cssUrl . "'/>";
		echo $css;
	}
}




// $src = dirname(__FILE__) . '';


// $dst = dirname(__FILE__, 2) . '\temp';
// echo $newfile;

// // Kiểm trf (file_exists ($dst)) 
// if (file_exists ($dst)) 
//      rmdir ($dst); 
//     if (is_dir ($src)) { 
//      mkdir ($dst); 
//      $files = scandir ($src); 
//      foreach ($files as $file) 
//       if ($file != "." && $file != "..") 
//        copy ("$src/$file", "$dst/$file"); 

//     } else if (file_exists ($src)) 
//      copy ($src, $dst); 
//         rmdir ($src); 
