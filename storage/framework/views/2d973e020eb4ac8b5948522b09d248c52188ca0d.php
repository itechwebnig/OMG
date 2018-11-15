<?php $__env->startSection('content'); ?>

<div class="tab_content">

  <h3 class="box_title">Category
 <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table category_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Show in Home</th>
                    <th>Items</th>
                    <th>Sub Category</th>
                    <th>Attribute</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($data->serial_num); ?></td>
                    <td><a href="<?php echo e(route('categories.edit',$data->id)); ?>"><i class="<?php echo e($data->icon_class); ?>"></i> <?php echo e($data->category_name); ?> </a></td>

                    <td><i class="<?php echo e(($data->home_status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i> </td>

                    <td><a class="label label-success" href='<?php echo e(URL::to("item-show/$data->id")); ?>'>Items</a></td>
                    <td><a class="label label-primary" href='<?php echo e(URL::to("subCategory/$data->id")); ?>'>Sub Category</a></td>
                    <td><a class="label label-info" href='<?php echo e(URL::to("attribute/$data->id")); ?>'><i class="fa fa-plus"></i> Attribute</a></td>
                    <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>
                    <td><?php echo e($data->created_at); ?></td>
                    <td>
            <a href="<?php echo e(route('categories.edit',$data->id)); ?>" class="label label-warning"><i class="ion ion-compose"></i></a> 

        <?php echo Form::open(array('route' => ['categories.destroy',$data->id],'method'=>'DELETE','class'=>'delete_button')); ?>

            <button type="submit" class="label label-danger " onclick="return deleteConfirm()" style="border:0;padding:7px 10px;"><i class="ion ion-ios-trash-outline"></i></button>
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