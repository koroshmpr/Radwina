<?php
$frontPageID = get_option('page_on_front'); // Get the ID of the front page

// Use the front page ID in the get_field function
$aboutUsBannerContent = get_field('aboutus-banner-content', $frontPageID);
$aboutUsBtnLink = get_field('aboutus-btn-link', $frontPageID);
$aboutUsBtnText = get_field('aboutus-btn-text', $frontPageID);
$aboutUsBanner = get_field('aboutus-banner', $frontPageID);
?>

<section class="container bg-warning my-3 rounded-1">
    <div class="row justify-content-around align-items-center p-3">
        <div class="col-lg-4 col text-center text-lg-start">
            <p class="text-dark fs-2"><?= $aboutUsBannerContent; ?></p>
            <a class="bg-primary btn text-white" href="<?= $aboutUsBtnLink['url']; ?>">
                <?= $aboutUsBtnText; ?>
            </a>
        </div>
        <img src="<?= $aboutUsBanner['url']; ?>" alt="<?= $aboutUsBanner['title']; ?>" class="col-lg-5 col rounded-1">
    </div>
</section>