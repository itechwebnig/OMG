
<?php $__env->startSection('content'); ?>
<? if(Session::has('commonData')){
    $commonData=Session::get('commonData');
    $currency_symbol=$commonData['primaryInfo']->currency_symbol;
    $companyInfo=$commonData['primaryInfo'];
    
    } ?>
<div class="col-lg-12 col-md-12 col-sm-12">
<?php if(count($cart)>0): ?>
<div id="print_body">
    <style type="text/css">
        .cart_image{width: 100px;height:80px;float: left;}
        .printable{display: none;}
        @media  print {
            #print_body{overflow: hidden;margin-top: -100px}
            .printable{display:inline-block;}
            .no-print{display: none;}
            .col-md-6{width: 50%;float: left;}
            .row{width: 100%;overflow: hidden;}
            a[href]:after {
                content: none !important;
              }
              .customerInfo p{margin: 0;line-height: 16px;}
              input{border: 0;}

        @page  {
            size: auto;
            margin: 1cm;
            margin-top: 0 !important;
        }
          
        }        
    </style>
    <div class="print_top printable" style="width: 100%; overflow: hidden;border-bottom:1px solid #ddd;padding-bottom: 5px;margin-bottom: 5px;">
        <div class="view_logo" style="margin: 0 auto;width: 100%;text-align: center;">
            
            <h3 style="margin-top: 0;margin-left: 20px;"><img class="print-logo" src='<?php echo e(asset("public/img/$companyInfo->logo")); ?>' style="width: 100px; height: auto;margin-right:30px;"><strong><?php echo e($companyInfo->company_name); ?></strong></h3>
        </div>
        <div class="view_company_info" style="width: 100%; float: left; margin-left: 10px;text-align: center;">
            <?php echo $companyInfo->address; ?><br />
            Phone: <?php echo e($companyInfo->mobile_no); ?>, Email: <?php echo e($companyInfo->email); ?>

        </div>
    </div>
<div class="row">
<div class="col-md-6 customerInfo">
    <p><b>Invoice: </b> <?php echo e($data->invoice_id); ?> </p>
    <p><b> Name: </b> <?php echo e($data->name); ?> </p>
    <p><b>Email: </b> <?php echo e($data->email); ?> </p>
    <p><b>Phone no: </b> <?php echo e($data->phone); ?> </p>
    <p><b>Order Date: </b> <?php echo e(date('h:i A, jS M, Y',strtotime($data->created_at))); ?></p>
    
</div>
<div class="col-md-4 customerInfo">
    <p><b>Country: </b> <?php echo e($data->country); ?> </p>
    <p><b>Region: </b> <?php echo e($data->region); ?></p>
    <p><b>Address: </b> <?php echo e($data->address); ?> </p>
    <p><b>Payment Method: </b> <?php echo e($data->payment_method); ?></p>
    <?php if($data->ref_id!=null): ?>
    <p><b>Trx ID: </b> <?php echo e($data->ref_id); ?></p>
    <?php endif; ?>
    <p><b>Delivery Date: </b> <?php echo e(date('h:i A, jS M, Y',strtotime($data->date_time))); ?></p>

    
</div>
<div class="col-md-2 no-print">
    <h5 class="pull-right">Order  
    <?php if($data->status==1): ?>
    <label class="label label-info">Processing</label>
    <?php elseif($data->status==2): ?>
    <label class="label label-primary">Accepted</label>
    <?php elseif($data->status==3): ?>
    <label class="label label-warning">Pending</label>
    <?php elseif($data->status==0): ?>
    <label class="label label-danger">Cancel</label>
    <?php elseif($data->status==4): ?>
    <label class="label label-success">Delivered</label>
    <?php endif; ?>
    </h5>
</div>
</div>
<br>
    <div class="cart-tables">
        <table class="table table-bordered">
            <thead>
                <tr>
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
                $item=$product->options;
                 $link= $item->link;
                 ?>
                   
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

                    <td>
                    <b><?php echo e($product->qty); ?></b>
                    </td>
                    <td class="p-total"><?php echo e($currency_symbol); ?><?php echo e($product->total); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6"">
            <?php if($data->delivery==1): ?>
                <p>Delivered in 2 - 5 days at doorstep(Around Dhaka) for <b><?php echo e($currency_symbol); ?> <?php echo e($commonData['primaryInfo']->doorstep); ?></b>.</p>
            <?php else: ?>
                <p>Delivered in 3 - 10 days at nearby pick-up station for <b> <?php echo e($currency_symbol); ?> <?php echo e($commonData['primaryInfo']->pick_up_station); ?></b>.</p>
            <?php endif; ?>
            <table class="table table-bordered">
                <tr>
                    <th>Grand Total  </th>
                    <th><?php echo e($currency_symbol); ?><?php echo e($data->total_amount); ?></th>
                </tr>
            </table>
            <p>Delivered By : <?php echo e($data->delivered_by); ?></p>
        </div>
        <p align="center" style="width: 100%">Thank you for your order. Please stay with <a href="<?php echo e(URL::to('/')); ?>"><?php echo e($info->company_name); ?></a></p>
    </div>
</div>

        <div class="col-md-6 col-md-offset-6">
        <?php if($data->status==2): ?>
            <div class="dalivery">
                <?php echo Form::open(['route'=>['order.update',$data->id],'method'=>'PUT']); ?>

                <div class="form-group">
                    <label class="col-md-12">Delivered By</label>
                    <div class="col-md-12">
                        <input type="text" name="delivered_by" placeholder="Delivered By" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Date and Time</label>
                    <div class="col-md-12">
                        <input type="datetime-local" name="date_time" value="<?php echo e(date('Y-m-d\TH:i')); ?>" placeholder="Date Time" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>&nbsp;</label>
                    <div class="col-md-12">
                        <button class="btn btn-success">Delivered</button>
                        <?php if($data->status!=0): ?>
                            <a href='<?php echo e(URl::to("order/$data->id/edit?action=0")); ?>' class="btn btn-danger">Cancel</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        <?php else: ?>
            <div class="order_action">
            <?php if($data->status!=2 and $data->status!=4): ?>
                <a href='<?php echo e(URl::to("order/$data->id/edit?action=2")); ?>' class="btn btn-success">Accept</a>
            <?php endif; ?>
            <?php if($data->status!=3 and $data->status!=1): ?>
                <a href='<?php echo e(URl::to("order/$data->id/edit?action=3")); ?>' class="btn btn-warning">Pending</a>
            <?php endif; ?>
            <?php if($data->status!=0): ?>
                <a href='<?php echo e(URl::to("order/$data->id/edit?action=0")); ?>' class="btn btn-danger">Cancel</a>
            <?php endif; ?>
            <button class="btn btn-primary"  onclick="printPage('print_body')">Print</button>
            </div>
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
</div>                  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backend/js/printThis.js')); ?>"></script>
<script type="text/javascript">
    function printPage(id){
        $('#'+id).printThis({
            importStyle: false,
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>