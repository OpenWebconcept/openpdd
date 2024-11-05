<?php
$parentID = wp_get_post_parent_id(get_the_ID());
$linkUrl = $parentID ? get_permalink($parentID) : (get_page_by_path('overzicht') && ! is_page('overzicht') ? home_url('overzicht') : '');
$linkText = $parentID ? get_the_title($parentID) : 'Overzicht';
?>

<?php if ($linkUrl) : ?>
	<div class="d-sm-none">
		<a href="<?php echo esc_url($linkUrl); ?>" class="d-inline-block py-2 text-decoration-none">
			<i class="fa-fw fa-regular fa-arrow-left mr-2"></i><?php echo esc_html($linkText); ?>
		</a>
	</div>
<?php endif; ?>

<div class="d-none d-md-block">
    <?php
    wp_nav_menu([
        'theme_location' => 'mijn-zaken-sidebar',
        'depth' => 3,
        'menu_class' => 'sidebar',
    ]);
?>
</div>
