<?php
class Zendvn_Mp_Widget_Last_Post extends WP_Widget
{
    public function __construct()
    {

        $id_base = 'zendvn-mp-widget-last-post';
        $name = 'AAA LAST POST';

        $widget_options = array(
            'classname' => 'zendvn-mp-wg-css-last-post',
            'description' => 'Hiển thị bài viết (post) mới nhất!',
        );

        $control_option = array(
            // 'width' => '250px',
        );
        parent::__construct($id_base, $name, $widget_options, $control_option);
    }
    public function widget($args, $instance)
    {
        // echo '<pre>';
        // print_r($args);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($instance);
        // echo '</pre>';
        // $standard = $instance['format'] = 'standard';

        extract($args); //

        $widgetName = $args['widget_name'];
        $title = apply_filters('widget_title', $instance['title']);

        $title = apply_filters('widget_title', $value);
        $title = (empty($title)) ? $widgetName : $instance['title'];
        $format = (empty($instance['format'])) ? 'standard'  : $instance['format'];
        $items = (empty($instance['items'])) ? '5' : $instance['items'];
        $ordering = (empty($instance['ordering'])) ? 'desc' : $instance['ordering'];

        $args = array(
            'post-type' => 'post',
            'order' => $ordering,
            'orderby' => 'ID',
            'post_per_page' => $items,
            'post_status' => 'pulic',
        );

        $wpQuery = new WP_Query($args);

        if ($wpQuery->have_posts()) {
            echo '<ul>';
            while ($wpQuery->have_posts()) {
                $wpQuery->the_post();
                echo '<li><a href= "' . get_the_guid() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';

            wp_reset_postdata();
        }
    }

    public function update($new_instance, $old_instance)
    {
        // echo '<pre>'; 
        // print_r($old_instance['title']);
        // echo '</pre>';
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['format'] = strip_tags($new_instance['format']);
        $instance['items'] = strip_tags($new_instance['items']);
        $instance['ordering'] = strip_tags($new_instance['ordering']);
        return $instance;
    }

    public function form($instance)
    {
        $htmlObj = new ZendvnHtml();
        // ============================ Tạo phần tử title ============================

        $inputID = $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputValue = $instance['title'];

        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlTitle = $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Title') . $htmlTitle . '</label></p>';

        // ============================ Tạo phần tử Select Box ============================

        $temp = get_theme_support('post-formats');
        $temp = $temp[0];
        $inputID = $this->get_field_id('format');
        $inputName = $this->get_field_name('format');
        $inputValue = $instance['format'];

        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
            // 'selected' => 'selected'
        );

        $options['data'] = array();
        // $options['data'] = array(
        //     'standard' => 'Standard',
        // );
        $templenght =  count($temp) + 1;
        for ($i = 0; $i < $templenght; $i++) {
            if ($i == 2) {
                array_push($temp, 'standard');
            }
            $options['data'][$temp[$i]] = ucwords($temp[$i]);
        }

        $htmlSelecBox = $htmlObj->selectbox($inputName, $inputValue, $arr, $options);
        echo '<p><label for="' . $inputID . '">' . translate('Type of Format') . $htmlSelecBox . '</label></p>';
        // ============================ Tạo phần tử Items ============================

        $inputID = $this->get_field_id('items');
        $inputName = $this->get_field_name('items');
        $inputValue = $instance['items'];

        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
        );
        $htmlTitle = $htmlObj->texbox($inputName, $inputValue, $arr);
        echo '<p><label for="' . $inputID . '">' . translate('Number of Item') . $htmlTitle . '</label></p>';

        // ============================ Tạo phần tử Select Box ============================

        $inputID = $this->get_field_id('ordering');
        $inputName = $this->get_field_name('ordering');
        $inputValue = $instance['ordering'];

        $arr = array(
            'class' => 'widefat',
            'id' => $inputID,
            // 'selected' => 'selected'
        );
        $options['data'] = array(
            'asc'  => 'ASC (a-z)',
            'desc'  => 'DESC (z-a)',
        );

        $htmlSelecBox = $htmlObj->selectbox($inputName, $inputValue, $arr, $options);
        echo '<p><label for="' . $inputID . '">' . translate('Ordering by ID') . $htmlSelecBox . '</label></p>';
    }
}
