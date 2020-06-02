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


    // if (is_admin()) {
    //     require_once dirname(__FILE__). '/includes/admin.php';
    // }else{
    //     require_once  dirname(__FILE__). '/includes/public.php';
    // }

    $path = dirname(__FILE__). '/includes/admin.php';
    // plugin_dir_path( ) – đường dẫn vật lý thư mục /plugins
    // echo '<br/>' . plugin_dir_path(__FILE__) ;

    // plugins_url() - đường dẫn URL thư mục /plugins 
    // echo '<br/>' . plugins_url('/css/abc.css',__FILE__) ;

    // includes_url() - đường dẫn URL đến thư mục /wp-includes
    // echo '<br/>' . includes_url('/css/buttons.css') ;

    // content_url() - đường dẫn URL đến thư mục /wp-content
    // echo '<br/>' . content_url() ;

    // admin_url() - đường dẫn URL đến thư mục  /wp-admin
    // echo '<br/>' . admin_url() ;

    // site_url() - Đường dẫn URL của website 
    // echo '<br/>' . site_url() ;

    // home_url() - Đường dẫn URL home của website
    // echo '<br/>' . home_url() ;


