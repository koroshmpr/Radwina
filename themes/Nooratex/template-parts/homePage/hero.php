<section>
    <div class="swiper hero_swiper bg-primary">

        <div class="swiper-wrapper vh-100">
            <?php while (have_rows('hero_slider')):
                the_row();
                if (get_sub_field('slide_type') == 'image') { ?>
                    <div class="swiper-slide d-flex justify-content-center align-items-center hero_slider"
                         style="background-image: url('<?= get_sub_field('hero_image')['url']; ?>')">
                        <div class="col-10 col-lg-8 text-center">
                        <span class="p-1 bg-primary rounded text-white animate__animated animate__fadeInDown animate__delay-3s">
                            <?= get_sub_field('hero_badge'); ?>
                        </span>
                            <h5 class="py-1 my-2 bf-bright rounded text-white fw-bold display-2 animate__animated animate__fadeInUp">
                                <?= get_sub_field('hero_title'); ?></h5>
                            <p class="text-white opacity-75 animate__animated animate__fadeInUp">
                                <?= get_sub_field('hero_content'); ?></p>
                            <a class="btn bg-primary p-2 text-white animate__animated animate__fadeInUp animate__delay-2s"
                               href="<?= get_sub_field('hero_button_link'); ?>">
                                <?= get_sub_field('hero_button_title'); ?>
                            </a>
                        </div>
                    </div>
                <?php }
                if (get_sub_field('slide_type') == 'video') { ?>
                    <video autoplay loop muted playsinline autobuffer class="swiper-slide hero_slider object-fit" >
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
