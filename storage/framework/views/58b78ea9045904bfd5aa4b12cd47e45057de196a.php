<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 mw_col_wrapper_left">
    <div class="mw_col_inner_wrapper">
        <!-- Custom Toggle Button -->
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="customOuterHeading">
                    <button id="categoryToggleBtn" class="accordion-button collapsed" type="button">
                        CATEGORIES
                    </button>
                </h2>
                <div id="customOuterCollapse" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <!-- INNER ACCORDION START -->
                        <div class="accordion accordion-flush mw_product_accodian_inner_list" id="accordionFlushExampleInner">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-item filter-param" data-category_param="<?php echo e($category->id); ?>">
                                    <h2 class="accordion-header" id="flush-headingOneInner<?php echo e($category->id); ?>">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOneInner<?php echo e($category->id); ?>"
                                            aria-expanded="false"
                                            aria-controls="flush-collapseOneInner<?php echo e($category->id); ?>">
                                            <?php echo e($category->title); ?>

                                        </button>
                                    </h2>
                                    <div id="flush-collapseOneInner<?php echo e($category->id); ?>"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOneInner<?php echo e($category->id); ?>"
                                        data-bs-parent="#accordionFlushExampleInner">
                                        <div class="accordion-body">
                                            <?php if($category->products->isNotEmpty()): ?>
                                                <ul class="mw_dropdown_list">
                                                    <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a href="<?php echo e(url('product/'.$child->short_url)); ?>" class="filter-param" data-category_param="<?php echo e($child->id); ?>">
                                                                <?php echo e($child->title); ?>

                                                            </a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- INNER ACCORDION END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/render/_product_category_list.blade.php ENDPATH**/ ?>