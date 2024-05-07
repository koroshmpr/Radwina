<?php global $woocommerce; ?>
<nav class="site-header bg-white shadow-sm fixed-top mt-3 p-3 p-lg-4 container d-flex flex-wrap align-items-center justify-content-between pb-2 rounded-3">
    <!--            logo -->
    <?php if (get_field('logo_type', 'option') == 'image') { ?>
        <a aria-label="Home logo link" class="logo-brand col-1" href="/">
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
                        'link_class' => 'lazy text-decoration-none text-dark',
                        'depth' => 1,
                    ));
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="d-none d-lg-inline col-3 d-flex gap-2 align-items-center">
        <?php get_template_part('template-parts/search-bar', '', ['place' => 'Desktop']) ?>
    </div>
    <!--    user details-->
    <div class="col-lg-1 d-flex gap-3 align-items-center justify-content-center">
        <a aria-label="dashboard link" class="fw-bold text-white" href="/my-account/">
            <svg width="22" height="22" viewBox="0 0 24 25" fill="none">
                <path d="M12.1588 11.8199C12.0588 11.8099 11.9388 11.8099 11.8288 11.8199C10.681 11.781 9.59339 11.2968 8.79638 10.4699C7.99937 9.64302 7.55549 8.53839 7.55875 7.38994C7.55875 4.93994 9.53875 2.94994 11.9988 2.94994C12.5812 2.93943 13.1599 3.04375 13.702 3.25692C14.2441 3.47009 14.7389 3.78795 15.1582 4.19235C15.5775 4.59675 15.913 5.07977 16.1455 5.61383C16.3781 6.14789 16.5032 6.72253 16.5138 7.30494C16.5243 7.88735 16.4199 8.46613 16.2068 9.00823C15.9936 9.55033 15.6757 10.0451 15.2713 10.4644C14.8669 10.8836 14.3839 11.2191 13.8499 11.4517C13.3158 11.6843 12.7412 11.8094 12.1588 11.8199V11.8199ZM7.15875 15.5099C4.73875 17.1299 4.73875 19.7699 7.15875 21.3799C9.90875 23.2199 14.4188 23.2199 17.1688 21.3799C19.5888 19.7599 19.5888 17.1199 17.1688 15.5099C14.4288 13.6799 9.91875 13.6799 7.15875 15.5099V15.5099Z" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </i></a>
        <a aria-label="cart link" class="fw-bold position-relative text-white" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php _e('View your shopping cart', 'woothemes'); ?>">
            <svg width="22" height="22" viewBox="0 0 24 25" fill="none">
                <path d="M7.5008 8.61859V7.64859C7.5008 5.39859 9.3108 3.18859 11.5608 2.97859C12.186 2.91717 12.8171 2.98732 13.4135 3.18453C14.0099 3.38174 14.5585 3.70164 15.0238 4.12364C15.4891 4.54564 15.8609 5.06039 16.1153 5.63476C16.3697 6.20914 16.501 6.83041 16.5008 7.45859V8.83859M9.0008 22.9486H15.0008C19.0208 22.9486 19.7408 21.3386 19.9508 19.3786L20.7008 13.3786C20.9708 10.9386 20.2708 8.94859 16.0008 8.94859H8.0008C3.7308 8.94859 3.0308 10.9386 3.3008 13.3786L4.0508 19.3786C4.2608 21.3386 4.9808 22.9486 9.0008 22.9486Z" stroke="#222222" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.4922 12.9492H15.5022M8.49219 12.9492H8.50019" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="translate-middle shop-badge small position-absolute top-0 start-0 text-primary fw-bolder rounded-circle bg-white lh-lg badge-shop d-flex justify-content-center align-content-center">
                <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
        </a>
        <button class="navbar-toggler d-lg-none px-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <svg width="22" height="22" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
        </button>
    </div>

    </div>

    </div>

</nav>
<div class="offcanvas offcanvas-end bg-transparent ps-5" tabindex="-1" id="offcanvasNavbar"
     aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header bg-primary">
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
    <div class="offcanvas-body bg-primary">
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

