<?php declare(strict_types=1);
$isTemplateVeiligThuis = $isTemplateVeiligThuis ?? false;
?>

<div class="site-branding | d-flex align-items-center mr-sm-4">
	<?php if ($isTemplateVeiligThuis) : ?>
		<img class="custom-logo" alt="" src="<?php echo sprintf('%s/assets/img/veilig-thuis-logo.png', get_stylesheet_directory_uri()); ?>" />
	<?php else : ?>
		<?php the_custom_logo(); ?>
	<?php endif; ?>
</div>
