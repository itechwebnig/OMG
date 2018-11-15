<?php $__env->startSection('content'); ?>

<div class="tab_content">

  <h3 class="box_title">Offers
 <a href="<?php echo e(route('offer.create')); ?>" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Item Name</th>
                    <th>Discount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Offer Type</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <? $i=0; ?>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <? $i++; ?>
                <tr>
                    <td><?php echo e($i); ?></td>
                    <td><a href="<?php echo e(route('offer.edit',$data->id)); ?>"><?php echo e($data->item_name); ?></a></td>
                    <td><?php echo e($data->discount); ?></td>
                    <td><?php echo e(date('d-m-Y',strtotime($data->start_date))); ?></td>
                    <td><?php echo e(date('d-m-Y',strtotime($data->end_date))); ?></td>
                    <td><?php echo e(($data->offer_type==1)?'Todays Offer':'Regular Offer'); ?></td>
                    <td><i class="<?php echo e(($data->status==1)? 'fa fa-check success' : 'ion-ios-close danger'); ?>"></i></td>
                    <td><?php echo e(date('d-m-Y',strtotime($data->created_at))); ?></td>
                    <td>
        <a href="<?php echo e(route('offer.edit',$data->id)); ?>" class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10 action_btn" title="Item Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
        <?php echo Form::open(array('route' => ['offer.destroy',$data->id],'method'=>'DELETE')); ?>

            <button type="submit" class="btn btn-danger action_btn" onclick="return deleteConfirm()"><i class="fa fa-trash"></i></button>
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