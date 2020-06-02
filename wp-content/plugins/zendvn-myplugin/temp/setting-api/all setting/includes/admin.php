<?php
require_once ZEND_MP_PLUGIN_DIR . '/includes/support.php';
// global $_setting_options;
class ZendvnMpAdmin
{
    private $_menuSlug = 'zendvn-mp-my-setting';
    private $_setting_options;


    public function __construct()
    {
        // them option
        add_action('admin_menu', array($this, 'settingMenu'));
        add_action('admin_init', array($this, 'register_setting_and_fields'));
        // ==================================== GET OPTION ====================================
        $this->_setting_options = get_option('zendvn_mp_name');

        // echo '<pre>'; 
        //     print_r($this->_setting_option);
        // echo '</pre>';
    }

    public function register_setting_and_fields()
    {
        $arrayName = array(
            'label_for' => 'site-title',
            'class' => 'title-field'
        );
        // ==================================== DĂNG KÍ ====================================
        register_setting(
            'zendvn_mp_options',
            'zendvn_mp_name',
            array($this, 'validate_setting')
        );
        // ==================================== ADD SECTION AND FIELD MAIN====================================
        $idMainsection = 'zendvn_mp_title_section';

        add_settings_section(
            $idMainsection,
            "Main Setting",
            array($this, 'main_section_view'),
            $this->_menuSlug
        );

        add_settings_field(
            "zendvn_mp_title_field",
            "Site Main",
            array($this, 'new_title_input'),
            $this->_menuSlug,
            $idMainsection,
            $arrayName
        );

        // ==================================== ADD SECTION AND FIELD SLOGAN ====================================
        $idExtsection = 'zendvn_mp_ext_section';
        add_settings_section(
            $idExtsection,
            "Exits Setting",
            array($this, 'main_section_view'),
            $this->_menuSlug
        );

        add_settings_field(
            "zendvn_mp_slogan",
            "Slogan",
            array($this, 'slogan_input'),
            $this->_menuSlug,
            $idExtsection,
            $arrayName
        );
        // add_settings_field(
        //     "zendvn_mp_security_code",
        //     "",
        //     array($this, 'security_code'),
        //     $this->_menuSlug,
        //     'abc'
        // );
    }

    // ==================================== ====================================
    public function validate_setting($data_input)
    {
        // echo '<pre>'; 
        // print_r($data_input);
        // echo '</pre>';
        // echo '<pre>'; 
        // print_r($_POST);
        // update_option('zendvn_mp_slogan', $_POST['zendvn_mp_slogan'] );
        // echo '</pre>';
        // die();
        return $data_input;
    }
    public function main_section_view()
    {
        // require_once 
    }
    // ==================================== ====================================

    public function new_title_input()
    {
        //         echo '<input type="text" name="zendvn_mp_name[zendvn_mp_title_field]" id="" 
        // value="' . $this->_setting_options['zendvn_mp_title_field'] . '"/>';

        require_once ZEND_MP_VIEWS_DIR . '/setting-api/new-title-input.php';
    }

    public function slogan_input()
    {
        
        //         echo '<input type="text" name="zendvn_mp_name[zendvn_mp_slogan]" id="" 
        // value="' . $this->_setting_options['zendvn_mp_slogan'] . '"/>';
        require_once ZEND_MP_VIEWS_DIR . '/setting-api/slogan-input.php';
    }

    public function security_code()
    {
        echo 'Security Code: <br/>';
        echo '<input type="text" name="zendvn_mp_name[zendvn_mp_security_code]" id="" 
        value="' . $this->_setting_options['zendvn_mp_security_code'] . '"/>';
        // require_once ZEND_MP_VIEWS_DIR . '/setting-api/slogan-input.php';
    }
    // ============================================ them menu he thong WP (bai cũ) ============================================
    public function settingMenu()
    {
        // $menuSlug = 'zendvn-mp-my-setting';
        $url = ZEND_MP_IMAGES_URL . '/icon-setting16x16.png';

        add_menu_page(
            'My Setting title',
            'My Setting',
            'manage_options',
            $this->_menuSlug,
            array($this, 'settingPage'),
            $url,
            1
        );
    }
    public function settingPage()
    {
        require_once ZEND_MP_VIEWS_DIR . '/menu-page/setting-page.php';
    }
}
