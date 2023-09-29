<section>
    <div class="swiper hero_swiper bg-primary">

        <div class="swiper-wrapper vh-100">
            <?php while (have_rows('hero_slider')):
                the_row();
                if (get_sub_field('slide_type') == 'image') { ?>
                    <div class="swiper-slide d-flex justify-content-center align-items-center hero_slider"
                         style="background-image: url('<?= get_sub_field('hero_image')['url']; ?>')">
                        <div class="col-12 d-flex flex-column align-items-center">
                            <span class="p-3 bg-primary bg-opacity-75 text-white animate__animated animate__fadeInUp animate__delay-2s">
                            <?= get_sub_field('hero_badge'); ?>
                        </span>
                            <h5 class="p-4 mb-0 w-100 bg-dark bg-opacity-10 text-center text-white fw-bold display-2 animate__animated animate__fadeInUp shadow-sm">
                                <?= get_sub_field('hero_title'); ?></h5>
                            <?php if (get_sub_field('hero_content')) { ?>
                                <p class="text-white opacity-75 animate__animated animate__fadeInUp">
                                    <?= get_sub_field('hero_content'); ?></p>
                            <?php } ?>
                            <a class="btn rounded-0 rounded-bottom bg-primary bg-opacity-75 p-3 text-white animate__animated animate__fadeInDown animate__delay-2s"
                               href="<?= get_sub_field('hero_button_link'); ?>">
                                <?= get_sub_field('hero_button_title'); ?>
                            </a>
                        </div>
                    </div>
                <?php }
                if (get_sub_field('slide_type') == 'video') { ?>
                    <video autoplay loop muted playsinline autobuffer class="swiper-slide hero_slider object-fit">
                        <source src="<?= get_sub_field('hero_video')['url']; ?>" type='video/mp4'>
                        <source src="<?= get_sub_field('hero_video')['url']; ?>" type='video/webm'>
                        Your browser does not support the video tag.
                    </video>
                <?php } endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next text-white">
            <i class="bi bi-arrow-left-circle-fill fs-2"></i>
        </div>
        <div class="swiper-button-prev text-white">
            <i class="bi bi-arrow-right-circle-fill fs-2"></i>
        </div>
    </div>

</section>
