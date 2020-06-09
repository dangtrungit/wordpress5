<div class="wrap">
    <h2>Trung Settings</h2>
    <?php settings_errors($this->_menuSlugtrung, false, false) ?>
    <form action="options.php" method="post" id="trunghi-form-setting" enctype="multipart/form-data">
        <!-- Tao ra cac input an -->
        <?php echo settings_fields('trunghi_options'); ?>
        <!-- Do settigg section -->
        <?php echo do_settings_sections($this->_menuSlugtrung) ?>
        <!-- FILED CON -->
        <!-- <?php echo do_settings_fields($this->_menuSlugtrung, 'abc') ?> -->

        <?php
        global $wpdb;
        $table = $wpdb->prefix . 'zendvn_mp_article'; // show ra tên bảng
        echo $table;
        // ============================ GET DATA ============================
        $qr = "SELECT * FROM $table WHERE  id";
        // $qr = "SELECT * FROM  $table ";
        $output = OBJECT;
        // $info = $wpdb->get_row($qr, $output, 0); //Lấy dữ liệu 1 hàng theo status = 1 
        //  $info = $wpdb->get_col($qr,1); //Lấy dữ liệu theo cột theo status = 1 
        //  $info = $wpdb->get_results($qr,ARRAY_N); //Lấy tất cả dữ liệu theo status =1 
        //  echo count($info);// Đếm số dữ liệu
        //  $info = $wpdb->get_results($qr,ARRAY_N); //Lấy tất cả dữ liệu theo status =1 dạng mảng number
        //  $info = $wpdb->get_results($qr,ARRAY_A); //Lấy tất cả dữ liệu theo status =1 dạng mảng array
        //  $info = $wpdb->get_results($qr,OBJECT); //Lấy tất cả dữ liệu theo status =1 dạng đối tượng

        // ============================ INSERT DATA ============================
        // Mảng dữ liệu cần thêm
        $data = array(
            // 'id' => 23,
            'title' => 'Thái Lan trắng tay tại ASIAD 17',
            'picture' => 'picture023.png',
            'content' => 'Bàn thắng vàng ở phút 120+2 giúp Hàn Quốc giành chiến thắng nghẹt thở 1-0 trước CHDCND Triều Tiên ở trận chung kết. Trong khi đó Iraq đánh bại Thái Lan với cùng tỷ số để đoạt HCĐ.',
            'status' => 1,

        );
        // Dấu nháy đơn : 'abc' -> là thuần chuỗi
        // Dấu nháy kép : "abc12" -> là tập hợp các ký tự 
        $format = array("%s", "%s", "%s", "%d"); //định dạng kiểu chuỗi %s hay số %d
        $info = $wpdb->insert($table, $data, $format); // Lệnh thêm dữu liệu vào table
        // $info = $wpdb->replace($table, $data, $format); // Lệnh thêm (nếu chưa có data) thay thế chỉnh sửa  dữu liệu vào table
        // ============================ UPDATE DATA ============================
        // $where = array('id' => 23); 
        // $where_format = array("%d");
        // $info = $wpdb->update($table, $data,$where ,$format,$where_format); // Lệnh caạp nhật chỉnh sửa liệu vào table
        // ============================ DELETE DATA ============================
        // $where = array('id' => 23); 
        // $where_format = array("%d");
        // $info = $wpdb->delete($table,$where ,$where_format); // Lệnh xóa dữ liệu
        // ============================ ============================
        $title = ' ASIAD 17';
        $picture = 'INSERT INTO {$table} (`title`,`picture`,`content`,`status`) VALUES (`dfsdffetef`,%s,%s,%d)';
        $content = 'Trong khi đó Iraq đánh bại Thái Lan với cùng tỷ số để đoạt HCĐ.';
        $status = 1;

        $query = "INSERT INTO {$table} (`title`,`picture`,`content`,`status`) VALUES (%s,%s,%s,%d)";
        $info2 = $wpdb->prepare($query, $title, $picture, $content, $status);
        $wpdb->query($info2);


        echo '<pre>';
        // echo print_r($wpdb);
        echo print_r($info);
        echo '<pre/>';
        ?>

        <!-- <p class="submit">
            <input type="submit" name="submit" value="Save Change" value="" class="button button-primary">
        </p> -->
    </form>

</div>