<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  @if(count($comp) != 0 )
  <link rel="icon" href="{{ asset($comp->company_logo) }}">

  <title>{{$comp->company_name}}</title>
  @else 

  @endif

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
  <link href="{{ asset('css/megamenu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">  
  <link href="{{ asset('css/button.css') }}" rel="stylesheet">  
  <link rel="stylesheet" href="{{  asset('vendor/social/dist/css/social-share-kit.css')  }}">
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet'>
  <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet'>
  <link href="{{ asset('css/fontawesome-stars.css') }}" rel="stylesheet"> 
  <link href="{{ asset('css/contact.css') }}" rel="stylesheet"> 
  <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('css/inputmask.min.css') }}" rel="stylesheet">
  @yield('style')
</head>

<body>
  <div class="fixed-top">
    <header class="topbar">
      <div class="container-fluid">
        @if(count($comp) != 0 )
        <div class="row" style="background-color:#f72028;color:white;padding:5px;">
        <!-- <div class="row" style="background-color:blue;color:white;padding:5px;"> -->
          <div class="col-md-6 col-sm-6">
            <div class="links  pull-left" style="padding-left:0px;margin-left: 0px;">
              <ul>
                <li style="display: inline-block"><i class="fa fa-phone"></i> {{$comp->contactNumber}} | </li>
                <li  style="display: inline-block"><i class="fa fa-envelope"></i> {{$comp->emailAddress}}</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="links  pull-right">
              <ul>
                <li  style="display: inline-block"><a href="{{ url('/login') }}" style="color:white"><i class="fa fa-user"></i> My Account </a> | </li>
                <li  style="display: inline-block"><a href="{{ url('/login') }}" style="color:white"><i class="fa fa-shopping-cart"></i> My Cart (0) items</a> | </li>
                @if(Auth::guest())
                <li  style="display: inline-block"><i class="fa fa-sign-in"></i> <a href="{{ url('/customer/login') }}" style="color:white"> Login </a> | <a href="{{ url('/customer/register') }}" style="color:white"> Register</a></li>
                @elseif(Auth::check()&&count(Auth::user()->Employee))
                <li  style="display: inline-block"><i class="fa fa-user"></i> <a href="{{ route('logout') }}" style="color:white"> Hi ADMIN </a></li>
                @else
                <li  style="display: inline-block"><i class="fa fa-user"></i> <a href="{{ route('logout') }}" style="color:white"> Hi {{Auth::user()->Customer->firstName}} </a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
        @else
        @endif
      </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" style="font-weight: 700; font-family: 'Roboto', sans-serif; border-top:2px solid black">
      <div class="container">
        @if(count($comp) != 0 )
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset($comp->company_logo) }}" style="max-width:50px; max-height:50px;color:yellow;">{{ $comp->company_name }}</a>
        @else
        <a class="navbar-brand" href="{{ url('/') }}"><img src="">Company Name</a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @foreach($model as $post)
            <li class="nav-item">   
              @if(count($post->Type) != 0)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                  {{$post->name}}
                </a>          
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                  @foreach($post->Type as $type)                   
                  <a class="dropdown-item" href="{{ url('/ServiceItem', $type->id) }}" style="color:;">{{$type->name}}</a>

                  @endforeach
                </div>
              </li>
              @else
              {{ $post->categoryId}}
              <a class="nav-link" href="{{ url('/ServiceItem', $post->id) }}">{{$post->name}}</a>
              @endif
            </li>
            @endforeach
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about') }}"> Packages</a>
            </li>
            <li class="nav-item">   
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                  Customer Service
                </a>          
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">               
                  <a class="dropdown-item" href="{{ url('/FAQs') }}" style="color:;">FAQs</a>
                  <a class="dropdown-item" href="{{ url('/Testimonial') }}" style="color:;">Company Feedback</a>
                  <a class="dropdown-item" href="{{ url('/AllItems') }}" style="color:;">Item Review</a>
                </div>
              </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about') }}"> About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about') }}"><i class="fa fa-search" aria-hidden="true"> Search</i></a>
            </li>
          </ul>
        </div>
      </div>
      <!-- <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/about') }}"><i class="fa fa-search" aria-hidden="true"></i></a>
        </li>
      </ul> -->
    </nav>
  </div>

