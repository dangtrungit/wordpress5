<?php
class Zendvn_Widget_Db_Simple
{
    public function __construct()
    {
        add_action('wp_dashboard_setup', array($this, 'zendvn_mp_widget_db'));
    }

    public function zendvn_mp_widget_db()
    {
        wp_add_dashboard_widget(
            'zendvn_mp_widget_db_simple',
            'My Plugin Information',
            array($this, 'zendvn_mp_widget_db_simple_display')

        );
    }
    function zendvn_mp_widget_db_simple_display()
    {
        echo "I AM TRUNG WP5";
        echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a>';
    }
    
}
