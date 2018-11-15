<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
<!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal main_mega_menu">
            <ul class="nav">
            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?
              $bigMenu=1;
               $totalSub=count($all_sub_category[$category->id]);
               if($totalSub<6){
                  $bigMenu=0;
                }

            ?>
              <li class="dropdown menu-item"> 
              
              <a href='<?php echo e(URL::to("category/$category->link")); ?>' class="dropdown-toggle"
              ><i class="icon <?php echo e($category->icon_class); ?>" aria-hidden="true"></i> <?php echo e($category->category_name); ?></a>
                <?php if(count($all_sub_category[$category->id])>0): ?>
                <?
                
                $totalSub=count($all_sub_category[$category->id]);
                  $chunk=ceil($totalSub/3);
                ?>
                 <ul class="dropdown-menu mega-menu big_menu">
                <?php $__currentLoopData = $all_sub_category[$category->id]-> chunk($chunk); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                   <li class="column_one">
                    <ul>
                       <?php $__currentLoopData = $s_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <li><a href='<?php echo e(URL::to("category/$category->link/$data->link")); ?>'><?php echo e($data->sub_category_name); ?></a>
                        <? $subSub=App\Model\SubSubCategory::where(['fk_sub_category_id'=>$data->id,'status'=>1])->orderBy('serial_num','ASC')->pluck('sub_name','link'); ?>
                        <ul class="sub-sub-menu">
                          <?php $__currentLoopData = $subSub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link => $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <li><a href='<?php echo e(URL::to("category/$category->link/$data->link/$link")); ?>'><?php echo e($name); ?></a></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          
                        </ul>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                 </ul>
                <?php endif; ?>

                  <!-- /.yamm-content -->
                <!-- /.dropdown-menu --> 
                </li>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              <!-- /.menu-item -->
              
             
              <!-- /.menu-item -->
              
            
              <!-- /.menu-item -->
            
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
          <?php $__currentLoopData = $allData['topOffers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                  <div class="image">
                  <a href='<?php echo e(URL::to("$offer->link")); ?>'>
                    <?php if(file_exists($photo)): ?>
                    <img src='<?php echo e(asset("$photo")); ?>' alt=""> 
                    <?php else: ?>
                    <img src='<?php echo e(asset("public/img/item/default.png")); ?>' alt=""> 

                    <?php endif; ?>
                  </a>
                  </div>
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
        <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">

            <div class="tag-list"> 
              <? $i=0; ?>
              <?php $__currentLoopData = $allData['homeTag']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <? $i++; ?>
              <a class="item <?php echo e(($i==2)?'active':''); ?>" title="<?php echo e($tag->sub_category_name); ?>" href='<?php echo e(URl::to("category/$tag->cat_link/$tag->sub_link")); ?>'><?php echo e($tag->sub_category_name); ?></a> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

             </div>
            <!-- /.tag-list --> 

          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
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
                    <img src="<?php echo e(asset($products_photo[$data->id])); ?>" alt="<?php echo e($data->item_name); ?>">
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
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Geet Offer Newsletter!</p>
              <?php echo Form::open(array('url' => 'subscribe-store','class'=>'form-horizontal')); ?>

              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Valid Email Address" required="">
              </div>
              <button class="btn btn-primary" >Subscribe</button>
              <?php echo Form::close(); ?>

          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
          <?php $__currentLoopData = $allData['reviews']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="item">
              <div class="avatar"><img src='<?php echo e(asset("$review->photo")); ?>' alt="<?php echo e($review->name); ?>"></div>
              <div class="testimonials"><em>"</em><?php echo e($review->description); ?><em>"</em></div>
              <div class="clients_author"><?php echo e($review->name); ?> <span><?php echo e($review->designation); ?></span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
</div>