@yield('contents');
<footer style="width:100%;background-color: black;padding:20px">
  <div class="col-md-12">
  <div class="row">
     @if(count($comp) != 0 )
      <div style="display: flex; align-items: center; justify-content: center;color:white;font-family: 'Roboto', sans-serif; margin:0px auto">
      <span><img src="{{ asset($comp->company_logo) }}"></span>      
      <h1 style="font-family: 'Roboto', sans-serif;" class="text-uppercase">{{$comp->company_name}}</h1>
      </div>
      @else
      <div style="display: flex; align-items: center; color:white;font-family: 'Roboto', sans-serif; ">
      <span><img src=""></span>
      <h1 style="font-family: 'Roboto', sans-serif;" class="text-uppercase">Company Name Here</h1>
      </div>
      @endif
  </div>
  <div class="row">
    <div class="col-md-4" style="color: white;">
        <h5 style="color:gold; text-align:center">Services Offered</h5>
        @if(count($comp) != 0 )
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
      @else
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
      @endif
    </div>
    <div class="col-md-4"  style="color:white"> 
      <div class="row">        
        <div class="col-md-6">
        <h5 style="color:gold; text-align: center">Customer Services</h5>   
        <ul>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/FAQs') }}" style="color:;">FAQs</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/Testimonial') }}" style="color:;">Company Feedback</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/AllItems') }}" style="color:;">Item Review</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/AllItems') }}" style="color:;">Gallery</a></li>
        </ul>
        </div>     
        <div class="col-md-6">
          <h5 style="color:gold; text-align: center">About Us</h5>   
        <ul>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/FAQs') }}" style="color:;">Company Information</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/Testimonial') }}" style="color:;">Terms and Conditions</a></li>
        <li style="list-style-type: circle"><a style="color:white" href="{{ url('/AllItems') }}" style="color:;">Privacy Policy</a></li>
        </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4" align="center">
      <h5 style="color:gold;">Find Us</h5>
      @if(count($comp) != 0 )
      <p style="color:white;">{{ $comp->street }} {{$comp->brgy}}, {{$comp->city}}</p>
      <h5 style="color:gold;">Contact Us</h5>
      <p style="color:white;">{{$comp->contactNumber}}
      <br>{{$comp->emailAddress}}</p>
      @else
      <p class="lead">Street Brgy City</p>
      <h3 style="color:gold;">Contact Us</h3>
      Contact Number
      <br>Email Address
      @endif
      <div style="margin-top:10px;">
      <ul class="social-network social-circle" >
      @if(count($sns)!=0)
      <li><a target="_blank" href="{{ $sns->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a target="_blank" href="{{ $sns->twitter}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a target="_blank" href="{{ $sns->messenger}}" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
      @else
      <li><a target="_blank" href="" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a target="_blank" href="" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a target="_blank" href="" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li> 
      @endif
      </ul> 
      </div>
    </div>
  </div>
  </div><!--END ROW-->
</footer>


<div class="container-fluid" style="background:red; height:30px;">
  <div align="center" style="margin-top:px;color:white;">
    @if(count($comp) != 0 )
    <small class="text-uppercase"><b>&copy; 2017, {{$comp->company_name}}</b></small>
    @else
    <small class="text-uppercase"><b>&copy; Company name</b></small>
    @endif
  </div>

</div>
@if($user = Auth::user())
<div class="container-fluid" style="background:red; height:30px;">
  <div align="center" style="margin-top:px;color:white;">
    @if(count($comp) != 0 )
    <a style="text-decoration:none; color:white" href="{{ url('/admin') }}" title="Go to admin"><small class="text-uppercase"><b>{{$comp->company_name}} -  Admin</b></small></a>
    @else
    <a style="text-decoration:none; color:white" href="{{ url('/admin') }}" title="Go to admin"><small class="text-uppercase"><b>Company Name - Admin</b></small></a>
    @endif
  </div>

</div>

@elseif(Auth::guest())

@endif
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/megamenu.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/social/dist/js/social-share-kit.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>

<script>
  SocialShareKit.init();

  $(document).ready(function() {
    $('.select2').select2();

  } );
</script>
@yield('script')
</body>

</html>
