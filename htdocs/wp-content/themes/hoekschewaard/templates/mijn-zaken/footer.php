<?php

declare(strict_types=1); ?>

<footer class="footer | bg-secondary text-white">
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-sm-4">
                <?php dynamic_sidebar('footer-column-1') ?>
            </div>
            <div class="order-2 col-sm-4 order-sm-0">
                <?php dynamic_sidebar('footer-column-2') ?>
            </div>
            <div class="col-sm-4">
                <?php dynamic_sidebar('footer-column-3') ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom | py-3">
        <div class="container">
            <div class="flex-wrap d-flex justify-content-between">
                <?php
                if (has_nav_menu('footer-bottom')) {
                    wp_nav_menu([
                        'theme_location' => 'footer-bottom',
                        'menu_class' => 'footer-bottom-menu list-unstyled mb-0',
                        'container' => false,
                        'depth' => 1,
                    ]);
                }
?>
                <span class="footer-bottom-copy">&copy; <?php echo bloginfo('name'); ?> - <?php echo date('Y'); ?></span>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    window.rsConf = {
        general: {
            usePost: true
        }
    };
</script>

<?php wp_footer(); ?>
</body>

</html>