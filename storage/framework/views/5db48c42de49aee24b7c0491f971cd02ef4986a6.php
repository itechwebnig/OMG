<?php $__env->startSection('content'); ?>


<h3 class="box_title">Primary Information</h3>
    <?php echo Form::open(array('route' =>['others-info.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)); ?>

        <div class="form-group <?php echo e($errors->has('logo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('logo', 'Organization Logo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="upload_photo upload company_logo" for="file">
                    <!--  -->
                    <img src="<?php echo e(asset($data->logo)); ?>" id="image_load">
                    <i class="upload_hover ion ion-ios-camera-outline"></i>
                </label>
                <?php echo e(Form::file('logo',array('id'=>'file','style'=>'display:none'))); ?>

                 <?php if($errors->has('logo')): ?>
                        <span class="help-block" style="display:block">
                            <strong><?php echo e($errors->first('logo')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('favicon') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('favicon', 'Favicon', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="upload_photo upload icon_upload" for="file1">
                    <!--  -->
                    <img src="<?php echo e(asset($data->favicon)); ?>" id="image_load1">
                    <i class="upload_hover ion ion-ios-camera-outline"></i>
                </label>
                <?php echo e(Form::file('favicon',array('id'=>'file1','style'=>'display:none'))); ?>

                 <?php if($errors->has('favicon')): ?>
                        <span class="help-block" style="display:block">
                            <strong><?php echo e($errors->first('favicon')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('company_name', 'Name of Organization', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('company_name',$data->company_name,array('class'=>'form-control','placeholder'=>'Name of Organization'))); ?>

                <?php if($errors->has('company_name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('company_name')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('currency_symbol') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('currency_symbol', 'Currency Symbol', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-3">
                <?php echo e(Form::text('currency_symbol',$data->currency_symbol,array('class'=>'form-control','placeholder'=>'Currency Symbol'))); ?>

                <?php if($errors->has('currency_symbol')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('currency_symbol')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>

        <div class="form-group  <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('address', 'Organization Address', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('address',$data->address,array('class'=>'form-control','placeholder'=>'Organization Address'))); ?>

                <?php if($errors->has('address')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('address')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('mobile_no') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('mobile_no', 'Contact Number', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('mobile_no',$data->mobile_no,array('class'=>'form-control','placeholder'=>'Contact Number'))); ?>

                <?php if($errors->has('mobile_no')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('mobile_no')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('bkash_no') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('bkash_no', 'Bkash Number', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('bkash_no',$data->bkash_no,array('class'=>'form-control','placeholder'=>'Bkash Number'))); ?>

                <?php if($errors->has('bkash_no')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('bkash_no')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('email', 'Email', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::email('email',$data->email,array('class'=>'form-control','placeholder'=>'Email'))); ?>

                <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('fb_link') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('fb_link', 'Facebook page link', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('fb_link',$data->fb_link,array('class'=>'form-control','placeholder'=>'Facebook page link'))); ?>

                <?php if($errors->has('fb_link')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('fb_link')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('doorstep') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('doorstep', 'Doorstep Around Dhaka', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::number('doorstep',$data->doorstep,array('class'=>'form-control','placeholder'=>'Doorstep Around Dhaka','min'=>'0','step'=>'any'))); ?>

                <span>Delivery in Doorstep Around Dhaka Cost</span>
                    <?php if($errors->has('doorstep')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('doorstep')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group  <?php echo e($errors->has('pick_up_station') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('pick_up_station', 'Pick up Station', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::number('pick_up_station',$data->pick_up_station,array('class'=>'form-control','placeholder'=>'Pick up Station','min'=>'0','step'=>'any'))); ?>

                <span>Delivery in Pick up Station Cost</span>
                <?php if($errors->has('pick_up_station')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('pick_up_station')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>

        <div class="form-group  <?php echo e($errors->has('map_embed') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('map_embed', 'Google Map Embed Code', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('map_embed',$data->map_embed,array('class'=>'form-control','placeholder'=>'Google Map Embed Code','rows'=>'5'))); ?>

                <?php if($errors->has('map_embed')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('map_embed')); ?></strong>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('Google Map', 'Google Map', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <iframe src="<?php echo e($data->map_embed); ?>" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
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