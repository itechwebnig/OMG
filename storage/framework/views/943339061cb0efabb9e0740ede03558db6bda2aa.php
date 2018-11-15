
<?php $__env->startSection('content'); ?>
<? if(Session::has('commonData')){
    $commonData=Session::get('commonData');
    $currency_symbol=$commonData['primaryInfo']->currency_symbol;
    
    } ?>
<style type="text/css">
  .form-group{margin:10px 0;}
  .top_bar a{color: #000;}
    .form{margin: 0;}
    .label{padding: 5px;}
  }
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
    
    <div class="col-md-12 no_padding">

        <section class="panel">
            <header class="panel-heading">
              View Orders
                <span class="tools pull-right top_bar">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Invoice</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            <th>Total</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($data->invoice_id); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <td><?php echo e($data->email); ?></td>
                            <td>
    <?php if($data->status==1): ?>
    <label class="label label-info">Processing</label>
    <?php elseif($data->status==2): ?>
    <label class="label label-success">Accepted</label>
    <?php elseif($data->status==3): ?>
    <label class="label label-warning">Pending</label>
    <?php elseif($data->status==0): ?>
    <label class="label label-danger">Cancel</label>
    <?php elseif($data->status==4): ?>
    <label class="label label-success">Delivered</label>
    <?php endif; ?>
                            </td>
                            <td><?php echo e($currency_symbol); ?><?php echo e($data->total_amount); ?></td>
                            <td>
                            <a type="button" class="btn btn-success" href='<?php echo e(asset("order/$data->id")); ?>' title="Item View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                           
                            <td>
                            <!-- delete section -->
                            <?php echo e(Form::open(array('route'=>['order.destroy',$data->id],'method'=>'DELETE','class'=>'form'))); ?>

                            <?php echo e(Form::hidden('id',$data->id)); ?>

                              <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()" title="Item Delete">
                              <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <?php echo Form::close(); ?>

                            <!-- end delete section -->

                          </td>
                            
                        </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
 
    </div>        
</div>
<div style="display: none;">
<textarea id="ckeditor" class="ckeditor" ></textarea>
    
</div>
<?php $__env->stopSection(); ?>




<script type="text/javascript">

function deleteConfirm(){
  var con= confirm("Do you want to delete?");
  if(con){
    return true;
  }else 
  return false;
}
</script>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>