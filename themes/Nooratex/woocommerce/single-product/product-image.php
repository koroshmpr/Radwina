<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
    'woocommerce_single_product_image_gallery_classes' . ' w-100',
    array(
        'h-100',
        'woocommerce-product-gallery',
        'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
        'woocommerce-product-gallery--columns-' . absint($columns),
        'images',
    )
);
?>
<?php
// Existing code for product gallery wrapper
?>

<div class="px-0 <?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>"
     data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <figure class="woocommerce-product-gallery__wrapper h-100">
        <?php
        $gallery_image_ids = $product->get_gallery_image_ids();
        // If there are multiple images, initialize Swiper
        ?>
        <div class="swiper-container hero_swiper overflow-hidden position-relative h-100 d-flex justify-content-center align-items-center">
            <div class="swiper-wrapper">
                <?php
                // Add your image URL here
                $image_url = get_the_post_thumbnail_url();

                // Output the first slide with the image
                ?>
                <div class="swiper-slide m-0">
                    <img class="product__image" src="<?= $image_url; ?>"
                         alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                </div>

                <?php
                foreach ($gallery_image_ids  as $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    ?>
                    <div class="swiper-slide m-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                                class="product__image woocommerce-product-gallery__image border-0 bg-transparent"
                                data-image-id="<?php echo esc_attr($image_id); ?>">
                            <img class="product__image" src="<?php echo esc_url($image_url); ?>"
                                 alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                        </button>
                    </div>
                <?php } ?>

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev text-primary translate-middle-y">
                <i class="bi bi-arrow-right-circle-fill fs-1"></i>
            </div>
            <div class="swiper-button-next text-primary translate-middle-y">
                <i class="bi bi-arrow-left-circle-fill fs-1"></i>
            </div>
        </div>
    </figure>
    <script>
        jQuery(document).ready(function () {
            jQuery('.product__image').each(function () {
                jQuery(this).on('click', function (e) {
                    e.preventDefault();
                    console.log('clicked');
                    var imageId = jQuery(this).attr('src');
                    console.log(imageId)
                    // Open the Bootstrap modal with the full-size image
                    jQuery('#myModal').modal('show');

                    // Set the modal image source
                    jQuery('#myModal .modal-body img').attr('src', imageId);
                });
            });
        })
    </script>
</div>