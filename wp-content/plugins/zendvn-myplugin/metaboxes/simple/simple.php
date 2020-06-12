<?php
class Zendvn_Mp_MB_Simple
{

    private $_var_default = '';

    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'create'));
    }

    public function create()
    {
        add_meta_box( 'zendvn-mp-mb-simple', 'My Meta Box', array($this,'display'),'post' );

    }
    public function display()
    {
        echo 'Hello Meta Box';
        
    }
}
