<?php $__env->startSection('content'); ?>
<!--mini statistics start-->


 <!--mini statistics start-->
<div class="row">
<?php if(Auth::user()->type!=3): ?>
    <div class="col-md-3">
<?php else: ?>
    <div class="col-md-6">

<?php endif; ?>
        <a href="<?php echo e(URL::to('/viewItems')); ?>">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon orange"><i class="fa fa-list"></i></span>
                <div class="mini-stat-info">
                    <span><? echo $allData['total_item'] ?></span>
                    Total Items
                </div>
            </div>
        </a>
    </div>
    <?php if(Auth::user()->type!=3): ?>
    <div class="col-md-3">
<?php else: ?>
    <div class="col-md-6">

<?php endif; ?>
        <a href="<?php echo e(URL::to('/categories')); ?>">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon tar"><i class="fa fa-th-list"></i></span>
                <div class="mini-stat-info">
                    <span><? echo $allData['total_category'] ?></span>
                   Total Category
                </div>
            </div>
        </a>
    </div>
    <?php if(Auth::user()->type!=3): ?>
    <div class="col-md-3">
        <a href="<?php echo e(URL::to('/order')); ?>">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon pink"><i class="fa fa-list-ul"></i></span>
                <div class="mini-stat-info">
                    <span><? echo $allData['total_order'] ?></span>
                    Total Order
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
       <a href="#"> 
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green"><i class="fa fa-list-alt"></i></span>
                <div class="mini-stat-info">
                    <span>0</span>
                    Total Blog Post
                </div>
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>
<!--mini statistics end-->
<div class="row">
<?php if(Auth::user()->type!=3): ?>
    <div class="col-md-6">
<?php else: ?>
    <div class="col-md-12">

<?php endif; ?>
        <!--notification start-->
        <section class="panel">
            <header class="panel-heading">
                Recent Item <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-cog"></a>
                <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
            <? foreach ($allData['item'] as $item) {?>
               
                <div class="alert alert-info clearfix">
                    <span class="alert-icon"><i class="fa fa-dot-circle-o"></i></span>
                    <div class="notification-info">
                        <ul class="clearfix notification-meta">
                            <li class="pull-left notification-sender"><span><a href='<?php echo e(URL::to("singleItem/$item->id")); ?>'><?php echo e($item->item_name); ?></a></span> </li>
                            <li class="pull-right notification-time"><a href='<?php echo e(URL::to("itemUpdate/$item->id")); ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
                        </ul>
                        <p>
                            At : <?php echo e(substr($item->created_at,0,10)); ?>

                        </p>
                    </div>
                </div>
           <? } ?>
            </div>
        </section>
        <!--notification end-->
    </div>
    <?php if(Auth::user()->type!=3): ?>
    <div class="col-md-6">
        <!--todolist start-->
        <section class="panel">
            <header class="panel-heading">
                Recent Order <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-cog"></a>
                <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <ul class="to-do-list" id="sortable-todo">
                <? foreach ($allData['order'] as $order) {?>
                    <li class="clearfix">
                        <span class="drag-marker">
                        <i></i>
                        </span>
                        <div class="todo-check pull-left">
                            <input type="checkbox" value="None" id="todo-checks"/>
                            <label for="todo-check"></label>
                        </div>
                        <p class="todo-title">
                        <? echo $order->email ?>
                        </p>
                        <div class="todo-actionlist pull-right clearfix">
                            <a href='<?php echo e(URL::to("/order/$order->id")); ?>' class="todo-edit"><i class="ico-eye"></i></a>
                        </div>
                    </li>
                    <?}?>
                </ul>
                <div class="todo-action-bar">
                    <div class="row">
                        
                        <div class="col-xs-4 btn-add-task">
                            <a href='<?php echo e(URL::to("/order")); ?>' class="btn btn-default btn-primary"><i class="fa fa-list"></i> View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--todolist end-->
    </div>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>