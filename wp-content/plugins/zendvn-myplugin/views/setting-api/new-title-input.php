<!-- ============================= -->
<!-- CACH 1-->
<!-- ============================= -->
<!-- <input type="text" name="zendvn_mp_new_title" id="" value="
<?php echo get_option('zendvn_mp_new_title'); ?>
" />
<p class="description">Nhập vào một chuỗi không quá 20 ký tự</p> -->

<!-- ============================= -->
<!-- CACH 2 -->
<!-- ============================= -->
<input type="text" name="zendvn_mp_name[zendvn_mp_new_title]" id="" value="
<?php echo $this->_setting_options['zendvn_mp_new_title']; ?>"/>
<p class="description">Nhập vào một chuỗi không quá 20 ký tự</p>

<!-- echo '<input type="text" name="zendvn_mp_name[zendvn_mp_new_title]"
						value="' . $this->_setting_options['zendvn_mp_new_title'] . '"/>';
            echo '<p class="description">Nhập vào một chuỗi không quá 20 ký tự</p>'; -->