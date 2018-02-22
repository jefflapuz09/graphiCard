<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php if(count($comp) != 0 ): ?>
  <link rel="icon" href="<?php echo e(asset($comp->company_logo)); ?>">

  <title><?php echo e($comp->company_name); ?></title>
  <?php else: ?> 

  <?php endif; ?>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('css/modern-business.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/megamenu.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">  
  <link href="<?php echo e(asset('css/button.css')); ?>" rel="stylesheet">  
  <link rel="stylesheet" href="<?php echo e(asset('vendor/social/dist/css/social-share-kit.css')); ?>">
  <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet'>
  <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet'>
  <link href="<?php echo e(asset('css/fontawesome-stars.css')); ?>" rel="stylesheet"> 
  <link href="<?php echo e(asset('css/contact.css')); ?>" rel="stylesheet"> 
  <link href="<?php echo e(asset('css/jquery-ui.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/inputmask.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/tagsinput.css')); ?>" rel="stylesheet">
  <?php echo $__env->yieldContent('style'); ?>
</head>

<body>
  <div class="fixed-top">
    <header class="topbar">
      <div class="container-fluid">
        <?php if(count($comp) != 0 ): ?>
        <div class="row" style="background-color:#f72028;color:white;padding:5px;">
        <!-- <div class="row" style="background-color:blue;color:white;padding:5px;"> -->
          <div class="col-md-6 col-sm-6">
            <div class="links  pull-left" style="padding-left:0px;margin-left: 0px;">
              <ul>
                <li style="display: inline-block"><i class="fa fa-phone"></i> <?php echo e($comp->contactNumber); ?> | </li>
                <li  style="display: inline-block"><i class="fa fa-envelope"></i> <?php echo e($comp->emailAddress); ?></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="links  pull-right">
              <ul>
                <?php if(Auth::guest()): ?>
                <li  style="display: inline-block"><a href="<?php echo e(url('/customer/login')); ?>" style="color:white"><i class="fa fa-user"></i> My Account </a> | </li>
                <?php elseif(Auth::check()&&count(Auth::user()->Employee)): ?>
                <li  style="display: inline-block"><a href="<?php echo e(url('/login')); ?>" style="color:white"><i class="fa fa-user"></i> My Account </a> | </li>
                <?php else: ?>
                <li  style="display: inline-block"><a href="<?php echo e(url('/myaccount')); ?>" style="color:white"><i class="fa fa-user"></i> My Account </a> | </li>
                <?php endif; ?>

                <li  style="display: inline-block"><a href="<?php echo e(url('/customer/cart/view')); ?>" style="color:white"><i class="fa fa-shopping-cart"></i> My Cart (<?php echo e(Cart::count()); ?>) items</a> | </li>

                <?php if(Auth::guest()): ?>
                <li  style="display: inline-block"><i class="fa fa-sign-in"></i> <a href="<?php echo e(url('/customer/login')); ?>" style="color:white"> Login </a> | <a href="<?php echo e(url('/customer/register')); ?>" style="color:white"> Register</a></li>
                <?php elseif(Auth::check()&&count(Auth::user()->Employee)): ?>
                <li  style="display: inline-block"><i class="fa fa-user"></i> <a href="<?php echo e(route('logout')); ?>" style="color:white"> Hi ADMIN </a></li>
                <?php else: ?>
                <li  style="display: inline-block"><i class="fa fa-user"></i> <a href="<?php echo e(route('logout')); ?>" style="color:white"> Hi <?php echo e(Auth::user()->Customer->firstName); ?> </a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <?php else: ?>
        <?php endif; ?>
      </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" style="font-weight: 700; font-family: 'Roboto', sans-serif; border-top:2px solid black">
      <div class="container">
        <?php if(count($comp) != 0 ): ?>
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($comp->company_logo)); ?>" style="max-width:50px; max-height:50px;color:yellow;"><?php echo e($comp->company_name); ?></a>
        <?php else: ?>
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="">Company Name</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">   
              <?php if(count($post->Type) != 0): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                  <?php echo e($post->name); ?>

                </a>          
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                  <?php $__currentLoopData = $post->Type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                  <a class="dropdown-item" href="<?php echo e(url('/ServiceItem', $type->id)); ?>" style="color:;"><?php echo e($type->name); ?></a>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </li>
              <?php else: ?>
              <?php echo e($post->categoryId); ?>

              <a class="nav-link" href="<?php echo e(url('/ServiceItem', $post->id)); ?>"><?php echo e($post->name); ?></a>
              <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/website/package')); ?>"> Packages</a>
            </li>
            <li class="nav-item">   
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                  Customer Service
                </a>          
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">               
                  <a class="dropdown-item" href="<?php echo e(url('/FAQs')); ?>" style="color:;">FAQs</a>
                  <a class="dropdown-item" href="<?php echo e(url('/Testimonial')); ?>" style="color:;">Company Feedback</a>
                  <a class="dropdown-item" href="<?php echo e(url('/AllItems')); ?>" style="color:;">Item Review</a>
                </div>
              </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/about')); ?>"> About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/Search')); ?>"><i class="fa fa-search" aria-hidden="true"> Search</i></a>
            </li>
          </ul>
        </div>
      </div>
      <!-- <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/about')); ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
        </li>
      </ul> -->
    </nav>
  </div>

