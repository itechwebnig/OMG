
<?php $__env->startSection('content'); ?>
<div class="tab_content col-md-12" style="padding-top:0;">
    
    <div class="col-md-12 no_padding">

        <section class="panel">
            <header class="panel-heading">
              Sms History
                <span class="tools pull-right top_bar">
                <b>Balance: <?php echo e($quantity); ?></b>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Message Id</th>
                            <th>Status</th>
                            <th>Error</th>
                        </tr>
                    </thead>
                    <tbody>
                   <? $s=0; ?>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($s); ?></td>
                            <td><?php echo e($data->number); ?></td>
                            <td><?php echo e($data->message); ?></td>
                            <td><?php echo e($data->message_id); ?></td>
                            <td><?php echo e($data->status); ?></td>
                            <td><?php echo e($data->error); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
                    <?php echo e($allData->render()); ?>

            </div>
        </div>
    </section>
 
    </div>        
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>