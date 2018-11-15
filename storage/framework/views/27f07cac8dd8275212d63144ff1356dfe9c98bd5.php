<?php $__env->startSection('content'); ?>
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='single-product'>
      <div class='col-md-3 sidebar'>
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
          <?php $__currentLoopData = $topOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <?
                        $rem = strtotime($offer->end_date) - time();
                        $day = floor($rem / 86400);
                        $hr  = floor(($rem % 86400) / 3600);
                        $min = floor(($rem % 3600) / 60);
                        $sec = ($rem % 60);
                        $photo=App\Model\ItemPhoto::where('fk_item_id',$offer->fk_item_id)->value('small_photo');
                    ?>
                  <div class="image"> <img src='<?php echo e(asset("$photo")); ?>' alt=""> </div>
                  <div class="sale-offer-tag"><span><?php echo e($offer->discount); ?>%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key"><?php echo e($day); ?></span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key"><?php echo e($hr); ?></span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key"><?php echo e($min); ?></span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key"><?php echo e($sec); ?></span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href='<?php echo e(URL::to("$offer->link")); ?>'><?php echo e($offer->item_name); ?></a></h3>
                  <div class="star-ratings-sprite"><span style="width:<?php echo e($offer->rating); ?>%" class="star-ratings-sprite-rating"></span></div>
                  <div class="product-price"> <span class="price">Tk. <?php echo e($offer->sale_price); ?></span> <span class="price-before-discount">Tk. <?php echo e($offer->regular_price); ?></span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                      <a href='<?php echo e(URL::to("$offer->link")); ?>' class="btn btn-primary cart-btn"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                  </div>

                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
              <?php echo Form::open(array('url' => 'subscribe-store','class'=>'form-horizontal')); ?>

              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter" required="">
              </div>
              <button class="btn btn-primary" >Subscribe</button>
              <?php echo Form::close(); ?>

          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
  <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousels sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            <?php $__currentLoopData = $special_product-> chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="item">
                <div class="products special-product">
                <?php $__currentLoopData = $s_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="rows product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href='<?php echo e(URL::to("$data->link")); ?>'>
                    <?php if($special_photo[$data->id]){ ?>
                    <img src="<?php echo e(asset($special_photo[$data->id])); ?>" alt="<?php echo e($data->item_name); ?>">
                    <?php }else{ ?>
                    <img src="<?php echo e(asset('public/img/item/default.png')); ?>" alt="">
                    <?php } ?>
                    </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href='<?php echo e(URL::to("$data->link")); ?>'><?php echo e($data->item_name); ?></a></h3>
                            <div class="star-ratings-sprite"><span style="width:<?php echo e($data->rating); ?>%" class="star-ratings-sprite-rating"></span></div>
                            <div class="product-price"> <span class="price"> TK:<?php echo e($data->sale_price); ?> </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              
                  
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
             
              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
    </div><!-- /.sidebar -->
      <div class='col-md-9'>
            <div class="detail-block">
        <div class="row  wow fadeInUp">
            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="clearfix" id="content" >
                      <div class="clearfix joomImageActive">
                          <?php if(count($product_photo)>0): ?>
                          <? 
                          foreach ($product_photo as $key => $value) {
                          $itemSinglePhoto=URL::to("$value->photo");
                        $itemSmallPhoto=URL::to("$value->small_photo");
                          ?>
                          <a href="<?php echo e($itemSinglePhoto); ?>" class="jqzoom" rel='gal1'  title="<?php echo e($product_details->item_name); ?>" >
                              <img src="<?php echo e($itemSmallPhoto); ?>" class="activeImg"  title="<?php echo e($product_details->item_name); ?>">
                          </a>
                          <?
                            if($key==0){
                              break;
                            }
                          }?>
                          <?php else: ?>
                          <a href="<?php echo e(asset('public/img/item/defaultSmall.png')); ?>" class="jqzoom" rel='gal1'  title="<?php echo e($product_details->item_name); ?>" >
                              <img src="<?php echo e(asset('public/img/item/defaultSmall.png')); ?>"  title="<?php echo e($product_details->item_name); ?>">
                          </a>

                          <?php endif; ?>
                      </div>
                    <br/>
                          <div class="clearfix" >
                    <ul id="thumblist" class="clearfix" >
                    <? $j=0;?>
                      <?php $__currentLoopData = $product_photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <? $j++;?>
                        <? 
                          $itemSinglePhoto=URL::to("$photo->photo");
                        $itemSmallPhoto=URL::to("$photo->small_photo");
                          ?>
                      <li><a class="<?php echo e(($j==1)?'zoomThumbActive':''); ?>" href='javascript:void(0);'  rel="{gallery: 'gal1', smallimage: '<? echo  $itemSmallPhoto ?>',largeimage: '<? echo  $itemSinglePhoto ?>'}"><img src="<? echo  $itemSmallPhoto ?>"></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    </div>
                </div>
            </div>

          <div class='col-sm-6 col-md-7 product-info-block'>
            <div class="product-info">
              <h1 class="name"><?php echo e($product_details->item_name); ?></h1>
              
              <div class="rating-reviews m-t-20">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="star-ratings-sprite"><span style="width:<?php echo e($product_details->rating); ?>%" class="star-ratings-sprite-rating"></span></div>
                  </div>
                  <div class="col-md-7">
                    <span>( <?php echo e(count($review)); ?> Reviews )</span>
                  </div>
                </div><!-- /.row -->    
              </div><!-- /.rating-reviews -->

              <div class="stock-container info-container m-t-10">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="stock-box">
                      <span class="label">Availability :</span>
                    </div>  
                  </div>
                  <div class="col-sm-9">
                    <div class="stock-box">
                        <?php if($product_details->quantity==0) {
                    echo "<span class='text-danger'>Not Available</span>";
                    }else{ ?>
                    <span class='text-success'>In stock</span>

                   <?php   } ?>
                    </div>
                  </div>

                </div><!-- /.row -->  
                  <div class="description-container m-t-20">
                   <?php echo e($product_details->long_title); ?>

                  </div>
              </div><!-- /.stock-container -->

              <div class="description-container m-t-20">
                
              </div><!-- /.description-container -->

              <div class="price-container info-container m-t-20">
                <div class="row">
                  

                  <div class="col-sm-6">
                    <div class="price-box">
                      <span class="price">Tk:<?php echo e($product_details->sale_price); ?></span>
                      <span class="price-strike">Tk:<?php echo e($product_details->regular_price); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class=" m-t-10">
                      <? 
                              if(Auth::check()){

                                $userId=Auth::user()->id;
                                $wish=App\Model\Wishlist::where(['fk_item_id'=>$product_details->id,'fk_user_id'=>$userId])->count();

                              }else{
                                $userId='';
                                $wish=0;
                              }
                               ?>
                              <?php if($wish>0): ?>
                                 <a data-toggle="tooltip" class="add-to-cart btn btn-primary" data-original-title="Added to Wishlist"> <i class="icon fa fa-heart text-danger"></i> </a> 
                              <?php else: ?>
                                <a data-toggle="tooltip" class="add-to-cart btn btn-primary" href='<?php echo e(URL::to("wishlist-store?fk_item_id=$product_details->id&fk_user_id=$userId")); ?>' title="" data-original-title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
                              <?php endif; ?>
                    </div>
                  </div>

                  

                </div><!-- /.row -->
              </div><!-- /.price-container -->
              <?php echo Form::open(array('url' => 'cart','method'=>'POST')); ?>


              <input id="package_price" type="hidden" name="price" value="<?php echo e($product_details->sale_price); ?>" >
              <input type="hidden" value="<?php echo e($product_details->id); ?>" name="id">
              <div class="quantity-container info-container">
                <div class="row">
                  
                  <div class="col-sm-2">
                    <span class="label col-sm-12">Qty :</span>
                  </div>
                  
                  <div class="col-sm-2">
                    <div class="cart-quantity">
                      <div class="quant-input">
                                <input type="number" step="1" min="1" max="<?php echo e($product_details->quantity); ?>" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" />
                            </div>
                          </div>
                  </div>

                  
                  <div  class="artt">
                                  <?php if(count($itemPackage)>0): ?>
                                  <div class="col-sm-12">
                                      <div style="margin-right: 30px;" class="form-group select-option">
                                          <label class="col-sm-2">Select Option : </label>
                                          <div class="col-sm-7 no-padding">
                                          <select style="margin-left: 10px;width: 230px" name="package_id" class="form-control" onchange="packagePrice(this.value)" required >
                                              <option value=""> - select - </option>
                                              <?php $__currentLoopData = $itemPackage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemPackageData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <option value="<?php echo e($itemPackageData->id); ?>" ><?php echo e($itemPackageData->package_title); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                          </select>
                                          </div>
                                      </div>
                                   </div>
                                  <?php endif; ?>
                                  </div>

                                   <div class="artt col-sm-12">
                            <? $i=0; ?>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($attr['attribute_type']==1): ?>

                                    <div class="form-group select-option">
                                        <label class="col-sm-2"><?php echo e($attr->name); ?> </label>
                                        
                                        <div class="col-sm-7 no-padding">
                                        <select style="margin-right: 10px" class="form-control" name="attributes[<?php echo e($attr->id); ?>][]" <?php echo e(($attr['required']==1)? 'required' : ''); ?>>
                                            <option value="">--select--</option>
                                            <?php $__currentLoopData = $attributeOptions[$attr->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if($option!=null): ?>
                                            <option value="<?php echo e($option->id); ?>"><?php echo e($option->name); ?><? echo ($option->attribute_price>0) ? ' ( <b>'.$option->attribute_price.' TK </b>)' :'' ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        </div>
                                    </div>

                                <?php else: ?>
                                    <? $attrId=$attr['id']; ?>
                                <div class="form-group checkbox <?php echo e(($attr['required']==1)? 'required' : ''); ?><?php echo e($attrId); ?>" id="checkbox<?php echo e($attrId); ?>">
                                    <h5 id="<?php echo e($attr['name']); ?>"><?php echo e($attr['name']); ?></h5>
                                    <?php $__currentLoopData = $attributeOptions[$attrId]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($option!=null): ?>
                                        <div class="check_box_label">
                                          <label>
                                          <input type="checkbox" class="single_checkbox" name="attributes[<?php echo e($attr->id); ?>][]" value="<?php echo e($option->id); ?>" > <?php echo e($option->name); ?><? echo ($option->attribute_price>0) ? ' ( <b>'.$option->attribute_price.' '.$currency_symbol.' </b>)' :'' ?>
                                          </label>
                                        </div>
                                        
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>
                                <script type="text/javascript">
                                $(document).ready(function(){
                                    var attr = "<? echo $attr['name'] ?>";
                                     $("#adToCart").click(function(){
                                <? if($attr['required']==1){?>
                                             checked = $(".required<? echo $attr['id'] ?> input[type=checkbox]:checked").length;
                                          if(!checked) {
                                            alert("You must check at least one "+attr);
                                            return false;
                                          }
                                    <?}if($attr['min']>0){?>
                                            var min = <? echo $attr['min']; ?>;
                                   
                                           if ($("#checkbox<? echo $attrId ?> input.single_checkbox:checked").length < min) {
                                                alert(attr+" Minimum Select "+min+" Option");
                                            }
                                    <?}?>
                                    });
                                 <? if($attr['max']>0){?>
                                        var max = <? echo $attr['max']; ?>;
                                        $("#checkbox<? echo $attrId ?> input.single_checkbox").on('change', function(evt) {
                                               if ($("#checkbox<? echo $attrId ?> input.single_checkbox:checked").length > max) {
                                                    $(this).prop('checked', false);
                                                    alert(attr+" Allowed only "+max);
                                                }
                                            });
                                        <? } ?>
                                    
            
                                });
                                </script>
                                    
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        </div>
                        <div class="col-sm-7">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                        <div id="share"></div>
                        <div class="fb-share-button" data-href="" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="">Share</a></div>
                       
                      </div>

                  
                </div><!-- /.row -->
              </div><!-- /.quantity-container -->
              <?php echo e(Form::close()); ?>


              

              

              
            </div><!-- /.product-info -->
          </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->






                </div>
        
        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
          <div class="row">
            <div class="col-sm-3">
              <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                <!-- <li><a data-toggle="tab" href="#tags">TAGS</a></li> -->
              </ul><!-- /.nav-tabs #product-tabs -->
            </div>
            <div class="col-sm-9">

              <div class="tab-content">
                
                <div id="description" class="tab-pane in active">
                  <div class="product-tab">
                    <?php echo $product_details->short_description; ?>
                  </div>  
                </div><!-- /.tab-pane -->
                <div id="review" class="tab-pane">
                  <div class="product-tab">
                    
                  <h3>Reviews</h3>
              <?php if(Auth::check()==true): ?>
              <?php if(count($userReview)==0): ?>                      
                <div id="review_form_wrapper">
                  <div id="review_form">
                    <div id="respond" class="comment-respond">
                      
                      <?php echo Form::open(array('route' => 'review.store','class'=>'comment-form','id'=>'commentform')); ?>

                      
                        <p class="comment-form-rating">
                          <label for="rating" class="col-md-2 no-padding">Your Rating</label>
                          
                         <div class="col-md-9 rating-radio">
                          <? for ($i=1; $i < 6; $i++) { ?>
                          <input type="radio" value="<?php echo e($i); ?>" name="rating" id="raitngs-<?php echo e($i); ?>">
                            <label for="raitngs-<?php echo e($i); ?>"><i class="fa fa-star"></i></label>
                          <?} ?>
                            
                          </div>
                        </p>
                        <input type="hidden" name="fk_item_id" value="<?php echo e($product_details->id); ?>">
                         <?php if($errors->has('rating')): ?>
                                      <span class="help-block">
                                          <strong><?php echo e($errors->first('rating')); ?></strong>
                                      </span>
                                  <?php endif; ?>
                                  <?php if($errors->has('fk_user_id')): ?>
                                      <span class="help-block">
                                          <strong class="text-danger"><?php echo e($errors->first('fk_user_id')); ?></strong>
                                      </span>
                                  <?php endif; ?>
                        <p class="comment-form-comment">
                          <label for="comment" class="col-md-12 no-padding">Your Review</label>
                          <textarea id="comment" class="col-md-12" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                        </p>
                        <?php if($errors->has('comment')): ?>
                            <span class="help-block">
                                <strong class="text-danger"><?php echo e($errors->first('comment')); ?></strong>
                            </span>
                        <?php endif; ?>
                        
                          <br>
                        <p class="form-submit">
                          <button class="btn btn-primary submit" id="submit" >Submit</button>
                        </p>
                      <?php echo e(Form::close()); ?>

                    </div>
                    <!-- #respond -->
                  </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <div id="comments">
                <?php if(count($review)>0): ?>
                <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rev): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="single-review">
                    <h4><i class="fa fa-user"></i> <?php echo e($rev->name); ?> - <small class="text-success"> <?php echo e($rev->rating); ?><i class="fa fa-star"></i></small>
                  <?php if(Auth::check()): ?>
                    <?php if($rev->fk_user_id==Auth::user()->id): ?>
                    <small class="pull-right"><a href="#editModal<?php echo e($rev->id); ?>" data-toggle="modal" class="fa fa-pencil-square text-primary"></a></small>
                    <?php endif; ?>
                  <?php endif; ?>
                    </h4>
          
                    <h6><?php echo e($rev->comment); ?></h6>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php else: ?>
                  <p class="woocommerce-noreviews">There are no reviews yet.</p>
                <?php endif; ?>
                </div>
                <?php if(Auth::check()!=true): ?>
                           <div class="col-md-12">
                              <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-sign-in"></i> For submit your review please login</div>
                                <div class="panel-body">
                                  <div class="col-md-8 col-md-offset-2">
                                    <form class="form-inline" action="<?php echo e(url('/login')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                      <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <label class="sr-only" for="email">Email</label>
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <label class="sr-only" for="password">Password</label>
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                          <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                        </div>
                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="ft-link-p">
                                            <a href="<?php echo e(url('/reset-password')); ?>" title="Forgot your password">Forgot your password?</a>
                                        </div>
                                        <br>
                                        
                                        <div class="actions">
                                            <div class="submit-login">          
                                                <input type="submit" class="button btn-submit-login" name="login" value="Login"/> or <a href="<?php echo e(URL::to('register')); ?>">Registration</a>
                                            </div>
                                        </div>

                                    </form>
                                  </div>
                                    

                                </div>
                              </div>
                          </div>
                  <?php endif; ?>
              
                <div class="clear"></div>
              
                  </div>  
                </div><!-- /.tab-pane -->

                <!-- /.tab-pane -->

              </div><!-- /.tab-content -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.product-tabs -->

        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product related_product wow fadeInUp">
  <h3 class="section-title">RELATED PRODUCTS</h3>
  <div class="psell-product outer-top-xs">
        
    
  <?php $__currentLoopData = $related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
     <div class="item item-carousel col-md-3">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href='<?php echo e(URL::to("$product->link")); ?>'>
                    <?php if($products_photo[$product->id]){ ?>
                    <img src="<?php echo e(asset($products_photo[$product->id])); ?>" alt="<?php echo e($product->item_name); ?>">
                    <?php }else{ ?>
                    <img src="<?php echo e(asset('public/img/item/default.png')); ?>" alt="">
                    <?php } ?>
                    </a> </div>
                    <!-- /.image -->
                    
                    <!-- <div class="tag sale"><span>sale</span></div> -->
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href='<?php echo e(URL::to("$product->link")); ?>'><?php echo e($product->item_name); ?></a></h3>
                    <div class="star-ratings-sprite"><span style="width:<?php echo e($product->rating); ?>%" class="star-ratings-sprite-rating"></span></div>
                    <div class="product-price"> <span class="price">TK:<?php echo e($product->sale_price); ?> </span> <span class="price-before-discount">TK:<?php echo e($product->regular_price); ?></span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <a href='<?php echo e(URL::to("$data->link")); ?>' data-toggle="tooltip" class="btn btn-primary icon" type="button" title="" data-original-title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                              </li>
                              <? 
                              if(Auth::check()){

                                $userId=Auth::user()->id;
                                $wish=App\Model\Wishlist::where(['fk_item_id'=>$data->id,'fk_user_id'=>$userId])->count();

                              }else{
                                $userId='';
                                $wish=0;
                              }
                               ?>
                              <li class="lnk wishlist"> 
                              <?php if($wish>0): ?>
                                 <a data-toggle="tooltip" class="add-to-cart" data-original-title="Added to Wishlist"> <i class="icon fa fa-heart text-danger"></i> </a> 
                              <?php else: ?>
                                <a data-toggle="tooltip" class="add-to-cart" href='<?php echo e(URL::to("wishlist-store?fk_item_id=$data->id&fk_user_id=$userId")); ?>' title="" data-original-title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
                              <?php endif; ?>
                              </li>
                            </ul>
                          </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?><!-- /.item -->
      </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rev): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($rev->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Review</h4>
      </div>
        <?php echo Form::open(array('route' => ['review.update',$rev->id],'class'=>'form-horizontal','method'=>'PUT')); ?>

      <div class="modal-body">
      <label>Your Rating</label>
      <div class="col-md-12 rating-radio">
      <? for ($i=1; $i < 6; $i++) { ?>
      <input type="radio" value="<?php echo e($i); ?>" name="rating" id="raitng-<?php echo e($i); ?>" <?php echo e(($rev->rating==$i)?'checked':''); ?>>
        <label for="raitng-<?php echo e($i); ?>"><i class="fa fa-star<?php echo e(($rev->rating==$i)?'':'-o'); ?>"></i></label>
      <?} ?>
        
      </div>
    <p class="comment-form-comment">
      <label for="comment col-md-12">Your Review</label>
      <textarea class="col-md-12" id="comment" name="comment" cols="45" rows="8" aria-required="true"><?php echo e($rev->comment); ?></textarea>
    </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo e(Form::submit('Save changes',array('class'=>'btn btn-info'))); ?>

      </div>
    <?php echo Form::close(); ?>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
      
      </div><!-- /.col -->
      <div class="clearfix"></div>
    </div><!-- /.row -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  </div><!-- /.container -->
</div><!-- /.body-content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/jqzoom/js/jquery.jqzoom-core.js')); ?>"></script> 

<script>
  $(document).ready(function() {
    $('.jqzoom').jqzoom({
              zoomType: 'reverse',
              lens:true,
              preloadImages: false,
              alwaysOn:false,
              zoomWidth: 550,  
            zoomHeight: 350
          });
    
  });
</script>
<script>
    $("#share").jsSocials({
      url:"<?php echo e(URL::to('')); ?>",
      shareIn: "popup",
      text: '<?php echo e($product_details->item_name); ?> | <?php echo e(URL::to("$product_details->link")); ?>',
      showLabel: false,
      showCount: false,
      shares: ["email", "twitter", "googleplus", "linkedin"]
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>