
<?php $__env->startSection('content'); ?>
<div class="tab_content">

  <h3 class="box_title">Sales Report</h3>
	<div class="col-md-12">
		    <?php echo Form::open(array('url' =>'reports','method'=>'get','class'=>'form-horizontal')); ?>

			<div class="form-group col-md-4">
				<div class="col-md-12">
				 <?php echo e(Form::date('from',date('Y-m-d'), ['class' => 'form-control'])); ?>

				</div>
			</div>
			<div class="col-md-1">
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" value="TO" class="form-control" readonly>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="col-md-12">
				 <?php echo e(Form::date('to',date('Y-m-d'), ['class' => 'form-control'])); ?>

				</div>
			</div>
			<div class="form-group  col-md-3">
				<div class="col-md-12">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		<?php echo e(Form::close()); ?>

	<hr>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>