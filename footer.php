<?php
$copyright_text = apply_filters('ct_ac_copyright_text', sprintf(__('Copyright &copy; by %s', 'codetot-academy'), get_bloginfo('name')));
?>

    <footer class="site-footer bg-dark text-white pt-2 pb-2 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <p class="m-0 small"><?php echo $copyright_text; ?></p>
                </div>
                <div class="col-12 mt-3 col-md-6 mt-md-0">
                    <?php echo apply_filters('ct_ac_footer_nav_menus_html', ''); ?>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>