<?php
require_once ZEND_MP_PLUGIN_DIR . '/includes/support.php';
// global $_setting_options;
class ZendvnMpAdmin
{
    private $_menuSlug = 'zendvn-mp-my-setting';
    private $_menuSlugtrung = 'zendvn-mp-trung-setting';
    private $_setting_options;
    private $_trung_setting_options;

    public function __construct()
    {
        //echo '<br>' . __METHOD__;

        $this->_setting_options = get_option('zendvn_mp_name', array());
        $this->_trung_setting_options = get_option('trunghi_name', array());


        add_action('admin_menu', array($this, 'settingMenu'));

        add_action('admin_init', array($this, 'register_setting_and_fields'));
        add_action('admin_init', array($this, 'register_trung_setting_and_fields'));


        // hanh dong XOa option_name
        // add_action( 'admin_init', array($this, 'delete_options'));
    }
    // XOa option_name
    public function delete_options()
    {
        delete_option('zendvn_mp_title_pass');
    }
    //Hàm sẽ đc hook vào admin
    public function register_setting_and_fields()
    {

        register_setting(
            'zendvn_mp_options', // Tên đăng kí option và đc tạo ra = hàm settings_fields()
            'zendvn_mp_name', //tên của option name là dữ liệu dạng mảng nằm ở option value
            array($this, 'validate_setting')
        );

        //MAIN SETTING
        $mainSection = 'zendvn_mp_main_section';
        add_settings_section(
            $mainSection,
            "Main setting",
            array($this, 'main_section_view'),
            $this->_menuSlug
        );
        // add_settings_section(
        //     main_section,
        //     "Main setting",
        //     array($this, 'main_section_view'),
        //     $this->_menuSlug
        // );
        add_settings_field(
            'zendvn_mp_new_title',
            'Site title',
            array($this, 'create_form'),
            $this->_menuSlug,
            $mainSection,
            array('name' => 'new_title_input')
        );

        add_settings_field(
            'zendvn_mp_logo',
            'Logo:',
            array($this, 'create_form'),
            $this->_menuSlug,
            $mainSection,
            array('name' => 'logo_input')
        );

        // $tmp = get_settings_errors($this->_menuSlug);
        // echo '<pre>';
        // print_r($tmp);
        // echo '</pre>';
    }
    public function register_trung_setting_and_fields()
    {
        // đăng kí 
        register_setting(
            'trunghi_options', // Tên đăng kí option và đc tạo ra = hàm settings_fields()
            'trunghi_name', //tên của option name là dữ liệu dạng mảng nằm ở option value
            array($this, 'validate_setting')
        );
    }

