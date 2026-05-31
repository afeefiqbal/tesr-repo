<?php if($testimonials->isNotEmpty()): ?>
    <section class="mw_home_sec_05">
        <div class="container">
            <h2 class="headeing">What <span>Client Say</span></h2>
            <div class="owl-carousel-sec  owl-carousel owl-theme">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <?php echo $testimonial->message; ?>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
                                <ul>
                                    <?php if($testimonial->image!=NULL): ?>
                                        <li><img src="<?php echo e(asset($testimonial->image)); ?>"></li>
                                    <?php else: ?>
                                        <li><img src="<?php echo e(asset('web/images/testimonial_user.png')); ?>"></li>
                                    <?php endif; ?>
                                    <li><?php echo e($testimonial->title); ?> <span><?php echo e($testimonial->designation); ?></span></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            </div>
        </div>    
    </section>
<?php endif; ?>    <?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/render/_testimonials.blade.php ENDPATH**/ ?>