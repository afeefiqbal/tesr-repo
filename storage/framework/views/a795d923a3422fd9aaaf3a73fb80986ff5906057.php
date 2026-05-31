<form id="filterForm" role="form" method="post" class="filterForm">
    <?php echo e(csrf_field()); ?>

    <div class="productSearchBox">
        <input type="text" name="filter_param" id="filter_param" placeholder="Search products..." class="filter-btn" value="<?php echo e(isset($filterParam) ? $filterParam : ''); ?>">
        <input type="hidden" name="category_id" id="category_id" value="<?php echo e(isset($categoryId) ? $categoryId : ''); ?>">
        <input type="hidden" name="brand_id" id="brand_id" value="<?php echo e(isset($explodeBrand) ? implode(',', $explodeBrand) : ''); ?>">
        <button type="submit" class="text-filter-btn" aria-label="Search products">
            <img src="<?php echo e(asset('web/images/product_search_icon.svg')); ?>" alt="">
        </button>
    </div>
    <div class="row mw_product_row">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('web.render._single_product', ['column' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="noProducts">
                    <h5 class="fw-SemiBold">No products found</h5>
                    <p class="mt-2">Try adjusting your search or browse another category.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</form>
<?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/render/_filter_products.blade.php ENDPATH**/ ?>