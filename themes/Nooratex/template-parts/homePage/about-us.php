<section class="container bg-warning my-3 rounded-1">
    <div class="row justify-content-around align-items-center p-3">
        <div class="col-lg-4 col text-center text-lg-start">
            <p class="text-dark fs-2"><?= get_field('aboutus-banner-content'); ?></p>
            <a class="bg-primary btn text-white" href="/about-us">درباره ما</a>
        </div>
        <img
                src="<?= get_field('aboutus-banner')['url']; ?>"
                alt="<?= get_field('aboutus-banner')['title']; ?>"
                class="col-lg-6 col rounded-1">
    </div>
</section>