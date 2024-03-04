<?php
/**
 * The template for displaying product category archives.
 *
 * @link https://woocommerce.com/
 *
 * @package WooCommerce
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

    <section class="container-xl" id="archivePage">
        <div class="row pb-5 align-items-start">
            <aside class="col-lg-3 order-last order-lg-first">
                <div class="row p-2 pb-1 border border-info rounded-4 mt-3 mt-lg-0 justify-content-end" id="category-dropdown">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'name',
                        'parent' => 0, // Get only parent categories
                        'hide_empty' => true,
                    ));

                    $current_category_id = get_queried_object_id(); // Get the current category ID

                    if ($categories) {
                        foreach ($categories as $category) {
                            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $category_id = 'category-' . $category->term_id; // Generate a unique ID for each category
                            $category_class = ($category->term_id === $current_category_id) ? 'bg-primary bg-opacity-10' : ''; // Add class for the current category
                            ?>

                            <a href="<?= esc_url(get_term_link($category, $category->taxonomy)); ?>"
                               class="my-1 <?= $category_class; ?> border-info d-flex justify-content-between align-items-center p-3 border border-1 overflow-hidden rounded-4">
                                <h6 class="category-title fw-bold mb-0 fs-6"><?= $category->name; ?></h6>
                                <p class="mb-0 text-primary small fw-bold pe-2 ms-auto">
                                    <?= $category->count; ?>
                                    <span class="ps-1">کالا</span>
                                </p>
                            </a>

                            <?php
                            // Get child categories
                            $children = get_terms(array(
                                'taxonomy' => 'product_cat',
                                'orderby' => 'name',
                                'parent' => $category->term_id, // Get child categories for the current parent
                                'hide_empty' => false,
                            ));

                            if ($children) {
                                foreach ($children as $subcat) {
                                    $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true);
                                    $subcat_id = 'subcat-' . $subcat->term_id; // Generate a unique ID for each subcategory
                                    $subcat_class = ($subcat->term_id === $current_category_id) ? 'bg-primary bg-opacity-10' : 'bg-info bg-opacity-25'; // Add class for the current subcategory
                                    ?>

                                    <a href="<?= esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>"
                                       class="my-1 col-11 <?= $subcat_class; ?> border-info d-flex justify-content-between align-items-center p-3 border border-1 overflow-hidden rounded-4">
                                        <h6 class="category-title fw-bold mb-0 fs-6"><?= $subcat->name; ?></h6>
                                        <p class="mb-0 text-primary small fw-bold pe-2 ms-auto">
                                            <?= $subcat->count; ?>
                                            <span class="ps-1">کالا</span>
                                        </p>
                                    </a>

                                    <?php
                                    wp_reset_postdata(); // Reset Query for child categories
                                }
                            }
                        }
                    }
                    ?>
                </div>
                <?php
                get_template_part('template-parts/sidebar');
                ?>
            </aside>
            <div class="col-lg-9 row g-lg-3 g-2 row-cols-xl-4 row-cols-lg-3 row-cols-md-4 row-cols-2 m-0"
                 id="ajaxFilter">
                <?php if (have_posts()) {
                    while (have_posts()) : the_post(); ?>
                        <article>
                            <?php wc_get_template_part('content', 'single-card'); ?>
                        </article>
                    <?php endwhile;
                } else { ?>
                  <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-primary bg-opacity-10">هیچ محصولی یافت نشد</h2>
               <?php }
                wp_reset_postdata();
                ?>
                <?php get_template_part('template-parts/pagination') ?>
            </div>
        </div>
    </section>
<?php if (category_description()) { ?>
    <section class="container position-relative rounded-4 p-2 p-lg-4 mt-3 mt-lg-0 mb-5" style="background-color: #F9FBFA;">
        <div class="accordion accordion-preview" id="categoryAccordion">
            <div class="accordion-item bg-transparent border-0">
                <h6 class="accordion-header position-absolute bottom-0 start-50 translate-middle-x z-1 mb-n3" id="categoryHeader">
                    <button class="btn text-primary bg-white border collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                        مشاهده بیشتر
                    </button>
                </h6>
                <div id="categoryCollapse" class="accordion-collapse collapse" aria-labelledby="categoryHeader"
                     data-bs-parent="#categoryAccordion">
                    <div class="accordion-body">
                        <?php echo category_description(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer();
