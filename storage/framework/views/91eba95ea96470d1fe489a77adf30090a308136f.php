<?php $__env->startSection('style'); ?>
<style>
  @import  url('https://fonts.googleapis.com/css?family=Poiret+One');
  @import  url('https://fonts.googleapis.com/css?family=Montserrat');
  </style>
  <style>
      
      .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?php echo e(asset('img/Preloader_3.gif')); ?>') center no-repeat #fff;
      }
  
       .titleload{
        position: relative;
        left:0;
        right:0;
        top: 100px;
  
      }
  </style>
  <link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>

<div class="se-pre-con">
      
      

</div>

<?php if(count($adv)!=0): ?>
<div class="container-fluid" style="background-color: darkslategray; margin-top:54px; color:white;">
  <div class="text-center">
  <?php echo $adv->advisory ?>
  </div>
</div>
<?php else: ?>
<div class="container-fluid" style="margin-top:60px;">
  <p style="text-align: center"></p>
</div>
<?php endif; ?>
<!-- <div class="row" style="margin-top:5px; margin-bottom">
  <img class="img-responsive" style="max-width:100%; max-height:10%;" height="150px" width="100%" src="<?php echo e(asset('img/promo-banner.png')); ?>" alt="">
</div> -->
<header style="margin-top:">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <?php if(count($ban)!=0): ?>
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" >
        <img class="img-responsive img-fluid" src="<?php echo e(asset($ban->banner)); ?>" width="100%">
        <div class="carousel-caption d-none d-md-block">
      <!-- <h3>First Slide</h3>
        <p>This is a description for the first slide.</p> -->
      </div>
    </div>
    <!-- Slide Two - Set the background image for this slide in the line below -->
    <div class="carousel-item">
      <img class="img-responsive" src="<?php echo e(asset($ban->banner2)); ?>" width="100%">
      <div class="carousel-caption d-none d-md-block">
      <!-- <h3>Second Slide</h3>
        <p>This is a description for the second slide.</p> -->
      </div>
    </div>
    <!-- Slide Three - Set the background image for this slide in the line below -->
    <div class="carousel-item">
      <img class="img-responsive" src="<?php echo e(asset($ban->banner3)); ?>" width="100%">
      <div class="carousel-caption d-none d-md-block">
      <!-- <h3>Third Slide</h3>
        <p>This is a description for the third slide.</p> -->
      </div>
    </div>
    <?php elseif(count($ban)==0): ?>
    <div class="carousel-item active">
    <img class="img-responsive" src="img/grey-pattern.png" width="100%">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h3>First Slide</h3>
          <p>This is a description for the first slide.</p> -->
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item">
      <img class="img-responsive" src="img/grey-pattern.png" width="100%">
        <div class="carousel-caption d-none d-md-block">
        <!-- <h3>Second Slide</h3>
          <p>This is a description for the second slide.</p> -->
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item">
        <img class="img-responsive" src="img/grey-pattern.png" width="100%">
        <div class="carousel-caption d-none d-md-block">
        <!-- <h3>Third Slide</h3>
          <p>This is a description for the third slide.</p> -->
        </div>
      </div>
      <?php endif; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>


<header class="masthead top text-white text-center" style="background-image: url('<?php echo e(asset('img/red-pattern.jpg')); ?>')">
  <div class="overlay"></div>
  <div class="container">
    <div class="col-xl-12 mx-auto">
      <h1 class="animated rubberBand">Personalize your own</h1>
    </div>
  </div>
</header>


<div class="container">
  <!-- Features Section -->
  <div class="row">
    <div class="col-lg-12" style="margin-top:20px; margin-bottom:20px;">
      <?php if(count($comp) != 0 ): ?>
      <div align="center">
        <h1 style="font-family: 'Poiret One', cursive; color:black;">
          <?php 
          echo $comp->description;
          ?>
        </h1>
      </div>
      <?php else: ?>
      <div align="center">
        <h1 style="font-family: 'Poiret One', cursive; color:black;">
          Say something here!
        </h1>
      </div>
      <?php endif; ?>
    </div>
    
  </div>  

</div>

<!-- Page Content -->
<header class="masthead top text-white text-center" style="background-image: url('<?php echo e(asset('img/red-pattern.jpg')); ?>')">
  <div class="overlay"></div>
  <div class="container">
    <div class="col-xl-12 mx-auto">
      <h1 class="animated rubberBand">Sample Items</h1>
    </div>
  </div>
</header>
<?php if(count($postcat)!=0): ?>
<?php $__currentLoopData = $postcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container" style="background:; margin-top:35px;">
  <!-- Portfolio Section -->

  <div class="container">
    <ol class="breadcrumbs breadcrumb-arrow">
      <li><a href="<?php echo e(url('/ServiceItem', $cat->id)); ?>"><span style="color:white;" ><?php echo e($cat->name); ?></span></a></li>
      <li class="active"><span style="color:white;"><b>See More</b></span></li>
    </ol>
  </div>

</div>
<?php if(count($cat->Post) > 0): ?> 

