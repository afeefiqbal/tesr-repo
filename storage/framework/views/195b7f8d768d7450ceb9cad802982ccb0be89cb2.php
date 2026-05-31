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
                        <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().'product/')); ?>">Product</a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                <?php echo e(csrf_field()); ?>          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Product Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required for_canonical_url" autocomplete="off"  value="<?php echo e(isset($product)?$product->title:''); ?>">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Short URL *</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Short URL" class="form-control required" autocomplete="off"  value="<?php echo e(isset($product)?$product->short_url:''); ?>">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Category*</label>
                                <select name="category_id" id="category_id" class="form-control select2 required">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e((@$category->id==@$product->category_id)?'selected':''); ?>><?php echo e($category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="help-block with-errors" id="category_id_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Home Description*</label>
                                <textarea name="home_description" id="home_description" placeholder="Description" class="form-control tinyeditor required" autocomplete="off"><?php echo e(isset($product)?$product->home_description:''); ?></textarea>
                                <div class="help-block with-errors" id="home_description_error"></div>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label> Description*</label>
                                <textarea name="description" id="description" placeholder="Description" class="form-control tinyeditor required" autocomplete="off"><?php echo e(isset($product)?$product->description:''); ?></textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Detail Description</label>
                                <textarea name="alternate_description" id="alternate_description" placeholder="Detail Description" class="form-control tinyeditor" autocomplete="off"><?php echo e(isset($product)?$product->alternate_description:''); ?></textarea>
                                <div class="help-block with-errors" id="alternate_description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Price</label>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" autocomplete="off"  value="<?php echo e(isset($product)?$product->price:''); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Brand</label>
                                <select name="brand" id="brand" class="form-control select2 required">
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>" <?php echo e((@$brand->id==@$product->brand)?'selected':''); ?>><?php echo e($brand->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!--<div class="form-group col-md-4">
                                <label> Availability</label>
                                <input type="text" name="availablity" id="availablity" placeholder="Availability" class="form-control" autocomplete="off"  value="<?php echo e(isset($product)?$product->availablity:''); ?>">
                            </div>-->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Thumbnail Image</label>
                                <div class="file-loading">
                                    <input id="thumbnail_image" name="thumbnail_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size should be minimum of 155 X 134</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Thumbnail Image Attribute</label>
                                <input type="text" name="thumbnail_image_attribute" id="thumbnail_image_attribute" placeholder="alt='alt Image'" class="form-control placeholder-cls" autocomplete="off" value="<?php echo e(isset($product)?$product->thumbnail_image_attribute:''); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Banner</label>
                                <div class="file-loading">
                                    <input id="banner" name="banner" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size should be minimum of 1920 X 450</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Banner Attribute</label>
                                <input type="text" name="banner_attribute" id="banner_attribute" placeholder="alt='alt Image'" class="form-control placeholder-cls" autocomplete="off" value="<?php echo e(isset($product)?$product->banner_attribute:''); ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Brochure</label>
                                <div class="file-loading">
                                    <input id="brochure" name="brochure" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title"><?php echo e(isset($product)?$product->meta_title:''); ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description"><?php echo e(isset($product)?$product->meta_description:''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword"><?php echo e(isset($product)?$product->meta_keyword:''); ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag" placeholder="Other Meta Tag"><?php echo e(isset($product)?$product->other_meta_tag:''); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="<?php echo e(isset($product)?$product->id:''); ?>" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="<?php echo e(isset($product)?$product->id:'0'); ?>">
                        <img class="animation__shake loadingImg" src="<?php echo e(url('app/dist/img/loading.gif')); ?>" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#thumbnail_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,       
        minImageWidth: 155,
        minImageHeight: 134,
        maxImageWidth: 155,
        maxImageHeight: 134,
        <?php if(isset($product) && $product->thumbnail_image!=NULL){?>
            initialPreview: ["<?php echo e(asset($product->thumbnail_image)); ?>"],
            initialPreviewConfig: [{
                caption: "<?php echo e(($product->banner!=NULL)?$product->title:''); ?>",
                width: "120px",
                key: "<?php echo e(($product->thumbnail_image)); ?>",
            }]
        <?php }?>
    });
    $("#banner").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,       
        minImageWidth: 1920,
        minImageHeight: 450,
        maxImageWidth: 1920,
        maxImageHeight: 450,
        <?php if(isset($product) && $product->banner!=NULL){?>
            initialPreview: ["<?php echo e(asset($product->banner)); ?>"],
            initialPreviewConfig: [{
                caption: "<?php echo e(($product->banner!=NULL)?$product->title:''); ?>",
                width: "120px",
                key: "<?php echo e(($product->banner)); ?>",
            }]
        <?php }?>
    });
    
    $("#brochure").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,
        <?php if(isset($product) && $product->brochure!=NULL){?>
            initialPreview: ["<?php echo e(asset($product->brochure)); ?>"],
            initialPreviewConfig: [{
                caption: "<?php echo e(($product->brochure!=NULL)?$product->title:''); ?>",
                width: "120px",
                key: "<?php echo e(($product->brochure)); ?>",
            }],
            initialPreviewConfig: [
                {type: "pdf", description: "<h5>PDF File</h5> This is a representative description number ten for this file.", size: 8000, caption: "<?php echo e($product->title); ?>", url: "<?php echo e(asset($product->brochure)); ?>", key: 10, downloadUrl: false}, // disable download
            ],
        <?php }?>
    });
});
</script>      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/product/product/form.blade.php ENDPATH**/ ?>