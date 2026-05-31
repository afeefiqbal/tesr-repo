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
              <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().'administration')); ?>">Admin list</a></li>
              <li class="breadcrumb-item active"><?php echo e($title); ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="invalid-feedback" role="alert" style="padding: 10px;text-align: center;"><strong><?php echo e($error); ?></strong></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
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
            <h3 class="card-title">Basic Informations</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputPassword4">Name*</label>
                  <input type="text" class="form-control required" name="name" placeholder="Name" id="name" value="<?php echo e(isset($admin)?@$admin->name:old('name')); ?>" maxlength="255">
                  <div class="help-block with-errors" id="name_error"></div>
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                      <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Email*</label>
                  <input type="email" name="email_id" id="admin_email_id" placeholder="Email ID" class="form-control required" autocomplete="off" value="<?php echo e(isset($admin)?@$admin->email:old('email_id')); ?>" maxlength="50">
                  <div class="help-block with-errors" id="admin_email_id_error"></div>
                  <?php $__errorArgs = ['email_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                      <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Profile Image</label>
                <div class="file-loading">
                    <input id="profile_image" name="profile_image" type="file">
                </div>
                <span class="caption_note">Note: Image size must be 300 X 300</span>
              </div>
              <div class="form-group col-md-6">
                  <label>Phone Number*</label>
                  <input type="number" class="form-control required" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo e(isset($admin)?@$admin->phone_number:old('phone_number')); ?>" maxlength="15">
                  <div class="help-block with-errors" id="phone_number_error"></div>
                  <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Authentication Credentials</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Username*</label>
                  <input type="text" class="form-control required" id="username" name="username" placeholder="Username" value="<?php echo e(isset($admin)?@$admin->username:old('username')); ?>" maxlength="30">
                  <div class="help-block with-errors" id="username_error"></div>
                  <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                      <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              <?php if(!isset($admin)): ?>
                <div class="form-group col-md-6">
                  <label>Password*</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="login_password" name="password" placeholder="Password" min="8" maxlength="20">
                    <div class="input-group-append">
                      <span class="input-group-text pointer-cls" id="refresh_code"><i class="fas fa-sync"></i></span>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback">
                        <?php echo e($message); ?>

                      </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="card-footer">
            <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
            <button type="reset" class="btn btn-default">Cancel</button>
            <img class="animation__shake loadingImg" src="<?php echo e(url('app/dist/img/loading.gif')); ?>" style="display:none;">
          </div>
        </div>
        </form>
      </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#profile_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 300,
        minImageHeight: 300,
        maxImageWidth: 300,
        maxImageHeight: 300,
        showRemove: true,
        <?php if(isset($admin) && $admin->profile_image!=NULL): ?>
          initialPreview: ["<?php echo e(asset($admin->profile_image)); ?>",],
          initialPreviewConfig: [{
              caption: "<?php echo e(($admin->profile_image!=NULL)?$admin->profile_image:''); ?>",
              width: "120px",
              key: "<?php echo e(($admin->profile_image)); ?>",
          }]
        <?php endif; ?>
    });
});
</script>      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/admin/admin_form.blade.php ENDPATH**/ ?>