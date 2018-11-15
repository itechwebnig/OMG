<?php $__env->startSection('content'); ?>
<? if(Session::has('commonData')){
    $commonData=Session::get('commonData');
    $currency_symbol=$commonData['primaryInfo']->currency_symbol;
    
    } ?>
    <style type="text/css">
        .body-content .my-wishlist-page .my-wishlist table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{padding:5px;}
    </style>

                <div class="cart">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <?php if(count($allData)>0): ?>
                            <form action="#">
                                <div class="cart-table table-responsive">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Action</th>
                            <th>Total</th>
                            <th width="6%">Status</th>
                            <th colspan="2" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        
                        <tr>
                            <td><?php echo e($data->invoice_id); ?></td>
                            <td>
    <?php if($data->status==1): ?>
    <label class="label label-info">Processing</label>
    <?php elseif($data->status==2): ?>
    <label class="label label-primary">Accepted</label>
    <?php elseif($data->status==3): ?>
    <label class="label label-warning">Pending</label>
    <?php elseif($data->status==0): ?>
    <label class="label label-danger">Cancel</label>
    <?php elseif($data->status==4): ?>
    <label class="label label-success">Delivered</label>
    <?php endif; ?>
                            </td>
                            <td><?php echo e($currency_symbol); ?><?php echo e($data->total_amount); ?></td>
                            
                            <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>
                            <td>
                            <a type="button" class="btn btn-success" href='<?php echo e(asset("userSingleOrder?id=$data->id")); ?>' title="Item View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                            
                        </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
                                </div>
                                
                            </form>
                            <?php else: ?>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <h2>you did not order any Product!</h2>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>