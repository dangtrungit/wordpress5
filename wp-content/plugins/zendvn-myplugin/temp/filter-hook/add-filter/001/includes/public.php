<?php
class ZendvnMP
{
    public function __construct()
    {
        echo '<br>' . __CLASS__ . '<br>' . __METHOD__;
        //   Ham thay doi toan bo title
        // add_filter('the_title', array($this, 'theTitle'));
        //   Ham su dung 2 tham so cua hook 'the_title'
        add_filter('the_title', array($this, 'theTitle2'), 10, 2);
    }

    public function theTitle2($title, $id)
    {
        // echo '<br/>' . $id;
        // Chú ý bắt điều kiện để khỏi set all title
        if ($id == 1) {
            $title = str_replace('world', ' WORDPRESS ', $title);
        }
        return $title;
    }

    function theTitle()
    {
        return "LAP TRINH WORDPRESS";
    }
}
