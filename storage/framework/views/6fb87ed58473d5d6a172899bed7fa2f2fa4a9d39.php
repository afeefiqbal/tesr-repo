<div class="col-lg-3">
    <div class="categorySidebar">
        <h5>Categories</h5>
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
                                            <a href="<?php echo e(url('product/' . $child->short_url)); ?>" class="filter-param" data-category_param="<?php echo e($child->id); ?>">
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
    </div>
</div>
<?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/render/_product_category_list.blade.php ENDPATH**/ ?>