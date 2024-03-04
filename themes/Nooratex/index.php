<?php
/** Template Name: Blog Page */

get_header(); ?>

    <section class="container py-3">
        <div class="row row-cols-1 row-cols-lg-2 justify-content-between g-4">
            <?php
            $j = 0;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => '-1',
                'ignore_sticky_posts' => true
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : $i = 0;
                /* Start the Loop */
                while ($loop->have_posts()) :
                    $loop->the_post();
                    get_template_part('template-parts/useful/blog-card');
                    $j++;
                endwhile;
            endif;
             ?>
        </div>
        <?php get_template_part('template-parts/useful/pagination');
        wp_reset_postdata();?>
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