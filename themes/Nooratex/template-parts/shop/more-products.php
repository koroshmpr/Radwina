<section class="container py-4 bg-primary rounded-1 overflow-hidden">
    <div class="product_swiper swiper my-3">
        <?php

        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'rand',
            'posts_per_page' => '6',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args); ?>
        <div class="swiper-wrapper">
            <?php
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();?>
                <div class="swiper-slide">
                    <?php     get_template_part('template-parts/shop/single-card'); ?>
                </div>
               <?php endwhile;
            } else {
                echo __('No products found');
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>

</section>