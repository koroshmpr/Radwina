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
                <div class="d-none d-lg-inline">
                    <?php
                    get_template_part('template-parts/shop/category-list_sidebar');
                    if (get_field('sidebar-wp', 'option')) :
                        get_template_part('template-parts/sidebar');
                    endif;
                    ?>
                </div>
                <div class="d-lg-none">
                    <button class="btn btn-primary bg-opacity-75 position-fixed start-50 translate-middle-x rounded-circle call-btn"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">
                        <svg width="25" height="25" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                        </svg>
                    </button>
                </div>
            </aside>
            <div class="col-lg-9 row g-lg-3 g-2 row-cols-xl-4 row-cols-lg-3 row-cols-md-4 row-cols-2 m-0"
                 id="ajaxFilter">
                <?php
                get_template_part('template-parts/shop/orderby-category');

                if (have_posts()) {
                    while (have_posts()) : the_post(); ?>
                        <article>
                            <?php wc_get_template_part('content', 'single-card'); ?>
                        </article>
                    <?php endwhile;
                } else { ?>
                    <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-primary bg-opacity-10">هیچ محصولی
                        یافت نشد</h2>
                <?php }
                wp_reset_postdata();
                ?>
                <?php get_template_part('template-parts/pagination') ?>
            </div>
        </div>
    </section>
<?php if (category_description()) { ?>
    <section class="container position-relative rounded-4 p-2 p-lg-4 mt-3 mt-lg-0 mb-5"
             style="background-color: #F9FBFA;">
        <div class="accordion accordion-preview" id="categoryAccordion">
            <div class="accordion-item bg-transparent border-0">
                <h6 class="accordion-header position-absolute bottom-0 start-50 translate-middle-x z-1 mb-n3"
                    id="categoryHeader">
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
