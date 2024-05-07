<?php $shopGuid = get_field('shop-guide' , 'option');
?>
<div class="modal fade" id="staticBackdrop"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="max-height:80vh;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $shopGuid->post_title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= $shopGuid->post_content; ?>
            </div>
        </div>
    </div>
</div>