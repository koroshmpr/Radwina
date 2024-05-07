<?php get_header(); ?>
    <section class="container py-5">
        <div class="row justify-content-center align-items-center gap-4">
            <div class="col-lg-10 col-11 animate__animated animate__slideInLeft">
                <h1 class="fw-bold text-primary display-3"><?= get_field('aboutus-title') ;?></h1>
                <p class="mb-0 text-justify fs-4"><?= get_field('aboutus-content') ;?></p>
            </div>
            <div class="col-lg-10 col-11 animate__animated animate__slideInRight">
                <img class="w-100 object-fit"
                     src="<?= get_field('aboutus_image')['url']; ?>"
                     alt="<?= get_field('aboutus_image')['title']; ?>">
            </div>
        </div>
    </section>
    <section>
        <div class="row justify-content-center text-center py-5">
            <div class="col-12 col-lg-7">
                <h4 class="text-primary fs-2 fw-bold"><?= get_field('title_statistics'); ?></h4>
                <p class="text-justify"><?= get_field('content_statistics'); ?></p>
                <div class="row row-cols-2 row-cols-lg-4 justify-content-center text-center py-5">
                    <?php
                    $j = 0;
                    while (have_rows('statistics_list')): the_row();;
                        ?>
                        <div class="animate__animated animate__fadeInUp animate__delay-<?= $j; ?>s">
                            <h5 class="fw-bolder fs-2 text-warning"><?= get_sub_field('list_statistics_value'); ?></h5>
                            <p><?= get_sub_field('list_statistics_title'); ?></p>
                        </div>
                        <?php
                        $j++;
                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>