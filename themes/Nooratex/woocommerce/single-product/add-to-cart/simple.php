<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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

global $product;

if (!$product->is_purchasable()) {
    return;
}

echo wc_get_stock_html($product); // WPCS: XSS ok.

if ($product->is_in_stock()) : ?>

    <?php do_action('woocommerce_before_add_to_cart_form'); ?>

    <form class="cart"
          action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
          method="post" enctype='multipart/form-data'>
        <div class="row g-4 align-items-center">
            <div class="col-12">
                <div id="quantity-input-box" data-min="<?= $product->get_min_purchase_quantity() ?>"
                     data-max="<?= $product->get_max_purchase_quantity() ?>">
                    <div class="hstack gap-4 justify-content-center justify-content-lg-start">
                        <div class="gap-2 d-flex justify-content-evenly align-items-center">
                            <button type="button"
                                    class="btn px-1 text-dark pb-0 pt-1 lh-1 bg-primary bg-opacity-25 lh-1 fw-bold btn-icon fs-3"
                                    id="decrease-product-btn">
                                <i class="bi bi-dash"></i>
                            </button>
                            <span id="product-count" class="fs-5 text-center ps-2">
                                     <?= isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity() ?>
                            </span>
                            <span class="pe-2">متر</span>
                            <button type="button"
                                    class="btn px-1 text-dark pb-0 pt-1 lh-1 bg-primary bg-opacity-25 fw-bold btn-icon fs-3"
                                    id="increase-product-btn">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <input id="product-quantity" type="hidden" name="quantity"
                               value="<?= isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity() ?>">
                    </div>
                </div>
                <!--                caculate price by quentity-->
                <div class="d-flex gap-2 pt-3 align-items-center justify-content-lg-start justify-content-center">
                    <h6 class="mb-0 fs-5 fw-bold">قیمت بر اساس متراژ : </h6>
                    <span class="fs-4 fw-bold" id="price-display"></span>
                    <p class="mb-0">تومان</p>
                </div>
                <script>
                    // Get the necessary elements
                    const quantityInputBox = document.getElementById('quantity-input-box');
                    let decreaseBtn = document.getElementById('decrease-product-btn');
                    let increaseBtn = document.getElementById('increase-product-btn');
                    let productCount = document.getElementById('product-count');
                    let productQuantity = document.getElementById('product-quantity');
                    const priceDisplay = document.getElementById('price-display');
                    const productPrice = <?= $product->get_price() ?>;

                    // Set the initial product count and price display
                    var count = productCount.textContent;
                    var price = productPrice * count;
                    priceDisplay.textContent = Number(price.toFixed(0)).toLocaleString().split(/\s/).join(',')


                    // Decrease the product count and update the price when the decrease button is clicked
                    decreaseBtn.addEventListener('click', function () {
                        if (count > 1) {
                            count -= 1;
                            productCount.textContent = count;
                            productQuantity.value = count;
                            price = productPrice * count;
                            priceDisplay.textContent = Number(price.toFixed(0)).toLocaleString().split(/\s/).join(',')
                        }
                    });

                    // Increase the product count and update the price when the increase button is clicked
                    increaseBtn.addEventListener('click', function () {
                        count++;
                        productCount.textContent = count;
                        productQuantity.value = count;
                        price = productPrice * count;
                        priceDisplay.textContent = Number(price.toFixed(0)).toLocaleString().split(/\s/).join(',')
                    });
                </script>
                <!--                caculate price by quentity-->
            </div>

            <div class="col-lg-5 col-12">


                <?php do_action('woocommerce_before_add_to_cart_button'); ?>

                <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>"
                        class="btn bg-danger rounded text-white w-100 fs-5 fw-bold py-2 single_add_to_cart_button">
                    <?php echo esc_html($product->single_add_to_cart_text()); ?>
                </button>

                <?php do_action('woocommerce_after_add_to_cart_button'); ?>
            </div>
            <!--            <div class="col-sm-auto col-12 text-lg-end text-center ms-auto mb-3">-->
            <!--                <p class="m-0">-->
            <!--                    <span class="fw-bold fs-3">-->
            <!--                        --><? //= number_format($product->get_price()) ?>
            <!--                    </span>-->
            <!--                    <span class="small ms-1">-->
            <!--                        --><? //= get_woocommerce_currency_symbol() ?>
            <!--                    </span>-->
            <!--                </p>-->
            <!---->
            <!--                <p class="fs-5 m-0">-->
            <!--                    <span class="text-decoration-line-through me-2">-->
            <!--                        --><?php
            //                        $regular_price = (float)$product->get_regular_price(); // Regular price
            //                        $sale_price = (float)$product->get_price(); // Active price (the "Sale price" when on-sale)
            //                        ?>
            <!--                        --><? //= number_format($product->get_regular_price()) ?>
            <!--                    </span>-->
            <!--                    <span class="badge bg-secondary text-dark fs-5">-->
            <!--                        %-->
            <!--                        --><? //= $saving_percentage = round(100 - ($sale_price / $regular_price * 100), 1) ?>
            <!--                    </span>-->
            <!--                </p>-->
            <!--            </div>-->


        </div>
    </form>

    <?php do_action('woocommerce_after_add_to_cart_form'); ?>
    <!--        <div class="hstack gap-4 mt-4 flex-wrap">-->
    <!--            --><?php //echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
    <!--             <a href="#">-->
    <!--                 <i class="bi bi-arrow-down-up fw-bold me-1"></i>-->
    <!--                 افزودن به لیست مقایسه-->
    <!--                </a>-->
    <!---->
    <!--            <a href="#">-->
    <!--                <i class="bi bi-info-circle fw-bold me-1"></i>-->
    <!--                راهنمای اندازه-->
    <!--            </a>-->
    <!--        </div>-->
<?php endif; ?>
