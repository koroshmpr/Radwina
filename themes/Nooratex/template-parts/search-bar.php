<form class="search-form d-flex gap-1 align-items-center"
      method="get"
      action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input id="search-form-<?= $args['place'] ?>" type="search" name="s"
               class="s form-control text-white bg-light bg-opacity-25"
               placeholder="جستجو"
               aria-label="Search">
        <button type="submit" class=" bg-primary search-submit text-white btn px-3 lh-1 border border-white
        border-start-0" aria-label="Search">
            <i class="bi bi-search fs-5 small-sm-down"></i>
        </button>
    </div>
    <button type="button"
            class="btn-close bg-primary text-reset mobile-overlay__close d-none p-2">
    </button>
</form>
<div class="position-absolute bg-primary bg-opacity-75 rounded-bottom container top-100 mt-n2 start-0 end-0 search-overlay__results z-top search-box-overflow animate__animated animate__slideInDown animate__delay-5s">

</div>