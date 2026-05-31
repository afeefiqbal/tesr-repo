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
                        <h3 class="card-title">Site information form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Facebook</label>
                                <input type="text" name="facebook_url" id="facebook_url" class="form-control" placeholder="Facebook" value="<?php echo e(!empty($contact)?$contact->facebook_url:''); ?>" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Instagram</label>
                                <input type="text" name="instagram_url" id="instagram_url" class="form-control" placeholder="Instagram" value="<?php echo e(!empty($contact)?$contact->instagram_url:''); ?>" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Twitter</label>
                                <input type="text" name="twitter_url" id="twitter_url" class="form-control" placeholder="Twitter" value="<?php echo e(!empty($contact)?$contact->twitter_url:''); ?>" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Linkedin</label>
                                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control" placeholder="Linkedin" value="<?php echo e(!empty($contact)?$contact->linkedin_url:''); ?>" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Privacy Policy</label>
                                <textarea name="privacy_policy" id="privacy_policy" placeholder="Privacy Policy" class="form-control tinyeditor" autocomplete="off"><?php echo e(!empty($contact)?$contact->privacy_policy:''); ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Terms & Conditions</label>
                                <textarea name="terms_conditions" id="terms_conditions" placeholder="Terms & Conditions" class="form-control tinyeditor" autocomplete="off"><?php echo e(!empty($contact)?$contact->terms_conditions:''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Footer Text</label>
                                <textarea name="footer_text" id="footer_text" class="form-control tinyeditor" placeholder="Footer Text"><?php echo e(!empty($contact)?$contact->footer_text:''); ?></textarea>
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
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pentacodes.Marketing\Desktop\LaravelProjects\2025\Medwe\resources\views/app/contact_us/site_form.blade.php ENDPATH**/ ?>