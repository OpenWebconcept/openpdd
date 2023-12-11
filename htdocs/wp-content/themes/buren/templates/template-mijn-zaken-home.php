<?php declare(strict_types=1);
/**
 * Template name: Mijn Zaken Home
 */
get_template_part('mijn-zaken/header');

?>
    <main class="page-main page-main--mijn-zaken-main" id="readspeaker">
		<div class="container | mb-5 pb-5">
			<h1 class="mb-4"><?php the_title(); ?></h1>

			<h2 class="mb-4">Inloggen</h2>

			<div class="row">
				<div class="col-lg-7 | mb-3 mb-md-0">
					<div class="h-100 border p-3 p-md-4">
						<h3>Inloggen als persoon</h3>
						<div class="d-flex pb-4 mb-4 border-bottom">
							<svg id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 141.73 141.73" width="80px" height="80px"><path d="m20,0h101.74c11.04,0,20,8.96,20,20v101.74c0,11.04-8.96,20-20,20H20c-11.04,0-20-8.96-20-20V20C0,8.96,8.96,0,20,0Z" stroke-width="0"/><path d="m15.75,108.25v-33.49h9.6c11.33,0,17.61,5.67,17.61,15.78,0,12.1-6.84,17.72-17.82,17.72h-9.39Zm6.13-5.05h3.52c6.74,0,11.13-3.62,11.13-12.36,0-7.25-4.39-11.03-11.59-11.03h-3.06v23.38Z" fill="#fff" stroke-width="0"/><path d="m51.24,72.51c2.2,0,3.42,1.38,3.42,3.32,0,1.79-1.22,3.27-3.42,3.27s-3.37-1.33-3.37-3.27c0-1.79,1.17-3.32,3.37-3.32Zm2.91,35.74h-5.77v-25.12l5.77-.26v25.37Z" fill="#fff" stroke-width="0"/><path d="m68.13,103.34h6.02c5.41,0,7.71,2.14,7.71,6.23,0,4.8-3.98,8.68-13.17,8.68-7.2,0-10.52-2.55-10.52-6.48,0-2.4,1.33-4.39,3.83-5.46v-.15c-1.17-.61-1.99-1.89-1.99-3.37,0-1.58.97-3.06,2.81-3.78v-.15c-2.3-1.28-3.62-3.42-3.62-6.69,0-6.13,4.14-9.45,10.52-9.45,1.38,0,2.6.15,3.88.51h8.17v3.83h-3.88v.15c1.07.82,1.99,2.55,1.99,4.75,0,5.57-3.78,8.48-10.72,8.48-1.12,0-2.2-.15-3.17-.41-.66.36-1.07.97-1.07,1.58,0,1.12.87,1.74,3.22,1.74Zm1.07,10.62c5.51,0,7.51-1.38,7.51-3.37,0-1.48-.92-2.3-3.42-2.35l-8.37-.25c-.97.66-1.38,1.48-1.38,2.65,0,1.99,1.74,3.32,5.67,3.32Zm5.31-22.46c0-3.06-1.69-4.7-4.9-4.7-2.86,0-4.9,1.63-4.9,5.05s1.84,4.65,4.8,4.65c3.17,0,5-1.48,5-5Z" fill="#fff" stroke-width="0"/><path d="m88.56,72.51c2.2,0,3.42,1.38,3.42,3.32,0,1.79-1.22,3.27-3.42,3.27s-3.37-1.33-3.37-3.27c0-1.79,1.17-3.32,3.37-3.32Zm2.91,35.74h-5.77v-25.12l5.77-.26v25.37Z" fill="#e17000" stroke-width="0"/><path d="m98.77,108.25v-33.49h9.6c11.34,0,17.62,5.67,17.62,15.78,0,12.1-6.84,17.72-17.82,17.72h-9.39Zm6.13-5.05h3.52c6.74,0,11.13-3.62,11.13-12.36,0-7.25-4.39-11.03-11.59-11.03h-3.06v23.38Z" fill="#e17000" stroke-width="0"/></svg>
							<div class="pl-4">
								<div class="muted mb-2">Met DigiD</div>
								<a href="/inloggen" class="wp-block-button__link d-inline-block py-2">
									Inloggen
									<i class="fa-solid fa-arrow-right pl-1"></i>
									<span class="sr-only">, opent in een nieuw tabblad</span>
								</a>
							</div>
						</div>

						<div>Geen DigiD?
							<a href="https://www.digid.nl/aanvragen-en-activeren/digid-aanvragen/" class="d-inline-block pl-1" target="_blank">Vraag DigiD aan <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i><span class="sr-only">, opent in een nieuw tabblad</span></a>
						</div>
					</div>
				</div>
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

get_template_part('mijn-zaken/footer');
