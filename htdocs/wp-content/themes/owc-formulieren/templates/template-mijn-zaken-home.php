<?php declare(strict_types=1);
/**
 * Template name: Mijn Zaken Home
 */
get_template_part('templates/mijn-zaken/header');

$home_config = load_home_config('home.php');

?>
    <main class="page-main page-main--mijn-zaken-main" id="readspeaker">
		<div class="container | mb-5 pb-5">
			<h1 class="mb-4"><?php the_title(); ?></h1>

			<h2 class="mb-4">Inloggen</h2>

			<div class="row">
				<?php echo get_template_part('templates/mijn-zaken/home/login-digid', null, [
					'digid_is_active' => $home_config['digid_is_active'],
					'digid_provider' => $home_config['digid_provider'],
				]); ?>
				<?php echo get_template_part('templates/mijn-zaken/home/login-eherkenning', null, [
	                'eherkenning_is_active' => $home_config['eherkenning_is_active'],
					'eherkenning_provider' => $home_config['eherkenning_provider'],
				]); ?>
				<?php echo get_template_part('templates/mijn-zaken/home/login-eidas', null, [
					'eidas_is_active' => $home_config['eidas_is_active'],
					'eidas_provider' => $home_config['eidas_provider'],
				]); ?>
			</div>
		</div>
		<div class="container pt-md-5">
			<div class="row">
				<div class="col-lg-7">
					<div class="page-main__content | shadow bg-white border p-3 p-md-4 normalize-child-margin">
					<?php the_content(); ?>
					</div>
				</div>
			</div>

		</div>

		<?php if(has_post_thumbnail()): ?>
			<?php the_post_thumbnail('full', ['class' => 'w-100 h-400px object-fit-cover']); ?>
		<?php endif; ?>
    </main>
<?php

get_template_part('templates/mijn-zaken/footer');
