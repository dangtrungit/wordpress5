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
 * Huong doi tuong action hook "cach 1"
 */

class PluginDemo
{
	function newFooter()
	{
		echo "Hello AAAAAAAAAAAAAAAAA<br>";
	}
}

$plugindDemo = new PluginDemo();
// $plugindDemo->newFooter();

add_action('wp_footer',array($plugindDemo,'newFooter'));
/**
 * Huong doi tuong action hook "cach 2"
 */
class PluginDemo2
{

	public function __construct()
	{
		add_action('wp_footer',array($this,'newFooter2'));
		add_action('wp_footer',array($this,'newFooter3'));
	}

	function newFooter2()
	{
		echo "Hello CCCCCCCCCCCCCCCCCCCCCCC<br>";
	}
	function newFooter3()
	{
		echo "Hello BBBBBBBBBBBBBBBBBBBB<br>";
	}
}
new PluginDemo2();
/**
 * Huong doi tuong action hook "cach 3"
 */
class PluginDemo3
{

	public static function init(  )
	{
		add_action('wp_footer',array(__CLASS__,'newFooter2'));
		add_action('wp_footer',array(__CLASS__,'newFooter3'));
	}

	static function  newFooter2()
	{
		echo "Hello SS<br>";
	}

	 static function  newFooter3()
	{
		echo "Hello CSS <br>";
	}
}

PluginDemo3::init();


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
