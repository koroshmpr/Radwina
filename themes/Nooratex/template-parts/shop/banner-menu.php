<div style="background-color : <?= get_field('banner_menu_color', 'option'); ?>;"
     class="position-relative d-none d-lg-inline col-4 row justify-content-start p-4 pt-5 align-items-center rounded
     shadow-sm">
    <img class="position-absolute end-0 bottom-0 col-6 p-0 object-fit"
         src="<?= get_field('banner_menu_image', 'option')['url']; ?>"
         alt="<?= get_field('banner_menu_image', 'option')['title']; ?>">
    <div class="col-10 z-top" style="color:<?= get_field('banner_menu_text_color', 'option'); ?>">
        <span style="background-color:<?= get_field('banner_menu_badge_color', 'option'); ?>"
              class="py-1 px-2 rounded"><?= get_field('banner_menu_badge', 'option'); ?></span>
        <h5 class="my-3 fs-3 fw-bolder"><?= get_field('banner_menu_title', 'option'); ?></h5>
        <p style="color:<?= get_field('banner_menu_text_color'); ?>"
        ><?= get_field('banner_menu_content', 'option'); ?></p>
        <a href="<?= get_field('banner_menu_btn_url', 'option')['url']; ?>"
           class="btn bg-white px-4 py-2 fw-bold text-dark mt-3"><?= get_field('banner_menu_btn', 'option'); ?></a>
    </div>
</div>