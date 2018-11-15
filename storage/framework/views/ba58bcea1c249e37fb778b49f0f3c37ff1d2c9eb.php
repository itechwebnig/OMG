
<?php $__env->startSection('content'); ?>


<h3 class="box_title">Edit 
 <a href="<?php echo e(route('reviews.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a></h3>
    <?php echo Form::open(array('route' => ['reviews.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)); ?>

        <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="upload_photo upload review_upload" for="file">
                    <!--  -->
                    <img src="<?php echo e(asset($data->photo)); ?>" id="image_load">
                    <i class="upload_hover ion ion-ios-camera-outline"></i>
                </label>
                <?php echo e(Form::file('photo',array('id'=>'file','style'=>'display:none'))); ?>

                 <?php if($errors->has('photo')): ?>
                        <span class="help-block" style="display:block">
                            <strong><?php echo e($errors->first('photo')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('name', 'Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Name'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('designation', 'Designation', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('designation',$data->designation,array('class'=>'form-control','placeholder'=>'Designation'))); ?>

            </div>
        </div>
        
        <div class="form-group">
            <?php echo e(Form::label('description', 'Description', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('description',$data->description,array('class'=>'form-control','placeholder'=>"What's on your maind?",'rows'=>'5'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-8">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])); ?>

            </div>
        </div>
            <?php echo e(Form::hidden('id',$data->id)); ?>

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>