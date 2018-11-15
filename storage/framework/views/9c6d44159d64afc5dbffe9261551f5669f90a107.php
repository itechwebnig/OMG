
<?php $__env->startSection('content'); ?>
<div class="tab_content">

<h3 class="box_title">Add New Brand
 <a href="<?php echo e(route('all-brand.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
	<?php echo Form::open(array('route' => 'all-brand.store','class'=>'form-horizontal','files'=>true)); ?>

	    
	    <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Brand Logo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="slide_upload client_logo" for="file">
                    <!--  -->
                    <img id="image_load">
                </label>
                <?php echo e(Form::file('photo',array('id'=>'file','style'=>'display:none','required'))); ?>

                 <?php if($errors->has('photo')): ?>
	                    <span class="help-block" style="display:block">
	                        <strong><?php echo e($errors->first('photo')); ?></strong>
	                    </span>
	                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
            <? $max=$max_serial+1; ?>
                <?php echo e(Form::number('serial_num',"$max",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('name', 'Brand Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('name','',array('class'=>'form-control','placeholder'=>'Brand Name'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-8">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),'1', ['class' => 'form-control'])); ?>

            </div>
        </div>
            
	    <div class="form-group">
	        <div class="col-md-9 col-md-offset-3">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
      </div>
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>