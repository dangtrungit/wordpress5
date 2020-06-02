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

class PlugindemoFilter
{
	public function postTitle()
	{
		return "ABC TRUNG";
	}
}
$pl = new PlugindemoFilter();
add_filter('the_title', array($pl, 'postTitle'));

// ==================================

