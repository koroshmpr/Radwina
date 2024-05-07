<section class="container py-4 my-4 px-3 bg-primary rounded-1" id="6cols_product">
    <div class="related_swiper swiper my-3">
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type'      => 'product', // Assuming your products are of type 'product'
                'posts_per_page' => 12, // Limit to 12 posts
                'orderby'        => 'rand', // Order randomly
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) : $query->the_post();?>
                    <div class="swiper-slide">
                        <?php get_template_part('template-parts/shop/single-card'); ?>
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