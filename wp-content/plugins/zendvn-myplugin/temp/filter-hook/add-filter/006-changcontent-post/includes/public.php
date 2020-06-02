<?php
require_once ZEND_MP_PLUGIN_DIR . '/includes/support.php';

class ZendvnMP
{
    public function __construct()
    {
        echo '<br>' . __CLASS__ . '<br>' . __METHOD__;
        //   Ham thay doi toan bo title
        // add_filter('the_title', array($this, 'theTitle'));
        //   Ham su dung 2 tham so cua hook 'the_title'
        // add_filter('the_title', array($this, 'theTitle2') ,10, 2);

        //  Hien thi cac action dang thuc thi trong hook
        // add_action('wp_footer', array($this, 'showFunction'));

        //  Su dung tham so content trong hook 'the_content'
        // add_filter('the_content', array($this, 'changeContent'),10,1);

        //   Su dung tham so content trong hook 'the_content'
        add_filter('the_content', array($this, 'changeContent3'));
    }

    // Su dung tham so content trong filter hook
    public function changeContent3($content)
    {
        global $post;
        echo '<pre>';
        print_r($post);
        // print_r($post->post_type);
        echo '</pre>';
        if ($post->post_type == "page") {
            $content = str_replace("WordPress","<a href = 'https://facebook.com/TrungHi0'>TRUNG HI</a>" ,$content);

        }
        if ($post->post_type == "post") {
            $content = str_replace("WordPress","<a href = 'https://facebook.com/TrungHi0'>WP</a>" ,$content);

        }
        return $content;

    }
  
   
}
