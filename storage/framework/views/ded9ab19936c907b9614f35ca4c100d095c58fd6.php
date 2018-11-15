<?php $__env->startSection('content'); ?>

<div class="tab_content">

  <h3 class="box_title">Brand
 <a href="<?php echo e(route('all-brand.create')); ?>" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Brand Logo</th>
                    <th>Brand Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($data->serial_num); ?></td>
                    <td><a href="<?php echo e(route('all-brand.edit',$data->id)); ?>"> <img class="slider_img" src="<?php echo e(asset('public/img/brand/'.$data->photo)); ?>"> </a></td>
                    <td><?php echo e($data->name); ?></td>

                    <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>

                    <td><?php echo e($data->created_at); ?></td>
                    <td>
                    <a href="<?php echo e(route('all-brand.edit',$data->id)); ?>" class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10 action_btn" title="Item Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <?php echo Form::open(array('route' => ['all-brand.destroy',$data->id],'method'=>'DELETE')); ?>

            <button type="submit" class="btn btn-danger action_btn" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
        <?php echo Form::close(); ?>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
        <?php echo e($allData->render()); ?> 
        </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>