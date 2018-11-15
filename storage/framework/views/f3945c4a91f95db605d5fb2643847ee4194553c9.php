
<?php $__env->startSection('content'); ?>
  <div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
          <li class='active'><?php echo e($category->category_name); ?></li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'>
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> <?php echo e($category->category_name); ?></div>

            <nav class="yamm megamenu-horizontal categoryMenu">
              <ul class="nav">
              <?php $__currentLoopData = $subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <? $subSub=App\Model\SubSubCategory::where(['fk_sub_category_id'=>$s_category->id,'status'=>1])->orderBy('serial_num','ASC')->pluck('sub_name','link'); ?>
                <li> <a href='<?php echo e(URL::to("category/$s_category->cat_link/$s_category->link")); ?>'><?php echo e($s_category->sub_category_name); ?></a><?php if(count($subSub)>0): ?> <button class="btn btn-xs pull-right btn-warning " data-toggle="collapse" href="#subSubMenu<?php echo e($s_category->id); ?>" ><i class="fa fa-plus"></i></button> 
                  <ul  id="subSubMenu<?php echo e($s_category->id); ?>" class="panel-collapse collapse categorySubMenu">
                    
                     <?php $__currentLoopData = $subSub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link => $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <li><a href='<?php echo e(URL::to("category/$s_category->cat_link/$s_category->link/$link")); ?>'><i class="fa fa-angle-double-right"></i> <?php echo e($name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <!-- /.menu-item -->
                
              </ul>
              <!-- /.nav --> 
            </nav>
            <!-- /.megamenu-horizontal --> 
          </div>
          <!-- /.side-menu --> 
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

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
                    <?php if($products_photo[$data->id]){ ?>
                    <img style="max-height: 190px" src="<?php echo e(asset($products_photo[$data->id])); ?>" alt="<?php echo e($data->item_name); ?>">
                    <?php }else{ ?>
                    <img style="min-height: 190px"   src="<?php echo e(asset('public/img/item/default.png')); ?>" alt="">
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
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Recent Items</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            <?php $__currentLoopData = $recentProduct-> chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="item">
                <div class="products special-product">
                <?php $__currentLoopData = $s_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="rows product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href='<?php echo e(URL::to("$data->link")); ?>'>
                    <?php if($recent_photo[$data->id]){ ?>
                    <img src="<?php echo e(asset($recent_photo[$data->id])); ?>" alt="<?php echo e($data->item_name); ?>">
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
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'> 
          <!-- ========================================== SECTION – HERO =========================== -->
          <div class="search-result-container category_item">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">

                  <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            
                            <div class="image"> <a href='<?php echo e(URL::to("$data->link")); ?>'>
                              <?php if($product_photo[$data->id]){ ?>
                              <img  src="<?php echo e(asset($product_photo[$data->id])); ?>" alt="<?php echo e($data->item_name); ?>">
                              <?php }else{ ?>
                              <img   src="<?php echo e(asset('public/img/item/default.png')); ?>" alt="">
                              <?php } ?>
                              </a> 
                              </div>
                            <!-- /.image -->
                            
                            <div class="tag new"><span>new</span></div>
                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href='<?php echo e(URL::to("$data->link")); ?>'><?php echo e($data->item_name); ?></a></h3>
                            <div class="star-ratings-sprite"><span style="width:<?php echo e($data->rating); ?>%" class="star-ratings-sprite-rating"></span></div>
                            <div class="product-price"> <span class="price">TK:<?php echo e($data->sale_price); ?></span> <span class="price-before-discount">TK:<?php echo e($data->regular_price); ?></span> </div>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <!-- /.item -->
                    
                   
                    <!-- /.item -->
                    
                   
                    <!-- /.item -->
                    
                  
                    <!-- /.item --> 
                  </div>
                  <!-- /.row --> 
                </div>
                <!-- /.category-product --> 
                
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane "  id="list-container"></div>
              <!-- /.tab-pane #list-container --> 
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="">
                 <?php echo e($allData->render()); ?>

                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right --> 
              
            </div>
            <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container --> 
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>