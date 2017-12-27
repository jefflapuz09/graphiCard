<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>Graphicard</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/megamenu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">  

    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet'>
  </head>

  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbg fixed-top" id="mainNav">
      <div class="container">
@if(count($comp) != 0 )
<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset($comp->company_logo) }}">{{ $comp->company_name }}</a>
@else
<a class="navbar-brand" href="{{ url('/') }}"><img src="">Company Name</a>
@endif
    <button class="navbar-toggler navbar-toggler-right custom-toggler"  type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color:yellow;"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/about') }}">About</a>
        </li>

       @foreach($model as $post)
            <li class="nav-item">   
               @if(count($post->Type) != 0)
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$post->name}}
                      </a>          
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                  @foreach($post->Type as $type)                   
                        <a class="dropdown-item" href="">{{$type->name}}</a>
                      
                  @endforeach
                  </div>
                 </li>
              @else
                             {{ $post->categoryId}}

                  <a class="nav-link" href="">{{$post->name}}</a>
              @endif
            </li>
       @endforeach
       @if($user = Auth::user())
   
          
       @elseif(Auth::guest())
       <li class="nav-item">
          <a class="nav-link" href="{{ url('/login') }}">Login</a>
        </li>
       @endif
        
      </ul>
    </div>
  </div>
</nav>
@yield('contents');

    <!-- Footer -->
    <footer class="py-5" id="foot">
      <div class="container" style="background:; color:white;">
        <div class="row"> 
            <div class="col-lg-6"> 
            <div align="center" style="color:white; background:; line-height:5px;">
                @if(count($comp) != 0 )
                <img src="{{ asset($comp->company_logo) }}">
                <h1 style="font-family: 'Roboto', sans-serif; margin-top:35px;" class="text-uppercase">{{$comp->company_name}}</h1>
                @else
                <img src="">
                <h1 style="font-family: 'Roboto', sans-serif; margin-top:35px;" class="text-uppercase">Company Name</h1>
                @endif
                            
                            
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
                            @if(count($comp) != 0 )
                            <p class="lead">{{ $comp->street }} {{$comp->brgy}}, {{$comp->city}}</p>
                            <h3 style="color:gold;">Contact Us</h3>
                           
                            {{$comp->contactNumber}}
                            <br>{{$comp->emailAddress}}
                            @else
                            <p class="lead">Street Brgy City</p>
                            <h3 style="color:gold;">Contact Us</h3>
                           
                            Contact Number
                            <br>Email Address
                            @endif
                            
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
        @if(count($comp) != 0 )
          <small class="text-uppercase"><b>&copy; 2017, {{$comp->company_name}}</b></small>
        @else
          <small class="text-uppercase"><b>&copy; Company name</b></small>
        @endif
    </div>
    
    </div>
    @if($user = Auth::user())
      <div class="container-fluid" style="background:#154360; height:30px;">
     <div align="center" style="margin-top:px;color:white;">
        @if(count($comp) != 0 )
          <a style="text-decoration:none; color:white" href="{{ url('/') }}" title="Go to admin"><small class="text-uppercase"><b>{{$comp->company_name}} -  Admin</b></small></a>
        @else
          <a style="text-decoration:none; color:white" href="{{ url('/') }}" title="Go to admin"><small class="text-uppercase"><b>Company Name - Admin</b></small></a>
        @endif
    </div>
    
    </div>
          
       @elseif(Auth::guest())

       @endif
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/megamenu.js') }}"></script>
    <script src="{{ asset('js/navscroll.js') }}"></script>
   
  </body>

</html>
