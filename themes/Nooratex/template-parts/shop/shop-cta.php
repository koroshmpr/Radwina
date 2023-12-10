<section class="container bg-warning p-5 rounded-2 my-4">
    <div class="row justify-content-lg-between justify-content-center align-items-center gap-4">
        <div class="col-lg-3">
            <h5 class="fw-bold text-dark fs-4 text-center text-lg-start"><?= get_field('shop-cta-title' , 'option'); ?></h5>
            <p class="text-center text-lg-start"><?= get_field('shop-cta-content' , 'option'); ?></p>
        </div>
        <img class="col-lg-4" src="<?= get_field('shop-cta-image' , 'option')['url'] ?? ''; ?>"
             alt="<?= get_field('shop-cta-image' , 'option')['title'] ?? ''; ?>">
    </div>
</section>