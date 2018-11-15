
<?php $__env->startSection('content'); ?>
<div class="tab_content">

<h3 class="box_title">Add New Offer
 <a href="<?php echo e(route('offer.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
	<?php echo Form::open(array('route' => 'offer.store','class'=>'form-horizontal','files'=>true)); ?>

	    
	    <!-- <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <label class="slide_upload" for="file">
                    <img id="image_load">
                </label>
                <?php echo e(Form::file('photo',array('id'=>'file','style'=>'display:none','required'))); ?>

                 <?php if($errors->has('photo')): ?>
	                    <span class="help-block" style="display:block">
	                        <strong><?php echo e($errors->first('photo')); ?></strong>
	                    </span>
	                <?php endif; ?>
            </div>
        </div> -->
        <div class="form-group">
            <?php echo e(Form::label('category', 'Category', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <select data-placeholder="Choose a Category..." class="form-control chosen-select" id="chosen" onchange="loadSubCategory(this.value)" style="width: 100%;">
                    <option value=""></option>
                    <? foreach ($category as $cat) { ?>
                    <option value="<? echo $cat->id ?>"><? echo $cat->category_name ?></option>
                    <?} ?>
                </select>
            </div>
            
        </div>
        <div id="loadSubCategory"><!-- Load Sub Category --></div>
        <div id="loadItem"><!-- Load Sub Category --></div>
        <div class="form-group">
            <?php echo e(Form::label('discount','Discount',['class'=>'control-label col-md-3'])); ?>

            <div class="col-md-2">
                <div class="input-group">
                  <?php echo e(Form::number('discount','',['class'=>'form-control','placeholder'=>'Ex: 33','min'=>'0','step'=>'any','id'=>'discount'])); ?>

                  <div class="input-group-addon">%</div>
                </div>
                <span>Discount(%)</span>
            </div>
            <div class="col-md-3">
                <?php echo e(Form::number('regular_price','',['class'=>'form-control','placeholder'=>'Regular Price','min'=>'0','step'=>'any','id'=>'regularPrice'])); ?>

                <span>Regular Price</span>
            </div>
            <div class="col-md-3">
                <?php echo e(Form::number('sale_price','',['class'=>'form-control','placeholder'=>'Sale Price','min'=>'0','step'=>'any','id'=>'salePrice'])); ?>

                <span>Sale Price</span>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('start_date','Day',['class'=>'control-label col-md-3'])); ?>

            <div class="col-md-4">
                <?php echo e(Form::date('start_date',date('Y-m-d'),['class'=>'form-control','placeholder'=>'Start Date'])); ?>

                <span>Start Date</span>
            </div>
            <div class="col-md-4">
                <?php echo e(Form::date('end_date',date('Y-m-d'),['class'=>'form-control','placeholder'=>'End Date'])); ?>

                <span>End this offer before this date.</span>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('offer_type', 'Offer Type', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
                <?php echo e(Form::select('offer_type', array('1' => 'Todays Offer', '2' => 'Regular Offer'),'1', ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-4">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),'1', ['class' => 'form-control'])); ?>

            </div>
        </div>
        <span id="ckEditor"></span>
	    <div class="form-group">
	        <div class="col-md-9 col-md-offset-3">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
      </div>
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function loadSubCategory(id){
            $("#loadSubCategory").load("<?php echo e(URL::to('loadSubCategory')); ?>"+'/'+id);
            $("#loadItem").load("<?php echo e(URL::to('loadItem')); ?>"+'?id='+id+'&type=cat');
    }
    function loadItem(id){
            $("#loadItem").load("<?php echo e(URL::to('loadItem')); ?>"+'?id='+id+'&type=sub');
    }
    function price(id){
         $.get("<?php echo e(URL::to('offer')); ?>/"+id, function(response){ 
            $('#regularPrice').val(response['regular_price'])
            $('#salePrice').val(response['sale_price'])
            $('#discount').val(response['discount'])
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>