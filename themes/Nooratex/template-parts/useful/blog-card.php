<article class="all-dark">
    <a class="d-flex justify-content-between flex-wrap m-1 border border-1 p-3 align-items-center" href="<?php the_permalink();?>">
        <img class="col-lg-4 col-12 object-fit img-thumbnail" src="<?php echo the_post_thumbnail_url(); ?>"
             alt="<?php the_title(); ?>" style="height: 200px">
        <div class="col-lg-7 col-12">
            <div class="ps-2 pt-2 pt-lg-0">
                <h5 class="fw-bolder"> <?= get_the_title();?></h5>
                <p><?= wp_trim_words(get_the_content() , 18);?></p>
            </div>
        </div>
    </a>
</article>