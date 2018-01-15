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
    <?php echo $__env->yieldContent('style'); ?>
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
          <a class="nav-link" href="<?php echo e(url('/about')); ?>"> About Us</a>
        </li>
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
<!-- <div class="ssk-sticky ssk-right ssk-center ssk-lg">
    <a href="" class="ssk ssk-facebook" data-url="https://www.facebook.com/Graphicard-154392717914639/"></a>
    <a href="" class="ssk ssk-twitter" data-url="https://www.facebook.com/Graphicard-154392717914639/" data-text="Home of quality printed products"></a>
    <a href="" class="ssk ssk-linkedin" data-url="https://www.facebook.com/Graphicard-154392717914639/"></a>
    <a href="" class="ssk ssk-email"></a>
</div> -->

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
                            

                            <h5 style="color:gold;">Services Offered</h5>
                         </div>

              <?php if(count($comp) != 0 ): ?>
              <?php 
              $sample = explode("</p>",$comp->services_offered);
              $ctr = count($sample);
              $limit = $ctr/2;
              $col1 = "";
              $col2 = "";
              for($x=0;$x<$ctr;$x++){
                if($x>$limit-1){ //2nd column
                  $col2 = $col2 . "<li>". $sample[$x] . "</li>";
                }
                else{
                  $col1 = $col1 . "<li>". $sample[$x] . "</li>";
                }
              }
              ?>
                <div class="row" style="margin-left:25px;">
                    <div class="col-sm-6">
                    <ul>
                        <?php
                          echo $col1;
                        ?>
                    </ul>
                    </div>
                    <div class="col-sm-6">
                    <ul>    
                      <?php
                          echo $col2;
                        ?>
                    </ul>
                    </div>
                </div>
                <?php else: ?>
                <div class="row" style="margin-left:25px;">
                    <div class="col-sm-6">
                    <ul>
                        <li>Sample Service</li>
                    </ul>
                    </div>
                    <div class="col-sm-6">
                    <ul>
                        <li>Sample Service</li>
                    </ul>
                    </div>
                </div>
                <?php endif; ?>
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
                              <li><a target="_blank" href="<?php echo e($sns->facebook); ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                              <li><a target="_blank" href="<?php echo e($sns->twitter); ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                              <!-- <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li> -->
                              <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
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
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/social/dist/js/social-share-kit.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
    <script>
        SocialShareKit.init();

        $(document).ready(function() {
          $('.select2').select2();
          
        } );
    </script>
    <?php echo $__env->yieldContent('script'); ?>
  </body>

</html>
