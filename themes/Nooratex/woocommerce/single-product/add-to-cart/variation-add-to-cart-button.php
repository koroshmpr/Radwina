<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;

// Get the product ID
$product_id = $product->get_id();

// Get the product categories
$product_categories = wc_get_product_category_list($product_id);

$allowed_category_terms = get_field('cat_step', 'option');
$allowed_category_ids = array();

// Check if the array is not empty and is an array
if ($allowed_category_terms && is_array($allowed_category_terms)) {
    // Loop through the category terms
    foreach ($allowed_category_terms as $term) {
        // Check if the term object has a term_id property
        if (property_exists($term, 'term_id')) {
            // Add the term ID to the array
            $allowed_category_ids[] = $term->term_id;
        }
    }
}

// Check if the product belongs to any of the allowed categories
if (!empty($allowed_category_ids)) {
    $product_categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));

    // Check if there is an intersection between allowed and product categories
    if (count(array_intersect($allowed_category_ids, $product_categories)) > 0) {
        $initial_quantity = get_field('cat_step_number', 'option');
        ?>
        <div class="woocommerce-variation-add-to-cart variations_button d-flex align-items-center gap-3 mt-3 justify-content-center justify-content-lg-start">
            <div id="quantity-input-box" data-step="<?= $initial_quantity ?>" data-min="<?= $product->get_min_purchase_quantity() ?>"
                 data-max="<?= $product->get_max_purchase_quantity() ?>">
                <div class="hstack gap-4 justify-content-center justify-content-lg-start">
                    <div class="gap-2 d-flex justify-content-evenly align-items-center">
                        <button type="button"
                                class="btn px-1 text-dark pb-0 pt-1 lh-1 bg-primary bg-opacity-25 lh-1 fw-bold btn-icon fs-3"
                                id="decrease-product-btn">
                            <i class="bi bi-dash"></i>
                        </button>
                        <span id="product-count" class="fs-5 text-center ps-2 user-select-none" style="min-width:50px">
                        <?= isset($_POST['quantity']) ? max($initial_quantity, wc_stock_amount(wp_unslash($_POST['quantity']))) : $initial_quantity ?>
                    </span>
                        <span class="pe-2">متر</span>
                        <button type="button"
                                class="btn px-1 text-dark pb-0 pt-1 lh-1 bg-primary bg-opacity-25 fw-bold btn-icon fs-3"
                                id="increase-product-btn" max-value="<?= $product->get_max_purchase_quantity() ?>">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <input id="product-quantity" type="hidden" name="quantity"
                           value="<?= isset($_POST['quantity']) ? max($initial_quantity, wc_stock_amount(wp_unslash($_POST['quantity']))) : $initial_quantity ?>">
                </div>
            </div>
            <button type="submit"
                    class="btn btn-primary single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

            <?php do_action('woocommerce_after_add_to_cart_button'); ?>

            <input type="hidden" name="add-to-cart" value="<?php echo absint($product_id); ?>"/>
            <input type="hidden" name="product_id" value="<?php echo absint($product_id); ?>"/>
            <input type="hidden" name="variation_id" class="variation_id" value="0"/>
        </div>
        <?php
    } else {
        // Set the initial quantity
        $initial_quantity = 1;
        ?>
        <div class="woocommerce-variation-add-to-cart variations_button d-flex align-items-center gap-3 mt-3 justify-content-center justify-content-lg-start">
            <div id="quantity-input-box" data-step="<?= $initial_quantity ?>" data-min="<?= $product->get_min_purchase_quantity() ?>"
                 data-max="<?= $product->get_max_purchase_quantity() ?>">
                <div class="hstack gap-4 justify-content-center justify-content-lg-start">
                    <div class="gap-2 d-flex justify-content-evenly align-items-center">
                        <button type="button"
                                class="btn px-1 text-dark pb-0 pt-1 lh-1 bg-primary bg-opacity-25 lh-1 fw-bold btn-icon fs-3"
                                id="decrease-product-btn">
                            <i class="bi bi-dash"></i>
                        </button>
                        <span id="product-count" class="fs-5 text-center ps-2 user-select-none" style="min-width:50px">
                        <?= isset($_POST['quantity']) ? max($initial_quantity, wc_stock_amount(wp_unslash($_POST['quantity']))) : $initial_quantity ?>
                    </span>
                        <button type="button"
                                class="btn px-1 text-dark pb-0 pt-1 lh-1 bg-primary bg-opacity-25 fw-bold btn-icon fs-3"
                                id="increase-product-btn" max-value="<?= $product->get_max_purchase_quantity() ?>">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <input id="product-quantity" type="hidden" name="quantity"
                           value="<?= isset($_POST['quantity']) ? max($initial_quantity, wc_stock_amount(wp_unslash($_POST['quantity']))) : $initial_quantity ?>">
                </div>
            </div>
            <button type="submit"
                    class="btn btn-primary single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

            <?php do_action('woocommerce_after_add_to_cart_button'); ?>

            <input type="hidden" name="add-to-cart" value="<?php echo absint($product_id); ?>"/>
            <input type="hidden" name="product_id" value="<?php echo absint($product_id); ?>"/>
            <input type="hidden" name="variation_id" class="variation_id" value="0"/>
        </div>
        <?php
    }
}
?>
