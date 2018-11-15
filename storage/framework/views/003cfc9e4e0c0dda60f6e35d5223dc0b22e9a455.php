<?php $__env->startSection('content'); ?>

       
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-6 col-sm-6 sign-in col-md-offset-3 col-sm-offset-3">
                    <h4 class="">Sign in</h4>
                    <form class="form-signin" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                                        <?php echo e(csrf_field()); ?>

                        <div class="form-group  <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="radio outer-xs">
                             <a href="<?php echo e(url('/password/reset')); ?>" class="forgot-password pull-right">&nbsp; &nbsp; &nbsp; Forgot your Password?</a>
                             
                            <a href="<?php echo e(url('/register')); ?>" class="forgot-password pull-right">Need to Create an Account!  </a>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        
                        </div>
                    </form>                 
                </div>

            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
   </div><!-- /.container -->
</div><!-- /.body-content -->
        
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>