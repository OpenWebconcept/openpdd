<?php
$name = get_bloginfo('name');
$description = get_bloginfo('description', 'display');

?>

<div class="site-branding | d-flex flex-column mr-sm-4">
    <?php if (has_custom_logo()) : echo get_custom_logo();
    endif; ?>

    <div class="d-flex flex-column">
        <?php if ($name) : ?>
            <div class="site-branding__title | h4 | mb-0 |text-uppercase | font-weight-bold | site-title">
                <?php echo $name ?>
            </div>
        <?php endif; ?>
    </div>
</div>