    public function create_form($args)
    {
        $htmlObject = new ZendvnHtml();

        if ($args['name'] == 'new_title_input') {
            // ============================ tao html va truyen gtri truc tiep ============================
            // echo '<input type="text" name="zendvn_mp_name[zendvn_mp_new_title]"
            // 			value="' . $this->_setting_options['zendvn_mp_new_title'] . '"/>';
            // echo '<p class="description">Nhập vào một chuỗi không quá 20 ký tự</p>';
            // require_once ZEND_MP_VIEWS_DIR . '/setting-api/new-title-input.php';

            // ============================ Cach 2 ============================
            // ============================ Optional input types ============================

            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'zendvn-fileupload',
            //     'style' => 'width: 300px;',
            //     // 'onClick' => "alert('Vui lòng nhập password!');",

            // );
            // $type = 'password';
            // echo $htmlObject->inputtypes_options($type, 'zendvn_mp_name[zendvn_mp_new_title]', $this->_setting_options['zendvn_mp_new_title'], $attr);

            // ============================ CHECK BOX ============================

            $attr = array(
                'id' => 'zendvn_mp_new_title',
                'class' => 'abc',
            );

            $options['current_value'] = 'yes';
            echo $htmlObject->checkbox("zend_mp_name[zendvn_mp_new_title]", 'yes', $attr, $options) . 'Tôi đồng ý!';

            // ============================ RADIO ============================
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'abc',
            //     // 'size' => '3',
            //     // 'require' => 'Nhap lai di nhe!',
            //     // 'autofocus' =>'js',
            //     // 'disabled' => 'disabled',
            //     // 'multiple' => 'multiple',

            // );
            // $option['data'] = array(
            //     'php' => 'Khoa hoc PHP',
            //     'js' => 'Khoa hoc JS',
            //     'html' => 'Khoa hoc HTML'
            // );
            // $option['separator'] = '<br/>';
            // echo $htmlObject->radio("zend_mp_name[zendvn_mp_new_title]", '', $attr, $option);

            // ============================ SELECT BOX ============================
            // $option['data'] = array(
            //     'php' => 'Khoa hoc PHP',
            //     'js' => 'Khoa hoc JS',
            //     'html' => 'Khoa hoc HTML'
            // );
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'abc',
            //     // 'size' => '3',
            //     // 'require' => 'Nhap lai di nhe!',
            //     // 'autofocus' =>'js',
            //     // 'disabled' => 'disabled',
            //     'multiple' => 'multiple',

            // );
            // echo $htmlObject->selectbox("zend_mp_name[zendvn_mp_new_title]", 'html|js', $attr, $option);

            // ============================ ============================
            // $option['data'] = array(
            //     'php' => 'Khoa hoc PHP',
            //     'js' => 'Khoa hoc JS',
            //     'html' => 'Khoa hoc HTML'
            // );
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'abc',
            //     // 'size' => '3',
            //     // 'require' => 'Nhap lai di nhe!',
            //     // 'autofocus' =>'js',
            //     // 'disabled' => 'disabled',
            //     'multiple' => 'multiple',

            // );
            // echo $htmlObject->selectbox("zend_mp_name[zendvn_mp_new_title]", array('php','html'), $attr, $option);
            // ============================ TEXT AREA ============================
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'rows' => '3',
            //     'cols' => '90',
            // );

            // // $option = array('type' => 'button');
            // echo $htmlObject->textarea('text-area', 'Hello', $attr);

            // ============================ BUTTON ============================
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'button button-primary',
            //     'onClick' => "alert('Hello');",

            // );
            // type : reset , button , submit 
            // $option = array('type' => 'button');
            // echo $htmlObject->button('submit_form', 'Hello', $attr, $option);

            // ============================ TEXTBOX ============================
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'abc',
            //     'style' => 'width: 300px;',
            //     'onClick' => "alert('Hello');",

            // );
            // echo $htmlObject->texbox('zendvn_mp_name[zendvn_mp_new_title]', $this->_setting_options['zendvn_mp_new_title'], $attr);

            // ============================ FILE UPLOAD ============================
            // $attr = array(
            //             'id' => 'zendvn_mp_new_title',
            //             'class' => 'zendvn-fileupload',
            //             // 'style' => 'width: 300px;',
            //             // 'onClick' => "alert('Hello');",

            // );
            // echo $htmlObject->fileupload('uploadfile', '',$attr);

            // echo '<pre>'; 
            // print_r($this->_setting_options_titles);
            // echo '</pre>';
            // die();
        }

        if ($args['name'] == 'logo_input') {
            // ============================ cach 1 ============================
            // echo '<input type="file" name="zendvn_mp_logo" />';
            // echo '<p class="description">Chỉ được phép upload các tập tin có định dang JPG - PNG - GIF</p>';
            // if (!empty($this->_setting_options['zendvn_mp_logo'])) {
            //     echo "<img src='" . $this->_setting_options['zendvn_mp_logo'] . "' width='200' />";
            // }
            // ============================ Cach 2 ============================
            // $attr = array(
            //     'id' => 'zendvn_mp_new_title',
            //     'class' => 'abc',
            // );
            // echo $htmlObject->fileupload('zendvn_mp_logo', '', $attr);

            require_once ZEND_MP_VIEWS_DIR . '/setting-api/logo-input.php';
        }
    }

