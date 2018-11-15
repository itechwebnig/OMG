<?php $__env->startSection('content'); ?>
<? if(Session::has('commonData')){
    $commonData=Session::get('commonData');
    $currency_symbol=$commonData['primaryInfo']->currency_symbol;
    
    } ?>
<div class="col-lg-12 col-md-12 col-sm-12">
<?php if(count($cart)>0): ?>
<div class="row">
<div class="col-md-4">
    <p><b>invoice: </b> <?php echo e($data->invoice_id); ?> </p>
    <p><b> Name: </b> <?php echo e($data->name); ?> </p>
    <p><b>Email: </b> <?php echo e($data->email); ?> </p>
    <p><b>Phone no: </b> <?php echo e($data->phone); ?> </p>
    <p><b>Date: </b> <?php echo e(substr($data->created_at,0,10)); ?></p>
    
</div>
<div class="col-md-4">
    <p><b>Country: </b> <?php echo e($data->country); ?> </p>
    <p><b>Region: </b> <?php echo e($data->region); ?></p>
    <p><b>Shipping address: </b> <?php echo e($data->address); ?> </p>
    <p><b>Payment Method: </b> <?php echo e($data->payment_method); ?></p>
    <?php if($data->ref_id!=null): ?>
    <p><b>Trx ID: </b> <?php echo e($data->ref_id); ?></p>
    <?php endif; ?>
    
</div>
<div class="col-md-4">
    <h5 class="pull-right">Order is 
    <?php if($data->status==1): ?>
    <label class="label label-info">Processing</label>
    <?php elseif($data->status==2): ?>
    <label class="label label-success">Accepted</label>
    <?php elseif($data->status==3): ?>
    <label class="label label-warning">Pending</label>
    <?php elseif($data->status==0): ?>
    <label class="label label-danger">Cancel</label>
    <?php endif; ?>
    </h5>
</div>
</div>
    <div class="cart-table table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="p-image">Product</th>
                    <th class="p-name">Product Name</th>
                    <th class="p-amount">Option</th>
                    <th class="p-amount">Price</th>
                    <th class="p-amount">Tex</th>
                    <th class="p-quantity">Quantity</th>
                    <th class="p-total">Total</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowKey => $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                <?
                $photo= DB::table('item_photo')->where('fk_item_id',$product->id)->value('small_photo');
                $item=$product->options;
                 $link= $item->link;
                 ?>
                    <td class="p-image"><a href='<?php echo e(URL::to("$link")); ?>'>
                <?php if($photo!=null): ?>
                    <img class="cart_image" alt="<?php echo e($product->name); ?>" src='<?php echo e(asset("$photo")); ?>'>
                <?php else: ?>
                    <img class="cart_image" alt="<?php echo e($product->name); ?>" src='<?php echo e(asset("public/img/item/default.png")); ?>'>
                <?php endif; ?>
                    </a></td>
                    <td class="p-name">
                        <a href='<?php echo e(URL::to("$link")); ?>'><?php echo e($product->name); ?></a>
                        

                    </td>
                    <td class="p-amount">
                        <span class="amount">
                    <?php if(count($allAttribute[$rowKey])>0): ?>
                        <?php $__currentLoopData = $allAttribute[$rowKey]['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <p><b><?php echo e($attributes->name); ?>: </b>
                            <?php $__currentLoopData = $allAttribute[$rowKey]['attributeOptions'][$attributes->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option => $attributeOptions): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php
                              if($attributeOptions!=null){
                                if($option>0){
                                echo ','.$attributeOptions->name.'('.$attributeOptions->attribute_price.' '.$currency_symbol.')';
                                }else{
                                  echo $attributeOptions->name.'('.$attributeOptions->attribute_price.' '.$currency_symbol.')';
                                }
                              }
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                        <p class="c-p-size"><? echo ($item->instruction!=null) ? "<span>Instruction : </span>".$item->instruction : ''?>
                            </p>
                            <p class="c-p-size"><? echo ($item->package!=null) ? "<span>Package/Size : </span>".$item->package : ''?>
                            </p></span>
                    </td>
                    <td class="p-amount"><span class="amount"><?php echo e($currency_symbol); ?><?php echo e($product->price); ?></span></td>
                    <td class="p-amount"><span class="amount"><?php echo e($currency_symbol); ?><?php echo e($product->tax); ?></span></td>

                    <td class="p-quantity cart_quantity">
                    <b><?php echo e($product->qty); ?></b>
                    </td>
                    <td class="p-total"><?php echo e($currency_symbol); ?><?php echo e($product->total); ?></td>
                    <td class="p-action"></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        
        <div class="col-md-4 col-md-offset-8">
            <div class="cart-coupon-rightside">
                <div class="amount-table table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                <?php if($data->delivery==1): ?>
                                    <p>Delivered in 2 - 5 days at your doorstep(Around Dhaka) for <?php echo e($currency_symbol); ?> <?php echo e($commonData['primaryInfo']->doorstep); ?>.</p>
                                    <?php else: ?>
                                    <p>Delivered in 3 - 10 days at nearby pick-up station for <?php echo e($currency_symbol); ?> <?php echo e($commonData['primaryInfo']->pick_up_station); ?>.</p>
                                <?php endif; ?>
                            </tr>
                            <tr class="g-total">
                                <td>Grand Total</td>
                                <td><span><?php echo e($currency_symbol); ?><?php echo e($data->total_amount); ?></span></td>
                            </tr> 

                        </tbody>
                    </table>
                </div>
            </div>
            <?php if($data->status==4): ?>
                <p>Delivered By : <?php echo e($data->delivered_by); ?></p>
                <p>Date and Time : <?php echo e(date('h:i A, jS M, Y',strtotime($data->date_time))); ?></p>
            <?php endif; ?>
            
        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
<?php endif; ?>
</div>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>