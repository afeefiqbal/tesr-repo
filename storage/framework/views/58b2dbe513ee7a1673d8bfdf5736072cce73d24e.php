<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> <?php echo e($title); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php if(session('success')): ?>
                <div class="alert alert-success" user_type="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo e(session('success')); ?>

                </div>
            <?php elseif(session('error')): ?>
                <div class="alert alert-danger" user_type="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                <?php echo e(csrf_field()); ?>          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Contact-us page Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Email ID*</label>
                                <input type="email" name="email_id" id="email_id" class="form-control required" placeholder="Email ID" value="<?php echo e(!empty($contact)?$contact->email_id:''); ?>" maxlength="50">
                                <div class="help-block with-errors" id="email_id_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Email Recepient Name*</label>
                                <input type="text" name="email_recepient" id="email_recepient" class="form-control required" placeholder="Email Recepient Name" value="<?php echo e(!empty($contact)?$contact->email_recepient:''); ?>" maxlength="255">
                                <div class="help-block with-errors" id="email_recepient_error"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label> Phone Number*</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control required" placeholder="Phone Number" value="<?php echo e(!empty($contact)?$contact->phone_number:''); ?>" maxlength="15">
                                <div class="help-block with-errors" id="phone_number_error"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label> Alternate Phone Number</label>
                                <input type="text" name="alternate_phone_number" id="alternate_phone_number" class="form-control" placeholder="Alternate Phone Number" value="<?php echo e(!empty($contact)?$contact->alternate_phone_number:''); ?>" maxlength="15">
                                <div class="help-block with-errors" id="alternate_phone_number_error"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label> Whatsapp Number*</label>
                                <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control required" placeholder="Whatsapp Number" value="<?php echo e(!empty($contact)?$contact->whatsapp_number:''); ?>" maxlength="15">
                                <div class="help-block with-errors" id="whatsapp_number_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Google Map</label>
                                <textarea name="google_map" id="google_map" class="form-control" placeholder="Google Map"><?php echo e(!empty($contact)?$contact->google_map:''); ?></textarea>
                                <span style='color:green;font-size:14px;'>Note: src from google map iframe</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Address</label>
                                <textarea name="address" id="address" class="form-control tinyeditor" placeholder="Address"><?php echo e(!empty($contact)?$contact->address:''); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn"> 
                        <input type="hidden" name="id" id="id" value="<?php echo e(!empty($contact)?$contact->id:'0'); ?>"> 
                        <img class="animation__shake loadingImg" src="<?php echo e(url('app/dist/img/loading.gif')); ?>" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pentacodes.Marketing\Desktop\LaravelProjects\2025\Medwe\resources\views/app/contact_us/contact_form.blade.php ENDPATH**/ ?>