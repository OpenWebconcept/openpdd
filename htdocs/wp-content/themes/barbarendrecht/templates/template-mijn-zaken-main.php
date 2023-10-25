<?php declare(strict_types=1);
/**
 * Template name: Mijn Zaken + Main
 */
get_template_part('mijn-zaken/header');

?>
    <main class="page-main page-main--mijn-zaken-main container" id="readspeaker">
        <article class="page-main__content">
			<h1><?php the_title() ?></h1>
            <?php the_content(); ?>
        </article>
    </main>
<?php

get_template_part('mijn-zaken/footer');
