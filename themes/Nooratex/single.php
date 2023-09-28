<?php get_header();

while (have_posts()) :
    the_post();
    ?>
    <section class="container py-2">
        <div class="row align-items-center pb-4 justify-content-lg-between">
            <div class="col-12 col-lg-7">
                <h1><?php the_title(); ?></h1>
                <!--            table of content-->
                <div class="bg-primary bg-opacity-25 rounded px-4 py-2 my-3 my-lg-0 shadow-sm">
                    <h3 class="py-3">آنچه در این مقاله می‌خوانید:</h3>
                    <div class="d-flex align-items-center">
                        <?php echo do_shortcode('[TOC]') ?>
                    </div>
                </div>
            </div>
            <img class="col-12 col-lg-4 rounded-1"
                 src="<?= get_the_post_thumbnail_url(); ?>"
                 alt="<?= the_title(); ?>">
        </div>
        <div class="row justify-content-between">
            <article class="col-lg-7 col-12 text-dark text-justify">
                <?php the_content(); ?>
                <div class="my-2">
                    <h5 class="my-5 bg-primary p-3 rounded text-white">
                        ارسال نظر
                    </h5>
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </article>
            <aside class="col-lg-4 col-12">
                <?php wc_get_template_part( 'content', 'single-sidebar' ); ?>
            </aside>

        </div>

    </section>

<?php endwhile;
wp_reset_query();
get_footer(); ?>
