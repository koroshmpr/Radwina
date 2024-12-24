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

// Get the current paged value
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Only display these template parts on the first page
if ($paged === 1) {
    get_template_part('template-parts/shop/hero-archive-product');
    get_template_part('template-parts/shop/threeColsBanner');
    get_template_part('template-parts/shop/category-Columns-4');
}

// Always display the archive product list
get_template_part('template-parts/shop/archive-product-list');

// Optionally display the shop coupon section on all pages
if ($paged === 1 && get_field('shop-coupen_type', 'option')) :
    get_template_part('template-parts/shop/shop-coupen');
endif;

// Optionally include About Us section only on the first page
if ($paged === 1) {
    get_template_part('template-parts/homePage/about-us');
}

// Uncomment the following line if CTA should only appear on the first page
// if ($paged === 1) get_template_part('template-parts/shop/shop-cta');
?>

<?php
get_footer('shop');