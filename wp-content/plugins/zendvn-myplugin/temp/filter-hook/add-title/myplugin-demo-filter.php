<?php

/**
 * @package  Myplugin Demo
 * @version 1.0
 */
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

 add_filter('the_title', 'myplugin_post_title',10);
 function myplugin_post_title(){
	 return "New title for post by Trung";
 }


// $src = dirname(__FILE__) . '';
// $dst = dirname(__FILE__,2) . '\temp\zendvn-myplugin';
// echo $newfile;

// 	// Kiểm tra file cần copy có tồn tại hay không
// 	if (file_exists($dst)) rmdir($dst);
//   if (is_dir($src)) {
//     mkdir($dst);
//     $files = scandir($src);
//     foreach ($files as $file)
//     if ($file != "." && $file != "..") copy("$src/$file", "$dst/$file");
//   }
//   else if (file_exists($src)) copy($src, $dst);
