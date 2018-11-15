
<?php $__env->startSection('content'); ?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'><?php echo e($page->name); ?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
    <div class="container">
        <div class="row">
            <div class="single-page">
                
            
            <div class="col-md-3">
                <div class="sidebar-module-container">
                    <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                        <h3 class="section-title">Read more here</h3>
                        <div class="sidebar-widget-body m-t-10">
                            <ul class="singlePageUl">
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link => $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li><a class="<?php echo e(($link==$page->link)?'active':''); ?>" href='<?php echo e(URL::to("page/$link")); ?>'><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo e($name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="wrapper-contact-style singlePageContent">
                    <h3><?php echo e($page->title); ?></h3>
                    <hr>
                    <?php if(count($pagePhoto)>0): ?>
                    <div id="hero">
                      <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                      <?php $__currentLoopData = $pagePhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="item" style="background-image: url(<?php echo e(asset('public/img/pages/'.$data->photo)); ?>);"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </div>
                      <!-- /.owl-carousel --> 
                    </div>
                    <?php endif; ?>
                    <div class="about-us-wrapper">
                        <br>
                        <div class="text"><?php echo $page->description; ?></div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>