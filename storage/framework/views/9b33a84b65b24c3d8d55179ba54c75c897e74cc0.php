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

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet'>
  </head>

  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbg fixed-top" id="mainNav">
      <div class="container">
<?php if(count($comp) != 0 ): ?>
<a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($comp->company_logo)); ?>" style="max-width:50px; max-height:50px;"><?php echo e($comp->company_name); ?></a>
<?php else: ?>
<a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="">Company Name</a>
<?php endif; ?>
    <button class="navbar-toggler navbar-toggler-right custom-toggler"  type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color:yellow;"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/about')); ?>">About</a>
        </li>

       <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">   
               <?php if(count($post->Type) != 0): ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e($post->name); ?>

                      </a>          
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                  <?php $__currentLoopData = $post->Type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                        <a class="dropdown-item" href="<?php echo e(url('/ServiceItem', $post->id)); ?>"><?php echo e($type->name); ?></a>
                      
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                 </li>
              <?php else: ?>
                             <?php echo e($post->categoryId); ?>


                  <a class="nav-link" href="<?php echo e(url('/ServiceItem', $post->id)); ?>"><?php echo e($post->name); ?></a>
              <?php endif; ?>
            </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php if($user = Auth::user()): ?>
   
          
       <?php elseif(Auth::guest()): ?>
       <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/login')); ?>">Login</a>
        </li>
       <?php endif; ?>
        
      </ul>
    </div>
  </div>
</nav>
<?php echo $__env->yieldContent('contents'); ?>;

    <!-- Footer -->
    <footer class="py-5" id="foot">
      <div class="container" style="background:; color:white;">
        <div class="row"> 
            <div class="col-lg-6"> 
            <div align="center" style="color:white; background:; line-height:5px;">
                <?php if(count($comp) != 0 ): ?>
                <img src="<?php echo e(asset($comp->company_logo)); ?>">
                <h1 style="font-family: 'Roboto', sans-serif; margin-top:35px;" class="text-uppercase"><?php echo e($comp->company_name); ?></h1>
                <?php else: ?>
                <img src="">
                <h1 style="font-family: 'Roboto', sans-serif; margin-top:35px;" class="text-uppercase">Company Name</h1>
                <?php endif; ?>
                            
                            
                            <p class="lead" style="margin-top:-17px;">Digital printing and graphics design</p>
                            <h5 style="color:gold;">Services Offered</h5>
                         </div>
                <div class="row" style="margin-left:25px;">
                    <div class="col-sm-6">
                    <ul>    
                        <li>Digital offset printing</li>
                        <li>Large format printing</li>
                        <li>Photography</li>
                        <li>ID cards</li>
                    </ul>
                    </div>
                    <div class="col-sm-6">
                    <ul>    
                        <li>Novelty Items</li>
                        <li>Xerox</li>
                        <li>Risograph</li>
                        <li>T-shirt printing</li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="margin-top:20px;"> 
            <div align="center">
                            <h3 style="color:gold;">Find Us</h3>
                            <?php if(count($comp) != 0 ): ?>
                            <p class="lead"><?php echo e($comp->street); ?> <?php echo e($comp->brgy); ?>, <?php echo e($comp->city); ?></p>
                            <h3 style="color:gold;">Contact Us</h3>
                           
                            <?php echo e($comp->contactNumber); ?>

                            <br><?php echo e($comp->emailAddress); ?>

                            <?php else: ?>
                            <p class="lead">Street Brgy City</p>
                            <h3 style="color:gold;">Contact Us</h3>
                           
                            Contact Number
                            <br>Email Address
                            <?php endif; ?>
                            
                            <div style="margin-top:10px;">
                            <ul class="social-network social-circle">
                              <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>	
                            </div>
                        </div>
            </div>
        </div>
      </div>
      
      <!-- /.container -->
    </footer>
    <div class="container-fluid" style="background:#154360; height:30px;">
     <div align="center" style="margin-top:px;color:white;">
        <?php if(count($comp) != 0 ): ?>
          <small class="text-uppercase"><b>&copy; 2017, <?php echo e($comp->company_name); ?></b></small>
        <?php else: ?>
          <small class="text-uppercase"><b>&copy; Company name</b></small>
        <?php endif; ?>
    </div>
    
    </div>
    <?php if($user = Auth::user()): ?>
      <div class="container-fluid" style="background:#154360; height:30px;">
     <div align="center" style="margin-top:px;color:white;">
        <?php if(count($comp) != 0 ): ?>
          <a style="text-decoration:none; color:white" href="<?php echo e(url('/admin')); ?>" title="Go to admin"><small class="text-uppercase"><b><?php echo e($comp->company_name); ?> -  Admin</b></small></a>
        <?php else: ?>
          <a style="text-decoration:none; color:white" href="<?php echo e(url('/admin')); ?>" title="Go to admin"><small class="text-uppercase"><b>Company Name - Admin</b></small></a>
        <?php endif; ?>
    </div>
    
    </div>
          
       <?php elseif(Auth::guest()): ?>

       <?php endif; ?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/megamenu.js')); ?>"></script>
    <script src="<?php echo e(asset('js/navscroll.js')); ?>"></script>
   
  </body>

</html>
