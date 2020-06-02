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
        add_filter('the_content', array($this, 'changeContent'),10,1);
    }

    // Su dung tham so content trong filter hook
    public function changeContent($content)
    {
        // if ($content==1) {
        //     $title = str_replace('world' ,' WORDPRESS ' ,$title);
        // } 
        $content .= "Content nay LA CUA TOI ! :)";
        return $content; 

    }
    // Hien thi cac action dang thuc thi trong hook
    // public function showFunction()
    // {
    //     ZendvnMpSupport::showFunc();
    // }

   
}
