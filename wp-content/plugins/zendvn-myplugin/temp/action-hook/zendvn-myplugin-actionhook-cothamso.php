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
add_action('new_action_hook', 'new_action_callback',10,2);
 function new_action_callback($a,$b)
{
	echo "Hello : " . $a . $b;
}

function new_action_hook_aaa($a = 'Dang trung ', $b= 'BBBBBBBBBBBBBBBBB')
{
	do_action('new_action_hook',$a,$b);
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