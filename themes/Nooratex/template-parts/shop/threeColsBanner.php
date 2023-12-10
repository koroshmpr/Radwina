<section class="container my-5 px-0">
    <h4 class="text-center fw-bolder fs-2">محصولات و خدمات<span class="fw-bolder fs-1 text-primary "> رادوینا</span></h4>
    <p class="text-dark text-opacity-75 text-center">پرطرفدارترین دسته ها در یک نگاه</p>
    <div class="p-4 px-lg-0 row row-cols-lg-3 row-cols-1 align-items-center justify-content-lg-between justify-content-center gap-3">
        <?php
        // Get selected banners from ACF repeater field
        $banners = get_field('3Cols_banner', 'option');

        // Check if there are selected banners
        if ($banners) {
            // Loop through the selected banners
            foreach ($banners as $banner) {
                $title = $banner['shop_banner_title'];
                $link = $banner['shop_banner_link'];
                $img = $banner['shop_banner_img'];
                ?>
                <a class="rounded-3 shadow-sm row align-items-end p-4 animate__animated animate__zoomIn"
                   style="height:350px;background-size: contain!important; background:url('<?= esc_url($img['url']) ?>')"
                   href="<?= esc_url($link['url'] ?? ''); ?>">
                    <div class="d-flex justify-content-between bg-white p-3 rounded-2">
                        <h4 class="text-dark mb-0"><?= esc_html($title); ?></h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                        </svg>
                    </div>
                </a>
            <?php }
        }
        ?>
    </div>
</section>
