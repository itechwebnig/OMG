
<?php $__env->startSection('content'); ?>
      
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <?php if(Request::path()=='/'): ?>
      <?php echo $__env->make('frontend._partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">  
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
          <?php $__currentLoopData = $allslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="item" style="background-image: url(<?php echo e(asset($slider->slide_photo)); ?>);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><?php echo e($slider->top_caption); ?></div>
                  <div class="big-text fadeInDown-1"> <?php echo e($slider->slide_caption); ?></div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span><?php echo e($slider->bottom_caption); ?></span> </div>
                  <?php if($slider->fk_category_id!=null): ?>
                  <div class="button-holder fadeInDown-3"> <a href='<?php echo e(URL::to("category/$slider->link")); ?>' class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  <?php endif; ?>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <!-- /.item -->
            
           
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
            <?php $__currentLoopData = $salesSupport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="col-md-4 col-sm-4 col-lg-4">
              <a href="<?php echo e($support->link); ?>">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green"><?php echo e($support->title); ?></h4>
                    </div>
                  </div>
                  <h6 class="text"><?php echo e($support->sub_title); ?></h6>
                </div>
              </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <br>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== -->
      <? $adi=0; ?>
      <?php $__currentLoopData = $homecategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <? $adi++; ?>
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left"><?php echo e($category->category_name); ?></h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
               <?php $__currentLoopData = $homeSub[$category->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subCat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <li class="<?php echo e(($key==0)?'active':''); ?>"><a data-transition-type="backSlide" href="#cat_<?php echo e($subCat->fk_category_id); ?>_sub_<?php echo e($subCat->id); ?>" data-toggle="tab"><?php echo e($subCat->sub_category_name); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
          <?php $__currentLoopData = $homeSub[$category->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $subCats): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="tab-pane <?php echo e(($key==0)?'in active':''); ?>" id="cat_<?php echo e($subCats->fk_category_id); ?>_sub_<?php echo e($subCats->id); ?>">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                <?php $__currentLoopData = $homeproduct[$subCats->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="item item-carousel mix <?php echo e($category->id); ?>_<?php echo e($product->fk_sub_category_id); ?>">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href='<?php echo e(URL::to("$product->link")); ?>'>
                          <?php if($product->small_photo){ ?>
                          <img  src="<?php echo e(asset($product->small_photo)); ?>" alt="<?php echo e($product->item_name); ?>">
                          <?php }else{ ?>
                          <img style="min-height: 190px"  src="<?php echo e(asset('public/img/item/default.png')); ?>" alt="">
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
                                <a href='<?php echo e(URL::to("$product->link")); ?>' data-toggle="tooltip" class="btn btn-primary icon" type="button" title="" data-original-title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                              </li>
                              <? 
                              if(Auth::check()){

                                $userId=Auth::user()->id;
                                $wish=App\Model\Wishlist::where(['fk_item_id'=>$product->id,'fk_user_id'=>$userId])->count();

                              }else{
                                $userId='';
                                $wish=0;
                              }
                               ?>
                              <li class="lnk wishlist"> 
                              <?php if($wish>0): ?>
                                 <a data-toggle="tooltip" class="add-to-cart" data-original-title="Added to Wishlist"> <i class="icon fa fa-heart text-danger"></i> </a> 
                              <?php else: ?>
                                <a data-toggle="tooltip" class="add-to-cart" href='<?php echo e(URL::to("wishlist-store?fk_item_id=$product->id&fk_user_id=$userId")); ?>' title="" data-original-title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
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
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane --> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs index_main_banner">
          <div class="row">
          <?php if(isset($advertisement[$adi])): ?>
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> 
                <a href="<?php echo e($advertisement[$adi]->link); ?>" target="_blank">
                <?php if($advertisement[$adi]->is_photo==1): ?>
                  <?php if($advertisement[$adi]->photo!=null): ?>
                  <? $adPhoto=$advertisement[$adi]->photo; ?>
                  <?php if(file_exists($adPhoto)): ?>
                  <img class="img-responsive" src='<?php echo e(asset("$adPhoto")); ?>' alt="<?php echo e($advertisement[$adi]->caption); ?>">
                  <?php endif; ?>
                  <?php endif; ?>
                <?php else: ?>
                <? echo $advertisement[$adi]->script ?>
                <?php endif; ?> 
                </a>
                </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
          <?php endif; ?>
          <? $adi+=1; ?>
          <?php if(isset($advertisement[$adi])): ?>
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> 
                <a href="<?php echo e($advertisement[$adi]->link); ?>" target="_blank">
                <?php if($advertisement[$adi]->is_photo==1): ?>
                  <?php if($advertisement[$adi]->photo!=null): ?>
                  <? $adPhoto=$advertisement[$adi]->photo; ?>
                  <?php if(file_exists($adPhoto)): ?>
                  <img class="img-responsive" src='<?php echo e(asset("$adPhoto")); ?>' alt="<?php echo e($advertisement[$adi]->caption); ?>">
                  <?php endif; ?>
                  <?php endif; ?>
                <?php else: ?>
                <? echo $advertisement[$adi]->script ?>
                <?php endif; ?> 
                </a>
                </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
          
          <?php endif; ?>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <!-- ============================================== SCROLL TABS ============================================== -->
       <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
             <?php $__currentLoopData = $allblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href='<?php echo e(URL::to("blog/$blog->link")); ?>'> <img src='<?php echo e(asset("$blog->photo")); ?>' alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href='<?php echo e(URL::to("blog/$blog->link")); ?>'><?php echo e($blog->title); ?></a></h3>
                    <span class="info"><?php echo e(date('jS M Y',strtotime($blog->created_at))); ?></span>
                    <a href='<?php echo e(URL::to("blog/$blog->link")); ?>' class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
       
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
       <!--  <?php $__currentLoopData = $allData['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo='<?php echo e(asset("public/img/brand/$brand->photo")); ?>' src='<?php echo e(asset("public/img/brand/$brand->photo")); ?>' alt="<?php echo e($brand->name); ?>" title="<?php echo e($brand->name); ?>"> </a> </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> -->
          <!--/.item--> 
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
      </div>
    <!-- /.container --> 
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>