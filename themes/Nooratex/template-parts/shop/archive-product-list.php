<section class="container-xl" id="archivePage">
    <div class="row pb-5 align-items-start">
        <aside class="col-lg-3 order-last order-lg-first">
            <div class="d-none d-lg-inline">
                <?php
                get_template_part('template-parts/shop/category-list_sidebar');
                if (get_field('sidebar-wp', 'option')) :
                    get_template_part('template-parts/sidebar');
                endif;
                ?>
            </div>
            <div class="d-lg-none">
                <button class="btn btn-primary bg-opacity-75 d-flex gap-2 w-auto justify-content-center align-items-center position-fixed start-50 translate-middle-x rounded-pill call-btn"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                    <svg width="25" height="25" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                    </svg>
                    دسته بندی‌ها
                </button>
            </div>
        </aside>
        <div class="col-lg-9 row g-lg-3 g-2 row-cols-xl-4 row-cols-lg-3 row-cols-md-4 row-cols-2 m-0" id="ajaxFilter">
            <?php
            // Include your category filter template
            get_template_part('template-parts/shop/orderby-category');

            // Custom WP_Query to fetch products randomly
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_per_page = 16; // Adjust this value as needed
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $posts_per_page,
                'orderby'        => 'rand', // Random order
                'post_status'    => 'publish', // Only published products
                'paged'          => $paged, // For pagination
            );

            $random_query = new WP_Query($args);
            $total_products = $random_query->found_posts; // Total products
            $start_index = ($paged - 1) * $posts_per_page + 1;
            $end_index = min($paged * $posts_per_page, $total_products);

            if ($random_query->have_posts()) :
                while ($random_query->have_posts()) {
                    $random_query->the_post(); ?>
                    <article>
                        <?php wc_get_template_part('content', 'single-card'); ?>
                    </article>
                <?php }
            else : ?>
                <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-primary bg-opacity-10">
                    هیچ محصولی یافت نشد
                </h2>
            <?php endif; ?>
            <?php
            // Display pagination
            $pagination_links = paginate_links(array(
                'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format'    => '?paged=%#%',
                'current'   => max(1, get_query_var('paged', 1)),
                'total'     => $random_query->max_num_pages,
                'type'      => 'array',
                'prev_text' => '<i class="bi bi-chevron-left fw-bold text-white"></i>',
                'next_text' => '<i class="bi bi-chevron-right fw-bold text-white"></i>',
            ));

            if ($pagination_links) : ?>
                <div class="d-grid d-lg-flex flex-wrap px-3 col-12 justify-content-lg-between align-items-center justify-content-center py-3 gap-2 border my-4 w-100 rounded">
                    <nav aria-label="pagination">
                        <ul class="pagination gap-3 justify-content-center m-0 align-items-center">
                            <?php
                            foreach ($pagination_links as $link) :
                                echo '<li class="page-item">' . $link . '</li>';
                            endforeach;
                            ?>
                        </ul>
                    </nav>
                    <div>
                        <p class="m-0 smaller-sm-down">
                            نمایش محصولات
                            <b class="px-1"><?php echo esc_html($start_index); ?></b>
                            تا
                            <b class="px-1"><?php echo esc_html($end_index); ?></b>
                            از
                            <b class="px-1"><?php echo esc_html($total_products); ?></b>
                            نتیجه
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php wp_reset_postdata(); // Reset the query ?>
    </div>
</section>