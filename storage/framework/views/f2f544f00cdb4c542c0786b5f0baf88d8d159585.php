
<?php $__env->startSection('content'); ?>
<div class="tab_content">

<h4 class="box_title">Attribute  <?php if(isset($allData['sub_category'])): ?>
<?php echo e("of '".$allData['sub_category']['category_name'].' : '.$allData['sub_category']['sub_category_name']."'"); ?>

<? $cat_id=$allData['sub_category']['category_id']; ?>
<?php endif; ?>
 <a href='<?php echo e(URL::to("subCategory/$cat_id")); ?>' class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View Sub Category</a></h4>
 
    <?php echo Form::open(array('route' => 'attribute.store','class'=>'form-horizontal','id'=>'form_submit')); ?>

    
        <div class="form-group">
                <?php echo e(Form::label('name', 'Attribute Name', array('class' => 'col-md-3 control-label'))); ?>

                <div class="col-md-8">
                    <?php echo e(Form::text('name','',array('class'=>'form-control','placeholder'=>'Attribute Name','required'))); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('attribute_type', 'Attribute type', array('class' => 'col-md-3 control-label'))); ?>

                <div class="col-md-6">
                    <select name="attribute_type" class="form-control" required>
                        <option value="">--select--</option>
                        <option value="1">select option</option>
                        <option value="2">Check box</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('required', 'Required', array('class' => 'col-md-3 control-label'))); ?>

                <div class="col-md-2">
                    <label><input type="radio" name="required" value="1"> Yes</label>
                    <label><input type="radio" name="required" value="0" checked=""> No</label>
                </div>
                <?php echo e(Form::label('mina', 'Min', array('class' => 'col-md-1 control-label'))); ?>

                <div class="col-md-2">
                     <?php echo e(Form::number('min','',array('class'=>'form-control','placeholder'=>'Minimum'))); ?>

                </div>
                <?php echo e(Form::label('max', 'Max', array('class' => 'col-md-1 control-label'))); ?>

                <div class="col-md-2">
                    <?php echo e(Form::number('max','',array('class'=>'form-control','placeholder'=>'Maximum'))); ?>

                </div>
                
            </div>
            <? $fk_category_id=$allData['sub_category']['category_id']; ?>
            <? $fk_subcategory_id=$allData['fk_subcategory_id']; ?>
            <?php echo e(Form::hidden('fk_subcategory_id',"$fk_subcategory_id")); ?>

            <?php echo e(Form::hidden('fk_category_id',"$fk_category_id")); ?>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                <?php echo e(Form::submit('Submit',array('class'=>'btn btn-info'))); ?>

            </div>
        </div>
            
        <?php echo Form::close(); ?>


        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Attribute Name</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Option</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1;?>
            <?php $__currentLoopData = $allData['attribute']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($data['name']); ?></td>
                    <td>
                    <?php if($data['attribute_type']==1): ?>
                    Select Option
                    <?php elseif($data['attribute_type'] == 2): ?>
                    Check box
                    <?php endif; ?>
                    </td>
                    <td><?php echo e($data['category_name']); ?></td>
                    <td><?php echo e($data['sub_category_name']); ?></td>
                    <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>
                    <td><?php echo e($data['created_at']); ?></td>
                    <td><a class="btn btn-info" href='<?php echo e(URL::to("attribute-option/$data->id")); ?>'><i class="fa fa-plus"></i> Option</a></td>
                    <td><a href="#editModal<?php echo e($data['id']); ?>" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($data->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit attributes</h4>
      </div>
        <?php echo Form::open(array('route' => ['attribute.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')); ?>

      <div class="modal-body">
        <div class="form-group">
            <?php echo e(Form::label('name', 'Attributes Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'attributes Name','required'))); ?>

                <?php echo e(Form::hidden('id',$data->id)); ?>

                <?php echo e(Form::hidden('fk_category_id',$data->fk_category_id)); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('attribute_type', 'Attribute Type', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-5">
                <?php echo e(Form::select('attribute_type', array('1' => 'Select Option', '2' => 'Check Box'),$data->attribute_type, ['class' => 'form-control'])); ?>

            </div>

            <div class="col-md-4">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])); ?>

            </div>
        </div>
         <div class="form-group">
                <?php echo e(Form::label('required', 'Required', array('class' => 'col-md-3 control-label'))); ?>

                <div class="col-md-2">
                    <label><input type="radio" name="required" value="1" <?php echo e(($data->required==1)? 'checked' : ''); ?>> Yes</label>
                    <label><input type="radio" name="required" value="0" <?php echo e(($data->required==0)? 'checked' : ''); ?>> No</label>
                </div>
                <?php echo e(Form::label('mina', 'Min', array('class' => 'col-md-1 control-label'))); ?>

                <div class="col-md-2">
                     <?php echo e(Form::number('min',$data->min,array('class'=>'form-control','placeholder'=>'Minimum'))); ?>

                </div>
                <?php echo e(Form::label('max', 'Max', array('class' => 'col-md-1 control-label'))); ?>

                <div class="col-md-2">
                    <?php echo e(Form::number('max',$data->max,array('class'=>'form-control','placeholder'=>'Maximum'))); ?>

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
                        <?php echo e(Form::open(array('route'=>['attribute.destroy',$data->id],'method'=>'DELETE'))); ?>

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