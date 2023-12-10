<section class="container my-5 px-0">
    <h4 class="fw-bolder text-center text-lg-start fs-2">دسته‌بندی پارچه‌های چاپی<span class="fw-bolder fs-1 text-primary "> رادوینا</span></h4>
    <p class="text-dark text-center text-lg-start text-opacity-75">پرطرفدارترین دسته ها در یک نگاه</p>
    <div class="p-4 px-lg-0 row row-cols-lg-4 row-cols-1 align-items-center justify-content-lg-between justify-content-center gap-3">
        <?php
        // Get selected category IDs from ACF field
        $selected_category_ids = get_field('4column_cats', 'option');

        // Check if there are selected categories
        if ($selected_category_ids) {
        // Loop through the selected category IDs
        foreach ($selected_category_ids as $category_id) {
            $subcat = get_term($category_id, 'product_cat');
            if ($subcat && !is_wp_error($subcat)) {
                $thumbnail_id = get_field('shop_banner', $category_id);
                ?>
                <a class="rounded-3 shadow-sm row align-items-end p-4"
                   style="height:350px; background:url('<?= $thumbnail_id['url'] ?>')"
                   href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>/#6cols_product">
                    <h4 class="text-white fs-4 fw-bolder mb-0"><?= $subcat->name; ?></h4>
                </a>
                <?php
            }
        }
        }
        ?>
    </div>
</section>