
@extends('layouts.master')

@section('style')
<style>
  @import url('https://fonts.googleapis.com/css?family=Poiret+One');
  @import url('https://fonts.googleapis.com/css?family=Montserrat');
  </style>
  <style>
      
      .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('{{ asset('img/Preloader_3.gif') }}') center no-repeat #fff;
      }
  
       .titleload{
        position: relative;
        left:0;
        right:0;
        top: 100px;
  
      }
  </style>
  <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('contents')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>

<div class="se-pre-con">
      
      {{--  <h1 id="" class="titleload text-center animated tada" style="font-family: 'Montserrat', sans-serif; font-size:30pt; color:darkorange">Please wait, <span style="color:maroon;">loading</span><span style="color:black;">...</span></h1>  --}}

</div>

@if(count($adv)!=0)
<div class="container-fluid" style="background-color: darkslategray; margin-top:54px; color:white;">
  <div class="text-center">
  <p style="text-align: center; font-size:13pt;padding:5px;font-family: 'Montserrat', sans-serif;font-weight: bold;">{{$adv->advisory}}</p>
  </div>
</div>
<header style="margin-top:-15px">
@else(count($adv)==0)
<div class="container-fluid" style="margin-top:60px;">
  <p style="text-align: center"></p>
</div>
<header style="margin-top:-5px">
@endif
<!-- <div class="row" style="margin-top:5px; margin-bottom">
  <img class="img-responsive" style="max-width:100%; max-height:10%;" height="150px" width="100%" src="{{ asset('img/promo-banner.png') }}" alt="">
</div> -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      @if(count($ban)!=0)
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" >
        <img class="img-responsive img-fluid" src="{{ asset($ban->banner)}}" width="100%">
        <div class="carousel-caption d-none d-md-block">
      <!-- <h3>First Slide</h3>
        <p>This is a description for the first slide.</p> -->
      </div>
    </div>
    <!-- Slide Two - Set the background image for this slide in the line below -->
    <div class="carousel-item">
      <img class="img-responsive" src="{{ asset($ban->banner2)}}" width="100%">
      <div class="carousel-caption d-none d-md-block">
      <!-- <h3>Second Slide</h3>
        <p>This is a description for the second slide.</p> -->
      </div>
    </div>
    <!-- Slide Three - Set the background image for this slide in the line below -->
    <div class="carousel-item">
      <img class="img-responsive" src="{{ asset($ban->banner3)}}" width="100%">
      <div class="carousel-caption d-none d-md-block">
      <!-- <h3>Third Slide</h3>
        <p>This is a description for the third slide.</p> -->
      </div>
    </div>
    @elseif(count($ban)==0)
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
      @endif
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


<header class="masthead top text-center" style="background-image: url('{{ asset('img/sample1.png') }}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="col-xl-12 mx-auto">
      <h1 style="font-family: 'Lato', sans-serif; font-weight:bold;color:white">CREATE YOUR OWN DESIGN</h1>
    </div>
  </div>
</header>


<div class="container wow fadeInUp">
  <!-- Features Section -->
  <div class="row">
    <div class="col-lg-12" style="margin-top:20px; margin-bottom:20px;">
      @if(count($comp) != 0 )
      <div align="center">
        <h1 style="font-family: 'Poiret One', cursive; color:black;">
          <?php 
          echo $comp->description;
          ?>
        </h1>
      </div>
      @else
      <div align="center">
        <h1 style="font-family: 'Poiret One', cursive; color:black;">
          Say something here!
        </h1>
      </div>
      @endif
    </div>
    
  </div>  

</div>

<!-- Page Content -->
<header class="masthead top text-center" style="background-image: url('{{ asset('img/sample2.png') }}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="col-xl-12 mx-auto">
      <h1 style="font-family: 'Lato', sans-serif; font-weight:bold;color:white">SERVICE ITEMS</h1>
    </div>
  </div>
</header>
@if(count($postcat)!=0)
@foreach($postcat as $cat)
<div class="container" style="background:; margin-top:35px;">
  <!-- Portfolio Section -->

  <div class="container">
    <ol class="breadcrumbs breadcrumb-arrow wow fadeInUp">
      <li><a href="{{ url('/ServiceItem', $cat->id) }}"><span style="color:white;" >{{$cat->name}}</span></a></li>
      <li class="active"><span style="color:white;"><b>See More</b></span></li>
    </ol>
  </div>

</div>
@if(count($cat->Post) > 0) 

