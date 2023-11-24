<div class="bg-primary bg-opacity-25 py-4 my-4">
    <div class="container">
        <div class="row row-cols-2 gy-4 row-cols-lg-4 justify-content-between align-items-center">
            <?php
            while (have_rows('property', 'option')): the_row(); ?>
                <div class="d-flex align-items-center gap-3 justify-content-lg-center">
                    <img class="bg-primary rounded p-1" src="<?= get_sub_field('property_image', 'option')['url']; ?>"
                         alt="<?= get_sub_field('property_image', 'option')['title']; ?>">
                    <div>
                        <h6 class="fw-bold text-dark fs-6"><?= get_sub_field('property_name'); ?></h6>
                        <p class="text-dark opacity-75 mb-0 small"><?= get_sub_field('property_detail'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>