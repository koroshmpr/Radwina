<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="description" content="<?= get_bloginfo('description'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?= get_field('favicon', 'option')['url']; ?>">
    <?php wp_head(); ?>
    <?php
    $scripts = get_field('header_script', 'option');
    if ($scripts) {
        foreach ($scripts as $script) {
            echo $script['script'];
        }
    }
    ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part('template-parts/layout/backToTop'); ?>
<a aria-label="cta button" href="tel:<?= get_field('phone_number', 'option'); ?>" rel="nofollow"
   class="btn call-btn position-fixed bg-success text-white rounded-circle shadow px-2 pt-2">
    <i class="bi bi-telephone fs-4"></i>
</a>
<!-- Navbar STart -->
<header>
    <?php
    //          main menu
    get_template_part('template-parts/layout/header/mainHeader');
    //          bottom menu
    if (!is_front_page()) {
        get_template_part('template-parts/layout/header/bottomArea');
    }
    ?>
</header>

<main>