<div class="container">
  <section class="" id="portfolio">
    <div class="container">

      <div class="row">
        @foreach($cat->Post as $post)
        <div class="col-md-4 col-sm-6 portfolio-item wow fadeInUp">
          <a class="portfolio-link"  href="{{ url('/prodDescription/'.$post->id.'/'.$post->typeId.'/'.$post->itemId) }}">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                  <h4 style="font-family: 'Poiret One', cursive; color:white;">{{ $post->Item->name }}</h4> 
                  
                    
              </div>
            </div>
            <img class="img-responsive" style="max-width:100%; max-height:100%;" height="300px" src="{{ asset($post->image) }}" alt="">
          </a>
          <div class="portfolio-caption">
            
            
            @if(count($post->Item->RateItem)!=0)
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
                <option value="1" @if(1 == $newave) selected = "selected" @else "" @endif>1</option>
                <option value="2" @if(2 == $newave) selected = "selected" @else "" @endif>2</option>
                <option value="3" @if(3 == $newave) selected = "selected" @else "" @endif>3</option>
                <option value="4" @if(4 == $newave) selected = "selected" @else "" @endif>4</option>
                <option value="5" @if(5 == $newave) selected = "selected" @else "" @endif>5</option>
              </select>
              <ul class="social-network2 social-circle2">
                  <li><a target="_blank" href="https://www.facebook.com/share.php?u={{ $sns->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ $sns->twitter}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="{{ $sns->messenger}}" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li>
                </ul>	
            @else
            <p class="text-muted">No ratings yet.</p>
            <ul class="social-network2 social-circle2">
                <li><a target="_blank" href="https://www.facebook.com/share.php?u={{ $sns->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ $sns->twitter}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="{{ $sns->messenger}}" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li>
              </ul>	
            @endif
            
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </section>


  @else  
  <div class="container">
    <div class="jumbotron wow fadeInUp" style="background-color:darkorange; color:white;">
      <div class="col-lg-12" align="center">
        <h1>NO FEATURED POST!<h1>
        </div>
      </div>
    </div>

    @endif

  </div>
  @endforeach
  @else

  <div class="jumbotron wow fadeInUp" style="background-color:#ff3030; color:white;">
    <div class="col-lg-12" align="center">
      <h1>NO SERVICE CATEGORY AVAILABLE!<h1>
      </div>
    </div>

    @endif
    <!-- /.row -->


    <!-- /.row -->



    <header class="masthead top text-center" style="background-image: url('{{ asset('img/sample3.png') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="col-xl-12 mx-auto">
          <h1 style="font-family: 'Lato', sans-serif; font-weight:bold; color:white">CUSTOMER FEEDBACK</h1>
        </div>
      </div>
    </header>


  </div>
  <!-- /.container -->

  <div class="container">
    <!-- Marketing Icons Section -->
    <div class="row wow fadeInUp">
      @if(count($feed)!=0)
      @foreach($feed as $feedback)
      <div class="col-lg-4 mb-4">
        <div class="card card-01">

          <div class="profile-box">
            <h3 class="text-center mb-5" style="color:darkorange;"></h3>
            {{--  loob ng h3 header  --}}
            <img class="card-img-top rounded-circle" src="{{ asset($feedback->image) }}" alt="Card image cap">
          </div>
          <div class="card-body text-center">
            <span class="badge-box"><i class="fa fa-user"></i></span>
            <h4 class="card-title">{{$feedback->name}}</h4>
            <p class="card-text">{{$feedback->description}}</p>
            <span class="social-box">
              <?php $round = round($feedback->rating); ?>

              <select id="" class="starrating" disabled>
                <option value="1" @if($round == 1) selected = "selected" @else "" @endif>1</option>
                <option value="2" @if($round == 2) selected = "selected" @else "" @endif>2</option>
                <option value="3" @if($round == 3) selected = "selected" @else "" @endif>3</option>
                <option value="4" @if($round == 4) selected = "selected" @else "" @endif>4</option>
                <option value="5" @if($round == 5) selected = "selected" @else "" @endif>5</option>
              </select>           
            </span>
          </div>
        </div>


      </div>
      @endforeach
      @else 
      <div class="col-lg-4 mb-4">
        <div class="card card-01">

          <div class="profile-box">
            <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
            {{--  loob ng h3 header  --}}
            <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
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
            {{--  loob ng h3 header  --}}
            <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
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
            {{--  loob ng h3 header  --}}
            <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
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
      @endif
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
            <a href="{{ url('/Testimonial') }}"><button class="btn btn-link" style="font-size:18pt; color:black; text-decoration:none; border:1px solid black;"> Read More <span class="orange-circle-greater-than">></span></button></a>
          </div>
          </div>   
        </div>
      </div>

    </div>
  </div>

  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <section class="wow fadeInUp" id="contact" style="background:url('{{ asset('img/bg-pattern1.png') }}'); width:100%;">
    <div class="section-content">
      <h1 class="section-header"><span class="content-header" data-wow-delay="0.2s" data-wow-duration="2s"> 
        Inquire Now
      </span></h1>
      @if(session('success'))
      <script type="text/javascript">
          toastr.success(' <?php echo session('success'); ?>', 'Success!')
      </script>
      @endif

    </div>
    <div class="contact-section" style="">
      <div class="container" style="">
        <form method="post" action="{{ url('/InquirySend') }}" id="inquiry-form">
          {{ csrf_field() }}
          <div class="row" style="">
            <div class="col-md-6 form-line"> 
              <div class="form-group">
                <label for="exampleInputUsername">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder=" Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder=" Enter Email Address">
              </div>	
              <div class="form-group">
                <label for="telephone">Mobile No.</label>
                <input type="tel" class="form-control" id="contact_number" name="contact_number" required placeholder=" Enter mobile no.">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for ="description"> Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" required placeholder=" Enter a subject">
                </div>
              <div class="form-group">
                <label for ="description"> Message</label>
                <textarea  class="form-control" id="message" name="message" required placeholder="Enter Your Message"></textarea>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    @endsection

    @section('script')
    
    <script src="{{ asset('js/wow.js') }}"></script>
    <script>
        $( document ).ready(function() {
 
          new WOW().init();
          $( ".se-pre-con" ).delay().fadeOut("slow");
          $('.starrating').barrating({
            
            theme: 'fontawesome-stars',
            readonly: true
          });

          $('.meron').barrating('set', 5);
          
          
          

      });
    </script>  

    @stop
