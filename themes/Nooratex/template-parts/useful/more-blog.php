<section class="container py-4">
    <div class="d-flex justify-content-between align-items-center pb-2">
        <h4 class="fw-bolder">آخرین <span class="fw-bolder text-primary "> مقالات</span></h4>
        <a class="text-dark fw-bold" href="<?php echo site_url('/blog'); ?>">مشاهده همه ></a>
    </div>
    <div class="post_swiper swiper">
        <?php
        $j = 0;
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => '5',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <div class="swiper-wrapper">
            <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div class="swiper-slide">
                    <?php get_template_part('template-parts/useful/blog-card'); ?>
                </div>
                <?php
                $j++;
            endwhile;
            endif;

            wp_reset_postdata(); ?>
        </div>

    </div>

</section>