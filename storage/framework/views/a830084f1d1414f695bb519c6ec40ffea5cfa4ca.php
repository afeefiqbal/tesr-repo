<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> <?php echo e($title); ?> Page SEO Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($type); ?> page seo details</li>
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
                        <h3 class="card-title">Tag Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title"><?php echo e(isset($tag)?$tag->meta_title:''); ?></textarea>
                                
                            </div>
                            <div class="form-group col-md-6">
                            <label> Meta Description</label>
                          <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description"><?php echo e(isset($tag)?$tag->meta_description:''); ?></textarea>
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword"><?php echo e(isset($tag)?$tag->meta_keyword:''); ?></textarea>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag" placeholder="Other Meta Tag"><?php echo e(isset($tag)?$tag->other_meta_tag:''); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="id" id="id" value="<?php echo e(isset($tag)?$tag->id:'0'); ?>">
                        <input type="hidden" name="page_name" id="page_name" value="<?php echo e($type); ?>">
                        <img class="animation__shake loadingImg" src="<?php echo e(url('app/dist/img/loading.gif')); ?>" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/tags/tags_form.blade.php ENDPATH**/ ?>