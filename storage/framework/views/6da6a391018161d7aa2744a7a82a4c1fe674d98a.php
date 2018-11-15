<?php 
$info=DB::table('about_company')->first();
 $social_link=DB::table('social_links')->get();
 $categories=DB::table('category')->where('status',1)->orderBy('serial_num','asc')->get();
 ?>

 <?php if(\Session::has('commonData')){
        $commonData=\Session::get('commonData');
        $info=$commonData['primaryInfo'];
  $currency_symbol=$commonData['primaryInfo']->currency_symbol;

    }
    if(Session::has('metaDescription')){
        $metaDescription=Session::get('metaDescription').', '.$info->short_description;
    }else{
        $metaDescription=$info->company_name.', '.$info->short_description;
    }
    if(Session::has('title_msg')){
        $title=Session::get('title_msg')." |  ".$info->company_name;
    }else{
        $title=$info->company_name." | The Best Online Shopping";
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="<? echo $metaDescription; ?>">
<meta name="author" content="<?php echo e($info->company_name); ?>">
<meta name="keywords" content="<?php echo e($info->company_name.', '.$info->meta_keywords); ?>">
<meta name="robots" content="all">

<meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<? echo $title; ?>" />
<meta property="og:description" content="<? echo $metaDescription; ?>" />
<?php if(isset($ogImage)): ?>
<? $itemSmallPhoto=URL::to("$ogImage");?>
<meta property="og:image" content="<?php echo e($itemSmallPhoto); ?>" />
<?php else: ?>
<meta property="og:image" content="<?php echo e(asset($info->logo)); ?>" />
<?php endif; ?>

<title><? echo $title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset($info->favicon)); ?>">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>">
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

<!-- Customizable CSS -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/main.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/blue.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/owl.carousel.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/owl.transitions.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/animate.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/rateit.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/jqzoom/css/jquery.jqzoom.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/jssocials/jssocials.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/jssocials/jssocials-theme-flat.css')); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.css">
<!-- Icons/Glyphs -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/font-awesome.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/custom.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/custom1.css')); ?>">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="header-top-inner">

        <div class="cnt-account pull-left">
          <ul class="custom-list list-unstyled">
            
            
           
            <li><a href="#"><i class="icon fa fa-phone"></i><?php echo e($info->mobile_no); ?></a></li>
            <li><a href="#"><i class="icon fa fa-envelope-o"></i><?php echo e($info->email); ?></a></li>
          </ul>
        </div>
        <!-- /.cnt-account -->
        
       
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
        </div>
        <div class="col-md-6">
<div class="top-login social_icon">
  <ul>
  <?php $__currentLoopData = $social_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_link): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li><a href="<?php echo e($s_link->link); ?>" target="_blank" title="<?php echo e($s_link->name); ?>"><i class="fa <?php echo e($s_link->icon_class); ?>"></i></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   
  </ul>
