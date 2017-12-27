
@extends('layouts.master')


@section('contents')

<link href="{{ asset('css/contact.css') }}" rel="stylesheet"> 

    <header style="margin-top:38px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('{{ asset('img/banner1.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>First Slide</h3>
              <p>This is a description for the first slide.</p> -->
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset('img/banner2.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p> -->
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset('img/banner3.jpg')}}')">
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


    <header class="masthead top text-white text-center" style="background-image: url('{{ asset('img/red-pattern.jpg') }}')">
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
            @if(count($comp) != 0 )
          <?php 
              echo $comp->about;
          ?>
          @else
              <p class="lead">Hi! Hello! No details yet</p>
          @endif
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="{{ asset('img/feature.jpg') }}" alt="">
        </div>
    </div>  

    </div>

    <!-- Page Content -->
    <header class="masthead top text-white text-center" style="background-image: url('{{ asset('img/red-pattern.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="col-xl-12 mx-auto">
          <h1 class="animated rubberBand">Sample Items</h1>
      </div>
    </div>
  </header>

@foreach($postcat as $cat)
    <div class="container" style="background:; margin-top:35px;">
      <!-- Portfolio Section -->
      
      <ol class="breadcrumb breadbg" style="background:#252525; ">
        <li class="breadcrumb-item" >
          <a href="index.html" style="color:white;">Home</a>
        </li>
        <li class="breadcrumb-item active" style="color:white;">{{$cat->name}}</li>
      </ol>
    </div>

     @if(count($cat->Post) > 0) 
       
        <div class="container">
          <section class="bg-light" id="portfolio">
          <div class="container">

            <div class="row">
          @foreach($cat->Post as $post)
              <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link"  href="{{ url('/prodDescription',$post->id) }}">
                  <div class="portfolio-hover shop">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-flag fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" style="max-height:200px;" src="{{ asset($post->image) }}" alt="">
                </a>
                <div class="portfolio-caption">
                <h4>{{ $post->ServiceType->name }}</h4>
                  <p class="text-muted">See More</p>
                </div>
              </div>
          @endforeach
            </div>
          </div>
        </section>
    

    @else  
      <div class="container">
          <section class="bg-light" id="portfolio">
          <div class="container">

            <div class="row">
        
              <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link"  href="{{ url('/prodDescription/6.jpg/Picture Frame') }}">
                  <div class="portfolio-hover shop">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-flag fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" style="max-height:200px;" src="{{ asset('img/red-pattern.jpg') }}" alt="">
                </a>
                <div class="portfolio-caption">
                  <h4>No post available</h4>
                  <p class="text-muted">See More</p>
                </div>
              </div>
            </div>
          </div>
        </section>

    @endif

     </div>
     @endforeach
      <!-- /.row -->
    
     
      <!-- /.row -->



      <header class="masthead top text-white text-center" style="background-image: url('{{ asset('img/red-pattern.jpg') }}')">
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
          <div class="card h-100">
            <h4 class="card-header text-center">Review</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <p class="lead text-center">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span
                    <span class="fa fa-star"></span>
               </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header  text-center">Review</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
            </div>
            <div class="card-footer">
            <p class="lead text-center">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span
                    <span class="fa fa-star"></span>
               </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header  text-center">Review</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
            <p class="lead text-center">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span
                    <span class="fa fa-star"></span>
               </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
<section id="contact" style="background:url('{{ asset('img/grey-pattern.png') }}')">
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
@endsection
