
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .form-group{margin:10px 0;}
  .tools a{color: #000;}
  .wrapper {padding: 0;}
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">View Item</h3>
    
    <div class="col-md-12">

        <section class="panel">
            <header class="panel-heading">
              Item
                <span class="tools pull-right">
                  <a href="<?php echo e(URL::to('/addPackage/'.$id)); ?>" class="btn btn-info">Add packages</a>
                  <a href="<?php echo e(URL::to('/itemUpdate/'.$id)); ?>" class="btn btn-primary">Edit Item</a>
                  <a href="<?php echo e(URL::to('/item')); ?>" class="btn btn-success">Add New Item</a>
                  <a href="<?php echo e(URL::to('/viewItems')); ?>" class="btn btn-warning">View Items</a>
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="custom-modal-text">
                  <table class="table table-bordered" cellspacing="0">
                  <tr>
                    <th width="20%">Properties</th>
                    <th>Value</th>
                  </tr>
                  <tr>
                    <th>Item Link </th>
                    <td><a href='<?php echo e(URL::to("$item->link")); ?>' target="_blank"><?php echo e(URL::to("$item->link")); ?></a></td>
                  </tr>
                  <tr>
                    <th>Item Status </th>
                    <td> <?php 
                          if($item->status==1){
                            echo "Active";
                          }else{
                            echo "Inactive";
                          }
                         ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Item Name </th>
                    <td><?php echo $item->item_name; ?></td>
                  </tr>
                  <tr>
                    <th>Product Code </th>
                    <td><?php echo $item->product_code; ?></td>
                  </tr>
                  <tr>
                    <th>Short Description</th>
                    <td><?php echo $item->long_title; ?></td>
                  </tr>
                  <tr>
                    <th>Featureing Item Type </th>
                    <td><?php 
                      if($item->is_featured==1){
                        echo "Special Item";
                      }else{
                        echo "Normal Item";
                      }
                     ?></td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td><?php echo $item->short_description; ?></td>
                  </tr>
                  <tr>
                    <th>Category Name</th>
                    <td><?php echo $item->category_name; ?></td>
                  </tr>
                  <?php if($item->sub_category_name!=null): ?>
                  <tr>
                    <th>Sub Category Name</th>
                    <td><?php echo $item->sub_category_name; ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if($item->sub_name!=null): ?>
                  <tr>
                    <th>Sub Sub Category Name</th>
                    <td><?php echo $item->sub_name; ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if($item->brand_name!=null): ?>
                  <tr>
                    <th>Brand </th>
                    <td><?php echo $item->brand_name; ?></td>
                  </tr>
                  <?php endif; ?>
                  
                  <tr>
                    <th>Sale Price (Lower)</th>
                    <td><?php echo $item->sale_price; ?></td>
                  </tr>

                  <tr>
                    <th>Highest Price</th>
                    <td><?php echo $item->regular_price; ?></td>
                  </tr>
                  <tr>
                    <th>Total Quantity</th>
                    <td><?php echo $item->quantity; ?></td>
                  </tr>
                  <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                      <th>
                        <?php echo e($attr->name); ?>

                      </th>

                      <td>
                      <?php $__currentLoopData = $attributeOptions[$attr->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <?php
                      if($option!=null){
                        if($key>0){
                        echo ','.$option->name;
                        }else{
                          echo $option->name;
                        }
                      }
                        ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  <tr>
                    <th>Created By</th>
                    <td><?php echo $item->creator_name; ?></td>
                  </tr>
                  <?php if($item->editor_name!=null): ?>
                  <tr>
                    <th>Updated By</th>
                    <td><?php echo $item->editor_name; ?></td>
                  </tr>
                  <?php endif; ?>
                </table>
              </div>
               <?php if(count($photo)>0): ?>
                <div class="item_photo">
                <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iPhoto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <img src='<?php echo e(asset("$iPhoto->small_photo")); ?>'>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
              <?php endif; ?>
        </div>
     
    </section>
 
    </div>        
</div>

<?php $__env->stopSection(); ?>




<script type="text/javascript">

function deleteConfirm(){
  var con= confirm("Do you want to delete?");
  if(con){
    return true;
  }else 
  return false;
}
</script>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>