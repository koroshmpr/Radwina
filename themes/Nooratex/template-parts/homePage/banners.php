<section class="container py-3">
    <div class="row justify-content-center justify-content-lg-between align-items-stretch gap-3">
        <div class="col-lg-9 d-flex gap-3 flex-wrap justify-content-between banner-area px-lg-0">
<!--            banner-1-->
            <article style="background-color: <?= get_field('banner_color_1'); ?>"
                     class="col-12 banner-card col-lg-8 rounded d-flex justify-content-around p-3 align-items-center">
                <div class="col-4">
                    <h5 class="text-white fw-bold display-2 text-shadow">
                        <?= get_field('banner_title_1'); ?>
                    </h5>
                    <p><?= get_field('banner_content_1'); ?></p>
                    <a href="<?= get_field('banner_button_link_1'); ?>"
                       class="text-black btn rounded bg-white align-items-center shadow-sm stretched-link">
                        <?= get_field('banner_button_title_1'); ?>
                        <i style="background-color: <?= get_field('banner_color_1'); ?>"
                           class="bi bi-arrow-left ms-2 px-1 text-white rounded-circle"></i>
                    </a>
                </div>
                <img class="col-6 col-lg-8"
                     src="<?= get_field('banner_image_1')['url']; ?>"
                     alt="<?= get_field('banner_image_1')['title']; ?>">
            </article>
<!--            banner-2-->
            <article style="background-color: <?= get_field('banner_color_4'); ?>"
                     class="col banner-card rounded pe-3 pb-3 text-center">
                <img class="w-100"
                     src="<?= get_field('banner_image_4')['url']; ?>"
                     alt="<?= get_field('banner_image_4')['title']; ?>">
                <h5 class="text-white fw-bold display-5 text-shadow">
                    <?= get_field('banner_title_4'); ?>
                </h5>
                <p><?= get_field('banner_content_4'); ?></p>
                <a href="<?= get_field('banner_button_link_4'); ?>"
                   class="text-black btn rounded bg-white align-items-center shadow-sm stretched-link">
                    <?= get_field('banner_button_title_4'); ?>
                    <i style="background-color: <?= get_field('banner_color_4'); ?>"
                       class="bi bi-arrow-left ms-2 px-1 text-white rounded-circle"></i>
                </a>
                <br>

            </article>
<!--            banner-3-->
            <article style="background-color: <?= get_field('banner_color_2'); ?>"
                     class="col banner-card rounded pe-3 pb-3 text-center">
                <img class="w-100"
                     src="<?= get_field('banner_image_2')['url']; ?>"
                     alt="<?= get_field('banner_image_2')['title']; ?>">
                <h5 class="text-white fw-bold display-5 text-shadow">
                    <?= get_field('banner_title_2'); ?>
                </h5>
                <p><?= get_field('banner_content_2'); ?></p>
                <a href="<?= get_field('banner_button_link_2'); ?>"
                   class="text-black btn rounded bg-white align-items-center shadow-sm stretched-link">
                    <?= get_field('banner_button_title_2'); ?>
                    <i style="background-color: <?= get_field('banner_color_2'); ?>"
                       class="bi bi-arrow-left ms-2 px-1 text-white rounded-circle"></i>
                </a>
                <br>

            </article>
<!--            banner-4-->
            <article style="background-color: <?= get_field('banner_color_3'); ?>"
                     class="col banner-card rounded pe-3 pb-3 text-center">
                <img class="w-100"
                     src="<?= get_field('banner_image_3')['url']; ?>"
                     alt="<?= get_field('banner_image_3')['title']; ?>">
                <h5 class="text-white fw-bold display-5 text-shadow">
                    <?= get_field('banner_title_3'); ?>
                </h5>
                <p><?= get_field('banner_content_3'); ?></p>
                <a href="<?= get_field('banner_button_link_3'); ?>"
                   class="text-black btn rounded bg-white align-items-center shadow-sm">
                    <?= get_field('banner_button_title_3'); ?>
                    <i style="background-color: <?= get_field('banner_color_3'); ?>"
                       class="bi bi-arrow-left ms-2 px-1 text-white rounded-circle"></i>
                </a>
                <br>

            </article>
<!--            banner-5-->
            <article style="background-color: <?= get_field('banner_color_5'); ?>"
                     class="col banner-card rounded pe-3 pb-3 text-center">
                <img class="w-100"
                     src="<?= get_field('banner_image_5')['url']; ?>"
                     alt="<?= get_field('banner_image_5')['title']; ?>">
                <h5 class="text-white fw-bold display-5 text-shadow">
                    <?= get_field('banner_title_5'); ?>
                </h5>
                <p><?= get_field('banner_content_5'); ?></p>
                <a href="<?= get_field('banner_button_link_5'); ?>"
                   class="text-black btn rounded bg-white align-items-center shadow-sm stretched-link">
                    <?= get_field('banner_button_title_5'); ?>
                    <i style="background-color: <?= get_field('banner_color_5'); ?>"
                       class="bi bi-arrow-left ms-2 px-1 text-white rounded-circle"></i>
                </a>
                <br>

            </article>
        </div>
<!--        banner-6-->
        <article style="background-color: <?= get_field('banner_color_6'); ?>"
                 class="col-11 col-lg banner-card rounded p-3 text-center d-flex flex-column justify-content-between
                 align-items-center my-2 my-lg-0">
            <div>
                <h5 class="text-white fw-bold display-5 text-shadow">
                    <?= get_field('banner_title_6'); ?>
                </h5>
                <p><?= get_field('banner_content_6'); ?></p>
                <a href="<?= get_field('banner_button_link_6'); ?>"
                   class="text-black btn rounded bg-white align-items-center shadow-sm stretched-link">
                    <?= get_field('banner_button_title_6'); ?>
                    <i style="background-color: <?= get_field('banner_color_6'); ?>"
                       class="bi bi-arrow-left ms-2 px-1 text-white rounded-circle"></i>
                </a>
            </div>
            <img class="col-12" src="<?= get_field('banner_image_6')['url']; ?>"
                 alt="<?= get_field('banner_image_6')['title']; ?>">
        </article>
    </div>
</section>