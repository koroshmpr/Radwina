<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

?>
<?php get_template_part('template-parts/shop/hero-archive-product');
get_template_part('template-parts/shop/threeColsBanner');
get_template_part('template-parts/shop/category-Columns-4');
get_template_part('template-parts/shop/products-columns-6');
if (get_field('shop-coupen_type' , 'option')) :
    get_template_part('template-parts/shop/shop-coupen');
endif;
get_template_part('template-parts/homePage/about-us');
//get_template_part('template-parts/shop/shop-cta');
?>
    <!--    {{--  about and order banner  --}}-->
    <!--    <section id="archivePage">-->
    <!--        <div class="container-xl">-->
    <!--            <div class="row pb-5">-->
    <!--                                {{-- filters sidebar for lg up --}}-->
    <!--                <div class="col-lg-3">-->
    <!--                    --><?php
//                    get_template_part('template-parts/sidebar')
//                    ?>
    <!--                </div>-->
    <!---->
    <!--                <div class="col-lg-9 row g-lg-3 g-2 row-cols-xl-4 row-cols-lg-3 row-cols-md-4 row-cols-2 m-0"-->
    <!--                     id="ajaxFilter">-->
    <!--                    --><?php //if (have_posts()) {
//                        while (have_posts()) : the_post(); ?>
    <!--                            <article>-->
    <!--                                --><?php //wc_get_template_part('content', 'single-card'); ?>
    <!--                            </article>-->
    <!--                        --><?php //endwhile;
//                    } else {
//                        echo __('هیچ محصولی یافت نشد');
//                    }
//                    wp_reset_postdata();
//                    ?>
    <!--                    --><?php //get_template_part('template-parts/pagination') ?>
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
<?php


get_footer('shop');
