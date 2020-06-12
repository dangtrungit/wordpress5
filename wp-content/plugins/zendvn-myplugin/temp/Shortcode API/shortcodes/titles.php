<?php

class Zendvn_Mp_SC_Title
{


    public function __construct()
    {

        add_shortcode('zendvn_mp_sc_title', array($this, 'zendvn_mp_show_title'));
    }
    public function zendvn_mp_show_title($atts)
    {

        if (is_single()) {
            /* ================================================================
             * extract($atrr): Giải nén mảng sau đó có thể gọi trực tiếp các giá 
             * trị của mảng thông qua tên phần tử
             * Ví dụ: $atrr có tên các gt title và ids thì sẽ đc gọi trực tiếp 
             * không cần sử dụng vòng lặp.
             * ================================================================
             */
            // $arrs = array(
            //     'post_type' => 'post',
            //     'order' => 'ASC',
            //     'orderby' => 'id',
            //     'post_status' => 'publish',
            //     'ignore_stiky_posts' => true,
            // );
            $pairs =  array(
                'title' => 'Các bài viết khác',
                'ids' => '31'
            );
            $atts = shortcode_atts($pairs, $atts, 'zendvn_mp_sc_title');

            extract($atts);

            $ids = explode(',', $ids);
            $list = '';
            if (count($ids) > 0) {
                $arrs = array(
                    'post_type' => 'post',
                    'post__in' => $ids,
                    'post_status' => 'publish',
                    'ignore_stiky_posts' => true
                );

                $wpQuery = new WP_Query($arrs);
                if ($wpQuery->have_posts()) {
                    $ul .= '<ul>';
                    while ($wpQuery->have_posts()) {
                        $wpQuery->the_post();
                        $list .= '<li><a href="' . get_the_guid() . '">' . get_the_ID() . ' - ' . get_the_title() . '</a></li>';
                    }
                    $ul .= '</ul>';
                }
                wp_reset_postdata();
            }
            $html .= "<div><b><i>{$title}</b></i>{$list}</div>";
            return $html;
            // $object = get_post(get_the_ID()); // Lấy ID bài viết cụ thể
            // // Kiểm tra shortcode có tồn tại trong bài viết (tối ưu website tránh lãng phí tài nguyên)
            // if (has_shortcode($object->post_content, 'zendvn_mp_sc_title') == 1) {
            //     // thêm css tạo ra link chứa css với id = zendvn_mp_sc_date_css
            //     wp_enqueue_style('zendvn_mp_sc_date_css', ZEND_MP_CSS_URL . '/abc.css', array(), false, 'all'); //zendvn_mp_sc_date_css : chinh la id tag
            // }

            // date_default_timezone_set('Asia/Ho_Chi_Minh'); // Lấy thời gian theo múi giờ
            // $str = '<div class="zendvn_mp_sc_title">'
            //     . 'THIS IS DATE - '. date('l jS \of F Y H:i:s A') // Lấy thứ - ngày - tháng - năm - giờ | A là định dạng AP - PM
            //     . '</div>';

            // return $str;
        }
    }
}
