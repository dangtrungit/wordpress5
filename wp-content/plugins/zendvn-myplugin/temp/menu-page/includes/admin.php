<?php
require_once ZEND_MP_PLUGIN_DIR . '/includes/support.php';

class ZendvnMpAdmin
{

    public function __construct()
    {
        // ================== action hook add menu =====================
        // add_action('admin_menu', array($this, 'settingMenu'));
        // add_action('admin_menu', array($this, 'trungMenu'));
        // add_action('admin_menu', array($this, 'settingMenu2'));
        // add_action('admin_menu', array($this, 'settingMenu3'));

        // ================== action hook remove menu =====================
        // add_action('admin_menu', array($this, 'removeSubMenu'));
        // add_action('admin_menu', array($this, 'removeMenu'));
    }
    
    /**
     * =============================================================================
     * 5 : Them menu trong he thong menu WP add_object_page va add_utility_page (khong con su dung)
     * =============================================================================
     */
    public function settingMenu3()
    {
        $menuslug = 'zendvn-mp-trung';
        $url = ZEND_MP_IMAGES_URL . '/icon-setting16x16.png';
        // add_object_page('My setting title',  'Trung Setting', 'manage_options',  $menuslug, array($this, 'settingPage'),  $url);
        // add_utility_page('My setting title',  'Trung Setting', 'manage_options',  $menuslug, array($this, 'settingPage'),  $url);
    }

    /**
     * =============================================================================
     * 4 : Xoa Menu 
     * =============================================================================
     */
    public function removeMenu()
    {
        $menuslug = 'zendvn-mp-trung';
        remove_menu_page($menuslug);
    }
    /**
     * =============================================================================
     * 3 : Xoa Menu con
     * =============================================================================
     */

    public function removeSubMenu()
    {
        $menuslug = 'zendvn-mp-my-setting';
        remove_submenu_page($menuslug, $menuslug . '-about');
    }


    /**
     * =============================================================================
     * 2 : Them mot nhom menu moi vao he thong menu WP
     * =============================================================================
     */
    // ==================TRUNG SETTING =====================
    public function trungMenu()
    {
        $menuslug = 'zendvn-mp-trung';
        $url = ZEND_MP_IMAGES_URL . '/icon-setting16x16.png';
        add_menu_page('My setting title', 'Trung Setting', 'manage_options', $menuslug, array($this, 'settingPage'), $url, 1);


        add_submenu_page($menuslug, 'About Title', 'About US', 'manage_options', $menuslug . '-about', array($this, 'aboutPage'), 2);
        add_submenu_page($menuslug, 'Config Title', 'Config', 'manage_options', $menuslug . '-config', array($this, 'ConfigPage'), 1);
    }
    // ==================SETTING MENU=====================
    public function settingMenu2()
    {
        $menuslug = 'zendvn-mp-my-setting';
        $url = ZEND_MP_IMAGES_URL . '/icon-setting16x16.png';
        add_menu_page('My setting title', 'My setting', 'manage_options', $menuslug, array($this, 'settingPage'), $url, 1);


        add_submenu_page($menuslug, 'About Title', 'About US', 'manage_options', $menuslug . '-about', array($this, 'aboutPage'), 2);
        add_submenu_page($menuslug, 'Config Title', 'Config', 'manage_options', $menuslug . '-config', array($this, 'ConfigPage'), 1);
    }

    //  Lay tu VIEWS
    public function ConfigPage()
    {
        require_once ZEND_MP_VIEWS_DIR . '/config-page.php';
    }
    public function aboutPage()
    {
        require_once ZEND_MP_VIEWS_DIR . '/about-page.php';
    }

    /**
     * =============================================================================
     * 1 : Them Submenu vao Dashboard cua WP menus
     * =============================================================================
     */
    public function settingMenu()
    {
        $menuslug = 'zendvn-mp-my-setting';
        add_dashboard_page('My setting title', 'My setting', 'manage_options', $menuslug, array($this, 'settingPage'));
    }

    public function settingPage()
    {
        //  Lay tu VIEWS
        require_once ZEND_MP_VIEWS_DIR . '/setting-page.php';
    }
}
