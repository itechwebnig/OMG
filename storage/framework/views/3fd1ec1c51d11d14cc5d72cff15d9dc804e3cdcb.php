    <?php $__env->startSection('content'); ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                            <?php if($errors->has('email')): ?>
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b><?php echo e($errors->first('email')); ?></b> 
                                   </div>
                                </div>
                            <?php endif; ?>
                                
                                     
<h4 class="header-title m-t-0 m-b-30"><i class="fa fa-pencil" aria-hidden="true"></i> View All User Information</h4>
                                    <hr>
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Rset Password</th>
                                                    <th width="15%">Created At</th>
                                                    <th width="5%">Edit</th>
                                                    <th width="5%">Delete</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <? $i=1; ?>
                                        <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td> <?php echo e($data->name); ?></td>
                    <td><?php echo e($data->email); ?></td>
                    <td><a href="<?php echo e(route('view-users.edit',$data->id)); ?>" class="label label-danger">Reset Password</a></td>
                    <td><?php echo e($data->created_at); ?></td>
                    <td><a href="#editModal<?php echo e($data->id); ?>" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($data->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
        <?php echo Form::open(array('route' => ['view-users.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')); ?>

      <div class="modal-body">
        <div class="form-group">
            <?php echo e(Form::label('name', 'Name', array('class' => 'col-md-4 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Name','required'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('email', 'Email', array('class' => 'col-md-4 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::email('email',$data->email,array('class'=>'form-control','placeholder'=>'Email','required'))); ?>

            </div>
            <?php echo e(Form::hidden('id',$data->id)); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('phone', 'Phone', array('class' => 'col-md-4 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::number('phone',$data->phone,array('class'=>'form-control','placeholder'=>'01xxxxxxxxx','required','min'=>0))); ?>

            </div>
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php echo e(Form::submit('Save changes',array('class'=>'btn btn-info'))); ?>

      </div>
        <?php echo Form::close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                    </td>
                    <td>
        <?php echo Form::open(array('route' => ['view-users.destroy',$data->id],'method'=>'DELETE')); ?>

            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
        <?php echo Form::close(); ?>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                        <div class="pull-right">
                                        <?php echo e($allUsers->render()); ?> 
                                        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>