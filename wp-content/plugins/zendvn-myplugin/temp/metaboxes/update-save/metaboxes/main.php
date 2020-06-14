<?php
class Zendvn_Mp_MB_Main
{

    private $_metabox_name = 'zendvn_mp_mb_options'; // tên của metabox sẽ đc lưu trong bảng options
    private $_metabox_option = array(); //bao gồm các ptu meta box đc lưu trong bảng options

    public function __construct() {
        $defaultOption = array(
            'zendvn_mp_mb_simple' => false,
            // 'zendvn_mp_mb_data' => true,
            'zendvn_mp_mb_data2' => true,
           
        );
        $this->_metabox_option = get_option($this->_metabox_name, $defaultOption);
        // echo __METHOD__;
        $this->simple();
        // $this->data();
        $this->data2();
    }
    public function data2() {
        if($this->_metabox_option['zendvn_mp_mb_data2'] == true){
            require_once ZEND_MP_METABOX_DIR . '/data/data2.php';
            new Zendvn_Mp_MB_Data2();
        }
    }
    public function data() {
        if($this->_metabox_option['zendvn_mp_mb_data'] == true){
            require_once ZEND_MP_METABOX_DIR . '/data/data.php';
            new Zendvn_Mp_MB_Data();
        }
    }
    public function simple() {
        if($this->_metabox_option['zendvn_mp_mb_simple'] == true){
            require_once ZEND_MP_METABOX_DIR . '/simple/simple.php';
            new Zendvn_Mp_MB_Simple();
        }
    }

    
     // public function data1() {
    //     if($this->_metabox_option['zendvn_mp_mb_data1'] == true){
    //         require_once ZEND_MP_METABOX_DIR . '/data/data1.php';
    //         new MetaBox_Data1();
    //     }
    // }
}