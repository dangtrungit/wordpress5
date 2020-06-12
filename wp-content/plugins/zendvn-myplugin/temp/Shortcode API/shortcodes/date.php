<?php

class Zendvn_Mp_SC_Date
{


    public function __construct()
    {

        add_shortcode('zendvn_mp_sc_date', array($this, 'zendvn_mp_show_date'));
    }
    public function zendvn_mp_show_date()
    {
        // echo '<br/>' . get_the_ID() . '<br/>';
        // is_single : Kiểm tra - định vị tồn tại bài viết chi tiết
        if (is_single()) {
            $object = get_post(get_the_ID()); // Lấy ID bài viết cụ thể
        // Kiểm tra shortcode có tồn tại trong bài viết (tối ưu website tránh lãng phí tài nguyên)
        if (has_shortcode($object->post_content, 'zendvn_mp_sc_date') == 1) {
            // thêm css tạo ra link chứa css với id = zendvn_mp_sc_date_css
            wp_enqueue_style('zendvn_mp_sc_date_css', ZEND_MP_CSS_URL . '/abc.css', array(), false, 'all'); //zendvn_mp_sc_date_css : chinh la id tag
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Lấy thời gian theo múi giờ
        $str = '<div class="zendvn_mp_sc_date">'
            . date('l jS \of F Y H:i:s A') // Lấy thứ - ngày - tháng - năm - giờ | A là định dạng AP - PM
            . '</div>';

        return $str;
        }
        
    }


}
