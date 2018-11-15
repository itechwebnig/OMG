

 <div class="form-group col-md-6 <?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
      <p>Country<span>*</span></p>
         <input class="form-control" value="<?php echo e(old('country')); ?>" name="country" type="text" placeholder="Country" required>
         <?php if($errors->has('country')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('country')); ?></strong>
            </span>
        <?php endif; ?>
 </div>
 <div class="form-group col-md-6 <?php echo e($errors->has('region') ? ' has-error' : ''); ?>">
      <p>Region<span>*</span></p>
         <input class="form-control" value="<?php echo e(old('region')); ?>" name="region" type="text" placeholder="Region" required>
         <?php if($errors->has('region')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('region')); ?></strong>
            </span>
        <?php endif; ?>
 </div>


<div class="form-group col-md-12"> 
    <label class="col-md-12"> Address<span>*</span></label>
    <textarea class="form-control" name="address" placeholder=" Address" rows="5" required></textarea>
 </div>