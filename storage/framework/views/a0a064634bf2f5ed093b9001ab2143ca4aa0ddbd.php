<?php $__env->startSection('content'); ?>
<style type="text/css">
    .card{width: 97%;
    overflow: hidden;
    background-color: #fff;
    padding: 15px;
    margin: 0 15px;}
    .form-group{width: 100%;overflow: hidden;}
</style>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            
                            <div class="row">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">My Profile </h4>
                                    </div>
                                    <hr>
                                    <?php if(Session::has('success')): ?>
    
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                           <b><?php echo Session::get('success'); ?></b> 
                                        </div>
                                    
                                    <?php elseif(Session::has('error')): ?>
                                        
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                           <b><?php echo Session::get('error'); ?></b> 
                                           </div>
                                        
                                    <?php endif; ?>
                                    <!-- Nav tabs -->
                                      <ul class="nav nav-tabs" role="tablist">
                                       
                                        <li role="presentation" ><a href="<?php echo e(URL::to('myProfile')); ?>">Update Profile</a></li>
                                      
                                        <li role="presentation" class="active"><a href="<?php echo e(URL::to('changeUserPassword')); ?>" >Change Password</a></li>
                                       
                                        
                                      </ul>
                                      <!-- Tab panes -->
                                <div role="tabpanel" class="tab-pane active" id="profile" style=" margin-top: 25px;">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <?php echo Form::open(array('url' => 'userPasswordUpdate','method'=>'POST','class'=>'form-horizontal')); ?>


                                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?> ">
                                          <label class="col-sm-4 control-label">Old Password  <star> *</star></label>
                                          <div class="col-sm-8">
                                            <?php echo e(Form::password('old_password', ['class' => 'form-control','placeholder'=>'Old Password','required'])); ?>


                                            <?php if($errors->has('old_password')): ?>
                                              <span class="help-block">
                                                <strong><?php echo e($errors->first('old_password')); ?></strong>
                                              </span>
                                            <?php endif; ?>
                                            
                                          </div>
                                        </div>
                                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?> ">
                                          <label class="col-sm-4 control-label">New Password  <star> *</star></label>
                                          <div class="col-sm-8">
                                            <?php echo e(Form::password('password', ['class' => 'form-control','placeholder'=>'New Password','required'])); ?>


                                            <?php if($errors->has('password')): ?>
                                              <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                              </span>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?> ">
                                          <label class="col-sm-4 control-label">Confirm New Password : <star> *</star></label>
                                          <div class="col-sm-8">
                                            <?php echo e(Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password','required'])); ?>

                                            
                                            <?php if($errors->has('password_confirmation')): ?>
                                              <span class="help-block">
                                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                              </span>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <?php echo e(Form::hidden('id',Auth::user()->id)); ?>

                                        <div class="form-group">
                                          <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-warning">
                                              <span class="btn-label">
                                                <i class="fa fa-check"></i>
                                              </span>
                                              Update
                                            </button>
                                          </div>
                                        </div>
                                      <?php echo Form::close(); ?>

                                    </div>
                                    <div class="col-md-1"></div>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane" id="view">
                    
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>