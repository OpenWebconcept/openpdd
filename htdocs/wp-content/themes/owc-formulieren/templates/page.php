<?php
get_header();
?>
<main class="page-main">
	<div class="container">
		<?php while (have_posts()):
            the_post();?>

            <header class="section__header pb-3">
                <h1 class="section__title">
                    <?php echo get_the_title() ?>
                </h1>
            </header>

            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="lead pb-5">
                        <?php the_content();?>
                    </div>
                </div>
             </div>

        <?php endwhile;?>

	</div>
</main>

<?php get_footer();?>