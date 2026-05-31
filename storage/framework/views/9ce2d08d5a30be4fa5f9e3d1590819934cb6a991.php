<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Brands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Brands</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
          			<?php if(session('success')): ?>
		                <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
		                    <?php echo e(session('success')); ?>

		                </div>
		            <?php elseif(session('error')): ?>
		                <div class="alert alert-danger" role="alert">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    <?php echo e(session('error')); ?>

		                </div>
		            <?php endif; ?>
          			<div class="card card-success card-outline">
		              	<div class="card-header">
		                	<a href="<?php echo e(url(sitePrefix().'product/brand/create')); ?>" class="btn btn-success pull-right">Add Brand <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                			<table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="not-sortable">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?> <?php $__currentLoopData = $brandList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($brand->title); ?></td>
                                    <td><input id="switch-state-single" data-count="4" type="checkbox" class="status_check" data-size="mini" data-field="status" title="ProductBrand" ref="<?php echo $brand->id;?>" <?php if($brand->status=="Active"){ ?>checked="checked"<?php }?>></td>
                                    <td><?php echo e(date("d-M-Y", strtotime($brand->created_at))); ?></td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?php echo e(url(sitePrefix().'product/brand/edit/'.$brand->id)); ?>" class="btn btn-success mr-2 tooltips" title="Edit Brand"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Brand" data-url="product/brand/delete" data-id="<?php echo e($brand->id); ?>"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
              	</div>
            </div>
        </div>
    </section>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/product/brand/list.blade.php ENDPATH**/ ?>