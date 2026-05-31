<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url(sitePrefix().loggedUserType().'dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Contact List</li>
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
                        <div class="box-header" style="height:50px;">
                            <div class="box-tools" style="margin-top: 8px;">
                                <div class="col-sm-12">
                                    <div class="actions delete_btn" style="display: none;">
                                        <input type="hidden" name="ids" id="ids">
                                        <a href="javascript:void(0);" id="delete_contact_btn" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div> 
                                </div>
                            </div>
                        </div>
              			<div class="card-body">
                            <table id="recordsListView" class="table table-bordered table-hover dataTable">
                            <thead>
                                    <tr>
                                        <th>ID  <input type="checkbox" class="mt-2 ml-3" name="check_all" id="check_all"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <!--<th>Company</th>-->
                                        <th>Comments</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1 ?> <?php $__currentLoopData = $contactList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i); ?> <input type="checkbox" class="single_box mt-2 ml-3" name="single_box" id="<?php echo e($contact->id); ?>" value="<?php echo e($contact->id); ?>"></td>
                                            <td><?php echo e($contact->first_name.' '.$contact->last_name); ?></td>
                                            <td><?php echo e($contact->email); ?></td>
                                            <td><?php echo e($contact->phone); ?></td>
                                            <!--<td><?php echo e($contact->company); ?></td>-->
                                            <td><?php echo e($contact->comments); ?></td>
                                            <td><?php echo e(date("d-M-Y", strtotime($contact->created_at))); ?></td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Contact" data-url="contact/delete_contact" data-id="<?php echo e($contact->id); ?>"><i class="fas fa-trash"></i></a>

                                                    <a class="mr-2 btn btn-primary" href="<?php echo e(url(sitePrefix().'contact/view/'.$contact->id)); ?>"><i class="fa fa-eye fa-lg"></i></a>

                                                    <a class="btn btn-success mr-2 replay_modal" href="javascript:void(0)"  data-url="contact/replay_to_contact" data-toggle="modal" data-replay="<?php echo $contact->replay; ?>" data-id="<?php echo e($contact->id); ?>" data-request="<?php echo $contact->comments; ?>"><i class="fa fa-reply fa-lg" style="color:<?php echo e(($contact->replay==NULL)?'red':'green'); ?>"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
              	</div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="replay-modal">
      <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" id="formWizard" class="replay_form">
                <div class="modal-header">
                    <h4 class="modal-title">Contact Request Replay</h4>
                </div>
                <div class="modal-body">   
                    <?php echo e(csrf_field()); ?>

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label> Request*</label>
                                <textarea disabled id="request_details" class="form-control">
                                    
                                </textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label> Replay*</label>
                                <textarea class="form-control" required id="replay" name="replay" placeholder="Replay to request"></textarea>
                              </div>
                            </div>  
                        </div>                 
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="replay_to_contact" value="Update Replay">
                        <input type="hidden" id="url" name="url" value="replay_to_contact">
                        <input type="hidden" id="id" name="id">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
</div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/contact_us/contact_list.blade.php ENDPATH**/ ?>