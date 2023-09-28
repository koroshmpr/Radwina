<section class="container mt-3 py-3">
    <div class="row row-cols-2 row-cols-lg-6 px-lg-5 g-2 justify-content-center">
        <?php
        $j = 0;
        $services = array(
            'post_type' => 'services',
            'post_status' => 'publish',
            'posts_per_page' => '4',
            'ignore_sticky_posts' => true
        );
        $loop_services = new WP_Query($services);
        if ($loop_services->have_posts()) : $i = 0;
            /* Start the Loop */
            while ($loop_services->have_posts()) :
                $loop_services->the_post(); ?>
                <a class="text-center animate__animated animate__fadeInDown animate__delay-<?= $j; ?>s"
                   href="<?php the_permalink(); ?>">
                    <div class="p-2 bg-primary border border-2 border-white rounded-1 h-100 shadow-sm">
                        <img width="60" height="60" src="<?= get_field('services_image')['url']; ?>"
                             alt="<?= get_field('services_image')['title']; ?>">
                        <h5 class="fw-bold text-white my-3"><?php the_title(); ?></h5>
                    </div>
                </a>
                <?php
                $j++;
            endwhile;
        endif;
        wp_reset_postdata(); ?>

    </div>
</section>
