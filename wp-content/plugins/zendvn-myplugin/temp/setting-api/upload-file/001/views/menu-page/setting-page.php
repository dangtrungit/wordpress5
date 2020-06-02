<div class="wrap">
    <h2>General Settings</h2>
    <form action="options.php" method="post" id="zendvn-mp-form-setting" enctype="multipart/form-data">
        <!-- Tao ra cac input an -->
        <?php echo settings_fields('zendvn_mp_options'); ?>
        <!-- Do settigg section -->
        <?php echo do_settings_sections($this->_menuSlug) ?>
        <!-- FILED CON -->
        <!-- <?php echo do_settings_fields($this->_menuSlug, 'abc') ?> -->
        <p class="submit">
            <input type="submit" name="submit" value="Save Change" value="" class="button button-primary">
        </p>
    </form>

</div>