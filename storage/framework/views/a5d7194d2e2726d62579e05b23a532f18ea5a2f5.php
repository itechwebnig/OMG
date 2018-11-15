
<?php $__env->startSection('content'); ?>
<? $url1=Request::path();
    $url2=explode('/', $url1);
    $url=$url2[0];
 ?>
<div class="tab_content">

<h3 class="box_title">Add New
 <a href='<?php echo e(route("$url.index")); ?>' class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
	<?php echo Form::open(array('route' => "$url.store",'class'=>'form-horizontal','files'=>true)); ?>

	    
	    <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="slide_upload" for="file">
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
            <?php echo e(Form::label('title', 'Title', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('title',"",array('class'=>'form-control','placeholder'=>'Title','rows'=>'2','required'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('description', 'Description', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('description',"",array('class'=>'form-control','placeholder'=>'Description','id'=>'ckeditor'))); ?>

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