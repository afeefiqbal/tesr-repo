<?php $__env->startSection('content'); ?>
	<?php if(isset($banner) && $banner!=NULL): ?>
		<section class="inner_page_banner" style="background: url(<?php echo e(asset($banner->banner)); ?>) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1><?php echo e($banner->title); ?></h1>
	    		<h5>Home / <?php echo e($banner->title); ?></h5>
	  		</div>
		</section>
	<?php endif; ?>
	<?php if($blogs->isNotEmpty()): ?>
		<section class="mw_home_sec_06 mw_blog_sec_01 blog">
		    <div class="container">
		      	<div class="row row_warpper">
		      		<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			          	<?php echo $__env->make('web.render._single_blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  	
		      	</div>
		    </div>
		</section>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/blogs.blade.php ENDPATH**/ ?>