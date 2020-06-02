<!-- ============================= -->
<!-- Cach 1-->
<!-- ============================= -->
<input type="file" name="zendvn_mp_logo" id="" value="" />
<p class="description">Chỉ được phép upload các tập tin có định dang JPG - PNG - GIF</p>
<div class="thumbnail">
    <div class="centered">
        <?php
        if (!empty($this->_setting_options['zendvn_mp_logo'])) {
            echo '<img src="' . $this->_setting_options['zendvn_mp_logo'] . '" alt="" draggable="false" width="200">';
        }
        ?>
    </div>
</div>

<!-- ============================= -->
<!-- Cach 2 -->
<!-- ============================= -->
<!-- <input type="text" name="zendvn_mp_name[zendvn_mp_logo]" id="" value="
<?php echo $this->_setting_options['zendvn_mp_logo']; ?>
" /> -->
