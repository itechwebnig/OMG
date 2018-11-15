
<?php $__env->startSection('content'); ?>
<style type="text/css">
	.adv-table table tr td {
    padding: 2px 5px;
}
</style>
<div class="col-md-12">
	<p align="center"><u>Manually Send SMS</u><b class="pull-right">Balance: <?php echo e($quantity); ?></b></p>
	<?php echo Form::open(array('route' => 'sms.store','class'=>'form-horizontal','files'=>true)); ?>

		<div class="form-group">
			<label class="control-label col-md-2"><b>To : </b></label>
			<div class="col-md-10">
			<?php echo e(Form::textArea('number','',['class'=>'form-control','placeholder'=>'8801xxxxxxxxx,8801xxxxxxxxxxx','rows'=>'1','id'=>'number','required'])); ?>

			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2"><b>Message : </b></label>
			<div class="col-md-10">
			<?php echo e(Form::textArea('message','',['class'=>'form-control','placeholder'=>'Type your message here...','rows'=>'4','required'])); ?>

			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" class="btn btn-success btn-lg pull-right">Send</button>
			</div>
		</div>
	<?php echo e(Form::close()); ?>

</div>
<div class="tab_content col-md-12" style="padding-top:0;">
    
    <div class="col-md-12 no_padding">

        <section class="panel">
        <?php echo Form::open(array('url' => 'sendToUser','class'=>'form-horizontal','files'=>true)); ?>

            <header class="panel-heading">
              Send sms to registered users
                <span class="tools pull-right top_bar">
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%"><input type="checkbox" id="allChecked"></th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                   <? $s=0; ?>
                    <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                   <? $s++; ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox" value="<?php echo e($user->phone); ?>" name="number[]"></td>
                            <td><?php echo e($s); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->phone); ?></td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
                    <?php echo e($allUsers->render()); ?>

            </div>
        </div>
        <div class="form-group">
			<label class="col-md-10 col-md-offset-1">Message</label>
			<div class="col-md-10 col-md-offset-1">
			<?php echo e(Form::textArea('message','',['class'=>'form-control','placeholder'=>'Type your message here...','rows'=>'4','required'])); ?>

			</div>
		</div>
		<div class="form-group">
			<div class="col-md-10 col-md-offset-1">
				<button type="submit" class="btn btn-primary pull-right">Send to users</button>
			</div>
		</div>
		<?php echo e(Form::close()); ?>

    </section>
 
    </div>        
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$('#allChecked').on('change',function(){
		if(this.checked){
			$('.checkbox').each(function(){
			    this.checked = true;
			});
		}
		else{
			$('.checkbox').each(function(){ 
			    this.checked = false; 
			});
		}
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>