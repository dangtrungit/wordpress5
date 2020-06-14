<?php
class Zendvn_Mp_MB_Data2
{

    private $_meta_box_id = 'zendvn-mp-mb-data2';
    private $_prefix_meta_key = '_zendvn_mp_mb_data2_';
    private $_prefix_meta_val = 'zendvn_mp_mb_data2_';
    private $_prefix_inputID = 'zendvn-mp-mb-data2-';
    private $_prefix_inputName = 'zendvn_mp_mb_data2_';

    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'create'));
        add_action('save_post', array($this, 'save'));
    }

    public function create()
    {
        add_meta_box($this->_meta_box_id, 'My DATA 2', array($this, 'display'), 'post');
        add_action('admin_enqueue_scripts', array($this, 'add_css_file'));
    }
    // ============================ Tạo tiền tố key ============================
    private function createkey($val)
    {

        return $this->_prefix_meta_key . $val;
    }
    // ============================ Tạo tiền tố meta value ============================
    private function createvalue($val)
    {

        return $this->_prefix_meta_val . $val;
    }
    // ============================ Tạo tiền tố ID ============================
    private function createInputID($val)
    {
        return $this->_prefix_inputID . $val;
    }
    // ============================ Tạo tiền tố name input ============================

    private function createInputName($val)
    {
        return $this->_prefix_inputName . $val;
    }
    // ============================ Tạo tiền tố all name ============================


    public function save($post_id)
    {

        // ============================ Cách 1 ============================

        $postVal = $_POST;
        // ============================ Kiểm tra ô textbox có tồn tại hay k? ============================
        if (!isset($postVal[$this->_meta_box_id . '-nonce'])) return $post_id;
        // ============================ Kiểm tra giá trị trường input ẩn có bằng với giá trị hệ thống wp ============================
        if (!wp_verify_nonce($postVal[$this->_meta_box_id . '-nonce'], $this->_meta_box_id)) return $post_id;
        // ============================ Bài viêt mà tự đông save thì sẽ k lưu vào database  ============================
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
        // ============================ Kiểm tra quyền hạn user trước khi lưu bài viết ============================
        if (!current_user_can('edit_post', $post_id)) return $post_id;
        

        $arrayData = array(
            'price' => sanitize_text_field($postVal[$this->createvalue('price')]),
            'author' => sanitize_text_field($postVal[$this->createvalue('author')]),
            'level' => sanitize_text_field($postVal[$this->createvalue('level')]),
            'profile' => strip_tags($postVal[$this->createvalue('profile')]),
        );

        foreach ($arrayData as $key => $value) {
            update_post_meta($post_id, $this->createkey($key), $value);
        }

        // ============================ Cách 2 ============================
        // $this->update_meta_data($post_id, $this->createkey('price'), $this->createvalue('price'));
        // $this->update_meta_data($post_id, $this->createkey('author'), $this->createvalue('author'));
        // $this->update_meta_data($post_id, $this->createkey('level'), $this->createvalue('level'));
        // $this->update_meta_data($post_id, $this->createkey('profile'), $this->createvalue('profile'));

    }
    public function update_meta_data($post_id, $key, $value)
    {

        if (array_key_exists($value, $_POST)) {
            // if ($strip_tags == true) {
                // UPDATE VAO DATABASE
                update_post_meta(
                    $post_id,
                    $key,
                    strip_tags($_POST[$value]),
                );
            
        }
    }
    public function display()
    {
        wp_nonce_field($this->_meta_box_id, $this->_meta_box_id . '-nonce');
        echo '<div class="zendvn-mb-wrap">';
        echo '<p><strong>This is My Data:</strong></p>';

        $htmlObj = new ZendvnHtml();
        $objAdmin = new ZendvnMpAdmin();

        // ============================ ============================
        // tao phan tu chứa price
        $type = 'number';
        $inputID = $this->createInputID('price');
        $name =  $this->createInputName('price');


        // $value = '$_zendvn_mp_mb_data_price[0]';
        $value = get_post_meta(get_the_ID(), $this->createkey('price'), true);

        $arr = array(
            'size' => '25',
            'id' => $inputID
        );
        if ($objAdmin->checkInput($value, $type) <> 1) {
            $value = '';
            echo '<i>Nhap lai Price!</i>';
        }
        // $htmlobj = $htmlObj->texbox($name, $value, $arr);
        $htmlVal = $htmlObj->inputtypes_options($type, $name, $value, $arr);

        $htmlLabel = $htmlObj->labelTag(translate('Price'), array()) . $htmlVal;
        echo $htmlObj->pTag($htmlLabel);

        //tao phan tu chứa author
        $inputID = $this->createInputID('author');
        $name =  $this->createInputName('author');
        $value = get_post_meta(get_the_ID(), $this->createkey('author'), true);
        $arr = array(
            'size' => '25',
            'id' => $inputID
        );

        $htmlVal = $htmlObj->texbox($name, $value, $arr);

        $htmlLabel = $htmlObj->labelTag(translate('Author')) . $htmlVal;
        echo $htmlObj->pTag($htmlLabel);

        //tao phan tu chứa level

        $inputID = $this->createInputID('level');
        $name =  $this->createInputName('level');
        $value = get_post_meta(get_the_ID(), $this->createkey('level'), true);
        $arr = array(
            'id' => $inputID
        );
        $options['data'] = array(
            'beginner' => translate('Beginner'),
            'intermediate' => translate('Intermediate'),
            'advanced' => translate('Advanced'),
        );

        $htmlVal =  $htmlObj->selectbox($name, $value, $arr, $options);

        $htmlLabel = $htmlObj->labelTag(translate('Level')) . $htmlVal;
        echo $htmlObj->pTag($htmlLabel);

        // //tao phan tu chứa info profile

        $inputID = $this->createInputID('profile');
        $name =  $this->createInputName('profile');
        $value = get_post_meta(get_the_ID(), $this->createkey('profile'), true);
        $arr = array(
            // 'size' => '25',
            'id' => $inputID,
            'rows' => 6,
            'cols' => 60
        );

        $htmlVal =  $htmlObj->textarea($name, $value, $arr);

        $htmlLabel = $htmlObj->labelTag(translate('Profile Author')) . $htmlVal;
        echo $htmlObj->pTag($htmlLabel);

        echo '</div>';
    }
    public function add_css_file()
    {
        // echo __METHOD__;
        wp_register_style('zendvn_mp_mb_data', ZEND_MP_CSS_URL . '/metabox-data.css', array(), true, 'all');
        wp_enqueue_style('zendvn_mp_mb_data');
    }
}
