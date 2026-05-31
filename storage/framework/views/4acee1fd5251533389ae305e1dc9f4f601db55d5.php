<?php $__env->startSection('content'); ?>
	<?php if(isset($productDetail) && $productDetail->banner!=NULL): ?>
		<section class="inner_page_banner" style="background: url(<?php echo e(asset($productDetail->banner)); ?>) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1><?php echo e($productDetail->title); ?></h1>
	    		<h5>Home / <?php echo e($productDetail->title); ?></h5>
	  		</div>
		</section>
	<?php endif; ?>
	<section class="mw_product_details_sec_01">
  		<div class="container">
    		<div class="row row_warpper">
      			<div class="col-xs-12 col-sm-12 colmd-6 col-lg-6 mw_col_left_wrapper">
                  	<div class="gallery clearfix">
                  		<?php if($productDetail->photos->isNotEmpty()): ?>
	                    	<div class="previews">
	                    		<?php $__currentLoopData = $productDetail->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                      		<a href="" class="<?php echo e(($loop->first)?'selected':''); ?> jumbing_top" data-full="<?php echo e(asset($photo->image)); ?>">
		                        		<img src="<?php echo e(asset($photo->image)); ?>" />
		                      		</a>
	                      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    	</div>
	                  		<div class="full"> 
	                  			<img src="<?php echo e(asset($productDetail->photos[0]->image)); ?>" /> 
	                  		</div>
                  		<?php else: ?>
                  			<div class="full"> 
	                  			<img src="<?php echo e(asset('web/images/product_gallery_01.png')); ?>" /> 
	                  		</div>
                  		<?php endif; ?>
                  	</div>
      			</div>
  				<div class="col-xs-12 col-sm-12 colmd-6 col-lg-6 mw_col_right_wrapper">
    				<label class="category">
    					<?php echo e($productDetail->category->title); ?>

    				</label>
    				<h2><?php echo e($productDetail->title); ?></h2>
    				<ul>
      					<li>
      						<label>Category:</label>
      						<?php echo e($productDetail->category->title); ?>

      					</li> 
      					<?php if($productDetail->brandData!=NULL): ?> 
	      					<li>
	      						<label>Brand:</label>
	      						<?php echo e($productDetail->brandData->title); ?>

	      					</li>  
      					<?php endif; ?>
      					<li>
      						<label>Price:</label>
      						AED <?php echo e($productDetail->price); ?>

      					</li>
    				</ul>
    				<?php if($productDetail->description!=NULL): ?>
    					<?php echo $productDetail->description; ?>

    				<?php endif; ?>
    				<div class="btn_wrapper">
      					<a href="#">
      						<?php 
			                    $productUrl = url('product/'.$productDetail->short_url);
			                    $message = 'Hi there, You have an enquiry, Product Name : '.$productDetail->title.', Product Url : '.$productUrl;
			                ?>
        					<button class="mw_quick_enq clickable-element cursor-pointer" data-href="https://api.whatsapp.com/send/?phone=<?php echo e($siteInformation->whatsapp_number); ?>&text=<?php echo e(nl2br($message)); ?>&type=phone_number&app_absent=0" data-target="_blank">
          						<span>Buy Now </span>
          						<i><img src="<?php echo e(asset('web/images/whatsapp_icon_product_details.png')); ?>"></i>
        					</button>
      					</a>
      					<?php if($productDetail->brochure!=NULL): ?>
	      					<span class="mobile_break_wrapper">
	        					<a target="_blank" href="<?php echo e(asset($productDetail->brochure)); ?>" class="mw_re_quote">
	        						<button>Download Brochure</button>
	        					</a>
	      					</span>
      					<?php endif; ?>
      					<?php if(isset($siteInformation) && $siteInformation->whatsapp_number!=NULL): ?>
	      					<a href="tel:<?php echo e($siteInformation->whatsapp_number); ?>" class="mw_product_details_call">
	            				<div class="content-center">
	                				<div class="pulse">
	                  					<i class="fas fa-phone fa-2x">
	                    					<img src="<?php echo e(asset('web/images/	call_icon_product_details.svg')); ?>">
	                  					</i>
	                				</div>
	            				</div>
	        				</a>
        				<?php endif; ?>
    				</div>
  				</div>
    		</div>
    		<?php if($productDetail->alternate_description!=NULL): ?>
	    		<div class="row row_warpper">
	      			<div class="col-xs-12 col-sm-12 colmd-12 col-lg-12 mw_col_left_wrapper mt-5 p-5 custom-class">
	      				<?php echo $productDetail->alternate_description; ?>

	      			</div>
	      		</div>	
      		<?php endif; ?>
    	</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/web/product_detail.blade.php ENDPATH**/ ?>