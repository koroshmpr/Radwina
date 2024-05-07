<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined('ABSPATH') || exit;

global $product;

$attribute_keys = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);

do_action('woocommerce_before_add_to_cart_form'); ?>

    <form class="variations_form cart"
          action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
          method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>"
          data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
        <?php do_action('woocommerce_before_variations_form'); ?>

        <?php if (empty($available_variations) && false !== $available_variations) : ?>
            <p class="stock out-of-stock"><?php echo esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); ?></p>
        <?php else : ?>
            <table class="variations mx-auto ms-lg-0" cellspacing="0" role="presentation">
                <tbody>
                <?php foreach ($attributes as $attribute_name => $options) : ?>
                    <tr class="d-flex gap-3 align-items-start">
                        <th class="label fs-3"><label
                                    for="<?php echo esc_attr(sanitize_title($attribute_name)); ?>"><?php echo wc_attribute_label($attribute_name); // WPCS: XSS ok. ?></label>
                        </th>
                        <td class="value">
                            <?php
                            wc_dropdown_variation_attribute_options(
                                array(
                                    'options' => $options,
                                    'attribute' => $attribute_name,
                                    'product' => $product,
                                    'class' => 'p-2 border-0 shadow-sm w-100 variation-select',
                                    'data-attribute' => $attribute_name, // Add this line to include the attribute name in the data attribute
                                )
                            );
                            echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations ms-2" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : '';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr class="gap-3 align-items-center" id="showTotal" style="display:none">
                        <th class="label fs-3"><label>قیمت کل :</label></th>
                        <td class="value">
                            <span id="selected-variation-price"></span>
                            <span>تومان</span>
                        </td>
                    </tr>
                </tbody>

            </table>
            <script>
                jQuery(function ($) {
                    let productCount = 3; // Initialize productCount to some default value
                    let productPrice = 0; // Initialize productPrice to 0
                    let timeout; // Declare a variable to hold the timeout ID

                    $('select.variation-select').on('change', function () {
                        clearTimeout(timeout); // Clear any previously set timeout
                        var selectedOption = $(this).val();
                        if (selectedOption !== '') { // Check if an option is selected
                            timeout = setTimeout(function () { // Set a timeout to delay updating the total price
                                var priceText = $('#variation-price .amount bdi').text();
                                var price = parseInt(priceText.replace(/[^\d.]/g, '')); // Parse price as an integer
                                if (!isNaN(price)) { // Check if price is a valid number
                                    productPrice = price;
                                    $('#showTotal').css('display', 'flex');
                                    updateTotalPrice();
                                } else {
                                    console.error('Price is NaN');
                                }
                            }, 500); // Adjust the delay time as needed (in milliseconds)
                        } else { // If no option is selected, hide #showTotal
                            $('#showTotal').css('display', 'none');
                        }
                    });

                    function updateTotalPrice() {
                        var totalPrice = productCount * productPrice;
                        $('#selected-variation-price').text(formatNumber(totalPrice)); // Format the total price
                    }

                    // Function to format number with commas
                    function formatNumber(num) {
                        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }

                    $('#decrease-product-btn, #increase-product-btn').on('click', function () {
                        productCount = parseInt($('#product-count').text().trim());
                        updateTotalPrice();
                    });

                    $('a.reset_variations').on('click', function (e) {
                        e.preventDefault(); // Prevent the default action of the link
                        $('#showTotal').css('display', 'none');
                    });
                });
            </script>
        <?php do_action('woocommerce_after_variations_table'); ?>

            <div class="single_variation_wrap">
                <?php
                /**
                 * Hook: woocommerce_before_single_variation.
                 */
                do_action('woocommerce_before_single_variation');

                /**
                 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
                 *
                 * @since 2.4.0
                 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                 */
                do_action('woocommerce_single_variation');

                /**
                 * Hook: woocommerce_after_single_variation.
                 */
                do_action('woocommerce_after_single_variation');
                ?>
            </div>
        <?php endif; ?>

        <?php do_action('woocommerce_after_variations_form'); ?>
    </form>

<?php
do_action('woocommerce_after_add_to_cart_form');
