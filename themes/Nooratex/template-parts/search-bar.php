<form class="search-form d-flex gap-1 align-items-center"
      method="get"
      action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input id="search-form-<?= $args['place'] ?>" type="search" name="s"
               class="s form-control text-dark bg-light bg-opacity-25"
               placeholder="یک کلمه کلیدی برای جستجوی محصولات وارد کنید"
               aria-label="Search">
        <button type="submit" class=" bg-primary search-submit text-white btn px-2 lh-1 border border-white
        border-start-0" aria-label="Search">
            <svg class="bi bi-search" width="18" height="18" viewBox="0 0 16 17" fill="none">
                <path d="M7.62755 16.2043C3.4231 16.2043 0 12.7812 0 8.57677C0 4.37232 3.4231 0.949219 7.62755 0.949219C11.832 0.949219 15.2551 4.37232 15.2551 8.57677C15.2551 12.7812 11.832 16.2043 7.62755 16.2043ZM7.62755 2.06545C4.0333 2.06545 1.11623 4.98996 1.11623 8.57677C1.11623 12.1636 4.0333 15.0881 7.62755 15.0881C11.2218 15.0881 14.1389 12.1636 14.1389 8.57677C14.1389 4.98996 11.2218 2.06545 7.62755 2.06545ZM15.4411 16.9492C15.2998 16.9492 15.1584 16.8971 15.0467 16.7855L13.5584 15.2972C13.4546 15.1922 13.3964 15.0505 13.3964 14.9028C13.3964 14.7551 13.4546 14.6134 13.5584 14.5084C13.7742 14.2926 14.1314 14.2926 14.3472 14.5084L15.8355 15.9967C16.0513 16.2125 16.0513 16.5697 15.8355 16.7855C15.7239 16.8971 15.5825 16.9492 15.4411 16.9492Z" fill="white"/>
            </svg>
        </button>
    </div>
    <button type="button"
            class="btn-close bg-primary text-reset mobile-overlay__close d-none p-2">
    </button>
</form>
<div class="position-absolute bg-primary bg-opacity-75 rounded-bottom container top-100 mt-n2 start-0 end-0 search-overlay__results z-top search-box-overflow animate__animated animate__slideInDown animate__delay-5s">

</div>