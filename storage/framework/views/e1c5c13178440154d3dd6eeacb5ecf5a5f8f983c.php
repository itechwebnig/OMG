<p style="text-align: center;font-weight: bold;text-decoration: underline;">Attributes</p>
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<div class="form-group col-sm-12 role_select" >
  <label class="control-label col-sm-3"><?php echo e($attr->name); ?></label>
  <div class="col-sm-9">
  <?php $__currentLoopData = $options[$attr->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <label>
  <input type="checkbox" name="attributes[<?php echo e($attr->id); ?>][]" value="<?php echo e($opt->id); ?>"> <?php echo e($opt->name); ?></label>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>