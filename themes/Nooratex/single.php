<?php get_header();

while (have_posts()) :
    the_post();
    ?>
    <section class="container-fluid mb-4 p-0">
        <img class="vw-100 object-fit animate__animated animate__backInRight" height="500"
             src="<?= get_the_post_thumbnail_url(); ?>"
             alt="<?= the_title(); ?>">
    </section>
    <section class="container py-2">
        <div class="row justify-content-between">
            <div class="col-lg-7 col-12 text-dark text-justify">
                <h1><?php the_title(); ?></h1>
                <article class="py-4">
                    <?php the_content(); ?>
                </article>
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
            </div>
            <aside class="col-lg-4 col-12">
                <!--            table of content-->
                <div class="bg-primary bg-opacity-25 rounded px-4 py-2 mb-3 shadow-sm">
                    <h3 class="py-3">آنچه در این مقاله می‌خوانید:</h3>
                    <div class="d-flex align-items-center">
                        <?php echo do_shortcode('[TOC]') ?>
                    </div>
                </div>
                <?php wc_get_template_part('content', 'single-sidebar'); ?>
            </aside>

        </div>

    </section>

<?php endwhile;
wp_reset_query();
get_footer(); ?>
