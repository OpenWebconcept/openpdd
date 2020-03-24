<?php
$name = get_bloginfo('name');
$description = get_bloginfo('description', 'display');
?>

<div class="site-branding | d-flex align-items-center mr-sm-4">
    <?php if (has_custom_logo()) : echo get_custom_logo();
    endif; ?>
</div>