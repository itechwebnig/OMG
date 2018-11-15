
   <div class="home_slider">
    <div class="container"> 
         <div class="row"> 
            <div class="col-md-9 padding-0"> 
                      <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

 <?php $allslider=DB::table('sliders')->leftJoin('category','sliders.fk_category_id','category.id')->select('sliders.*','category.link')->where('sliders.status',1)->orderBy('sliders.serial_num','asc')->get(); ?>

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


    
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
           <?php $salesSupport=DB::table('sales_support')->where('status',1)->orderby('serial_num','ASC')->get(); ?>
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
        <!-- =========== INFO BOXES : END ================= -->
   </div>
            </div>
             <div class="col-md-3"> 
                <div class="promote_img"> 
                  <?php $advartise=DB::table('ad_manager')->where('status',1)->take(2)->where('fk_page_id',5)->orderby('serial_num',1)->get();?>
                  <?php $__currentLoopData = $advartise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                   <img src="<?php echo e($ads->photo); ?>" alt="Promote Image">
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
             </div>
          </div>
    </div>

        

      </div>


