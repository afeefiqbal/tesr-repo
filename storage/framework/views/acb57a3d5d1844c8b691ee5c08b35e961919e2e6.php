<?php $__env->startSection('content'); ?>
<div class="content-wrapper">    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-bell"></i> View Contact - <?php echo e($contact->name); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item active">Contact View</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
		<div class="container-fluid">
			<div class="row">
		  		<div class="col-md-12">
		    		<div class="card card-primary card-tabs">
		      			<div class="card-header p-0 pt-1">
		        			<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
	                  		<li class="nav-item">
	                    		<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Basic Informations</a>
	                  		</li>
		        			</ul>
		      			</div>
		      			<div class="card-body">
		        			<div class="tab-content" id="custom-tabs-one-tabContent">
		          				<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
		            				<div class="post">
		              					<strong><i class="fas fa-user mr-1"></i> Name</strong>
												    <p class="text-muted">
												    	<?php echo e($contact->first_name.' '.$contact->last_name); ?>    
												    </p>
										    <hr>
					        				<strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
					        				<p class="text-muted"><?php echo e($contact->email); ?></p>
						        		<hr>
					        				<strong><i class="fas fa-pencil-alt mr-1"></i> Phone Number</strong>
					        				<p class="text-muted"><?php echo e($contact->phone); ?></p>
						        		<hr>
						        		
							        			<strong><i class="fas fa-address-book mr-1"></i> Contact Request</strong>
							        			<p class="text-muted"><?php echo $contact->comments; ?></p>		
							        
						        
						        		<hr>
							        	<?php if($contact->replay!=NULL): ?>		
						
						        			<strong><i class="fas fa-reply mr-1"></i> Replay</strong>
						        			<p class="text-muted"><?php echo e($contact->replay); ?></p>	
						        		<hr>

										<strong><i class="fas fa-reply mr-1"></i> Replay Date</strong>
						        			<p class="text-muted"> <?php echo e($contact->replay_date); ?></p>	
											<hr>
											<?php endif; ?>
											<strong><i class="fa fa-address-book mr-1"></i>created_at</strong>
						        			<p class="text-muted"> <?php echo e(date("d-M-Y", strtotime($contact->created_at))); ?></p>	
											<hr>

						        		 
		            				</div>
		          				</div>
		        			</div>
		      			</div>	
		    		</div>
		  		</div>
			</div>
		</div>
	</section>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/contact_us/contact_view.blade.php ENDPATH**/ ?>