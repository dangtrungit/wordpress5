<?php
class Zendvn_Mp_Widget_Last_Post extends WP_Widget
{

    private $_cache_name = 'zendvn_mp_wg_last_post_caching';
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
        extract($args); //
        $widgetName = $args['widget_name'];
        $title = apply_filters('widget_title', $instance['title']);

        $title = (empty($title)) ? $widgetName : $instance['title'];
        $format = (empty($instance['format'])) ? 'standard'  : $instance['format'];
        $items = (empty($instance['items'])) ? '5' : $instance['items'];
        $ordering = (empty($instance['ordering'])) ? 'desc' : $instance['ordering'];




        $args = array(
            'post-type' => 'post',
            'order' => $ordering,
            'orderby' => 'ID',
            'posts_per_page' => $items,
            'posts_status' => 'publish',
            'ignore_sticky_posts' => true,
        );


        if ($format != 'standard') {
            $tax_query =  array(
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array('post-format-' . $format),
                    // 'terms'    => array('post-format-gallery'),
                    // 'oprerator' => 'NOT EXISTS',
                ),
            );

            $args['tax_query'] = $tax_query;

            $this->showData_Html($args, $title, $before_widget, $before_title, $after_title, $after_widget);
        } else {
            $tax_query =  array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array('post-format-aside'),
                    // 'oprerator' => 'NOT EXISTS',
                ),
                array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array('post-format-gallery'),
                    // 'oprerator' => 'NOT IN',
                ),
            );
            $args['tax_query'] = $tax_query;
            $wpQuery = new WP_Query($args);

            $idtemp = array();
            if (count($wpQuery->posts) > 0) {
                foreach ($wpQuery->posts as $key => $value) {
                    array_push($idtemp, $value->ID);
                    // echo ' <br/>' . $value->ID;
                }
            }

            $argsStandard = array(
                'post-type' => 'post',
                'order' => $ordering,
                'orderby' => 'ID',
                'posts_per_page' => $items,
                'posts_status' => 'publish',
                'ignore_sticky_posts' => true,
                'post__not_in' => $idtemp,
            );

            $this->showData_Html($argsStandard, $title, $before_widget, $before_title, $after_title, $after_widget);
        }





        wp_reset_postdata();
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
        delete_transient($this->_cache_name);
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

    public function showData_Html($args, $title, $before_widget, $before_title, $after_title, $after_widget)
    {

        $caching = get_transient($this->_cache_name);
        $wpQuery = new WP_Query($args);

        if ($caching == false) {

            echo '<br/>' . "Khong su dung cache";
            set_transient($this->_cache_name, $wpQuery, 60);
        } else {
            echo '<br/>' . "Su dung cache";
            // $this->showData_Html($args, $title, $before_widget, $before_title, $after_title, $after_widget);
            $wpQuery = $caching;
        }


        $classname = $this->widget_options['classname'];
        $before_widget = str_replace($classname, $classname . ' ' . 'addfilecss', $before_widget);
        echo  $this->before_widget;
        echo $before_title . $title . $after_title;
        if ($wpQuery->have_posts()) {
            echo '<ul>';
            while ($wpQuery->have_posts()) {
                $wpQuery->the_post();
                echo '<li><a href= "' . get_the_guid() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        }
        echo  '<br/>' . $after_widget;
    }
}
