
<?php $__env->startSection('content'); ?>
<div class="tab_content">

  <h3 class="box_title">Inventory</h3>
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
					<th  style="text-align: center" width="20%">Price</th>
				</tr>
			</theading>
			<tbody>
				<? $i=0; ?>
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<? $i++; ?>
				<tr>
					<td><?php echo e($i); ?></td>
					<td><?php echo e($item->item_name); ?></td>
					<td><?php echo e($item->product_code); ?></td>
					<td><?php echo e($item->category_name); ?></td>
					<td><?php echo e($item->quantity); ?></td>
					<td><?php echo e($item->sale_price); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</tbody>
		</table>
	</div>
	<?php echo e($items->render()); ?>

 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>