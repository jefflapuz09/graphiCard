<Style>
 
</style>

<?php $__env->startSection('contents'); ?>

<link href="<?php echo e(asset('css/contact.css')); ?>" rel="stylesheet"> 

    <header style="margin-top:38px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo e(asset('img/banner1.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>First Slide</h3>
              <p>This is a description for the first slide.</p> -->
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('img/banner2.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p> -->
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo e(asset('img/banner3.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p> -->
            </div>
          </div>
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
        <div class="col-lg-6">
            <?php if(count($comp) != 0 ): ?>
          <?php 
              echo $comp->about;
          ?>
          <?php else: ?>
              <p class="lead">Hi! Hello! No details yet</p>
          <?php endif; ?>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="<?php echo e(asset('img/feature.jpg')); ?>" alt="">
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
        		<li><a href="#"><?php echo e($cat->name); ?></a></li>
        		<li class="active" style=""><span>See More</span></li>
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
                <a class="portfolio-link"  href="<?php echo e(url('/prodDescription',$post->id)); ?>">
                  <div class="portfolio-hover shop">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-flag fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" style="max-height:200px;" src="<?php echo e(asset($post->image)); ?>" alt="">
                </a>
                <div class="portfolio-caption">
                <h4><?php echo e($post->ServiceType->name); ?></h4>
                  <p class="text-muted">See More</p>
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
              <h1>NO ITEM AVAILABLE!<h1>
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
        <div class="col-lg-4 mb-4">
           
            
            <div class="card card-01">
                
                <div class="profile-box">
                    <h3 class="text-center mb-5" style="color:darkorange;">Customer # 1</h3>
                    <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                  <span class="badge-box"><i class="fa fa-user"></i></span>
                  <h4 class="card-title">Mike Parker</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="social-box">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                  </span>
                </div>
              </div>
            
            
        </div>
        <div class="col-lg-4 mb-4">
         
            
            <div class="card card-01">
               
                <div class="profile-box">
                    <h3 class="text-center mb-5" style="color:darkorange;">Customer # 2</h3>
                    <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                  <span class="badge-box"><i class="fa fa-user"></i></span>
                  <h4 class="card-title">Mike Parker</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="social-box">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                  </span>
                </div>
              </div>

        </div>
        <div class="col-lg-4 mb-4">
            
            <div class="card card-01">
                <div class="profile-box">
                    <h3 class="text-center mb-5" style="color:darkorange;">Customer # 3</h3>
                    <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                  <span class="badge-box"><i class="fa fa-user"></i></span>
                  <h4 class="card-title">Mike Parker</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="social-box">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                  </span>
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
				

			</div>
			<div class="contact-section">
			<div class="container">
				<form>
        <div class="row">
					<div class="col-md-6 form-line">
			  			<div class="form-group">
			  				<label for="exampleInputUsername">Your name</label>
					    	<input type="text" class="form-control" id="" placeholder=" Enter Name">
				  		</div>
				  		<div class="form-group">
					    	<label for="exampleInputEmail">Email Address</label>
					    	<input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
					  	</div>	
					  	<div class="form-group">
					    	<label for="telephone">Mobile No.</label>
					    	<input type="tel" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no.">
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			  				<label for ="description"> Message</label>
			  			 	<textarea  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
			  			</div>
			  			<div>

			  				<button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
			  			</div>
			  			
					</div>
        </div>
				</form>
			</div>
		</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>