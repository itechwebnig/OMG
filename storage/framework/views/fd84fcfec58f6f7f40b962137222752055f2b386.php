
<?php $__env->startSection('content'); ?>
<h3 class="box_title">Page Details
  <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-default pull-right viewAll"> <i class="ion ion-navicon-round"></i>&nbsp; View All</a> 
  <a href="<?php echo e(route('pages.edit',$data->id)); ?>" class="btn btn-default pull-right"> <i class="fa fa-pencil-square-o"></i> Edit</a> 
 </h3>
    <section class="col-md-12">
        <div class="hotel-view-main padding-top padding-bottom">
            <div class="p">
                <div class="journey-block">
                <?php if(isset($data['photo'][0])): ?>
                    <div class="timeline-custom-col">
                        <div class="image-hotel-view-block">
                            <div class="slider-for group1">
                            <?php $__currentLoopData = $data['photo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="item"><img class="page_img" src="<?php echo e(asset('public/img/pages/'.$photo->photo)); ?>" alt="<?php echo e($data->name); ?>"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-12">
                        <div class="service_head">
                            <h2><?php echo e($data->name); ?></h2>
                            <div class="service_info">
                                <h5><b>Title: </b> <?php echo e($data->title); ?></h5>
                            </div>
                            <p><? echo $data->description ?></p>
                        </div>
                    </div><!-- End col-md-11 -->

                    
    </section>
<!-- STYLE CSS-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>