<section class="container my-3">
    <div class="alert bg-danger bg-opacity-10 text-center shadow-sm col-lg-9 rounded-2 mx-auto" role="alert">
        <span class="text-dark">از کد تخفیف در پرداخت استفاده کنید!</span>
        <span class="border-dash text-danger fw-bolder border-primary rounded mx-3 p-2">
           <?= get_field('shop-coupen', 'option'); ?>
        </span>
        <?php get_template_part('template-parts/svg/percent'); ?>
        <span class="ms-2 text-danger"><?= get_field('shop-coupen-title' , 'option'); ?></span>
    </div>
</section>