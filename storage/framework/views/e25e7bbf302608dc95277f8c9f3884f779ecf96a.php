<?php $__env->startSection('content'); ?>

  	<h3 class="box_title">User Profile
  		<?php if(Auth::user()->type==1): ?>
 		<a href="<?php echo e(route('users.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View all user</a><?php endif; ?>
 	</h3>

		 <?php echo Form::open(array('route' => 'password','class'=>'form-horizontal','method'=>'POST')); ?>

	    <div class="modal-body">
	       
	        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
	            <?php echo e(Form::label('password', 'Password', array('class' => 'col-md-4 control-label'))); ?>

	            <div class="col-md-8">
	                <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'))); ?>

	                 <?php if($errors->has('password')): ?>
	                    <span class="help-block">
	                        <strong><?php echo e($errors->first('password')); ?></strong>
	                    </span>
	                <?php endif; ?>
	            </div>
	        </div>
	        <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
	            <?php echo e(Form::label('password_confirmation', 'Password Confirmation', array('class' => 'col-md-4 control-label'))); ?>

	            <div class="col-md-8">
	                <?php echo e(Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Password Confirmation','required'))); ?>

	                 <?php if($errors->has('password_confirmation')): ?>
	                    <span class="help-block">
	                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
	                    </span>
	                <?php endif; ?>
	            </div>
	        </div>
	        <?php echo e(Form::hidden('id',$data->id)); ?>

	    </div>
	      <div class="modal-footer">
	      <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"> Save Password</i></button>
	    </div>
	        <?php echo Form::close(); ?>



	







<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>