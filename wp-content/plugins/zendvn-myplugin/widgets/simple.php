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
        // outputs the content of the widget
    }


    public function form($instance)
    {
        // echo '<pre>'; 
        // print_r($instance);
        // echo '</pre>';
        // echo '<br>' . $this->get_field_id('title');
        // echo '<br>' . $this->get_field_name('title');

        $htmlObj = new ZendvnHtml();

        $inputID =  $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputValue = '';
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Title:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';

       
        $inputID =  $this->get_field_id('movie');
        $inputName = $this->get_field_name('movie');
        $inputValue = '';
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Movie:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';

        $inputID =  $this->get_field_id('song');
        $inputName = $this->get_field_name('song');
        $inputValue = '';
        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Song:') . $htmlObj->texbox($inputName, $inputValue, $arr) . '</label></p>';
    }

    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
    }
}
