<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-billing-fields">
    <?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>
        <h3><?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?></h3>
    <?php else : ?>
        <h3><?php esc_html_e('Billing details', 'woocommerce'); ?></h3>
    <?php endif; ?>

    <?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

    <div class="woocommerce-billing-fields__field-wrapper row g-4">
        <?php
        $fields = $checkout->get_checkout_fields('billing');

        foreach ($fields as $key => $field) { ?>
            <div class="mb-3 col-sm-6">
                <label class="form-label" for="<?= $key ?>">
                    <?= $field['label'] ?>
                </label>

                <?php if ($key == 'billing_city') { ?>
                    <select name="billing_city"
                            id="billing_city"
                            class="state_select form-select p-1 rounded"
                            autocomplete="address-level2"
                            placeholder="یک شهر انتخاب کنید">
                        <option value="">یک شهر انتخاب کنید</option>
                        <?php
                        // List of cities and their values (example values)
                        $cities = array(
                            "TEH" => "تهران",
                            "KAR" => "کرج",
                            "MHD" => "مشهد",
                            "ESF" => "اصفهان",
                            "SHZ" => "شیراز",
                            "TBZ" => "تبریز",
                            "AHV" => "اهواز",
                            "QOM" => "قم",
                            "YAZ" => "یزد",
                            "KRN" => "کرمان",
                        );

                        // Get the selected value for billing_city
                        $selected_city = trim($checkout->get_value($key)); // Ensure it's trimmed

                        // Loop through the cities and output options
                        foreach ($cities as $city_code => $city_name) {
                            // Compare selected value, and set 'selected' if they match
                            $selected = ($selected_city === $city_code) ? 'selected' : '';
                            echo "<option value='" . esc_attr($city_code) . "' {$selected}>" . esc_html($city_name) . "</option>";
                        }
                        ?>
                    </select>
                <?php } elseif ($key == 'billing_state') { ?>
                    <select name="billing_state"
                            id="billing_state"
                            class="state_select form-select"
                            autocomplete="address-level1"
                            data-placeholder="انتخاب کنید"
                            data-input-classes=""
                            data-label="استان">
                        <option value="">انتخاب کنید</option>
                        <?php
                        // List of states and their values
                        $states = array(
                            "ABZ" => "البرز",
                            "ADL" => "اردبیل",
                            "EAZ" => "آذربایجان شرقی",
                            "WAZ" => "آذربایجان غربی",
                            "BHR" => "بوشهر",
                            "CHB" => "چهارمحال و بختیاری",
                            "FRS" => "فارس",
                            "GIL" => "گیلان",
                            "GLS" => "گلستان",
                            "HDN" => "همدان",
                            "HRZ" => "هرمزگان",
                            "ILM" => "ایلام",
                            "ESF" => "اصفهان",
                            "KRN" => "کرمان",
                            "KRH" => "کرمانشاه",
                            "NKH" => "خراسان شمالی",
                            "RKH" => "خراسان رضوی",
                            "SKH" => "خراسان جنوبی",
                            "KHZ" => "خوزستان",
                            "KBD" => "کهگیلویه و بویراحمد",
                            "KRD" => "کردستان",
                            "LRS" => "لرستان",
                            "MKZ" => "مرکزی",
                            "MZN" => "مازندران",
                            "GZN" => "قزوین",
                            "QHM" => "قم",
                            "SMN" => "سمنان",
                            "SBN" => "سیستان و بلوچستان",
                            "THR" => "تهران",
                            "YZD" => "یزد",
                            "ZJN" => "زنجان",
                        );

                        // Get the selected value for billing_state
                        $selected_state = $checkout->get_value($key);

                        // Loop through the states and output options
                        foreach ($states as $state_code => $state_name) {
                            $selected = ($selected_state === $state_code) ? 'selected' : '';
                            echo "<option value='{$state_code}' {$selected}>{$state_name}</option>";
                        }
                        ?>
                    </select>
                <?php } else { ?>
                    <input class="form-control"
                           name="<?= $key ?>"
                           id="<?= $key ?>"
                           value="<?= $checkout->get_value($key) ?>"
                           type="<?= isset($field['type']) ? $field['type'] : 'text' ?>"
                           placeholder="<?= isset($field['placeholder']) ? $field['placeholder'] : '' ?>">
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
</div>
<div class="woocommerce-additional-fields">
    <?php do_action('woocommerce_before_order_notes', $checkout); ?>

    <?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>

        <?php if (!WC()->cart->needs_shipping() || wc_ship_to_billing_address_only()) : ?>

            <h3><?php esc_html_e('Additional information', 'woocommerce'); ?></h3>

        <?php endif; ?>

        <div class="woocommerce-additional-fields__field-wrapper">
            <?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
                <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php do_action('woocommerce_after_order_notes', $checkout); ?>
</div>
<?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) : ?>
    <div class="woocommerce-account-fields">
        <?php if (!$checkout->is_registration_required()) : ?>

            <p class="form-row form-row-wide create-account">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                           id="createaccount" <?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true); ?>
                           type="checkbox"
                           name="createaccount"
                           value="1"/> <span><?php esc_html_e('Create an account?', 'woocommerce'); ?></span>
                </label>
            </p>

        <?php endif; ?>

        <?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

        <?php if ($checkout->get_checkout_fields('account')) : ?>

            <div class="create-account">
                <?php foreach ($checkout->get_checkout_fields('account') as $key => $field) : ?>
                    <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
                <?php endforeach; ?>
                <div class="clear"></div>
            </div>

        <?php endif; ?>

        <?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>
    </div>

<?php endif; ?>
<style>
    .select2-container--default .select2-selection--single {
        border: 1px solid #c8cfd5;!important;
        height: 36px;
    }
    textarea#order_comments {
        border-radius: 11px;
        padding: 10px;
        border-color: #d2d2d2;
    }
</style>