    <div class="d-flex justify-content-between align-items-center pb-3">
        <h5 class="fw-bold fs-4 m-0">دیگر <span class="text-primary fw-bolder fs-3">خدمات</span></h5>
        <a class="btn btn-primary" href="/services">تمام خدمات</a>
    </div>
    <div class="post_swiper swiper">
        <?php
        $j = 0;
        $args = array(
            'post_type' => 'services',
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
                    <article class="all-dark">
                        <a class="m-1 border d-flex flex-column gap-3 border-1 p-3 align-items-center" href="<?php the_permalink(); ?>">
                            <img class="col-12" src="<?php echo the_post_thumbnail_url(); ?>"
                                 alt="<?php the_title(); ?>"/>
                            <h5 class="fw-bolder"> <?= get_the_title(); ?></h5>
                        </a>
                    </article>
                </div>
                <?php
                $j++;
            endwhile;
            endif;

            wp_reset_postdata(); ?>
        </div>

    </div>