<div class="container">
  <section class="" id="portfolio">
    <div class="container">

      <div class="row">
        <?php $__currentLoopData = $cat->Post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="<?php echo e(url('/prodDescription/'.$post->id.'/'.$post->typeId.'/'.$post->itemId)); ?>">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>  
                  
                    
              </div>
            </div>
            <img class="img-responsive" style="max-width:100%; max-height:100%;" height="300px" src="<?php echo e(asset($post->image)); ?>" alt="">
          </a>
          <div class="portfolio-caption">
            
            <h4><?php echo e($post->Item->name); ?></h4>
            <?php if(count($post->Item->RateItem)!=0): ?>
              <?php
                  $count = count($post->Item->RateItem);
                  $sum = 0;
                  foreach($post->Item->RateItem as $r)
                  {
                    $sum += $r->rating;
                  }
                  $ave = $sum/$count;
              ?>

              <?php $newave = round($ave);
              ?>
              <select id="" class="starrating" disabled>
                <option value="1" <?php if(1 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
                <option value="2" <?php if(2 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
                <option value="3" <?php if(3 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
                <option value="4" <?php if(4 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
                <option value="5" <?php if(5 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
              </select>
            <?php else: ?>
            <p class="text-muted">No ratings yet.</p>
            <?php endif; ?>
            
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </section>


  <?php else: ?>  
  <div class="container">
    <div class="jumbotron" style="background-color:darkorange; color:white;">
      <div class="col-lg-12" align="center">
        <h1>NO FEATURED POST!<h1>
        </div>
      </div>
    </div>

    <?php endif; ?>

  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>

  <div class="jumbotron" style="background-color:#ff3030; color:white;">
    <div class="col-lg-12" align="center">
      <h1>NO SERVICE CATEGORY AVAILABLE!<h1>
      </div>
    </div>

    <?php endif; ?>
    <!-- /.row -->


    <!-- /.row -->



    <header class="masthead top text-white text-center" style="background-image: url('<?php echo e(asset('img/red-pattern.jpg')); ?>')">
      <div class="overlay"></div>
      <div class="container">
        <div class="col-xl-12 mx-auto">
          <h1 class="animated rubberBand">Customer Feedback</h1>
        </div>
      </div>
    </header>


  </div>
  <!-- /.container -->

  <div class="container">
    <!-- Marketing Icons Section -->
    <div class="row">
      <?php if(count($feed)!=0): ?>
      <?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 mb-4">
        <div class="card card-01">

          <div class="profile-box">
            <h3 class="text-center mb-5" style="color:darkorange;"></h3>
            
            <img class="card-img-top rounded-circle" src="<?php echo e(asset($feedback->image)); ?>" alt="Card image cap">
          </div>
          <div class="card-body text-center">
            <span class="badge-box"><i class="fa fa-user"></i></span>
            <h4 class="card-title"><?php echo e($feedback->name); ?></h4>
            <p class="card-text"><?php echo e($feedback->description); ?></p>
            <span class="social-box">
              <?php $round = round($feedback->rating); ?>

              <select id="" class="starrating" disabled>
                <option value="1" <?php if($round == 1): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
                <option value="2" <?php if($round == 2): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
                <option value="3" <?php if($round == 3): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
                <option value="4" <?php if($round == 4): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
                <option value="5" <?php if($round == 5): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
              </select>           
            </span>
          </div>
        </div>


      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?> 
      <div class="col-lg-4 mb-4">
        <div class="card card-01">

          <div class="profile-box">
            <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
            
            <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
          </div>
          <div class="card-body text-center">
            <span class="badge-box"><i class="fa fa-user"></i></span>
            <h4 class="card-title">Customer Name</h4>
            <p class="card-text">Testimonial</p>
            <span class="social-box">

              <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card card-01">

          <div class="profile-box">
            <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
            
            <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
          </div>
          <div class="card-body text-center">
            <span class="badge-box"><i class="fa fa-user"></i></span>
            <h4 class="card-title">Customer Name</h4>
            <p class="card-text">Testimonial</p>
            <span class="social-box">

              <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card card-01">

          <div class="profile-box">
            <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
            
            <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
          </div>
          <div class="card-body text-center">
            <span class="badge-box"><i class="fa fa-user"></i></span>
            <h4 class="card-title">Customer Name</h4>
            <p class="card-text">Testimonial</p>
            <span class="social-box">

              <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

            </span>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
            <a href="<?php echo e(url('/Testimonial')); ?>"><button class="btn btn-link" style="font-size:18pt; color:black; text-decoration:none; border:1px solid black;"> Read More <span class="orange-circle-greater-than">></span></button></a>
          </div>
          </div>   
        </div>
      </div>

    </div>
  </div>

  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <section id="contact" style="background:url('<?php echo e(asset('img/grey-pattern.png')); ?>'); width:100%;">
    <div class="section-content">
      <h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> 
        Inquire Now
      </span></h1>
      <?php if(session('success')): ?>
      <script type="text/javascript">
          toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
      </script>
      <?php endif; ?>

    </div>
    <div class="contact-section" style="">
      <div class="container" style="">
        <form method="post" action="<?php echo e(url('/InquirySend')); ?>" id="inquiry-form">
          <?php echo e(csrf_field()); ?>

          <div class="row" style="">
            <div class="col-md-6 form-line"> 
              <div class="form-group">
                <label for="exampleInputUsername">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder=" Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder=" Enter Email Address">
              </div>	
              <div class="form-group">
                <label for="telephone">Mobile No.</label>
                <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder=" Enter mobile no.">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for ="description"> Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder=" Enter a subject">
                </div>
              <div class="form-group">
                <label for ="description"> Message</label>
                <textarea  class="form-control" id="message" name="message" placeholder="Enter Your Message"></textarea>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    
    
    <script>
        $( document ).ready(function() {
 
          $( ".se-pre-con" ).delay().fadeOut("slow");
          $('.starrating').barrating({
            
            theme: 'fontawesome-stars',
            readonly: true
          });

          $('.meron').barrating('set', 5);
          
          
          

      });
    </script>  

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>