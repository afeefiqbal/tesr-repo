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
              <?php if($id==NULL): ?>
                <li class="breadcrumb-item active"><?php echo e($type); ?></li>
              <?php else: ?>
                <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().'product/category/')); ?>">Categories</a></li>
                <li class="breadcrumb-item active"><?php echo e($type); ?></li>
              <?php endif; ?>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
          			<?php if(session('message')): ?>
		              <div class="alert alert-success" role="alert">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                <?php echo e(session('message')); ?>

		              </div>
		            <?php elseif(session('error')): ?>
		              <div class="alert alert-danger" role="alert">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                <?php echo e(session('message')); ?>

		              </div>
		            <?php endif; ?>
          			<div class="card card-success card-outline">
		              	<div class="card-header">
                      <a href="<?php echo e(url(sitePrefix().'product/'.strtolower($type).'/create/'.$id)); ?>" class="btn btn-success pull-right">Add <?php echo e($type); ?> <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                      </a>
		              	</div>
              			<div class="card-body">
                			<table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <?php if($id==NULL): ?>
                                  <th>Sub-category</th>
                                <?php endif; ?>
                                <th>Status </th>
                                <th>Created Date</th>
                                <th class="not-sortable">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1?><?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                      <?php echo e($i); ?>

                                    </td>
                                    <td>
                                      <?php echo e($category->title); ?>

                                    </td>
                                    <?php if($id==NULL): ?>
                                      <td>
                                        <a href="<?php echo e(url(sitePrefix().'product/sub-category/'.$category->id)); ?>" class="btn btn-sm btn-primary mr-2 tooltips" title="Add <?php echo e($type); ?>">Sub-category</a>
                                      </td>
                                    <?php endif; ?>
                                    <td>
                                      <input type="checkbox" class="status_check" <?php echo e(($category->status=="Active")?'checked':''); ?> title="PortfolioCategory" ref="<?php echo e($category->id); ?>">
                                    </td>
                                    <td>
                                      <?php echo e(date("d-M-Y", strtotime($category->created_at))); ?>

                                    </td>
                                    <td class="text-right py-0 align-middle">
                                      <div class="btn-group btn-group-sm">
                                        <a href="<?php echo e(url(sitePrefix().'product/'.strtolower($type).'/edit/'.$category->id)); ?>" class="btn btn-success mr-2 tooltips" title="Edit <?php echo e($type); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="product/<?php echo e(strtolower($type)); ?>/delete" data-id="<?php echo e($category->id); ?>" title="Delete <?php echo e($type); ?>"><i class="fas fa-trash"></i></a>
                                      </div>
                                    </td>
                                </tr>
                            <?php $i++?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
              			</div>
            		</div>
          		</div>
          	</div>
        </div>
    </section>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/afeef/works/website-works/well-known/resources/views/app/product/category/list.blade.php ENDPATH**/ ?>