<?php $__env->startSection('content'); ?>


<h3 class="box_title">Edit Category
 <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
    <?php echo Form::open(array('route' => ['categories.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)); ?>

        
        <div class="form-group <?php echo e($errors->has('category_name') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('category_name', 'Category Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-6">
                <?php echo e(Form::text('category_name',$data->category_name,array('class'=>'form-control','placeholder'=>'Category Name','required'))); ?>

                <?php if($errors->has('category_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('category_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>

            <div class="col-md-2">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), $data->status, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('home_status') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('home_status', 'Show in Home Page', array('class' => 'col-md-3 control-label'))); ?>

        <div class="col-md-6">
            <div class="col-md-3"><label class="btn btn-success"><input type="radio" name="home_status" value="1" <?php echo e(($data->home_status==1)? 'checked' : ''); ?>> Yes </label> </div>
            <div class="col-md-3"><label class="btn btn-danger"><input type="radio" name="home_status" value="0" <?php echo e(($data->home_status==0)? 'checked' : ''); ?>> No </label> </div>
        </div>
        <?php if($errors->has('home_status')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('home_status')); ?></strong>
            </span>
        <?php endif; ?>
            
        </div>
        <!-- <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="slide_upload portrait" for="file">
                    <?php if($data->photo!=null): ?>
                    <img src="<?php echo e(asset('public/img/category/'.$data->photo)); ?>" id="image_load">
                    <?php else: ?>
                    <img id="image_load">
                    <?php endif; ?>
                    <i class="upload_hover ion ion-ios-camera-outline"></i>
                </label>
                <?php echo e(Form::file('photo',array('id'=>'file','style'=>'display:none'))); ?>

                 <?php if($errors->has('photo')): ?>
                            <strong><?php echo e($errors->first('photo')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('photo_status', 'Photo Status', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-2">
                <?php echo e(Form::select('photo_status', array('1' => 'Active', '2' => 'Inactive'), $data->photo_status, ['class' => 'form-control'])); ?>

            </div>
        </div> -->
        <div class="form-group">
            <?php echo e(Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-2">
            <? $max=$max_serial+1; ?>
                <?php echo e(Form::number('serial_num',"$data->serial_num",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('icon_class', 'Icon Class', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-6">
                <?php echo e(Form::text('icon_class',$data->icon_class,array('class'=>'form-control','placeholder'=>'Ex: fa fa-cart'))); ?>

                <p><a class="text-primary" href="http://fontawesome.io/icons/" target="_blank">Click here for icon.</a></p>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('home_tag') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('home_tag', 'Show in Home as a tag', array('class' => 'col-md-3 control-label'))); ?>

        <div class="col-md-6">
            <div class="col-md-3"><label class="btn btn-success"><input type="radio" name="home_tag" value="1" <?php echo e(($data->home_tag==1)? 'checked' : ''); ?>> Yes </label> </div>
            <div class="col-md-3"><label class="btn btn-danger"><input type="radio" name="home_tag" value="0" <?php echo e(($data->home_tag==0)? 'checked' : ''); ?>> No </label> </div>
        </div>
        <?php if($errors->has('home_tag')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('home_tag')); ?></strong>
            </span>
        <?php endif; ?>
            
        </div>
            <?php echo e(Form::hidden('id',$data->id)); ?>

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href='<?php echo e(URL::to("attribute",$data->id)); ?>'><i class="fa fa-plus"> Attribute</i></a>
            </div>
        </div>
      
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>