<form id="filterForm" role="form" method="post" class="filterForm">
	    				<?php echo e(csrf_field()); ?>

	<div class="mw_product_search">
		<input type="text" name="filter_param" id="filter_param" placeholder="Search Product" class="filter-btn" value="<?php echo e(isset($filterParam)?$filterParam:''); ?>">
		<input type="hidden" name="category_id" id="category_id" value="<?php echo e(isset($categoryId)?$categoryId:''); ?>">
		<input type="hidden" name="brand_id" id="brand_id" value="<?php echo e(isset($explodeBrand)?implode(',',$explodeBrand):''); ?>">
		<button type="submit" class="text-filter-btn">
			<img src="<?php echo e(asset('web/images/product_search_icon.svg')); ?>">
		</button>
	</div>
	<div class="row mw_product_row ">
		<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('web.render._single_product',['column'=>4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

</form>
<?php /**PATH /Users/afeef/works/website-works/well-known/resources/views/web/render/_filter_products.blade.php ENDPATH**/ ?>