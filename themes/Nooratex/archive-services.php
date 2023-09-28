<?php
/** Template Name: Blog Page */

get_header(); ?>

    <section class="container py-3">
        <h1 class="display-3 animate__animated animate__fadeInLeft animate__delay-2">خدمات</h1>
        <div class="row row-cols-1 row-cols-lg-3 justify-content-between g-4 pb-4">
            <?php
            $j = 0;
            $args = array(
                'post_type' => 'services',
                'post_status' => 'publish',
                'posts_per_page' => '-1',
                'ignore_sticky_posts' => true
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : $i = 0;
                /* Start the Loop */
                $i = 0;
                while ($loop->have_posts()) :
                    $loop->the_post();
                ?>
                    <article class="all-dark hover-effect animate__animated animate__fadeInDown  animate__delay-<?= $i; ?>s">
                        <a class="m-1 border d-flex flex-column gap-3 border-1 p-3 align-items-center" href="<?php the_permalink(); ?>">
                            <img class="col-12" src="<?php echo the_post_thumbnail_url(); ?>"
                                 alt="<?php the_title(); ?>"/>
                            <h5 class="fw-bolder"> <?= get_the_title(); ?></h5>
                        </a>
                    </article>
                    <?php $i++;
                endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <?php get_template_part('template-parts/useful/pagination'); ?>
    </section>
<?php get_footer(); ?>