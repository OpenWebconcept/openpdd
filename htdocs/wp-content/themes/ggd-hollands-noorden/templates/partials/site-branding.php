<?php declare(strict_types=1);
$name = get_bloginfo('name');
$description = get_bloginfo('description', 'display');
?>

<div class="site-branding | d-flex align-items-center mr-sm-4">
    <img class="custom-logo" alt=""
        src="<?php echo sprintf('%s/assets/img/veilig-thuis-logo.png', get_stylesheet_directory_uri()); ?>" />
</div>