<?php echo $__env->yieldContent('contents'); ?>
<footer style="width:100%;background-color: black;padding:20px">
  <div class="col-md-12">
  <div class="row">
     <?php if(count($comp) != 0 ): ?>
      <div style="display: flex; align-items: center; justify-content: center;color:white;font-family: 'Roboto', sans-serif; margin:0px auto">
      <span><img src="<?php echo e(asset($comp->company_logo)); ?>"></span>      
      <h1 style="font-family: 'Roboto', sans-serif;" class="text-uppercase"><?php echo e($comp->company_name); ?></h1>
      </div>
      <?php else: ?>
      <div style="display: flex; align-items: center; color:white;font-family: 'Roboto', sans-serif; ">
      <span><img src=""></span>
      <h1 style="font-family: 'Roboto', sans-serif;" class="text-uppercase">Company Name Here</h1>
      </div>
      <?php endif; ?>
  </div>
  <div class="row">
    <div class="col-md-4" style="color: white;">
        <h5 style="color:gold; text-align:center">Services Offered</h5>
        <?php if(count($comp) != 0 ): ?>
        <?php 
        $sample = explode("</p>",$comp->services_offered);
        $ctr = count($sample);
        $limit = $ctr/2;
        $col1 = "";
        $col2 = "";
        for($x=0;$x<$ctr;$x++){
        if($x>$limit-1){ //2nd column
          $col2 = $col2 . "<p>". $sample[$x] . "</p>";
        }
        else{
          $col1 = $col1 . "<p>". $sample[$x] . "</p>";
        }
      }
      ?>
      <div class="row">
        <div class="col-md-6">
          <ul>
            <?php
            echo $col1;
            ?>
          </ul>
        </div>
        <div class="col-md-6">
          <ul>   
            <?php
            echo $col2;
            ?>
          </ul>
        </div>
      </div>
      <?php else: ?>
      <div class="row">
        <div class="col-md-6">
          <ul>
            <li>Sample Service</li>
          </ul>
        </div>
        <div class="col-md-6">
          <ul>
            <li>Sample Service</li>
          </ul>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <div class="col-md-4"  style="color:white"> 
      <div class="row">        
        <div class="col-md-6">
        <h5 style="color:gold; text-align: center">Customer Services</h5>   
        <ul>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/FAQs')); ?>" style="color:;">FAQs</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/Testimonial')); ?>" style="color:;">Company Feedback</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/AllItems')); ?>" style="color:;">Item Review</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/AllItems')); ?>" style="color:;">Gallery</a></li>
        </ul>
        </div>     
        <div class="col-md-6">
          <h5 style="color:gold; text-align: center">About Us</h5>   
        <ul>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/FAQs')); ?>" style="color:;">Company Information</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/Testimonial')); ?>" style="color:;">Terms and Conditions</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/AllItems')); ?>" style="color:;">Privacy Policy</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="<?php echo e(url('/login')); ?>" style="color:;">Login as Admin</a></li>
        </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4" align="center">
      <h5 style="color:gold;">Find Us</h5>
      <?php if(count($comp) != 0 ): ?>
      <p style="color:white;"><?php echo e($comp->street); ?> <?php echo e($comp->brgy); ?>, <?php echo e($comp->city); ?></p>
      <h5 style="color:gold;">Contact Us</h5>
      <p style="color:white;"><?php echo e($comp->contactNumber); ?>

      <br><?php echo e($comp->emailAddress); ?></p>
      <?php else: ?>
      <p class="lead">Street Brgy City</p>
      <h3 style="color:gold;">Contact Us</h3>
      Contact Number
      <br>Email Address
      <?php endif; ?>
      <div style="margin-top:10px;">
      <ul class="social-network social-circle" >
      <?php if(count($sns)!=0): ?>
      <li><a target="_blank" href="<?php echo e($sns->facebook); ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a target="_blank" href="<?php echo e($sns->twitter); ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
      <?php else: ?>
      <li><a target="_blank" href="" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a target="_blank" href="" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a target="_blank" href="" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li> 
      <?php endif; ?>
      </ul> 
      </div>
    </div>
  </div>
  </div><!--END ROW-->
</footer>


<div class="container-fluid" style="background:red; height:30px;">
  <div align="center" style="margin-top:px;color:white;">
    <?php if(count($comp) != 0 ): ?>
    <small class="text-uppercase"><b>&copy; 2017, <?php echo e($comp->company_name); ?></b></small>
    <?php else: ?>
    <small class="text-uppercase"><b>&copy; Company name</b></small>
    <?php endif; ?>
  </div>

</div>
<?php if(Auth::user()->role==3): ?>

<?php elseif(Auth::guest()): ?>
<?php else: ?>
<div class="container-fluid" style="background:red; height:30px;">
  <div align="center" style="margin-top:px;color:white;">
    <?php if(count($comp) != 0 ): ?>
    <a style="text-decoration:none; color:white" href="<?php echo e(url('/admin')); ?>" title="Go to admin"><small class="text-uppercase"><b><?php echo e($comp->company_name); ?> -  Admin</b></small></a>
    <?php else: ?>
    <a style="text-decoration:none; color:white" href="<?php echo e(url('/admin')); ?>" title="Go to admin"><small class="text-uppercase"><b>Company Name - Admin</b></small></a>
    <?php endif; ?>
  </div>

</div>
<?php endif; ?>
<!-- Bootstrap core JavaScript -->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/megamenu.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/social/dist/js/social-share-kit.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.barrating.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('js/jscolor.js')); ?>"></script>
<script src="<?php echo e(asset('js/tagsinput.js')); ?>"></script>
<script>
  SocialShareKit.init();

  $(document).ready(function() {
    $('.select2').select2();

  } );
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
