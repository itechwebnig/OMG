
<?php $__env->startSection('content'); ?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Contact</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="container">
       <div class="row">
        <?php if(isset($aboutData)): ?>
            <div class="wrapper-contact-style">
                    <div class="about-us-wrapper">

                        <div class="text"><?php echo $aboutData->description; ?></div>
                    </div>
                </div>
                <!-- <div data-wow-delay="0.4s" class="about-us-image wow zoomInRight"><img src="<?php echo e(asset('public/img/about-us-4.png')); ?>" alt="" class="img-responsive"></div> -->
            </div>
        <?php endif; ?>
        </div>
		</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>