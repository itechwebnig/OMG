
<?php $__env->startSection('content'); ?>
<? if(Session::has('commonData')){
	$commonData=Session::get('commonData');
	$currency_symbol=$commonData['primaryInfo']->currency_symbol;
	} ?>
<style type="text/css">
	td, th {
	    padding: 5px;
	    text-align: center;
	}
</style>
<div class="container">
<div class="row">
<div class="payment_info">
		<div class="panel panel-default">
		  <div class="panel-heading">My Wishlist</div>
		  <div class="panel-body">
		    <table class="shop_table cart" cellspacing="0" border="1">
				<thead>
					<tr>
						<th width="10%">Image</th>
						<th>Product</th>
						<th width="10%">Price</th>
						<th width="15%">Date</th>
						<th width="15%">Add to cart</th>
						<th width="10%">Remove</th>
					</tr>
				</thead>
			   
				<tbody>
					<?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<tr>
						<td>
							<a href='<?php echo e(URL::to("$data->link")); ?>'>
							<?php if($data->photo!=null): ?>
								<img class="img-responsive attachment-shop_thumbnail size-shop_thumbnail wp-post-image cart_img" alt="<?php echo e($data->item_name); ?>" src='<?php echo e(asset("$data->photo")); ?>' />
							<?php else: ?>
								<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image cart_img" alt="<?php echo e($data->item_name); ?>" src='<?php echo e(asset("public/img/item/default.png")); ?>' />
							<?php endif; ?>

							</a>					
						</td>
						
						<td class="product-name">
							<a href='<?php echo e(URL::to("$data->link")); ?>'><?php echo e($data->item_name); ?></a><br>

						</td>
						<td class="product-price">
							<span class="woocommerce-Price-amount amount">
								<span class="woocommerce-Price-currencySymbol"><?php echo e($commonData['primaryInfo']->currency_symbol); ?></span><?php echo e($data->sale_price); ?>

							</span>					
						</td>
						<td><?php echo e(date('jS M , Y',strtotime($data->created_at))); ?></td>
						<td><a href='<?php echo e(URL::to("$data->link")); ?>' class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to cart</a></td>
						<td><a href='<?php echo e(URL::to("wishlist-delete/$data->id")); ?>' class="btn btn-danger"><i class="fa fa-times"></i></a></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</tbody>
			</table>

		  </div>
		</div>
	</div>
	</div>
	</div>
			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>