
<?php $__env->startSection('content'); ?>

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Item Info <a href="<?php echo e(URL::to('/viewItems')); ?>" class="pull-right btn btn-success">View Items</a></h3>
    <div class="box-body col-md-10">
        <?php echo Form::open(array('route' => ['item.update',$item->id],'class'=>'form-horizontal','method'=>'PUT','files'=>'true')); ?>

        
            <div class="form-group <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
            
                <?php echo e(Form::label('link', 'Item Link', array('class' => 'col-md-3 control-label'))); ?>

                <div class="col-md-9">
                    <div class="input-group">
                        <div class="input-group-addon"><?php echo e(URL::to('')); ?>/</div>
                        <?php echo e(Form::text('link',$item->link,array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))); ?>

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
                <?php echo e(Form::text('item_name',$item->item_name,array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))); ?>

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
                <?php echo e(Form::text('product_code',$item->product_code,array('class'=>'form-control','placeholder'=>'Product Code','required'))); ?>

                <?php if($errors->has('product_code')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('product_code')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'), $item->status, ['class' => 'form-control'])); ?>

                </div>
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Short Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="long_title" rows="2" ><?php echo e($item->long_title); ?></textarea>
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Featureing Item Type * </label>
            <div class="col-sm-9">
                <?php echo e(Form::select('is_featured', ['0' => 'Normal Item', '1' => 'Special Item'], $item->is_featured, ['class'=> 'form-control','data-title'=> 'Single Select','data-style'=> 'btn-default btn-block','data-menu-style'=>'dropdown-blue'])); ?>

            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Description* </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="short_description" rows="5" id="ckeditor"><?php echo $item->short_description; ?></textarea>
              
          </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <select name="fk_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-select" tabindex="10" required="required" onchange="categoryType(this.value)">
                <?php if($category): ?>
                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($categoryData->id); ?>" <?php if($item->fk_category_id == $categoryData->id): ?><?php echo e("selected"); ?> <?php endif; ?>><?php echo e($categoryData->category_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
              </select>
              
          </div>
        </div>

        <div id="loadSubCategory">
          <?php if($item->fk_sub_category_id!=null): ?>
          <div id="oldTag" class="form-group role_select" >
            <label class="control-label col-sm-3">Select Sub Category* </label>
            <div class="col-sm-9">
                <select name="fk_sub_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-selects" tabindex="10" id="sub_category" ">
                  <?php if($subCategory): ?>
                    <?php $__currentLoopData = $subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategoryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <?php if($item->fk_category_id == $subCategoryData->fk_category_id): ?>
                          <option value="<?php echo e($subCategoryData->id); ?>" <?php if($item->fk_sub_category_id == $subCategoryData->id): ?><?php echo e("selected"); ?> <?php endif; ?>><?php echo e($subCategoryData->sub_category_name); ?></option>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  <?php endif; ?>
                </select>
                
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div id="subSubCategory">
          <?php if($item->fk_sub_sub_category_id!=null): ?>
          <div id="oldSubSub" class="form-group role_select" >
            <label class="control-label col-sm-3">Select Sub Sub Category* </label>
            <div class="col-sm-9">
                <select name="fk_sub_sub_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-selects" tabindex="10" id="sub_sub_category">
                  <?php if($subSubCategory): ?>
                    <?php $__currentLoopData = $subSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($subSubData->id); ?>" <?php if($item->fk_sub_sub_category_id == $subSubData->id): ?><?php echo e("selected"); ?> <?php endif; ?>><?php echo e($subSubData->sub_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  <?php endif; ?>
                </select>
                
            </div>
          </div>
          <?php endif; ?>
        </div>

         <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Brand </label>
          <div class="col-sm-9">
              <select name="fk_brand_id" data-placeholder="- Select -" style="width:100%;" class="chosen-select" tabindex="10">
                <?php if($brands): ?>
                  <option value=""></option>
                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($brand->id); ?>" <?php if($item->fk_brand_id == $brand->id): ?><?php echo e("selected"); ?> <?php endif; ?>><?php echo e($brand->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
              </select>
              
          </div>
        </div>
        <div class="form-group <?php echo e($errors->has('sale_price') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('sale_price', 'Sale Price (Lower)', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::number('sale_price',$item->sale_price,array('class'=>'form-control','placeholder'=>'Sale Price (Lower)','step'=>'any'))); ?>

                <?php if($errors->has('sale_price')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('sale_price')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group <?php echo e($errors->has('regular_price') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('regular_price', 'Highest Price', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-9">
                <?php echo e(Form::number('regular_price',$item->regular_price,array('class'=>'form-control','placeholder'=>'Highest Price','step'=>'any'))); ?>

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
                <?php echo e(Form::number('quantity',$item->quantity,array('class'=>'form-control','placeholder'=>'Quantity'))); ?>

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
              <textarea class="form-control" name="meta_description" rows="5"><? echo $item->meta_description ?></textarea>
          </div>
        </div>
        
        <div id="attributes">
          <div id="attr">
            <p style="text-align: center;font-weight: bold;text-decoration: underline;">Attributes</p>
            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="form-group col-sm-12 role_select" >
              <label class="control-label col-sm-3"><?php echo e($attr->name); ?></label>
              <div class="col-sm-9">
              <?php $__currentLoopData = $options[$attr->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $opt): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?
                $flag=0;
                $counter=0;
                if(!empty($attributeOptions[$attr->id])){
                   foreach ($attributeOptions[$attr->id] as $value) {
                    ++$counter;
                    if($value!=null && $opt->id==$value->id){?>
                        <label><input type="checkbox" name="attributes[<?php echo e($attr->id); ?>][]" value="<?php echo e($opt->id); ?>" checked> <?php echo e($opt->name); ?></label> 
                <?
                $flag=0;
                break;
                    }else{
                        $flag++;
                        continue;
                      }
                }
            }
                if($flag>0 || $counter==0 ){?>
                    <label><input type="checkbox" name="attributes[<?php echo e($attr->id); ?>][]" value="<?php echo e($opt->id); ?>"> <?php echo e($opt->name); ?></label>
                <?}?>
              

              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
        </div>
         <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                <?php echo e(Form::label('photo', 'Image', array('class' => 'control-label col-md-3'))); ?>

                <div class="col-md-9">
                    <div id="formdiv">
                        <div class="img_control">
                          <? 
                          if(!empty($photos)){
                            foreach ($photos as $photo) { ?>
                            <div id="filediv">
                                <div id="abcd" class="abcd"><img id="previewimg" src="<?php echo e(asset($photo['small_photo'])); ?>"><input type="hidden" id="exist_file" value="<? echo $photo['id']; ?>" /><img id="exist_img" src="<?php echo e(asset('public/img/x.png')); ?>" alt="X" title="Delete"></div>
                            </div>

                             <?} } ?>
                             <div id="filediv"><input name="photo[]" type="file" id="files"/></div>
                             <div id="loadDelete"><!-- Load Delete value --></div>
                        <input type="button" id="add_more" class="upload btn btn-warning" value="Add More Photo"/>
                        </div>
                    </div>
                    <?php if($errors->has('photo')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('photo')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
             </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Update </button>
            </div>
        </div>
            
            
        <?php echo Form::close(); ?>

    </div>
    <hr class="col-md-12">
           
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$(".chosen-select-no-results").chosen({width:"96%"});
    $(".chosen-select-no-results1").chosen({width:"96%"});
    /*category wise tag select*/
        function categoryType(value){
          //alert(value);
          $("#loadSubCategory").html('');
          $("#loadSubCategory").load('<?php echo e(URL::to("loadSubCat")); ?>'+'/'+value);
          $('#subSubCategory').html('');
          $('#attributes').load("<?php echo e(URL::to('item/create')); ?>"+'?cat='+value);
        }

    $('#sub_category').change(function(){
        var value = this.value;
        $('#attributes').load("<?php echo e(URL::to('item/create')); ?>"+'?sub='+value);
        $('#subSubCategory').load("<?php echo e(URL::to('loadSubSubCategory')); ?>/"+value);
    }).change();
 
     $('#sub_sub_category').change(function(){
        var value = this.value;
        $('#attributes').load("<?php echo e(URL::to('item/create')); ?>"+'?sub_sub='+value);
    })
    
  </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>