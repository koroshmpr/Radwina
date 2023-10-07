<section class="container-fluid my-5 px-0">
    <h4 class="text-center fw-bolder fs-2">دسته بندی <span class="fw-bolder fs-1 text-primary ">محصولات </span></h4>
    <div class="category_swiper swiper my-3 shadow rounded pb-4">
        <?php
        $children = get_categories(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'pad_counts' => true,
            'hierarchical' => 1,
            'hide_empty' => true
        ));
        if ($children) { ?>
        <div class="swiper-wrapper">
            <?php
            $i = 2;
            foreach ($children as $subcat) {
                $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true); ?>
                <a class="swiper-slide text-center border-1 border rounded-1 p-2 animate__animated animate__slideInDown animate__delay-<?= $i; ?>s"
                   href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>">
                    <?php if (wp_get_attachment_url($thumbnail_id)) { ?>
                    <img class="w-100 object-fit cat-img rounded-1" src="<?= wp_get_attachment_url($thumbnail_id); ?>"
                         alt="<?= $subcat->name; ?>">
                    <?php } else {?>
                        <img class="p-4 rounded-1 cat-img" src="<?= get_field('brand_logo_img', 'option')['url']; ?>"
                             alt="<?= get_field('brand_logo_img', 'option')['title']; ?>">
                    <?php }?>
                    <div class="d-flex justify-content-evenly mt-2">
                        <h4 class="text-dark"><?= $subcat->name; ?></h4>
                        <p class="text-primary fw-bolder fs-4">(<?= $subcat->count; ?>)</p>
                    </div>
                    <?php
                    $i++ ; ?>
                </a>
                <?php
                wp_reset_postdata(); // Reset Query
            }
            }
            ?>
        </div>
    </div>

</section>