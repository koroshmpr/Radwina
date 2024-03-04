<?php
/** Template Name: form */

get_header(); ?>
    <section class="position-relative form-header overflow-hidden container d-flex bg-primary bg-opacity-10 rounded-bottom-curve justify-content-center align-items-center min-vh-lg-80 -min-vh-lg-60">
            <div class="col-6 px-lg-5 pt-5 pt-lg-0 text-center">
                <h1 class="fw-bold display-5 text-center text-dark mb-0"
                    data-aos="fade-left"><?= get_the_title(); ?></h1>
                <?php get_template_part('template-parts/loop/breadcrumb'); ?>
            </div>
    </section>
    <section class="container py-lg-5 h-lg-200p">
        <div class="row justify-content-center translate-middle-lg-y">
            <div class="col-lg-6 col-11 bg-white rounded-3 p-4 p-lg-5 shadow-sm z-0 form-container">
                <h2 class="fw-bold fs-3 text-dark pb-4"><?= get_field('form_title'); ?></h2>
                <?php echo do_shortcode('[gravityform id="'. get_field("form_id") . '" title="false" description="false" ajax="true"]') ?>
            </div>
        </div>
    </section>
    <style>
        .form-header {
            z-index: 0;
        }
        .form-header::before {
            content: "";
            background: url("<?= get_field('heroImage')['url'] ?? '';?>") no-repeat;
            position: absolute;
            top:0;
            bottom:0;
            left:0;
            right:0;
            opacity:0.7;
            z-index: -1;
            background-size: cover;
        }
    </style>
<?php get_footer(); ?>