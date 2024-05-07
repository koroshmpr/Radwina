<?php /* Template Name: Home */
/**
 * Front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */

get_header();


if (have_posts())
    the_post();
//hero
get_template_part('template-parts/homePage/hero');
//    services
get_template_part('template-parts/homePage/services-list');
//    services -detail
get_template_part('template-parts/homePage/service-detail');
//    banners
get_template_part('template-parts/homePage/banners');
//    property
get_template_part('template-parts/homePage/property');
//timer
//get_template_part('template-parts/homePage/timer');
//more products
get_template_part('template-parts/shop/more-products');
//    coupon
get_template_part('template-parts/homePage/about-us');
//    coupon
if (get_field('coupen_type')) :
    get_template_part('template-parts/homePage/coupon');
endif;
//    counseling-form
get_template_part('template-parts/homePage/Counseling-form');
//    blog
get_template_part('template-parts/useful/more-blog');


get_footer();