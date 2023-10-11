<?php declare(strict_types=1);
/**
 * Template name: Mijn Zaken
 */
get_template_part('mijn-zaken/header');

?>
    <main class="page-main page-main--mijn-zaken container" id="readspeaker">
        <aside class="page-main__aside">
            <?php get_template_part('partials/sidebar', 'mijn-zaken'); ?>
        </aside>
        <article class="page-main__content">
            <?php the_content(); ?>
        </article>
    </main>
<?php

get_template_part('mijn-zaken/footer');
