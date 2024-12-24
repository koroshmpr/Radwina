<section class="container my-5 px-0">
    <h4 class="fw-bolder text-center text-lg-start fs-2">دسته‌بندی پارچه‌های چاپی<span class="fw-bolder fs-1 text-primary "> رادوینا</span></h4>
    <p class="text-dark text-center text-lg-start text-opacity-75">پرطرفدارترین دسته ها در یک نگاه</p>
<!--    <div class="p-4 px-lg-0 row row-cols-lg-4 row-cols-1 align-items-center justify-content-lg-between justify-content-center gap-3">-->
    <div class="swiper product_swiper">
        <div class="swiper-wrapper">
        <?php
        // Get selected category IDs from ACF field
//        $selected_category_ids = get_field('4column_cats', 'option');

        $children = get_categories(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'pad_counts' => true,
            'hierarchical' => 1,
            'hide_empty' => true
        ));
        // Check if there are selected categories
//        if ($selected_category_ids) {
        if ($children) {
        // Loop through the selected category IDs
        foreach ($children as $category_id) {
            $subcat = get_term($category_id, 'product_cat');
            if ($subcat && !is_wp_error($subcat)) {
                $thumbnail_id = get_field('shop_banner', $category_id);
                ?>
                <a class="swiper-slide rounded-3 shadow-sm row align-items-end p-3"
                   style="height:200px; background:url('<?= $thumbnail_id['url'] ?>')"
                   href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>/#6cols_product">
                    <h4 class="text-white bg-dark bg-opacity-75 p-3 rounded-2 fs-6 fw-bolder mb-0 d-flex justify-content-between"><?= $subcat->name; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                        </svg>
                    </h4>
                </a>
                <?php
            }
        }
        }
        ?>
        </div>
    </div>
    </div>
</section>