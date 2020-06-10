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
            array($this, 'ordering')

        );
    }


    function ordering()
    {
        echo "I AM TRUNG WP5";
        echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';
        $arr = array(
            
            'orderby' => 'rand',
            'order' => 'ASC',
            'posts_per_page' => 1,
        );
        $wpQuery = new WP_Query($arr);
        if ($wpQuery->have_posts()) {
            echo '<ul>';
            while ($wpQuery->have_posts()) {
                $wpQuery->the_post();
                echo '<li><a href="'.get_the_guid().'">' . get_the_ID() . ' - ' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        } else {
            // no posts found

            echo translate('no posts found ', 'default');
        }
        wp_reset_postdata();
        echo '<pre>';
        print_r($wpQuery);
        echo '</pre>';
    }

    function password()
    {
        echo "I AM TRUNG WP5";
        echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';
        $arr = array(
            // 'tag' => 'suckhoe'
            // 'has_password' => true,
            // 'has_password' => false,
            'has_password' => null,
        );
        $wpQuery = new WP_Query($arr);
        if ($wpQuery->have_posts()) {
            echo '<ul>';
            while ($wpQuery->have_posts()) {
                $wpQuery->the_post();
                echo '<li><a href="'.get_the_guid().'">' . get_the_ID() . ' - ' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        } else {
            // no posts found

            echo translate('no posts found ', 'default');
        }
        wp_reset_postdata();
        echo '<pre>';
        print_r($wpQuery);
        echo '</pre>';
    }


    function search()
    {
        echo "I AM TRUNG WP5";
        echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';

        $arr = array(
            // 'tag' => 'suckhoe'
            'page_id' => 3,
        );

        $wpQuery = new WP_Query($arr);

        if ($wpQuery->have_posts()) {
            echo '<ul>';
            while ($wpQuery->have_posts()) {
                $wpQuery->the_post();
                echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
            }
            echo '</ul>';
        } else {
            // no posts found

            echo translate('no posts found ', 'default');
        }
        wp_reset_postdata();

        echo '<pre>';
        print_r($wpQuery);
        echo '</pre>';
    }

    // function tag()
    // {
    //     echo "I AM TRUNG WP5";
    //     echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';

    //     $arr = array(
    //         // 'tag' => 'suckhoe'
    //         'tag_id' => 4,
    //     );

    //     $wpQuery = new WP_Query($arr);

    //     if ($wpQuery->have_posts()) {
    //         if (count($wpQuery->posts) > 0) {
    //             foreach ($wpQuery->posts as $key => $value) {
    //                 // echo ' <br/>' . $key;
    //                 echo ' <br/>' . $value->post_title;
    //                 // echo ' <br/>' . $value->ID;
    //             }
    //         }
    //     }
    //     wp_reset_postdata();

    //     // echo '<pre>';
    //     // print_r($wpQuery);
    //     // echo '</pre>';
    // }

    // function zendvn_mp_widget_db_simple_display()
    // {
    //     echo "I AM TRUNG WP5";
    //     echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';

    //     $arr = array(
    //         'author' => 3
    //     );

    //     $wpQuery = new WP_Query($arr);

    //     if ($wpQuery->have_posts()) {
    //         if (count($wpQuery->posts) > 0) {
    //             foreach ($wpQuery->posts as $key => $value) {
    //                 echo ' <br/>' . $key;
    //                 echo ' <br/>' . $value->post_title;
    //                 // echo ' <br/>' . $value->ID;
    //             }
    //         }
    //     }
    //     wp_reset_postdata();

    //     // echo '<pre>';
    //     // print_r($wpQuery);
    //     // echo '</pre>';
    // }

    // function zendvn_mp_widget_db_simple_display()
    // {
    //     echo "I AM TRUNG WP5";
    //     echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';

    //     $arr = array(

    //         // 'post_status' => 'any',
    //         // 'm' =>'202006',
    //         // 'author_name' => 'admin',
    //         // 'page_id' => 0,
    //         // 'p' => 33,
    //         // 'post_parent' => 2,
    //         // 'author_name' => 'admin'
    //         'author' => 1,
    //         // 'cat' => 9,
    //     );

    //     $wpQuery = new WP_Query($arr);
    //     // $wpQuery->init();
    //     // $wpQuery->parse_query();
    //     // echo  $wpQuery->get('cat',0);
    //     // echo  $wpQuery->get('comments_per_page');
    //     $wpQuery = new WP_Query($arr); // Lay data theo ten tac gia
    //     if(count($wpQuery->posts)>0){
    //         foreach ($wpQuery->posts as $key => $value) {
    //             echo ' <br/>' . $key;
    //             echo ' <br/>' . $value->post_title;
    //             // echo ' <br/>' . $value->ID;
    //         }
    //     }
    //     wp_reset_postdata();

    //     // echo '<pre>';
    //     // print_r($wpQuery);
    //     // echo '</pre>';
    // }
    // function zendvn_mp_widget_db_simple_display()
    // {
    //     echo "I AM TRUNG WP5";
    //     echo '<br/>' . '<a href="https://facebook.com/TrungHi0">TRUNG HI FACEBOOK</a><br/>';
    //     $wpQuery = new WP_Query(array('author' => 1)); // Lay tat ca data
    //     $query = new WP_Query(array('author__not_in' => array(1, 3))); // Du lieu khong phai ID = 1 & 3;
    //     $query1 = new WP_Query(array('author__in' => array(1, 3))); // Lay Du lieu ID = 1 & 3;
    //     $wpQuery2 = new WP_Query(array('author_name' => 'admin1')); // Lay data theo ten tac gia


    //     if ($wpQuery2->have_posts()) {

    //         echo '<ul>';
    //         while ($wpQuery2->have_posts()) {
    //             $wpQuery2->the_post();
    //             // $linkPost = admin_url('post.php?post=='. get_the_ID() .'&action=edit');
    //             $linkPost = get_the_guid();
    //             // echo get_the_guid();

    //             echo '<li><a href="' . $linkPost . '">' . get_the_title() . '</a></li><br/>';
    //          
    //         }
    //         echo '</ul>';
    //         echo ' TON TAI BAI VIET ';
    //     } else {
    //         // no posts found
    //         $domain = 'default';
    //         echo translate('no posts found ','default');
    //         // $translations = get_translations_for_domain( 'default' );
    //         // echo $translations;
    //     }
    //     wp_reset_postdata();
    //     echo '<pre>';
    //     print_r($wpQuery2);
    //     echo '</pre>';
    // }
    public function display()
    {
    }
}
