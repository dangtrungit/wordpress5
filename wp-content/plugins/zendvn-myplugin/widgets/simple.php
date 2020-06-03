<?php
class Zendvn_Mp_Widget_Simple extends WP_Widget
{
    public function __construct()
    {
        $id_base = 'zendvn-mp-widget-simple';
        $name = 'AI Widget Simple';

        $widgets_options = array(
            'classname' => 'zendvn-mp-wg-css-simple',
            'description' => 'THIS IS MY WIDGETS ',
        );
        $control_option = array(
            'width' => '250px',
        );
        parent::__construct($id_base, $name, $widgets_options, $control_option);
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
        $movie = (empty( $instance['movie'])) ? '&nbsp;' : $instance['movie'];
        $song = (empty($instance['song'])) ? '&nbsp;' : $instance['song'];


        echo  '<br/>' . $before_widget;
        echo $before_title . $title . $after_title;
        echo  '<br/> Hello: ' . $movie;
        echo  '<br/> Hello: '. $song;
        echo  '<br/>' . $after_widget;
    }
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['movie'] = strip_tags($new_instance['movie']);
        $instance['song'] = strip_tags($new_instance['song']);

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

        $inputID =  $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputValue = $instance['title'];
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Title:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';


        $inputID =  $this->get_field_id('movie');
        $inputName = $this->get_field_name('movie');
        $inputValue = $instance['movie'];;
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Movie:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';

        $inputID =  $this->get_field_id('song');
        $inputName = $this->get_field_name('song');
        $inputValue = $instance['song'];;
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Song:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';
    }
}
