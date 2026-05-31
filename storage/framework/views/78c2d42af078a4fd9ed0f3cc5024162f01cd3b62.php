<?php $__env->startSection('content'); ?>
	<?php if(isset($banner) && $banner!=NULL): ?>
		<section class="inner_page_banner" style="background: url(<?php echo e(asset($banner->banner)); ?>) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1><?php echo e($banner->title); ?></h1>
	    		<h5>Home / <?php echo e($banner->title); ?></h5>
	  		</div>
		</section>
	<?php endif; ?>
	<!-- breadcrumbs end -->
	<?php if($about!=NULL): ?>
		<section class="mw_about_sec_01">
	  		<div class="container">
	    		<div class="row row_warpper">
	      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mw_col_wrapper_left">
	      				<?php if($about->image!=NULL): ?>
	        				<img src="<?php echo e(asset($about->image)); ?>" class="responsive">
	        			<?php else: ?>
	        				<img src="<?php echo e(asset('web/images/about_innerpage_img.png')); ?>" class="responsive">
	        			<?php endif; ?>
	      			</div>
		      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mw_col_wrapper_right">
		      			<?php if($about->title!=NULL): ?>
		        			<h2 class="headeing"><?php echo $about->title; ?></h2>
		        		<?php endif; ?>
		        		<?php if($about->description!=NULL): ?>
			        		<?php echo $about->description; ?>

		                <?php endif; ?>
		      		</div>
	    		</div>
	    		<div class="row row_warpper_02">
	    			<?php if($about->vision!=NULL): ?>
			      		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
			        		<div class="mw_col_inner_wrapper">
			          			<h2>
			          				<span>
			          					<?php if($about->vision_image!=NULL): ?>
			          						<img src="<?php echo e(asset($about->vision_image)); ?>">
			          					<?php else: ?>
			          						<img src="<?php echo e(asset('web/images/our_vision_icon.png')); ?>">
			          					<?php endif; ?>
			          				</span>Our Vision
			          			</h2>
			          			<?php echo $about->vision; ?>

			        		</div>
			      		</div>
		      		<?php endif; ?>
		      		<?php if($about->mission!=NULL): ?>
			      		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
				        	<div class="mw_col_inner_wrapper">
			          			<h2>
			          				<span>
			          					<?php if($about->mission_image!=NULL): ?>
			          						<img src="<?php echo e(asset($about->mission_image)); ?>">
			          					<?php else: ?>
			          						<img src="<?php echo e(asset('web/images/our_mission_icon.png')); ?>">
			          					<?php endif; ?>
			          				</span>Our Mission
			          			</h2>
			          			<?php echo $about->mission; ?>

			        		</div>
			      		</div>
			      	<?php endif; ?>	
	    		</div>
	  		</div>
		</section>
	<?php endif; ?>
	<?php if($keyFeatures->isNotEmpty()): ?>
		<section class="mw_about_sec_02">
			<div class="container">
	    		<div class="row">
	    			<?php $__currentLoopData = $keyFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <div class="four col-xs-6 col-sm-6 col-md-3 mw_col_wrapper">
				            <div class="counter-box"> 
				            	<?php if($feature->image!=NULL): ?>
				            		<img src="<?php echo e(asset($feature->image)); ?>" class="mw_counter_icon"> 
				            	<?php else: ?>
				            		<img src="<?php echo e(asset('web/images/about_counter_icon_01.png')); ?>" class="mw_counter_icon"> 
				            	<?php endif; ?>		
				            	<?php if($feature->title!=NULL): ?>		            	
					                <h2 data-max="<?php echo e($feature->count); ?>" class="ms-animated"><?php echo e($feature->count); ?>

					                	<span><?php echo e($feature->title); ?></span>
					                </h2>
				                <?php endif; ?>
				            </div>
				        </div>
			        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    		</div>
			</div>
		</section>
	<?php endif; ?>
	<!--<?php echo $__env->make('web.render._partners', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    -->
    <?php echo $__env->make('web.render._testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/about-us.blade.php ENDPATH**/ ?>