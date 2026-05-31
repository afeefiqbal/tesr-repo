<?php $__env->startSection('content'); ?>
	<?php if(isset($banner) && $banner!=NULL): ?>
		<section class="inner_page_banner" style="background: url(<?php echo e(asset($banner->banner)); ?>) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1><?php echo e($banner->title); ?></h1>
	    		<h5>Home / <?php echo e($banner->title); ?></h5>
	  		</div>
		</section>
	<?php endif; ?>
	<section class="mw_blogdetails_sec_01">
	    <div class="container">
	      	<div class="row row_warpper">
	          	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 mw_col_wrapper_left">
	            	<div class="mw_col_inner_wrapper">
	              		<?php if($blog->image!=NULL): ?>
			                <img src="<?php echo e(asset($blog->image)); ?>" class="responsive mb-3">
			            <?php else: ?>
			                <img src="<?php echo e(asset('web/images/blog_details_img.jpg')); ?>" class="responsive mb-3">
			            <?php endif; ?>
	                	<ul class="blog_time_list">
	                  		<li>
	                  			<?php echo e(date("d M Y", strtotime($blog->posted_date))); ?>

	                  		</li>
	                   		<li>
	                   			<span>
	                   				<img src="<?php echo e(asset('web/images/author_icon.png')); ?>">
	                   			</span>
	                   			<?php echo e($blog->author); ?>

	                   		</li>
	                	</ul>
	                	<?php if($blog->title!=NULL): ?>
	                		<h2><?php echo e($blog->title); ?></h2>
	                	<?php endif; ?>
	                	<?php if($blog->description!=NULL): ?>
	                		<?php echo $blog->description; ?>

	                	<?php endif; ?>
	              	</div>
	          	</div>
	          	<?php if($recentBlogs->isNotEmpty()): ?>
		          	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 mw_col_wrapper_right">
		            	<div class="mw_col_inner_wrapper">
		                	<h4>Related  Recent Posts</h4>
		            		<ul>
		            			<?php $__currentLoopData = $recentBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                		<li>
			                    		<a href="<?php echo e(url('blog/'.$rBlog->short_url)); ?>">
			                    			<?php if($rBlog->image!=NULL): ?>
								                <img src="<?php echo e(asset($rBlog->image)); ?>" style="width:100px">
								            <?php else: ?>
								                <img src="<?php echo e(asset('web/images/recent_post.png')); ?>" style="width:100px">
								            <?php endif; ?>
			                    			<p>
			                    				<?php echo e($rBlog->title); ?>

			                    				<span><?php echo e(date("d M Y", strtotime($rBlog->posted_date))); ?></span>
			                    				
			                    			</p>
			                    		</a>
			                		</li>
		                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            		</ul>
		            	</div>
		        	</div>
		        <?php endif; ?>	
	    	</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/blog_detail.blade.php ENDPATH**/ ?>