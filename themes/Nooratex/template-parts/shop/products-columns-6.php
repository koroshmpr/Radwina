<section class="container py-4 my-4 px-3 bg-primary rounded-1" id="6cols_product">
    <div class="related_swiper swiper my-3">
<!--        --><?php
//
//        $args = array(
//            'post_type' => 'product',
//            'post_status' => 'publish',
//            'order' => 'ASC',
//            'orderby' => 'rand',
//            'posts_per_page' => '6',
//            'ignore_sticky_posts' => true
//        );
//        $loop = new WP_Query($args); ?>
        <div class="swiper-wrapper">
            <?php
            if (have_posts()) {
                while (have_posts()) : the_post();?>
                    <div class="swiper-slide">
                        <?php     get_template_part('template-parts/shop/single-card'); ?>
                    </div>
                <?php endwhile;
            } else {
                echo __('محصولی یافت نشد');
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>

</section>