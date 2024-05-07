<section class="container">
    <div class="swiper shop_swiper bg-primary rounded-3"  style=" height: 500px;">
        <div class="swiper-wrapper">
            <?php while (have_rows('shop-slider', 'option')):
            the_row(); ?>
            <div class="swiper-slide hero_slider">
                <picture>
                    <?php $imgMobile = get_sub_field('shop-slide-image_mobile', 'option');
                    $imgDesktop = get_sub_field('shop-slide-image', 'option');
                    ?>
                    <source media="(min-width: 576px)" srcset="<?= $imgDesktop['url'] ?? ''; ?>">
                    <source media="(max-width: 575px)" srcset="<?= isset($imgMobile) ? $imgMobile['url'] : (isset($imgDesktop) ? $imgDesktop['url'] : '') ?>">
                    <img class="img-fluid position-absolute top-0 start-0 w-100 h-100 z--1 object-fit" src="<?= $imgDesktop['url'] ?? ''; ?>" alt="<?= $imgDesktop['title']; ?>">
                </picture>
            </div>
        <?php
        endwhile; ?>
        </div>
        <div class="shop-pagination position-absolute bottom-0 start-50 d-flex justify-content-center translate-middle mb-3 z-top"></div>
        <div class="position-absolute bottom-0 start-0 mb-lg-3 ms-lg-3 z-top d-flex">
            <div class="shop-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                    <g filter="url(#filter0_d_4129_1456)">
                        <rect x="47" y="47" width="32" height="32" rx="16" transform="rotate(-180 47 47)" fill="white" shape-rendering="crispEdges"/>
                        <rect x="46.5" y="46.5" width="31" height="31" rx="15.5" transform="rotate(-180 46.5 46.5)" stroke="white" shape-rendering="crispEdges"/>
                        <path d="M32.6191 26.4552C32.7457 26.4552 32.8724 26.5019 32.9724 26.6019L37.0191 30.6485C37.2124 30.8419 37.2124 31.1619 37.0191 31.3552L32.9724 35.4019C32.7791 35.5952 32.4591 35.5952 32.2657 35.4019C32.0724 35.2085 32.0724 34.8885 32.2657 34.6952L35.9591 31.0019L32.2657 27.3085C32.0724 27.1152 32.0724 26.7952 32.2657 26.6019C32.3591 26.5019 32.4924 26.4552 32.6191 26.4552Z" fill="#222222"/>
                        <path d="M25.3347 30.5L36.5547 30.5C36.828 30.5 37.0547 30.7267 37.0547 31C37.0547 31.2733 36.828 31.5 36.5547 31.5L25.3347 31.5C25.0614 31.5 24.8347 31.2733 24.8347 31C24.8347 30.7267 25.0614 30.5 25.3347 30.5Z" fill="#222222"/>
                    </g>
                    <defs>
                        <filter id="filter0_d_4129_1456" x="0" y="0" width="62" height="62" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset/>
                            <feGaussianBlur stdDeviation="7.5"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4129_1456"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4129_1456" result="shape"/>
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="shop-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                    <g filter="url(#filter0_d_4129_1454)">
                        <rect x="15" y="15" width="32" height="32" rx="16" fill="white" shape-rendering="crispEdges"/>
                        <rect x="15.5" y="15.5" width="31" height="31" rx="15.5" stroke="white" shape-rendering="crispEdges"/>
                        <path d="M29.3809 35.5448C29.2543 35.5448 29.1276 35.4981 29.0276 35.3981L24.9809 31.3515C24.7876 31.1581 24.7876 30.8381 24.9809 30.6448L29.0276 26.5981C29.2209 26.4048 29.5409 26.4048 29.7343 26.5981C29.9276 26.7915 29.9276 27.1115 29.7343 27.3048L26.0409 30.9981L29.7343 34.6915C29.9276 34.8848 29.9276 35.2048 29.7343 35.3981C29.6409 35.4981 29.5076 35.5448 29.3809 35.5448Z" fill="#222222"/>
                        <path d="M36.6653 31.5H25.4453C25.172 31.5 24.9453 31.2733 24.9453 31C24.9453 30.7267 25.172 30.5 25.4453 30.5H36.6653C36.9386 30.5 37.1653 30.7267 37.1653 31C37.1653 31.2733 36.9386 31.5 36.6653 31.5Z" fill="#222222"/>
                    </g>
                    <defs>
                        <filter id="filter0_d_4129_1454" x="0" y="0" width="62" height="62" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset/>
                            <feGaussianBlur stdDeviation="7.5"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4129_1454"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4129_1454" result="shape"/>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
    </div>
</section>