</div>

             
           <?php if(Auth::guest()): ?>
              <div class="block-action-header top-link-account login-link pull-right">
                  <div class="top-login pull-left">
                    <ul>
                      <li><a style="margin-right: 10px" href="<?php echo e(url('login')); ?>" ><span> <i class="fa fa-share-square-o"></i> Login</span></a> </li>
                    </ul>
                  </div>
                  <div class="top-login pull-left">
                    <ul>
                      <li><a href="<?php echo e(URL::to('register')); ?>" ><span><i  class="fa fa-lock"></i> Sign up</span></a> </li>
                    </ul>
                  </div>

                </div>
                <div class="block-action-header top-link-account login-link pull-right">
                  <div class="top-login pull-left">
                    <ul>
                     <li><a href="<?php echo e(URL::to('cart')); ?>"><i style="margin-left: 10px" class="icon fa fa-shopping-cart"></i> My Cart</a></li>
                    </ul>
                  </div>
                  <div class="top-login pull-left">
                    <ul>
                      <li style="margin-right: 10px;"><a href="<?php echo e(URL::to('cart')); ?>"><i style="margin-left: 10px;margin-left: 10px" class="icon fa fa-check"></i> Checkout</a></li>
                    </ul>
                  </div>

                </div>
                                <?php else: ?>
                                <!-- USER ACCOUNT -->

                         <div class="control-group">
                <ul class="categories-filter custom_drop_down animate-dropdown">
                  <div class="block-action-header top-link-account login-link">
                  <div class="top-login pull-left">
                    <ul>
                     <li><a href="<?php echo e(URL::to('wishlist')); ?>"><i style="margin-left: 10px" class="icon fa fa-heart"></i> Wishlist</a></li>
                    </ul>
                  </div>
                  <div class="top-login pull-left">
                    <ul>
                     <li><a href="<?php echo e(URL::to('cart')); ?>"><i style="margin-left: 10px" class="icon fa fa-shopping-cart"></i> My Cart</a></li>
                    </ul>
                  </div>

                </div>
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html"><i style="margin-left: 10px" class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(URL::to('/myOrderList')); ?>">My Order List</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(URL::to('/myProfile')); ?>">My Profile</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>
                      <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"> <?php echo e(csrf_field()); ?> 
                      </form> 
                    </li>
                     
                    </ul>
                  </li>

                </ul>
              
                </div>
                <?php endif; ?>
              
        </div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="<?php echo e(URL::to('/')); ?>"> <img src="<?php echo e(asset($info->logo)); ?>" alt="<?php echo e($info->company_name); ?>"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search_area">
          <?php echo Form::open(['url'=>'search','method'=>'get']); ?>

            <div class="form-group">
              <div class="col-md-3 no-padding">
                <select class="form-control" name="category" placeholder="Select Category" id="searchCategory">
                    <option value="all">Select Category</option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" 
                      <?php if(isset($search)): ?>
                      <?php echo e(($search['category']==$cat->id)?'selected':''); ?>

                      <?php endif; ?>
                      ><?php echo e($cat->category_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
                  </select>
              </div>
              <div class="col-md-8 no-padding">
                <input type="text" name="keywords" placeholder="Search here..." class="form-control" value="<?php echo e(isset($search['keywords'])?$search['keywords']:''); ?>" id="searchItem" required>
              </div>
              <div class="col-md-1 no-padding">
                <button class="btn btn-warning"><i class="fa fa-search"></i></button>
              </div>
            </div>
          <?php echo Form::close(); ?>

          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="<?php echo e(URL::to('cart')); ?>" class="dropdown-toggle lnk-cart" >
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count"><?php echo((Cart::count()>0) ?Cart::count() : '0'); ?></span></div>
              <div class="total-price-basket"> <span class="total-price"> <span class="sign">TK </span><span class="value"><?php echo e(Cart::total()); ?></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="<?php echo e(asset('public/frontend/images/cart.jpg')); ?>" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="http://www.themesground.com/flipmart-demo/HTML/index.php?page-detail">Simple Product</a></h3>
                      <div class="price">$600.00</div>
                    </div>
                    <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <?php $menus=DB::table('menu')->orderby('serial_num','ASC')->where('status',1)->get(); ?>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
             
              <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <?php $subMenu=DB::table('sub_menu')->where('status',1)->where('fk_menu_id',$menu->id)->get();?>
              <!--   <li class="active dropdown yamm-fw"> <a href='<?php echo e(URL::to("$menu->url")); ?>' data-hover="dropdown"  ><?php echo e($menu->name); ?></a> </li> -->
               
               
               
                
                
                
                <li class="dropdown"> <a href='<?php echo e(URL::to("$menu->url")); ?>' class="dropdown-toggle" data-hover="dropdown" ><?php echo e($menu->name); ?></a>
                <?php if(count($subMenu)>0): ?>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                          
                            <ul class="links">
                            <?php $__currentLoopData = $subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <li><a href='<?php echo e(URL::to("$s_menu->url")); ?>'><?php echo e($s_menu->name); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              
                            </ul>
                            
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                    <?php endif; ?>
                </li>
              
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                
               <li class="dropdown  navbar-right special-menu"> <a href="<?php echo e(URL::to('todays-offer')); ?>">Todays offer</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>