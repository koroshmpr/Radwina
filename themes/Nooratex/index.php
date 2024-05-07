<?php
/** Template Name: Blog Page */

get_header(); ?>

    <section class="container py-3">
        <div class="row row-cols-1 row-cols-lg-2 justify-content-between g-4">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Get current page number
            $posts_per_page = get_option('posts_per_page'); // Get number of posts per page set in WordPress settings

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged // Use current page number for pagination
            );

            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                while ($loop->have_posts()) :
                    $loop->the_post();
                    get_template_part('template-parts/useful/blog-card');
                endwhile;

                $total_pages = $loop->max_num_pages;

                $links = paginate_links(array(
                    'total' => $total_pages,
                    'current' => $paged,
                    'prev_next' => true,
                    'prev_text' => __('قبلی', 'textdomain'),
                    'next_text' => __('بعدی', 'textdomain'),
                ));

                if ($links) :
                    ?>
                    <nav class="pt-4 w-100" aria-label="age navigation example">
                        <ul class="pagination justify-content-center align-items-center gap-2">
                            <?php
                            echo paginate_links(array(
                                'prev_text' => '<span class="page-link border-0 prev-page">قبلی</span>',
                                'next_text' => '<span class="page-link border-0 next-page">بعدی</span>',
                                'before_page_number' => '<li class="page-item"><span class="p-1">',
                                'after_page_number' => '</span></li>',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $loop->max_num_pages
                            ));
                            ?>
                        </ul>
                    </nav>

                <?php
                endif;
            endif;
            wp_reset_postdata();
            ?>
    </section>
<?php
$blog_page_id = get_option('page_for_posts');

if ($blog_page_id && get_field('page_description', $blog_page_id)) { ?>
    <section class="container position-relative rounded-4 p-2 p-lg-4 mt-3 mt-lg-0 mb-5" style="background-color: #F9FBFA;">
        <div class="accordion accordion-preview" id="categoryAccordion">
            <div class="accordion-item bg-transparent border-0">
                <h6 class="accordion-header position-absolute bottom-0 start-50 translate-middle-x z-1 mb-n3" id="categoryHeader">
                    <button class="btn text-primary bg-white border collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                        مشاهده بیشتر
                    </button>
                </h6>
                <div id="categoryCollapse" class="accordion-collapse collapse" aria-labelledby="categoryHeader"
                     data-bs-parent="#categoryAccordion">
                    <div class="accordion-body">
                        <?php echo get_field('page_description', $blog_page_id); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>