    //===============================================
    //Kiem tra cac dieu kien truoc khi luu du lieu vao database
    //===============================================
    public function validate_setting($data_input)
    {
        // echo '<pre>'; 
        // print_r($data_input);
        // echo '</pre>';
        // echo '<pre>'; 
        // print_r($_POST);
        // echo '</pre>';
        // die();
        //Mang chua cac thong bao loi cua form
        $errors = array();

        if ($this->stringMaxValidate($data_input['zendvn_mp_new_title'], 20) == false) {
            $errors['zendvn_mp_new_title'] = "Site title: Chuoi dai qua so ky tu da qui dinh";
        } else
        

        if (!empty($_FILES['zendvn_mp_logo']['name'])) {
            if ($this->checkInput($_FILES['zendvn_mp_logo']['name'], "JPG|PNG|GIF") == false) {
                $errors['zendvn_mp_logo'] = "Logo: Khong dung voi dinh dang da qui dinh";
            } else {
                if (!empty($this->_setting_options['zendvn_mp_logo_path'])) {
                    @unlink($this->_setting_options['zendvn_mp_logo_path']);
                }

                $override = array('test_form' => false);
                $fileInfo = wp_handle_upload($_FILES['zendvn_mp_logo'], $override);
                $data_input['zendvn_mp_logo']         = $fileInfo['url'];
                $data_input['zendvn_mp_logo_path']     = $fileInfo['file'];
            }
        } else {
            $data_input['zendvn_mp_logo']         = $this->_setting_options['zendvn_mp_logo'];
            $data_input['zendvn_mp_logo_path']     = $this->_setting_options['zendvn_mp_logo_path'];
        }

        if (count($errors) > 0) {
            $data_input = $this->_setting_options;
            $strErrors = '';
            foreach ($errors as $key => $val) {
                $strErrors .= $val . '<br/>';
            }

            add_settings_error($this->_menuSlug, 'my-setting', $errors, 'error');
        } else {
            add_settings_error($this->_menuSlug, 'my-setting', 'Cap nhat du lieu thanh cong', 'updated');
        }
        //die();
        // Update du lieu zendvn_mp_new_title option_name field
        update_option('zendvn_mp_new_title', $data_input['zendvn_mp_new_title']);
        // update_option('zendvn_mp_new_title', $this->_setting_options_titles['zendvn_mp_new_title']);

        return $data_input;
    }

    public function main_section_view()
    {
    }


    // ============================================ them menu he thong WP (bai cũ) ============================================
    public function settingMenu()
    {
        // $menuSlug = 'zendvn-mp-my-setting';
        $url = ZEND_MP_IMAGES_URL . '/icon-setting16x16.png';
        // ============================ ADD MENU MY SETTING VÀO HỆ THỐNG WP (PHẦN ADMIN) ============================
        add_menu_page(
            'My Setting title',
            'My Setting',
            'manage_options',
            $this->_menuSlug,
            array($this, 'settingPage'),
            $url,
            0
        );
        // ============================ ADD MENU TRUNG SETTING VÀO HỆ THỐNG WP (PHẦN ADMIN) ============================
        add_menu_page(
            'Trung Setting Title',
            'Trung Setting',
            'manage_options',
            $this->_menuSlugtrung,
            array($this, 'trungsettingPage'),
            $url,
            1
        );
        // ============================ ADD MENU VÀO MENU CHA CU HỆ THỐNG WP (MENU CON PHẦN MENU) ============================
        // add_options_page(
        //     'My Setting title',
        //     'My Setting',
        //     'manage_options',
        //     $this->_menuSlug,
        //     array($this, 'settingPage'),
        //     1
        // );
    }
    public function settingPage()
    {
        require_once ZEND_MP_VIEWS_DIR . '/menu-page/setting-page.php';
    }
    public function trungsettingPage()
    {
        require_once ZEND_MP_VIEWS_DIR . '/menu-page/trung-setting-page.php';
    }

    // ================================================================================================================
    // ==================================== FUNCTION string Max Validate ====================================
    private function stringMaxvalidate($val, $max)
    {
        $flag = false;

        $str = trim($val);
        if (strlen($str) <= $max) {
            $flag = true;
        }
        return $flag;
    }
    // ==================================== FUNCTION CHECK INPUT ====================================
    function checkInput($value, $type = 'email')
    {
        $flag = false;
        switch ($type) {
            case 'email':
                $pattern = '#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#';
                break;
            case 'username':
                $pattern = '#^[a-z][a-z0-9_\.\s]{4,31}$#';
                break;
            case 'password':
                $pattern = '#^([?=.*\d])(?=.*[A-Z])(?=.*\W){8,8}$#';
                break;
            case 'website':
                $pattern = '#^(http?://(www)\.|(www\.))[a-z0-9\-]{3,}(\.[a-z]{2-4}){1,2}$#';
                break;
            case 'JPG|PNG|GIF':
                $pattern = '#^.*\.(' . strtolower($type) . ')$#i';
                break;
                // Kiểm tra có phải là số
            case 'number':
                $pattern = '/^[0-9]+$/';
                break;
        }
        // $flag = preg_match($pattern,  $value);
        if (preg_match($pattern,  $value) == 1) {
            $flag = true;
        }
        return $flag;
    }
}
