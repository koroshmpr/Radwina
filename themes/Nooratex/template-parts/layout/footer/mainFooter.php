<div class="bg-primary bg-opacity-10 py-3">
    <div class="container">
<!--            logo and social-->
            <div class="p-4 text-center">
                <?php if (get_field('logo_type' ,'option') == 'image' ) { ?>
                    <a class="logo-brand text-center" href="/">
                        <img class="me-lg-3" src="<?= get_field('brand_logo_img' , 'option')['url'] ;?>"
                             alt="<?= get_field('brand_logo_img' , 'option')['title'] ;?>">
                    </a>
                <?php }
                if (get_field('logo_type' , 'option') == 'svg') { ?>
                    <a class="logo-brand text-center" href="/">
                        <span class="col"><?= get_field('brand_logo' , 'option') ;?></span>
                    </a>
                <?php }?>
                <nav class="py-4">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['footerLocationOne']);
                    if ($menu) :
                        wp_nav_menu(array(
                            'theme_location' => 'footerLocationOne',
                            'menu_class' => 'navbar-nav d-flex flex-row flex-wrap justify-content-center gap-3 align-items-center',
                            'container' => false,
                            'menu_id' => 'navbarTogglerMenu',
                            'item_class' => 'nav-item',
                            'link_class' => 'lazy text-decoration-none',
                            'depth' => 1,
                        ));
                    endif;
                    ?></nav>
                <?php get_template_part('template-parts/social-media');?>
            </div>
<!--            contact-->
            <div class="d-flex flex-wrap justify-content-around">
                <div class="col-12 col-lg-3 d-flex gap-4 flex-wrap py-3 justify-content-center order-lg-1 order-2">
                    <?php
                    while (have_rows('confirmation' , 'option')): the_row();
                    ?>
                    <a class="text-dark" href="#"><?= get_sub_field('conf_items' , 'option'); ?></a>
                    <?php endwhile; ?>
                </div>
                <div class="col-12 col-lg-9 order-lg-2 order-1">
                    <?= get_field('footer_description' ,'option');?>
                </div>
            </div>
        </div>
</div>
