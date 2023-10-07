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
        <div class="swiper product_image_swiper">
            <div class="swiper-wrapper my-0">
                <?php
                // Add your image URL here
                $image_url = get_the_post_thumbnail_url();

                // Output the first slide with the image
                ?>
                <div class="swiper-slide">
                    <img class="img-fluid rounded-0 m-0" src="<?= $image_url; ?>"
                         alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                    <button class="product__image btn shadow-sm bg-opacity-25 bg-white rounded-circle position-absolute bottom-0 end-0 me-4 mb-3 p-2"
                            type="button" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?php echo esc_url($image_url); ?>">
                        <i class="bi bi-zoom-in text-white fs-3"></i>
                    </button>
                </div>

                <?php
                foreach ($gallery_image_ids  as $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    ?>
                    <div class="swiper-slide" data-image-id="<?php echo esc_attr($image_id); ?>">
                            <img class="img-fluid rounded-0 m-0" src="<?php echo esc_url($image_url); ?>"
                                 alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                        <button class="product__image btn shadow-sm bg-opacity-25 bg-white rounded-circle position-absolute bottom-0 end-0 me-4 mb-3 p-2"
                                type="button" data-bs-toggle="modal" data-bs-target="#myModal" data-link="<?php echo esc_url($image_url); ?>">
                            <i class="bi bi-zoom-in text-white fs-3"></i>
                        </button>
                    </div>
                <?php } ?>

            </div>
            <div class="swiper-pagination position-static"></div>
            <div class="swiper-button-prev text-white p-4 rounded-circle bg-primary bg-opacity-25 translate-middle-y">
            </div>
            <div class="swiper-button-next text-white p-4 rounded-circle bg-primary bg-opacity-25 translate-middle-y">
            </div>
        </div>
    </figure>
    <script>
        jQuery(document).ready(function () {
            jQuery('.product__image').each(function () {
                jQuery(this).on('click', function (e) {
                    e.preventDefault();
                    var imageId = jQuery(this).attr('data-link');
                    // Open the Bootstrap modal with the full-size image
                    jQuery('#myModal').modal('show');

                    // Set the modal image source
                    jQuery('#myModal .modal-body img').attr('src', imageId);
                });
            });
        })
    </script>
</div>