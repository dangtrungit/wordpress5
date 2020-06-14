<?php
class Zendvn_Mp_MB_Data
{

    // private $_var_default = '';
    private $_arrkey = array();

    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'create'));
        add_action('save_post', array($this, 'save'));
    }

    public function create()
    {
        add_meta_box('zendvn-mp-mb-data', 'My Data', array($this, 'display'), 'post');
        add_action('admin_enqueue_scripts', array($this, 'add_css_file'));
    }

    public function save($post_id)
    {

        $this->update_meta_data($post_id, 'zendvn_mp_mb_data_price');
        $this->update_meta_data($post_id, 'zendvn_mp_mb_data_author');
        $this->update_meta_data($post_id, 'zendvn_mp_mb_data_level');
        $this->update_meta_data($post_id, 'zendvn_mp_mb_data_profile', true);
    }
    public function update_meta_data($post_id, $key, $strip_tags = false)
    {
        if (array_key_exists($key, $_POST)) {
            if ($strip_tags == true) {
                // UPDATE VAO DATABASE
                update_post_meta(
                    $post_id,
                    '_' . $key,
                    strip_tags($_POST[$key]),
                );
            } else {
                update_post_meta(
                    $post_id,
                    '_' . $key,
                    sanitize_text_field($_POST[$key])
                );
            }
        }
    }
    public function display()
    {

        echo '<div class="zendvn-mb-wrap">';
        echo '<p><strong>This is My Data:</strong></p>';
// ============================ ============================
        $htmlObj = new ZendvnHtml();
        $objAdmin = new ZendvnMpAdmin();
        //tao phan tu chứa price
        $type = 'number';
        $inputID = 'zendvn_mp_mb_data_price';
        $name = 'zendvn_mp_mb_data_price';
        $value = get_post_meta(get_the_ID(), '_zendvn_mp_mb_data_price', true);

        $arr = array(
            'size' => '25',
            'id' => $inputID
        );

        if ($objAdmin->checkInput($value, 'number') <> 1) {
            $value = '';
            echo '<i>Nhap lai Price!</i>';
        }
        $htmlobj = $htmlObj->inputtypes_options($type, $name, $value, $arr);


        // $htmlobj = $htmlObj->texbox($name, $value, $arr);

        echo '<p><lable for="' . $inputID . '">' . translate('Price') . ':</label>'
            . $htmlobj . '</p>';

// ============================ ============================
        //tao phan tu chứa title
        $inputID = 'zendvn_mp_mb_data_author';
        $name = 'zendvn_mp_mb_data_author';
        $value = get_post_meta(get_the_ID(), '_zendvn_mp_mb_data_author', true);

        $arr = array(
            'size' => '25',
            'id' => $inputID
        );

        $htmlobj = $htmlObj->texbox($name, $value, $arr);

        echo '<p><lable for="' . $inputID . '">' . translate('Author') . ':</label>'
            . $htmlobj . '</p>';
// ============================ ============================
        //tao phan tu chứa level
        $inputID = 'zendvn_mp_mb_data_level';
        $name = 'zendvn_mp_mb_data_level';
        $value = get_post_meta(get_the_ID(), '_zendvn_mp_mb_data_level', true);

        $arr = array(
            'id' => $inputID
        );
        $options['data'] = array(
            'beginner' => translate('Beginner'),
            'intermediate' => translate('Intermediate'),
            'advanced' => translate('Advanced'),
        );

        $htmlobj = $htmlObj->selectbox($name, $value, $arr, $options);

        echo '<p><lable for="' . $inputID . '">' . translate('Level') . ':</label>'
            . $htmlobj . '</p>';

        //tao phan tu chứa info author
        $inputID = 'zendvn_mp_mb_data_profile';
        $name = 'zendvn_mp_mb_data_profile';
        $value = get_post_meta(get_the_ID(), '_zendvn_mp_mb_data_profile', true);

        $arr = array(
            // 'size' => '25',
            'id' => $inputID,
            'rows' => 6,
            'cols' => 60
        );
        // $options['data'] = array(
        //     'beginner' => translate('Beginner'),
        //     'intermediate' => translate('Intermediate'),
        //     'advanced' => translate('Advanced'),
        // );

        $htmlobj = $htmlObj->textarea($name, $value, $arr);

        echo '<p><lable for="' . $inputID . '">' . translate('Profile Author') . ':</label>'
            . $htmlobj . '</p>';
        echo '</div>';
    }

    public function add_css_file()
    {
        // echo __METHOD__;
        wp_register_style('zendvn_mp_mb_data', ZEND_MP_CSS_URL . '/metabox-data.css', array(), true, 'all');
        wp_enqueue_style('zendvn_mp_mb_data');
    }
}
