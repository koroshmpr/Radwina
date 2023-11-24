<?php
// Get the post object using get_field function
$service_post = get_field('single_service');
// If the post exists, get its slug
$service_slug = $service_post->post_name;
$service_thumb_id = get_post_thumbnail_id($service_post->ID);
$service_thumb_url = wp_get_attachment_image_url($service_thumb_id, 'thumbnail');
$customeLink = get_field('custom-link-services');
$permalink = get_permalink($service_post );

// Get the post with the slug "digital-print" in the "services" post type
$services_post = get_page_by_path($service_slug, OBJECT, 'services');
// If the post exists, display its title and content
if ($services_post) {

    ?>
        <section class="mt-4">
                <div class="card rounded-0 mb-3 px-0 animate__animated animate__backInRight">
                    <div class="row gap-lg-3 align-items-center">
                        <?php
                        $customeImg = get_field('custom-img-services');
                        if ($customeImg) { ?>
                        <img src="<?= $customeImg['url'] ;?>" class="col-lg-6 object-fit rounded-start" height="500"
                             alt="<?= $services_post->post_title;?>">
                        <?php } else { ?>
                            <img src="<?= $service_thumb_url?>" class="col-lg-6 object-fit rounded-start" height="500"
                                 alt="<?= $services_post->post_title;?>">
                        <?php };?>
                        <div class="col-md-5">
                            <div class="card-body mt-2 pe-lg-5">
                                <h5 class="card-title fw-bold fs-1 text-center text-lg-start"><?= $services_post->post_title;?></h5>
                                <p class="card-text text-justify"><?= $services_post->post_content ;?></p>
                                <a class="stretched-link " href="<?= $customeLink ? $customeLink['url'] : $permalink;?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

<?php
}
?>
