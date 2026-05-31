<?php $__env->startSection('content'); ?>
	<?php if(isset($banner) && $banner!=NULL): ?>
		<section class="inner_page_banner" style="background: url(<?php echo e(asset($banner->banner)); ?>) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1><?php echo e($banner->title); ?></h1>
	    		<h5>Home / <?php echo e($banner->title); ?></h5>
	  		</div>
		</section>
	<?php endif; ?>
	<section class="mw_contact_sec_01 mw_RequestQuote_sec_01">
	  	<div class="container">
	    	<h2>For Healthcare Items Not Listed In The Site, Please Type Or Upload Your Requests.</h2>
	    	<form id="quoteForm" action="<?php echo e(url('quote-form-submit')); ?>" method="post" class="quote-form" enctype="multipart/form-data">
    			<?php echo e(csrf_field()); ?>

		    	<div class="row row_warpper_sec_02">
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
		          		<input type="text" class="quote-required input-field" autocomplete="off" name="quote_first_name" id="quote_first_name" placeholder="First Name" required>
		                <div class="invalid" id="quote_first_name_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
		          		<input type="text" class="quote-required input-field" autocomplete="off" name="quote_last_name" id="quote_last_name" placeholder="Last Name">
		                <div class="invalid" id="quote_last_name_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
		          		<input type="text" class="input-field quote-required" autocomplete="off" id="quote_phone" name="quote_phone" placeholder="Phone" onkeypress="return isNumber(event)" required>
			          	<div class="invalid" id="quote_phone_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
		          		<input type="text" class="quote-required" autocomplete="off" name="quote_email" id="quote_email" placeholder="Email" required>
	                    <div class="invalid" id="quote_email_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mw_col_wrapper">
		          		<textarea class="form-control-message input-field" name="quote_comments" autocomplete="off" id="quote_comments" placeholder="Message"></textarea>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mw_col_wrapper mb-5">
		            	<label for="fileUpload">upload product image <span class="warning-note">[Note: Ensure that the size of the image you upload is less than 1 MB]</span></label>
		            	<input type="file" id="file-input" name="quote_product_image">
		            	<input type="hidden" name="quote_product_image_uploaded" id="quote_product_image_uploaded" class="quote-required">
	                    <div class="invalid mb-2" id="quote_product_image_uploaded_error"></div>
		        	</div>
		        	<input type="hidden" name="prefixKey" value="quote">
			    	<button data-url="quote-form-submit" data-flag="quote" class="submit-form-btn" type="submit">Submit Your Request</button>
		    	</div>
	    	</form>
	  	</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/web/request-quote.blade.php ENDPATH**/ ?>