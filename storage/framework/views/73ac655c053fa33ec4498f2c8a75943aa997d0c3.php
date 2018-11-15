<?php $__env->startSection('content'); ?>

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add New Item <a href="<?php echo e(URL::to('/viewItems')); ?>" class="pull-right btn btn-success">View Items</a></h3>
    <div class="box-body col-md-11">
        <?php echo Form::open(array('route' => 'item.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')); ?>

        
        <div class="form-group <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
            
            <?php echo e(Form::label('link', 'Item Link', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <div class="input-group">
                    <div class="input-group-addon"><?php echo e(URL::to('')); ?>/</div>
                    <?php echo e(Form::text('link','',array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))); ?>

                </div>
                <?php if($errors->has('link')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('link')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            
        </div>
        <div class="form-group <?php echo e($errors->has('item_name') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('item_name', 'Item Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::text('item_name','',array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))); ?>

                <?php if($errors->has('item_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('item_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('product_code') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('product_code', 'Product Code', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-7">
                <?php echo e(Form::text('product_code','',array('class'=>'form-control','placeholder'=>'Product Code','required'))); ?>

                <?php if($errors->has('product_code')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('product_code')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])); ?>

                </div>
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Short Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="long_title" rows="2" ></textarea>
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Featureing Item type* </label>
            <div class="col-sm-9">
                <select name="is_featured" class="form-control">
                  <option value="0">Normal Item</option>
                  <option value="1">Special Item</option>
                </select>
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="short_description" rows="5" id="ckeditor" ></textarea>
          </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <?php echo e(Form::select('fk_category_id',$category,'',['class'=>'form-control chosen-select-no-results','placeholder'=>'Select Category','required','onchange'=>'categoryType(this.value)'])); ?>

              
          </div>
        </div>
        <div id="loadSubCategory"></div>
        <div id="subSubCategory"></div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Brand </label>
          <div class="col-sm-9">
            <?php echo e(Form::select('fk_brand_id',$brands,'',['class'=>'form-control chosen-select-no-results','placeholder'=>'Select Brands'])); ?>

          </div>
        </div>
        <div class="form-group <?php echo e($errors->has('sale_price') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('sale_price', 'Sale Price (Lower)', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::number('sale_price','',array('class'=>'form-control','placeholder'=>'Sale Price (Lower)','step'=>'any'))); ?>

                <?php if($errors->has('sale_price')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('sale_price')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('regular_price') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('regular_price', 'Highest Price ', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::number('regular_price','',array('class'=>'form-control','placeholder'=>'Highest Price','step'=>'any'))); ?>

                <?php if($errors->has('regular_price')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('regular_price')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('quantity') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('quantity', 'Total Quantity ', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::number('quantity','',array('class'=>'form-control','placeholder'=>'Quantity'))); ?>

                <?php if($errors->has('quantity')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('quantity')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Meta Description </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="meta_description" rows="5"></textarea>
          </div>
        </div>
        <div id="attributes"><!-- Load Attributes --></div>
        <div id="attribute"><!-- Load Attributes --></div>
        
        <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Image', array('class' => 'control-label col-md-3'))); ?>

            <div class="col-md-8">
            <small>Max image size 2MB</small>
                <div id="formdiv">
                    <div class="img_control">
                      <div id="filediv">
                      <?php echo e(Form::file('photo[]', array('multiple'=>true,'id'=>'files','required'))); ?>

                      </div>
                        <div class="add_btn">
                            <input type="button" id="add_more" class="upload btn btn-warning" value="Add More Photo"/>
                        </div>
                    </div>
                </div>
                <?php if($errors->has('photo')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('photo')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
         </div>
        
        <div class="from-group col-md-6 multiple_upload">
        <!-- Load multiple photo -->
        </div>
        <input type="hidden" name="created_by" value="<?php echo e(Auth::user()->email); ?>">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Confirm </button>
            </div>
        </div>
            
            
        <?php echo Form::close(); ?>

    </div>
    <hr class="col-md-12">
           
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>



    <script type="text/javascript">
    $(".chosen-select-no-results").chosen({width:"100%"});

        $(".chosen-select-no-results1").chosen({width:"100%"});
         function categoryType(value){
            $("#loadSubCategory").load('<?php echo e(URL::to("loadSubCat")); ?>'+'/'+value);
            $('#attributes').load("<?php echo e(URL::to('item/create')); ?>"+'?cat='+value);
        }
        /*function attributes(value){
            alert(value);
            $('#attribute').load("<?php echo e(URL::to('item/create')); ?>"+'?sub='+value);
        }*/
        
        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>