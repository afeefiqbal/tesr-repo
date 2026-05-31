<?php if($brands->isNotEmpty()): ?>
    <section class="mw_home_sec_04">
        <div class="container">
            <div class="row row_warpper">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mw_col_wrapper_left">
                    <h2 class="headeing">our<span>brands</span></h2>
                    <div class="owl-carousel owl-theme owl-carousel-one">
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <h4>
                                    <img src="<?php echo e(asset($brand->image)); ?>">
                                </h4>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/render/_partners.blade.php ENDPATH**/ ?>