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
    <div class="d-grid d-lg-flex flex-wrap px-3 justify-content-lg-between align-items-center justify-content-center py-3 gap-2 border my-4 w-100 rounded">
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