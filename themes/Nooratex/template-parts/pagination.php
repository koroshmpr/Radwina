<?php
global $wp_query;

// Get the current category
$current_category = get_queried_object();

// Adjust the main query to consider the current category
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => get_option('posts_per_page'),
    'paged'          => $paged,
    'tax_query'      => array(
        array(
            'taxonomy' => $current_category->taxonomy,
            'field'    => 'id',
            'terms'    => $current_category->term_id,
        ),
    ),
);

$query = new WP_Query($args);

$links = paginate_links(array(
    'prev_next' => false,
    'type'      => 'array',
    'total'     => $query->max_num_pages,
));

if ($links) :
    // Calculate start and end indices of products being shown on the current page
    $start_index = ($paged - 1) * get_option('posts_per_page') + 1;
    $end_index = min($start_index + $query->post_count - 1, $query->found_posts);
    ?>
    <div class="d-grid d-lg-flex flex-wrap px-3 justify-content-lg-between align-items-center justify-content-center py-3 flex-wrap gap-2 border my-4 w-100 rounded">
        <nav aria-label="pagination">
            <?php echo '<ul class="pagination justify-content-center m-0 align-items-center">';

            // get_previous_posts_link will return a string or void if no link is set.
            if ($prev_posts_link = get_previous_posts_link(__('<i class="bi bi-chevron-right fw-bold text-white"></i>'))) :
                echo '<li class="prev-list-item page-item me-2 bg-primary p-1 rounded">';
                echo $prev_posts_link;
                echo '</li>';
            endif;

            echo '<li class="page-item ">';
            echo join('</li><li class="page-item mx-2">', $links);
            echo '</li>';

            // get_next_posts_link will return a string or void if no link is set.
            if ($next_posts_link = get_next_posts_link(__('<i class="bi bi-chevron-left fw-bold text-white"></i>'))) :
                echo '<li class="next-list-item page-item ms-2 bg-primary p-1 rounded">';
                echo $next_posts_link;
                echo '</li>';
            endif;
            echo '</ul>';
            ?>
        </nav>
        <div>
            <p class="m-0 smaller-sm-down">
                نمایش محصولات
                <b class="px-1"><?= $start_index ?></b>
                تا
                <b class="px-1"><?= $end_index ?></b>
                از
                <b class="px-1"><?= $query->found_posts ?></b>
                نتیجه
            </p>
        </div>
    </div>

    <?php
    wp_reset_postdata(); // Restore global post data
endif;
?>