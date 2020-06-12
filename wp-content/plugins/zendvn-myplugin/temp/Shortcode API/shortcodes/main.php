<?php
class Zendvn_Mp_SC_Main
{

    private $_shortcode_name = 'zendvn_mp_sc_options';
    private $_shortcode_option = array();

    public function __construct()
    {

        $defaultOption = array(
            'zendvn_mp_sc_date' => true,
            'zendvn_mp_sc_title' => true,
        );
        //get option q
        $this->_shortcode_option = get_option($this->_shortcode_name, $defaultOption);

        $this->date();
        $this->titles();
        // ============================ Các hàm trong shortcode ============================
        // remove_shortcode('zendvn_mp_sc_date'); //Xoa shortcode
        // shortcode_exists('zendvn_mp_sc_date'); //Kiem tra ton tai shortcode
        // has_shortcode(); //Kiem shortcode tồn tại trong bài viết
        // ============================ Xóa tất cả các shortcode trong bài viết ============================
        // add_action('the_content',array($this,'remove_all_shortcode'));
        //lấy ra các biểu thức
        add_action('the_content', array($this, 'get_shortcode_atts_regex'));
    }

    // ============================ lấy ra các shortcode đã sử dụng trog content ============================
    public function get_shortcode_atts_regex($content)
    {
        $pattern = '/' . get_shortcode_regex() . '/s';

        preg_match_all($pattern, $content, $matches);
        if (array_key_exists(2, $matches)) {
            $matches = $matches[2];
        }
        return $content;
    }
    //Hàm xóa tất cả shortcode trong content
    public function remove_all_shortcode($content)
    {
        $content = strip_shortcodes($content);
        return $content;
    }

    public function date()
    {
        // K
        if ($this->_shortcode_option['zendvn_mp_sc_date'] == true) {
            require_once ZEND_MP_SHORTCODE_DIR . '/date.php';
            new Zendvn_Mp_SC_Date();
        } else {
            add_shortcode('zendvn_mp_sc_date', '__return_false');
            // strip_shortcodes( '' );
        }
    }
    public function titles()
    {
        if ($this->_shortcode_option['zendvn_mp_sc_title'] == true) {
            require_once ZEND_MP_SHORTCODE_DIR . '/titles.php';
            new Zendvn_Mp_SC_Title();
        } else {
            add_shortcode('zendvn_mp_sc_title', '__return_false');
            // strip_shortcodes( '' );
        }
    }
}
