<?php global $woocommerce; ?>
<nav class="<?= !is_front_page() ? 'bg-primary' : ' '; ?> site-header fixed-top pt-3 container d-flex flex-wrap
align-items-center justify-content-between pb-2 rounded-bottom bf-bright">
    <!--            logo -->
    <?php if (get_field('logo_type', 'option') == 'image') { ?>
        <a class="logo-brand col-1" href="/">
            <img src="<?= get_field('brand_logo_img', 'option')['url']; ?>"
                 alt="<?= get_field('brand_logo_img', 'option')['title']; ?>">
        </a>
    <?php }
    if (get_field('logo_type', 'option') == 'svg') { ?>
        <a class="logo-brand col-1" href="/">
            <span><?= get_field('brand_logo', 'option'); ?></span>
        </a>
    <?php } ?>
    <!--        drop down-->
    <div class="d-none d-lg-inline">
        <?php get_template_part('template-parts/layout/header/mega-menu'); ?>
    </div>
    <!--        main menu-->
    <div class="col-5 navbar navbar-expand-lg d-none d-lg-inline my-auto ms-1">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
                if ($menu) :
                    wp_nav_menu(array(
                        'theme_location' => 'headerMenuLocation',
                        'menu_class' => 'navbar-nav gap-3 align-items-center desktop-menu',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item',
                        'link_class' => 'lazy text-decoration-none text-white',
                        'depth' => 1,
                    ));
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="d-none d-lg-inline col-2 d-flex gap-2 align-items-center">
        <?php get_template_part('template-parts/search-bar', '', ['place' => 'Desktop']) ?>
    </div>
    <!--    user details-->
    <div class="col-lg-1 d-flex gap-lg-3 gap-2 align-items-center">
        <a class="fw-bold text-white" href="/my-account/"><i class="bi bi-person-fill me-1 fs-5"></i></a>
        <a class="fw-bold position-relative text-white" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php _e('View your shopping cart', 'woothemes'); ?>"><i class="bi bi-cart me-1 fs-5"></i>
            <span class="translate-middle shop-badge small position-absolute top-0 start-0 text-primary fw-bolder rounded-circle bg-white lh-lg badge-shop d-flex justify-content-center align-content-center">
                <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="bi bi-list text-white"></i>
        </button>
    </div>

    </div>

    </div>

</nav>
<div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasNavbar"
     aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <a class="offcanvas-title logo-brand" id="offcanvasNavbarLabel" href="/">
            <?php if (get_field('logo_type', 'option') == 'image') { ?>
                <a class="logo-brand col-1" href="/">
                    <img src="<?= get_field('brand_logo_img', 'option')['url']; ?>"
                         alt="<?= get_field('brand_logo_img', 'option')['title']; ?>">
                </a>
            <?php }
            if (get_field('logo_type', 'option') == 'svg') { ?>
                <a class="logo-brand col-1" href="/">
                    <span><?= get_field('brand_logo', 'option'); ?></span>
                </a>
            <?php } ?>
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
        if ($menu) :
            wp_nav_menu(array(
                'theme_location' => 'headerMenuLocation',
                'menu_class' => 'navbar-nav gap-3 p-3',
                'container' => false,
                'menu_id' => 'navbarTogglerMenu',
                'item_class' => 'nav-item text-center',
                'link_class' => 'lazy text-decoration-none fs-3 text-white fw-bold',
                'depth' => 1,
            ));
        endif;
        ?>
    </div>
</div>

