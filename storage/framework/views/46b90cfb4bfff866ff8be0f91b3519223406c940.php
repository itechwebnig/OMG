<?php $__env->startSection('content'); ?>
<div class="tab_content">

<h4 class="box_title">
 <a href="<?php echo e(URL::to('attribute/'.$allData['attributes']['category_id'])); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View attribute</a></h4>

 <div class="col-md-4">
 <?php if(isset($allData['attributes'])): ?>
     <p> <b>Attribute: </b><?php echo e($allData['attributes']['name']); ?><br> 
     <b>Category: </b> <?php echo e($allData['attributes']['category_name']); ?><br> 
     <?php if(isset($allData['attributes']['sub_category_name']) ): ?>
     <b>Sub Category: </b> <?php echo e($allData['attributes']['sub_category_name']); ?> <br> 
     <?php endif; ?>
     <?php if(isset($allData['attributes']['sub_name']) ): ?>
     <b>Sub Sub Category: </b> <?php echo e($allData['attributes']['sub_name']); ?> 
     <?php endif; ?>
     </p>
<?php endif; ?>
 </div>
 <div class="col-md-8">
     <?php echo Form::open(array('route' => 'attribute-option.store','class'=>'form-horizontal','id'=>'form_submit')); ?>

    
        <div class="form-group">
            <?php echo e(Form::label('name', 'Option Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('name','',array('class'=>'form-control','placeholder'=>'Option Name','required'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('attribute_price', 'Price', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::number('attribute_price','',array('class'=>'form-control','placeholder'=>'Price','step'=>'any'))); ?>

            </div>
        </div>
        <div class="form-group">
        <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>

        <div class="col-md-4">
                    <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])); ?>

                </div>
         </div>
            <? $fk_attribute_id=$allData['fk_attribute_id']; ?>
            <?php echo e(Form::hidden('fk_attribute_id',"$fk_attribute_id")); ?>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                <?php echo e(Form::submit('Submit',array('class'=>'btn btn-info'))); ?>

            </div>
        </div>
            
        <?php echo Form::close(); ?>

 </div>
    

        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Option Name</th>
                    <th>attribute</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1;?>
            <?php $__currentLoopData = $allData['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($data['name']); ?></td>
                    <td><?php echo e($data['attribute_name']); ?></td>
                    <td><?php echo e($data['attribute_price']); ?> $</td>
                    <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>
                    <td><?php echo e($data['created_at']); ?></td>
                    <td><a href="#editModal<?php echo e($data['id']); ?>" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($data->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit attribute Option</h4>
      </div>
        <?php echo Form::open(array('route' => ['attribute-option.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')); ?>

      <div class="modal-body">
        <div class="form-group">
            <?php echo e(Form::label('name', 'Option Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Option Name','required'))); ?>

                <?php echo e(Form::hidden('id',$data->id)); ?>

                <?php echo e(Form::hidden('fk_attribute_id',$data->fk_attribute_id)); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('attribute_price', 'Price', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::number('attribute_price',$data->attribute_price,array('class'=>'form-control','placeholder'=>'Price','step'=>'any'))); ?>

                <?php echo e(Form::hidden('id',$data->id)); ?>

                <?php echo e(Form::hidden('fk_attribute_id',$data->fk_attribute_id)); ?>

            </div>
        </div>
        <div class="form-group">
        <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>

        <div class="col-md-4">
                    <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), $data->status, ['class' => 'form-control'])); ?>

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
                        <?php echo e(Form::open(array('route'=>['attribute-option.destroy',$data->id],'method'=>'DELETE'))); ?>

                            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
        </div>
    
<?php $__env->stopSection(); ?>


            
        
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>