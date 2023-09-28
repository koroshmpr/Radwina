<?php get_header();

while (have_posts()) :
    the_post();
    ?>
    <section class="container-fluid pb-2 p-0">
        <img class="vw-100 object-fit border-1 border py-3 animate__animated animate__backInRight" height="500"
             src="<?= get_the_post_thumbnail_url(); ?>"
             alt="<?= the_title(); ?>">
        <div class="container">
            <div class="row align-items-start py-4">
                <div class="col-12">
                    <h1 class="display-1 m-0 pt-3 text-center animate__animated animate__fadeInLeft animate__delay-1"><?= the_title(); ?></h1>
                </div>
                <article class="col-12 text-dark text-justify rounded-3 border border-1 p-lg-5 p-3 my-5 fs-5">
                    <?= the_content(); ?>
                </article>
                <div class="col-lg-5 col-12 my-2 p-lg-3 order-2 order-lg-1">
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
                <div class="col col-lg-7 order-1 order-lg-2 mb-5 mb-lg-0">
                    <?php get_template_part('template-parts/useful/more-services'); ?>
                </div>
            </div>
        </div>

    </section>
<?php endwhile;
wp_reset_query();
get_footer(); ?>
