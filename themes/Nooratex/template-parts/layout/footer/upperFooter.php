<div class="bg-primary py-2">
    <div class="container">
        <div class="row justify-content-between">
           <div class="col-lg-2 col-12 pb-3 pb-lg-0">
               <h5 class="fw-bold text-white">صبا سنجش</h5>
               <p class="text-white opacity-50 mb-0">ویژگـــــــــــــــی های</p>
           </div>
            <div class="col-lg-8 col-12 d-lg-flex d-block gap-3 justify-content-center">
                    <?php
                    while (have_rows('property' , 'option')): the_row();?>
                        <div class="d-flex align-items-center gap-3">
                        <img src="<?= get_sub_field('property_image' , 'option')['url'] ;?>"
                             alt="<?= get_sub_field('property_image' , 'option')['title'] ;?>">
                        <div>
                            <h6 class="fw-bold text-white fs-6"><?= get_sub_field('property_name');?></h6>
                            <p class="text-white opacity-50 mb-0 small"><?= get_sub_field('property_detail');?></p>
                        </div>
                </div>
                    <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>