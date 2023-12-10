<section class="container my-5 px-0">
    <h4 class="text-center fw-bolder fs-2">محصولات و خدمات<span class="fw-bolder fs-1 text-primary "> رادوینا</span></h4>
    <p class="text-dark text-opacity-75 text-center">پرطرفدارترین دسته ها در یک نگاه</p>
    <div class="py-4 row row-cols-lg-3 row-cols-1 align-items-center justify-content-lg-between justify-content-center gap-3">
        <?php
        // Get selected category IDs from ACF field
        $selected_category_ids = get_field('3column_cats', 'option');

        // Check if there are selected categories
        if ($selected_category_ids) {
            // Loop through the selected category IDs
            foreach ($selected_category_ids as $category_id) {
                $subcat = get_term($category_id, 'product_cat');
                if ($subcat && !is_wp_error($subcat)) {
                    $thumbnail_id = get_field('shop_banner', $category_id);
                    ?>
                    <a class="rounded-3 shadow-sm row align-items-end p-4 animate__animated animate__slideInDown"
                       style="height:300px; background:url('<?= $thumbnail_id['url'] ?>')"
                       href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>/#6cols_product">
                        <div class="d-flex justify-content-between bg-white p-3 rounded-2">
                            <h4 class="text-dark mb-0"><?= $subcat->name; ?></h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>
                        </div>
                    </a>
                    <?php
                }
            }
        }
        ?>
    </div>
</section>
