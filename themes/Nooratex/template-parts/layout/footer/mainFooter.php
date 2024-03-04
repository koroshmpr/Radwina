<div class="bg-primary bg-opacity-10 pt-5 px-lg-5">
    <div class="d-md-flex d-grid align-items-start justify-content-lg-between justify-content-center flex-wrap">
        <!--            contact-->
        <div class="col-11 col-md-7 col-lg-4 row py-3 py-lg-0 justify-content-center align-items-center gap-3 pe-lg-4 mx-auto">
            <div class="text-justify">
                <?= get_field('footer_description', 'option'); ?>
            </div>
            <div class="text-center text-lg-start">
                <?php
                while (have_rows('confirmation', 'option')): the_row();
                    ?><?= get_sub_field('conf_items', 'option'); ?>
                <?php endwhile; ?>
            </div>
        </div>
        <!--            menus-->
        <div class="col-lg-3 col-md-4 col-12 d-grid d-md-flex px-3 gap-3 justify-content-center">
            <!--            column-02-->
            <div class="col-md-5 col-12 my-2 my-lg-0">
                <p class="fw-bold fs-5 mb-4 text-center text-dark text-lg-start"><?= get_field('first_menu', 'option'); ?></p>
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationOne']);
                ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationOne',
                    'menu_class' => 'list-unstyled pe-0 d-md-grid d-flex flex-wrap gap-3 justify-content-lg-start justify-content-center align-items-center align-items-lg-start',
                    'container' => false,
                    'menu_id' => 'footerLocationOne',
                    'item_class' => 'nav-item',
                    'link_class' => 'lazy text-decoration-none text-dark text-opacity-75',
                    'depth' => 1,
                ));
                ?>

            </div>
            <!--            column-03-->
            <div class="col-md-5 col-12 my-2 my-lg-0">
                <p class="fw-bold fs-5 mb-4 text-center text-dark text-lg-start"><?= get_field('second_menu', 'option'); ?></p>
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationTwo']);
                ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationTwo',
                    'menu_class' => 'list-unstyled pe-0 d-md-grid d-flex flex-wrap gap-3 justify-content-lg-start justify-content-center align-items-center align-items-lg-start',
                    'container' => false,
                    'menu_id' => 'footerLocationTwo',
                    'item_class' => 'nav-item',
                    'link_class' => 'lazy text-decoration-none text-dark text-opacity-75',
                    'depth' => 1,
                ));
                ?>

            </div>
        </div>
        <!--            logo and social-->
        <div class="col-12 col-lg-5 p-md-5 p-lg-2 text-center text-md-start">
            <div class="row justify-content-center justify-content-lg-start align-items-stretch h-100 g-lg-5">
                <div class="col-md-5 col-9 px-lg-0 animate__animated animate__slideInLeft">
                    <h6 class="text-primary fw-bold fs-4">راه های ارتباطی</h6>
                    <address class="py-2 fw-bold text-dark d-flex gap-3 align-items-center mb-0">
                        <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                        <?= get_field('address', 'option'); ?>
                    </address>
                    <a href="tel:<?= get_field('phone_number', 'option'); ?>"
                       class="py-2 fw-bold text-dark d-flex gap-3 align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                        <i class="bi bi-telephone-fill me-2 text-primary"></i>
                        <h6 class="text-primary fw-bolder m-0">شماره تلفن ثابت : </h6>
                        </div>
                        <?= get_field('phone_number', 'option'); ?>
                    </a>
                    <a href="tel:<?= get_field('phone_management', 'option'); ?>"
                       class="py-2 fw-bold text-dark d-flex gap-3 align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <i class="bi bi-telephone-fill me-2 text-primary"></i>
                            <h6 class="text-primary fw-bolder m-0">شماره موبایل مدیریت : </h6>
                        </div>
                        <?= get_field('phone_management', 'option'); ?>
                    </a>
                    <a href="mailto:<?= get_field('email', 'option'); ?>"
                       class="py-2 mb-2 fw-bold text-dark d-flex gap-3 align-items-center justify-content-between">
                        <div class="d-flex gap-2">
                            <i class="bi bi-envelope-fill me-2 text-primary"></i>
                            <h6 class="text-primary fw-bolder m-0">ایمیل : </h6>
                        </div>
                        <?= get_field('email', 'option'); ?>
                    </a>
                    <?php
                    $socialSize = '17';
                    $args = array(
                        'size' => $socialSize
                    );
                    get_template_part('template-parts/social-media', null, $args); ?>
                </div>
                <div class="col-md-6 col-11 animate__animated animate__slideInRight">
                    <?= get_field('map', 'option'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
