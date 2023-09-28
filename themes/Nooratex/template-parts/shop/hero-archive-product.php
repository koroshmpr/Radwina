<section>
    <div class="swiper shop_swiper bg-primary"  style=" height: 500px;">

        <div class="swiper-wrapper">
            <?php while (have_rows('shop-slider', 'option')):
            the_row(); ?>
            <div class="swiper-slide hero_slider"
                 style="background-image: url('<?= get_sub_field('shop-slide-image', 'option')['url']; ?>')">
            </div>
        <?php
        endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
