<?php
global $wp_query;
$links = paginate_links(array(
    'prev_next' => false,
    'type' => 'array'
));

if ($links) : ?>
    <div class="hstack flex-wrap justify-content-between flex-wrap gap-2 border my-4">
        <nav aria-label="pagination">
            <?php echo '<ul class="pagination ms-3 m-0 align-items-center">';

            // get_previous_posts_link will return a string or void if no link is set.
            if ($prev_posts_link = get_previous_posts_link(__('<i class="bi bi-chevron-right fw-bold"></i>'))) :
                echo '<li class="prev-list-item page-item me-2 bg-primary pb-1 rounded">';
                echo $prev_posts_link;
                echo '</li>';
            endif;

            echo '<li class="page-item">';
            echo join('</li><li class="page-item mx-2">', $links);
            echo '</li>';

            // get_next_posts_link will return a string or void if no link is set.
            if ($next_posts_link = get_next_posts_link(__('<i class="bi bi-chevron-left fw-bold"></i>'))) :
                echo '<li class="next-list-item page-item ms-2 bg-primary pb-1 rounded">';
                echo $next_posts_link;
                echo '</li>';
            endif;
            echo '</ul>';
            ?>
            <?php
            $default_posts_per_page = get_option('posts_per_page');
            $wc_products = wp_count_posts('product')->publish;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $totalproducts = $wp_query->post_count;
            $result = ($paged - 1) * $default_posts_per_page;
            $eachResult = $paged * $default_posts_per_page;
            ?>
        </nav>
        <div class="p-3">
            <p class="m-0 smaller-sm-down">
                نمایش محصولات
                <b class="px-1"><?= $result + 1 ?>-<?php if($paged == 1 ) {
                        echo $paged * $totalproducts;
                    }
                    if( $paged > 1 && $eachResult < $wc_products){
                        echo $eachResult;
                    }
                    if($paged > 1 && $eachResult > $wc_products){
                        echo $wc_products;
                    }
                    ?></b>
                از
                <b class="px-1"><?= $wc_products ?></b>
                نتیجه
            </p>
        </div>
    </div>
<?php endif;
?>