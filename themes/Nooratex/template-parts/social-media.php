<ul class="d-flex list-unstyled gap-3 m-0 align-items-center justify-content-center py-4 py-lg-2">
    <li><a class="bg-primary p-2 rounded-circle" href="<?= get_field('whatsapp','option'); ?>">
            <?php get_template_part('template-parts/svg/social/whatsapp' , null , $args);?></a></li>
    <li><a class="bg-primary p-2 rounded-circle" href="<?= get_field('telegram','option'); ?>">
            <?php get_template_part('template-parts/svg/social/telegram' , null , $args);?></a></li>
    <li><a class="bg-primary p-2 rounded-circle" href="<?= get_field('aparat','option'); ?>">
            <?php get_template_part('template-parts/svg/social/aparat' , null , $args);?></a></li>
    <li><a class="bg-primary p-2 rounded-circle" href="<?= get_field('instagram','option'); ?>">
            <?php get_template_part('template-parts/svg/social/instagram' , null , $args);?></a></li>
    <li><a class="bg-primary p-2 rounded-circle" href="<?= get_field('eitaa','option'); ?>">
            <?php get_template_part('template-parts/svg/social/eitaa' , null , $args);?></a></li>
</ul>
