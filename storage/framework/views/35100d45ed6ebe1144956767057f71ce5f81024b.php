
<?php $__env->startSection('content'); ?>


<h3 class="box_title">About Organization</h3>
    <?php echo Form::open(array('route' =>['others-info.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)); ?>

        
        <div class="form-group  <?php echo e($errors->has('short_description') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('short_description', 'Meta Description', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('short_description',$data->short_description,array('class'=>'form-control','placeholder'=>'Meta description for home page. It&prime;s can help in seo.','rows'=>'10'))); ?>

                <?php if($errors->has('short_description')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('short_description')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('meta_keywords') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('meta_keywords', 'Meta Keywords', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('meta_keywords',$data->meta_keywords,array('class'=>'form-control','placeholder'=>'Meta Keywords for SEO','rows'=>'6'))); ?>

                <?php if($errors->has('meta_keywords')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('meta_keywords')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('description', 'About Organization', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('description',$data->description,array('class'=>'form-control ckeditor','id'=>'ckeditor','placeholder'=>'About Organization','rows'=>'10'))); ?>

                <?php if($errors->has('description')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('description')); ?></strong>
                        </span>
                    <?php endif; ?>
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