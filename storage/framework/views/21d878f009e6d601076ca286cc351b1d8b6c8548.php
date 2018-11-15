
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
					<button type="button" class="btn btn-info" onclick="printPage('print_body')">Print</button>
				</div>
			</div>
		<?php echo e(Form::close()); ?>

	<hr>
	</div>
	<div class="col-md-12">
		<div id="print_body">
		<table class="table table-bordered">
			<theading>
				<tr class="active">
					<th width="5%"  style="text-align: center">SL</th>
					<th  style="text-align: center">Item Name</th>
					<th  style="text-align: center">Code</th>
					<th  style="text-align: center">Category</th>
					<th  style="text-align: center" width="10%">Qty</th>
					<th  style="text-align: center" width="20%">Total Amount</th>
				</tr>
			</theading>
			<tbody>
				<? 
				$i=0; 
				$totaQty=0;
				$totaAmount=0;
				?>
				<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<? 
					$i++;
					$totaQty+=$data->total_quantity;
					$totaAmount+=$data->total_amount;
				?>
				<tr>
					<td><?php echo e($i); ?></td>
					<td><?php echo e($data->item_name); ?></td>
					<td><?php echo e($data->product_code); ?></td>
					<td><?php echo e($data->category_name); ?></td>
					<td><?php echo e($data->total_quantity); ?></td>
					<td><?php echo e($data->total_amount); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</tbody>
			<tfooter>
				<tr class="success">
					<th colspan="4">Total = </th>
					<th><?php echo e($totaQty); ?></th>
					<th><?php echo e($totaAmount); ?></th>
				</tr>
			</tfooter>
			
		</table>
	</div>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backend/js/printThis.js')); ?>"></script>
<script type="text/javascript">
    function printPage(id){
        $('#'+id).printThis();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>