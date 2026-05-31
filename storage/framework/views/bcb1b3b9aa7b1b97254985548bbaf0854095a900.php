<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-user-shield"></i> <?php echo e($type); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'/dashboard')); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().'product/category')); ?>">Category</a></li>
              <?php if($id!=NULL): ?>
                <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().'product/sub-category/'.$id)); ?>">Sub-categories</a></li>
              <?php endif; ?>
              <li class="breadcrumb-item active"><?php echo e($key); ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <?php if($errors->any()): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" user_type="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <?php echo e($error); ?>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
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
                  <label> Title*</label>
                  <input type="text" name="title" id="title" placeholder="Title" class="form-control for_canonical_url required" autocomplete="off" value="<?php echo e(@$category->title); ?>">
                  <div class="help-block with-errors" id="title_error"></div>
                  <?php $__errorArgs = ['title'];
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
                  <label> Short URL*</label>
                  <input type="text" name="short_url" id="short_url" placeholder="Short URL" class="form-control required" autocomplete="off" value="<?php echo e(@$category->short_url); ?>">
                  <div class="help-block with-errors" id="short_url_error"></div>
                  <?php $__errorArgs = ['short_url'];
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
          <div class="card-footer">
            <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
            <input type="hidden" name="parent_id" id="parent_id" value="<?php echo e($id); ?>">
            <button type="reset" class="btn btn-default">Cancel</button>
            <img class="animation__shake loadingImg" src="<?php echo e(asset('app/dist/img/loading.gif')); ?>" style="display:none;">
          </div>
        </div>
      </form>
    </section>  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/product/category/form.blade.php ENDPATH**/ ?>