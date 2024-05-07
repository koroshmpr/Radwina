<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
?>
<div class="product_meta row mt-4 mx-5 mx-lg-0">
    <?php do_action('woocommerce_product_meta_start'); ?>

    <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

        <span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku fw-bold text-dark">
                <?php echo (
                $sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

    <?php endif; ?>

    <?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:',
            'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>

    <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:',
            count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>

    <?php do_action('woocommerce_product_meta_end'); ?>
<div class="d-flex pt-3">
    <button type="button" class="btn btn-primary d-flex rounded-circle px-2 squere__40" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-raised-hand" viewBox="0 0 16 16">
            <path d="M6 6.207v9.043a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H6.236a1 1 0 0 1-.447-.106l-.33-.165A.83.83 0 0 1 5 2.488V.75a.75.75 0 0 0-1.5 0v2.083c0 .715.404 1.37 1.044 1.689L5.5 5c.32.32.5.754.5 1.207"/>
            <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
        </svg>
    </button>
</div>
</div>
