</main>
<footer>
    <?php
    //          upper footer = call to actions
    //    get_template_part('template-parts/layout/footer/upperFooter');
    //          main footer
    get_template_part('template-parts/layout/footer/mainFooter');
    //          copyright
    get_template_part('template-parts/layout/footer/copyright');
    ?>
</footer>
<?php if (is_singular('product')) { ?>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px)">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-white bg-opacity-10 p-3 border-white border-opacity-25 rounded-0">
                <div class="modal-body text-center">
                    <img class="img-fluid product-image__modal" src="" alt="Full-size Image">
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>