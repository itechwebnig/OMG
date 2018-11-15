
<?php $__env->startSection('content'); ?>

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Sales Support</h3>
    <div class="box-body col-md-10">
        <?php echo Form::open(array('route' => 'sales-support.store','class'=>'form-horizontal')); ?>

            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('title', 'Title', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-6">
                <?php echo e(Form::text('title','',array('class'=>'form-control','placeholder'=>'Title','required'))); ?>

                <?php if($errors->has('title')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('title')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
            <div class="col-md-2">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])); ?>

            </div>
            </div>
        </div>
        
        <div class="form-group <?php echo e($errors->has('sub_title') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('sub_title', 'Sub Title', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('sub_title',"",array('class'=>'form-control','placeholder'=>'Sub Title'))); ?>

                <?php if($errors->has('sub_title')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('sub_title')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            
        </div>
        <div class="form-group  <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('link', 'URL', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-6">
                <?php echo e(Form::text('link',"",array('class'=>'form-control','placeholder'=>'URL (with http://)'))); ?>

                <?php if($errors->has('link')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('link')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="col-md-2">
            <? $max=$max_serial+1; ?>
                <?php echo e(Form::number('serial_num',"$max",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))); ?>

            </div>
        </div>
            <div class="col-md-2 col-md-offset-3">
                <?php echo e(Form::submit('Submit',array('class'=>'btn btn-info'))); ?>

            </div>
            
        <?php echo Form::close(); ?>

    </div>
    <hr class="col-md-12">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1; ?>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($data->title); ?></td>
                    <td><?php echo e($data->sub_title); ?></td>
                    <td><a href='<?php echo e(URL::to("$data->link")); ?>' target="_blank"><?php echo e($data->link); ?></a></td>
                    <td><i class="<?php echo e(($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'); ?>"></i></td>
                    <td><a href="#editModal<?php echo e($data->id); ?>" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="editModal<?php echo e($data->id); ?>" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Sales Support</h4>
                          </div>
                            <?php echo Form::open(array('route' => ['sales-support.update',$data->id],'class'=>'form-horizontal','method'=>'PUT' )); ?>

                          <div class="modal-body">
                            <div class="form-group">
                                <?php echo e(Form::label('title', 'Title', array('class' => 'col-md-3 control-label'))); ?>

                                <div class="col-md-9">
                                    <?php echo e(Form::text('title',$data->title,array('class'=>'form-control','placeholder'=>'Title','required'))); ?>

                                    <?php echo e(Form::hidden('id',$data->id)); ?>

                                </div>
                            </div>
                            
                            <div class="form-group <?php echo e($errors->has('sub_title') ? 'has-error' : ''); ?>">
                                <?php echo e(Form::label('sub_title', 'Sub Title', array('class' => 'col-md-3 control-label'))); ?>

                                <div class="col-md-6">
                                    <?php echo e(Form::text('sub_title',"$data->sub_title",array('class'=>'form-control','placeholder'=>'Sub Title'))); ?>

                                    <?php if($errors->has('sub_title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                <? $max=$max_serial+1; ?>
                                    <?php echo e(Form::number('serial_num',"$data->serial_num",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))); ?>

                                </div>
                            </div>
                            <div class="form-group  <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
                                <?php echo e(Form::label('link', 'URL', array('class' => 'col-md-3 control-label'))); ?>

                                <div class="col-md-9">
                                    <?php echo e(Form::text('link',"$data->link",array('class'=>'form-control','placeholder'=>'URL (with http://)'))); ?>

                                    <?php if($errors->has('link')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('link')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


                                <div class="col-md-3">
                                    <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])); ?>

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
                        <?php echo e(Form::open(array('route'=>['sales-support.destroy',$data->id],'method'=>'DELETE'))); ?>

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