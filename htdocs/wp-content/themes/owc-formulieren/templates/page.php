<?php
get_header();
?>
<main class="page-main">
    <div class="container | bg-white p-3 p-md-4 p-lg-5 my-5 shadow">
        <?php while (have_posts()) :
            the_post(); ?>

            <header class="section__header pb-3">
                <h1 class="section__title">
                    <?php echo get_the_title() ?>
                </h1>
            </header>

            <div class="row">
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>