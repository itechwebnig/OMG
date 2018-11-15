
<?php $__env->startSection('content'); ?>
<?if(\Session::has('commonData')){
        $commonData=\Session::get('commonData');
        $info=$commonData['primaryInfo'];

    }
 ?>
			<?php if(isset($invoice_id)): ?>
			<div class="container">
			<div class="row">
			<div class="payment_info">
					<div class="panel panel-default">
					  <div class="panel-heading">Order Confirmation</div>
					  <div class="panel-body">
					    <p>Dear user,<br>
					    		  Thank you for choosing <a href="<?php echo e(URL::to('/')); ?>"><?php echo e($info->company_name); ?></a>
					    We Successfully Received your order. Your booking code is <?php echo e($invoice_id); ?>.
					    From now on, our representative will contact you within the next 4 hours.
					    Information relating to orders already have been informed via sms.<p>

					  </div>
					</div>
				</div>
				</div>
				</div>
				<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>