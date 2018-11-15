<?php $__env->startSection('content'); ?>

<div class="tab_content">

  <h3 class="box_title">Sliders
 <a href="<?php echo e(route('slider.create')); ?>" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new slide</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Slide Photo </th>
                    <th>Slide Caption</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($data->serial_num); ?></td>
                    <td><a href="<?php echo e(route('slider.edit',$data->id)); ?>"> <img class="slider_img" src='<?php echo e(asset("$data->slide_photo")); ?>' width="200px"> </a></td>
                    <td><?php echo e($data->slide_caption); ?></td>

                    <td><i class="<?php echo e(($data->status==1)? 'fa fa-check success' : 'ion-ios-close danger'); ?>"></i></td>

                    <td><?php echo e($data->created_at); ?></td>
                    <td>
        <?php echo Form::open(array('route' => ['slider.destroy',$data->id],'method'=>'DELETE')); ?>

            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="fa fa-trash"></i></button>
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