<div class="bg-light bg-opacity-25 rounded my-1 dropdown">
    <button href="#" class="btn dropdown-toggle text-white" id="dropdownMenuButton"
            type="button" data-bs-toggle="dropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-list me-1"></i>
        خرید بر اساس دسته بندی
    </button>
    <div class="category-dropdown <?= is_front_page() ? 'bg-grey-light' : 'bg-primary' ;?> dropdown-menu container mt-2" aria-labelledby="dropdownMenuButton">
        <?php
        $children = get_categories(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'pad_counts' => false,
            'hierarchical' => 1,
            'hide_empty' => true
        )); ?>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md">
                    <nav id="myTab" class="nav nav-pills flex-column">
                        <?php
                        if ($children) {
                            foreach ($children as $key => $subcat) {
                                $thumbnail_id = get_term_meta($subcat->term_id, 'thumbnail_id', true); ?>
                                <a data-bs-toggle="pill"
                                   href="#category_tab<?= $key; ?>"
                                   class="<?= $key == 0 ? 'active ' : ' '; ?>d-flex gap-2 align-items-center nav-link text-white fw-bold category-link">
                                    <?php if (wp_get_attachment_url($thumbnail_id) ) { ?>
                                    <img class="object-fit rounded-1" width="40" height="40"
                                         src="<?= wp_get_attachment_url($thumbnail_id); ?>"
                                         alt="<?= $subcat->name; ?>">
                                        <?php }
                                    else {?>
                                        <span><?= get_field('brand_logo', 'option'); ?></span>
                                    <?php }?>
                                    <p class="mb-0"> <?= $subcat->name; ?></p>
                                </a>
                                <?php
                                wp_reset_postdata(); // Reset Query
                            }
                        }
                        ?>
                    </nav>
                </div>
                <div class="vr p-0 text-white"></div>
                <div class="col-md-9 tab-content py-2 overflow-scroll" style="max-height: 80vh">
                    <?php
                    foreach ($children as $key => $subcat) { ?>
                        <article class="cols-3 hover-bg tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>"
                                 id="category_tab<?= $key; ?>">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'ignore_sticky_posts' => 1,
                                'posts_per_page' => '12',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $subcat->term_taxonomy_id,
                                        'operator' => 'IN'
                                    )
                                )
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post(); ?>
                                    <a class="d-flex gap-2 align-items-center p-1 rounded-1" href="<?php the_permalink(); ?>">
                                        <img class="rounded-1 lazy lazy-load-image" width="55" height="55" data-src="<?= the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                <?php endwhile;
                            }
                            wp_reset_postdata();
                            ?>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#dropdownMenuButton').on('click', function() {
                $('.lazy-load-image').each(function() {
                    $(this).attr('src', $(this).data('src'));
                });
            });
        });
    </script>
</div>