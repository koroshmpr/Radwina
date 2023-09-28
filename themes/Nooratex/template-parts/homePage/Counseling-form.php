<section class="container bg-primary text-white rounded my-2 p-3">
    <div class="row justify-content-around">
        <div class="col-lg-5 col-12 my-auto px-2 py-4 py-lg-2 row justify-content-center justify-content-lg-start">
            <h5 class="fw-bolder fs-1">دریافت مشاوره</h5>
            <p class="fs-5 text-justify">شما میتوانید با استفاده از فرم با ما در تماس باشید و خرید خود را به بهترین نحو
                ممکن انجام دهید</p>
            <a href="tel:<?= get_field('phone_number', 'option'); ?>"
               class="py-1 fw-bolder bg-warning text-primary rounded-1 d-flex gap-2 align-items-end fs-5 col-lg-4 col-8 justify-content-center">
                <i class="bi bi-telephone me-2 text-primary shadow-sm fs-4 text-warning rounded-circle bg-primary px-2 py-1"></i>
                <span class="mb-1">
                <?= get_field('phone_number', 'option'); ?>
                </span>
            </a>
        </div>
        <div class=" col-lg-5 col-12 p-4">
            <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
        </div>

    </div>
</section>
