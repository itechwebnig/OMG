<?php $__env->startSection('content'); ?>

<div class="tab_content col-md-12" style="padding-top:0;">
<h4 class="box_title"><?php echo e($category->category_name); ?>

 <a href='<?php echo e(URL::to("categories")); ?>' class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> Back to Category</a>
</h4>
<div class="box-body col-md-10">
        <?php echo Form::open(array('route' => 'subCategory.store','class'=>'form-horizontal')); ?>

        <div class="form-group <?php echo e($errors->has('fk_category_id') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('fk_category_id', 'Category Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <select name="fk_category_id" class="form-control">
                    <option value="<?php echo e($category->id); ?>" ><?php echo e($category->category_name); ?></option>
                </select>
                <?php if($errors->has('fk_category_id')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('fk_category_id')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
            <div class="form-group <?php echo e($errors->has('sub_category_name') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('sub_category_name', 'Sub Category Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-7">
                <?php echo e(Form::text('sub_category_name','',array('class'=>'form-control','placeholder'=>'Sub Category Name','required'))); ?>

                <?php if($errors->has('sub_category_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('sub_category_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
            <div class="col-md-2">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])); ?>

            </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-6">
            <? $max=$max_serial+1; ?>
                <?php echo e(Form::number('serial_num',"$max",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))); ?>

            </div>
            <div class="col-md-3">
                <?php echo e(Form::select('home_tag', array('1' => 'Show as home tag', '0' => 'No Tag'), '0', ['class' => 'form-control'])); ?>

            </div>
        </div>

            <div class="col-md-2 col-md-offset-3">
                <?php echo e(Form::submit('Submit',array('class'=>'btn btn-info'))); ?>

            </div>
            
        <?php echo Form::close(); ?>

    </div>
    <hr class="col-md-12">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered center_table category_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Sub Category Name</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Sub Sub Category</th>
                    <th>Attribute</th>
                    <th>Created At</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($data->serial_num); ?></td>
                    <td><?php echo e($data->sub_category_name); ?></td>
                    <td><?php echo e($data->category_name); ?></td>
                    <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>
                    <td><a class="label label-warning" href='<?php echo e(URL::to("subSubCategory/$data->id")); ?>'>Sub Sub Category</a></td>
                    <td><a class="label label-success" href='<?php echo e(URL::to("sub-attribute/$data->id")); ?>'><i class="fa fa-plus"></i> Attribute</a></td>

                    <td><?php echo e($data->created_at); ?></td>
                    <td><a href="#editModal<?php echo e($data->id); ?>" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($data->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Sub Category</h4>
      </div>
        <?php echo Form::open(array('route' => ['subCategory.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')); ?>

      <div class="modal-body">
     <input type="hidden" name="fk_category_id" value="<?php echo e($category->id); ?>">
       
        <div class="form-group">
            <?php echo e(Form::label('sub_category_name', 'Sub Category Name', array('class' => 'col-md-4 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('sub_category_name',$data->sub_category_name,array('class'=>'form-control','placeholder'=>'Sub Category Name','required'))); ?>

                <?php echo e(Form::hidden('id',$data->id)); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('sub_category_name', 'Sub Category Status', array('class' => 'col-md-4 control-label'))); ?>


            <div class="col-md-8">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), ($data->status==1)?'1':'2', ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('serial_num', 'Serial', array('class' => 'col-md-4 control-label'))); ?>

            <div class="col-md-3">
            <? $max=$max_serial+1; ?>
                <?php echo e(Form::number('serial_num',"$data->serial_num",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))); ?>

            </div>
            <div class="col-md-5">
                <?php echo e(Form::select('home_tag', array('1' => 'Show as home tag', '0' => 'No Tag'),$data->home_tag, ['class' => 'form-control'])); ?>

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
                        <?php echo e(Form::open(array('route'=>['subCategory.destroy',$data->id],'method'=>'DELETE'))); ?>

                            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
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