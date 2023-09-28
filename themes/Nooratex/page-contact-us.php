<?php get_header(); ?>
    <section class="container py-5 my-auto">
        <div class="row justify-content-around align-items-stretch h-100 g-5">
            <div class="col-lg-4 col-11 animate__animated animate__slideInLeft">
                <h1 class="text-primary fw-bold">راه های ارتباطی</h1>
                <address class="py-2 m-0">
                    <i class="bi bi-geo-alt-fill me-2 text-primary fs-4"></i>
                    <?= get_field('address', 'option'); ?>
                </address>
                <a href="tel:<?= get_field('phone_number', 'option'); ?>"
                   class="py-2 fw-bold text-dark d-flex gap-3 align-items-center">
                    <i class="bi bi-telephone-fill me-2 text-primary fs-4"></i>
                    <h6 class="text-primary fw-bolder m-0">شماره تلفن ثابت : </h6>
                    <?= get_field('phone_number', 'option'); ?>
                </a>
                <a href="tel:<?= get_field('phone_management', 'option'); ?>"
                   class="py-2 fw-bold text-dark d-flex gap-3 align-items-center">
                    <i class="bi bi-telephone-fill me-2 text-primary fs-4"></i>
                    <h6 class="text-primary fw-bolder m-0">شماره موبایل مدیریت : </h6>
                    <?= get_field('phone_management', 'option'); ?>
                </a>
                <a href="mailto:<?= get_field('email', 'option'); ?>"
                   class="py-2 fw-bold text-dark d-flex gap-3 align-items-center">
                    <i class="bi bi-envelope-fill me-2 text-primary fs-4"></i>
                    <h6 class="text-primary fw-bolder m-0">ایمیل : </h6>
                    <?= get_field('email', 'option'); ?>
                </a>
                <?php wc_get_template_part('template-parts/social-media'); ?>
            </div>
            <div class="col-lg-8 col-11 animate__animated animate__slideInRight">
                <?= get_field('map', 'option'); ?>
            </div>
        </div>
        <div class="my-4 row justify-content-between align-items-center bg-warning py-4 px-3 rounded-1">
            <h5 class="col-12 col-lg-5 text-primary fw-bold display-2 pb-3">با ما در ارتباط باشید</h5>
            <div class="col-12 col-lg-5">
                <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]') ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>