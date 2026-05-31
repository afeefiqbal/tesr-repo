<?php $__env->startSection('content'); ?>
	<?php if(isset($banner) && $banner!=NULL): ?>
		<section class="inner_page_banner" style="background: url(<?php echo e(asset($banner->banner)); ?>) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1><?php echo e($banner->title); ?></h1>
	    		<h5>Home / <?php echo e($banner->title); ?></h5>
	  		</div>
		</section>
	<?php endif; ?>
	<section class="mw_product_sec_01">
  		<div class="container">
  			<div class="row row_warpper">
	  			<?php echo $__env->make('web.render._product_category_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	  			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 mw_col_wrapper_right">
	  				<div class="mw_col_inner_wrapper" id="filter-result">
	  					<?php echo $__env->make('web.render._filter_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	  				</div>
	  			</div>
			</div>	
    	</div>
  	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/products.blade.php ENDPATH**/ ?>