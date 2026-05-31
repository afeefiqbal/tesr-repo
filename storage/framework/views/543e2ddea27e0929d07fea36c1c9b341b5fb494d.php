<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="nav-icon fas fa-tachometer-alt"></i> Admin Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-5">
            <div class="row">
                <img src="<?php echo e(asset('app/dist/img/logo.png')); ?>" style="height: 200px;">
            </div>            
        </div>
      </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/afeef/works/website-works/medweuae/resources/views/app/landing.blade.php ENDPATH**/ ?>