
<?php
class Zendvn_Mp_Widget_Simple extends WP_Widget
{
    public function __construct()
    {
        $id_base = 'zendvn-mp-widget-simple';
        $name = 'AI Widget Simple';

        $widget_options = array(
            'classname' => 'zendvn-mp-wg-css-simple',
            'description' => 'THIS IS MY WIDGETS ',
        );
        $control_option = array(
            'width' => '250px',
        );
        parent::__construct($id_base, $name, $widget_options, $control_option);
        // ============================ add js ,css cach 1 ============================
        // add_action('wp_head', array($this, 'add_css'));
        // add_action('wp_head', array($this, 'add_js'));

        // ============================ add js ,css cach 2 ============================
        // add_action('wp_enqueue_scripts', array($this, 'add_file_css2'));

        // add_action('wp_enqueue_scripts', array($this, 'add_file_js'));



        // ============================ Kiem tra cac file js ,css ton tai !============================
        // wp_enqueue_style("wp-simple-02", ZEND_MP_CSS_URL . '/simple-02.css', array(), true, 'all');
        // wp_enqueue_script('.zendvn-mp-bg-blue-simple', ZEND_MP_JS_URL . '/ajax.js', array('jquery'), false, false);
        // $handlecss = 'wp-simple-02';
        // $handlesc = 'jquery';

        // if(wp_style_is($handlecss)){
        //     echo " Ton tai! ". $handlecss;
        // }else{
        //     echo " <br/> K ton tai! " . $handlecss;
        // }

        // if(wp_script_is('jquery')){
        //     echo "<br/> Ton tai! ". $handlesc;
        // }else{
        //     echo "<br/> K ton tai! " . $handlesc;
        // }
        
        // ============================ Check widget ton tai de tối ưu code khi thêm css , js ============================
        $is_active = is_active_widget(false, false, $id_base, true);
        if (!empty($is_active)) {
            add_action('wp_enqueue_scripts', array($this, 'add_file_css2'));
            add_action('wp_enqueue_scripts', array($this, 'add_file_js'));
        }
        
        // ============================ Sử dụng func unregister_widget() để tắt các widget ============================

        // ============================ Kiểm tra thông tin file js thêm vào ============================
        //    global $wp_scripts;
        //    echo '<pre>'; 
        //    print_r($wp_scripts);
        //    echo '</pre>';
    }
    // ============================  JS AJAX  ============================

    // ============================ Them JS cach 2============================
    public function add_file_js()
    {
        wp_register_script('abc', ZEND_MP_JS_URL . '/abc.js', array('jquery'), false, false);
        wp_enqueue_script('abc');
    }
    // ============================ Them JS cach 1 ============================
    public function add_js()
    {
        wp_register_script('abc', ZEND_MP_JS_URL . '/abc.js', array('jquery'), false, true);
        wp_enqueue_script('abc');
    }
    // ============================ them css cach 2  ============================
    public function add_file_css2()
    {
        // add css vào WP bằng hàm trong he thống WP

        wp_register_style("wp-simple-02", ZEND_MP_CSS_URL . '/simple-02.css', array(), true, 'all');
        wp_enqueue_style("wp-simple-02");
        // if (is_front_page()) {
        //     wp_enqueue_style("wp-simple");
        // } else {
        //     wp_enqueue_style("wp-simple-01");
        // }

    }

    // ============================ Cach 1 add css ============================
    public function add_css()
    {
        $urlcss = ZEND_MP_CSS_URL . '/simple.css';
        $output  = '<link rel="stylesheet" type="text/css" href="' . $urlcss . '" media="all">';
        echo $output;
    }

    public function widget($args, $instance)
    {
        // echo '<pre>'; 
        // print_r($args);
        // echo '</pre>';

        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        // $title = apply_filters('widget_title', $value);
        $title = (empty($title)) ? $widget_name : $instance['title'];
        $movie = (empty($instance['movie'])) ? '&nbsp;' : $instance['movie'];
        $song = (empty($instance['song'])) ? '&nbsp;' : $instance['song'];
        $css = (empty($instance['css'])) ? '' : $instance['css'];
        // echo $css;

        $classname = $this->widget_options['classname'];
        // ============================ cach 2 add css ============================
        $before_widget = str_replace($classname, $classname . ' ' . $css, $before_widget);

        echo  '<br/>' . $before_widget;
        echo $before_title . $title . $after_title;
        echo  '<br/> Hello: ' . $movie;
        echo  '<br/> Hello: ' . $song;
        echo  '<br/>' . $after_widget;
    }

    // update vao database
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['movie'] = strip_tags($new_instance['movie']);
        $instance['song'] = strip_tags($new_instance['song']);
        $instance['css'] = strip_tags($new_instance['css']);

        return $instance;
    }

    public function form($instance)
    {
        // echo '<pre>'; 
        // print_r($instance);
        // echo '</pre>';
        // echo '<br>' . $this->get_field_id('title');
        // echo '<br>' . $this->get_field_name('title');
        // echo '<pre>'; 
        // print_r($instance);
        // echo '</pre>';

        $htmlObj = new ZendvnHtml();

        // ============================ Tao phtu title ============================
        $inputID =  $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputValue = $instance['title'];
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Title:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';

        // ============================ Tao pt movie ============================
        $inputID =  $this->get_field_id('movie');
        $inputName = $this->get_field_name('movie');
        $inputValue = $instance['movie'];;
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Movie:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';

        // ============================ TAo pt Song ============================
        $inputID =  $this->get_field_id('song');
        $inputName = $this->get_field_name('song');
        $inputValue = $instance['song'];;
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Song:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';

        // ============================ TAo pt add css ============================
        $inputID =  $this->get_field_id('css');
        $inputName = $this->get_field_name('css');
        $inputValue = $instance['css'];;
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Css class:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';
    }
}
