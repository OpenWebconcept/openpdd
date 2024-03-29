<?php declare(strict_types=1);
/**
 * Template Name: Veilig thuis style
 */

get_template_part('templates/veilig-thuis-header');
?>
<main class="page-main">
    <div class="container | bg-white p-3 p-md-4 p-lg-5 my-5 shadow">
        <?php while (have_posts()) :
            the_post(); ?>

        <header class="section__header pb-3">
            <h1 class="section__title">
                <?php echo get_the_title(); ?>
            </h1>
        </header>

        <div class="row">
            <div class="col-md-12">
                <div id="readspeaker_button1" class="rs_skip rsbtn rs_preserve mb-3">
                    <a rel="nofollow" class="rsbtn_play" accesskey="L"
                        title="Laat de tekst voorlezen met ReadSpeaker webReader"
                        href="//app-eu.readspeaker.com/cgi-bin/rsent?customerid=13499&amp;lang=nl_nl&amp;readid=readspeaker&amp;url=<?php echo get_permalink() ?>">
                        <span class="rsbtn_left rsimg rspart"><span class="rsbtn_text"><span>Lees
                                    voor</span></span></span>
                        <span class="rsbtn_right rsimg rsplay rspart"></span>
                    </a>
                </div>
                <div id="readspeaker">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer();
