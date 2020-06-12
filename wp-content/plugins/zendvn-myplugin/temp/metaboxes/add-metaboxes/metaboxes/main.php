<?php
class Zendvn_Mp_MB_Main
{

    private $_metabox_name = 'zendvn_mpmb_options';
    private $_metabox_option = array();

    public function __construct() {
        $defaultOption = array(
            'zendvn_mp_mb_simple' => true,
           
        );
        $this->_metabox_option = get_option($this->_metabox_name, $defaultOption);
        // echo __METHOD__;
        $this->simple();
    }
    public function simple() {
        if($this->_metabox_option['zendvn_mp_mb_simple'] == true){
            require_once ZEND_MP_METABOX_DIR . '/simple/simple.php';
            new Zendvn_Mp_MB_Simple();
        }
    }
}