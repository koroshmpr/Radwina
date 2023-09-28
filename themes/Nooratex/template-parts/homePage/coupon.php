<section class="container my-3">
    <div class="alert alert-danger text-center shadow-sm" role="alert">
        <span class="text-dark">از کد تخفیف در پرداخت استفاده کنید!</span>
        <span class="border-dash fw-bolder border-primary rounded mx-3 p-2">
           <?= get_field('coupen'); ?>
        </span>
        <?php get_template_part('template-parts/svg/percent'); ?>
        <span class="ms-2">تخفیف فوق العاده برای اولین خرید شما</span>
    </div>
</section>