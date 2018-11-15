<?php $__env->startSection('content'); ?>
<?$url=Request::path();

?>
<h3 class="box_title">Edit Ad
 <a href='<?php echo e(route("banner-manager.index")); ?>' class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
    <?php echo Form::open(array('route' => ["banner-manager.update", $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)); ?>

        
        <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="banner_upload" for="file">
                    <!--  -->
                   <?php if($data->photo!=null): ?>
                   <img id="image_load" src='<?php echo e(asset("$data->photo")); ?>' alt="Upload Your Photo" title="Upload Your Photo">
                   <?php else: ?>
                    <img id="image_load" src='<?php echo e(asset("public/img/upload.png")); ?>' alt="Upload Your Photo" title="Upload Your Photo">
                   <?php endif; ?>
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
            <?php echo e(Form::label('caption', 'Caption', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('caption',$data->caption,array('class'=>'form-control','placeholder'=>'Caption'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('link', 'Link', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('link',$data->link,array('class'=>'form-control','placeholder'=>'link'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('is_photo', 'Use Photo or Script', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
                <?php echo e(Form::select('is_photo', array('1' => 'Photo', '2' => 'Script'),$data->is_photo, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('script', 'Script', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('script',$data->script,array('class'=>'form-control','placeholder'=>'script'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('fk_page_id', 'Page &amp; Position', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
                <?php echo e(Form::select('fk_page_id',$pages,$data->fk_page_id, ['class' => 'form-control','placeholder'=>'Select a Page','onchange'=>'loadSerial(this.value)'])); ?>

            </div>
            <div class="col-md-4">
               <div id="loadSerialNumber">
               	<input type="number" min="1" max="<?php echo e($max+1); ?>" value="<?php echo e($data->serial_num); ?>" name="serial_num" class="form-control" placeholder="Serial" required>
               </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])); ?>

            </div>
        </div>
	    <div class="form-group">
	        <div class="col-md-8 col-md-offset-3">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
      
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	function loadSerial(id){
		$('#loadSerialNumber').load('<?php echo e(URL::to("banner-manager")); ?>/'+id);
	}
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>