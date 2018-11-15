    <?php $__env->startSection('content'); ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
<h4 class="header-title m-t-0 m-b-30"><i class="fa fa-pencil" aria-hidden="true"></i> User Information
    <?php if(Auth::user()->type==1): ?> <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View all user</a><?php endif; ?>
</h4>
                                    <hr>

         <?php echo Form::open(array('route' => ['users.update',$data->id],'class'=>'form-horizontal','method'=>'PUT','files'=>true)); ?>

                       <input type="hidden" name="id" value="<?php echo e($data->id); ?>">      
<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="fullName" class="col-sm-3 control-label">Full Name* : </label>
    <div class="col-sm-7">
        <input type="text" name="name" parsley-trigger="change" value="<?php echo e($data->name); ?>" required
           placeholder="Enter Full Name" class="form-control" id="fullName">
           <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
    </div>
</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="inputEmail3" class="col-sm-3 control-label">Email* :</label>
    <div class="col-sm-7">
        <input type="email" name="email" value=" <?php echo e($data->email); ?> " required parsley-type="email" class="form-control"
               id="inputEmail3" placeholder="Email">
               <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
    </div>
</div>
<div class="form-group  <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
    <label for="phone" class="col-sm-3 control-label">Phone Number*</label>
    <div class="col-sm-7">
        <input name="phone" id="phone" type="number" value="<?php echo e($data->phone); ?>" placeholder="01xxxxxxxxx" required class="form-control">
        <?php if($errors->has('phone')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('phone')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
 <?php if(Auth::user()->type==1): ?>
<div class="form-group">
    <?php echo e(Form::label('type', 'Type', array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::select('type', array('1' => 'Administrator', '3' => 'Moderator'),$data->type, ['class' => 'form-control'])); ?>

    </div>
</div>
<?php endif; ?>
<div class="form-group  <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label for="file" class="col-sm-3 control-label">Choose Image* :</label>
    <div class="col-sm-5">
        <input name="image" id="file" type="file" placeholder="Profile Picture"  class="form-control">
        <?php if($errors->has('image')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('image')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="col-sm-2">
        <div class="profile_image">
           <?php if($data->image!=null): ?>
                <img src="<?php echo e(asset($data->image)); ?>" id="image_load">
                <?php else: ?>
                <img src="<?php echo e(asset('public/img/demo.png')); ?>" id="image_load">
           <?php endif; ?> 
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-3 col-sm-8">
        <a class="btn btn-warning btn-trans waves-effect w-md waves-success m-b-5" href="<?php echo e(route('users.edit',$data->id)); ?>" >Change Password</a>
        <button type="submit" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5">
            Save
        </button>
    </div>
</div>
    <?php echo Form::close(); ?>

                
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>