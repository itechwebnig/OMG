
<?php $__env->startSection('content'); ?>
<div class="tab_content">

<h3 class="box_title">Add New Slide
 <a href="<?php echo e(route('slider.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All Slide</a></h3>
	<?php echo Form::open(array('route' => 'slider.store','class'=>'form-horizontal','files'=>true)); ?>

	    
	    <div class="form-group <?php echo e($errors->has('slide_photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('slide_photo', 'Slide Photo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="slide_upload" for="file">
                    <!--  -->
                    <img id="image_load">
                </label>
                <?php echo e(Form::file('slide_photo',array('id'=>'file','style'=>'display:none','required'))); ?>

                 <?php if($errors->has('slide_photo')): ?>
	                    <span class="help-block" style="display:block">
	                        <strong><?php echo e($errors->first('slide_photo')); ?></strong>
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
            <?php echo e(Form::label('top_caption', 'Top Caption', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('top_caption','',array('class'=>'form-control','placeholder'=>'Top Caption'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('slide_caption', 'Middle Caption', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('slide_caption','',array('class'=>'form-control','placeholder'=>'Middle Caption'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('bottom_caption', 'Bottom Caption', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('bottom_caption','',array('class'=>'form-control','placeholder'=>'Bottom Caption'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('fk_category_id', 'Category', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
                <?php echo e(Form::select('fk_category_id',$categories,'', ['class' => 'form-control','placeholder'=>'Select a category'])); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
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