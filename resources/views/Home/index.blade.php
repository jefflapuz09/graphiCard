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
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbg fixed-top">
      <div class="container">
        <a class="navbar-brand" style="color:white;" href="index.html">Call us now: (02)123-456/0911-123-4567</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="glyphicon glyphicon-shopping-cart"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
            <img src="{{ asset('img/cart.png') }}"  height="30px" width="30px">
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid" id="top" style="margin:0; background-color:darkred; height:30%; position:relative;">
            <div align="center" style="color:white; line-height:5px;">
                <img class="img-responsive imghd" height="50px" width="50px" src="{{ asset('img/logo.png') }}">
                <h1 style="font-family: 'Roboto', sans-serif; margin-top:5px;"><span>GRAPHI</span><span style="color:#FF5733;">CARD</span></h1>
                <p class="lead" style="margin-top:-20px;">Digital printing and graphics design</p>
            </div>

    <div class="menu-container">
  <div class="menu">
    <ul>
      <li class="text-uppercase"><a href="#">Home</a></li>
      <li class="text-uppercase"><a href="http://marioloncarek.com">About</a>
        <ul>
          <li><a href="#">School</a>
            <ul>
              <li><a href="#">Lidership</a></li>
              <li><a href="#">History</a></li>
              <li><a href="#">Locations</a></li>
              <li><a href="#">Careers</a></li>
            </ul>
          </li>
          <li><a href="#">Study</a>
            <ul>
              <li><a href="#">Undergraduate</a></li>
              <li><a href="#">Masters</a></li>
              <li><a href="#">International</a></li>
              <li><a href="#">Online</a></li>
            </ul>
          </li>
          <li><a href="#">Research</a>
            <ul>
              <li><a href="#">Undergraduate research</a></li>
              <li><a href="#">Masters research</a></li>
              <li><a href="#">Funding</a></li>
            </ul>
          </li>
          <li><a href="#">Something</a>
            <ul>
              <li><a href="#">Sub something</a></li>
              <li><a href="#">Sub something</a></li>
              <li><a href="#">Sub something</a></li>
              <li><a href="#">Sub something</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="text-uppercase"><a href="#">News</a>
        <ul>
          <li><a href="#">Today</a></li>
          <li><a href="#">Calendar</a></li>
          <li><a href="#">Sport</a></li>
        </ul>
      </li>
      <li class="text-uppercase"><a href="http://marioloncarek.com">Contact</a>
        <ul>
          <li><a href="#">School</a>
            <ul>
              <li><a href="#">Lidership</a></li>
              <li><a href="#">History</a></li>
              <li><a href="#">Locations</a></li>
              <li><a href="#">Careers</a></li>
            </ul>
          </li>
          <li><a href="#">Study</a>
            <ul>
              <li><a href="#">Undergraduate</a></li>
              <li><a href="#">Masters</a></li>
              <li><a href="#">International</a></li>
              <li><a href="#">Online</a></li>
            </ul>
          </li>
          <li><a href="#">Study</a>
            <ul>
              <li><a href="#">Undergraduate</a></li>
              <li><a href="#">Masters</a></li>
              <li><a href="#">International</a></li>
              <li><a href="#">Online</a></li>
            </ul>
          </li>
          <li><a href="#">Empty sub</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</div>

    <header>
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


    <header class="masthead top text-white text-center" style="background-image: url('{{ asset('img/blue-pattern.png') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="col-xl-12 mx-auto">
          <h1 class="headbounce bo">Personalize your own</h1>
      </div>
    </div>
  </header>


    <div class="container">
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Graphi<span style="color:darkred;">Card</span> Features</h2>
          <p>Digital printing and Graphic Design includes:</p>
          <ul>
            <li>
              Shirt Printing
            </li>
            <li>Stickers</li>
            <li>Tarpaulin</li>
            <li>Flyer</li>
            <li>Brochure</li>
          </ul>
          <p class="lead text-uppercase">For your advertisement and event requirements</p>
          <p>Tarpaulin, banner, Standee with Print, Portabooth, Event tickets, T-shirt printing, Business Cards and Company giveaways. <strong>Call us @ 709-2099</strong></p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="{{ asset('img/feature.jpg') }}" alt="">
        </div>
    </div>  

    </div>

    <!-- Page Content -->
    <header class="masthead top text-white text-center" style="background-image: url('{{ asset('img/blue-pattern.png') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="col-xl-12 mx-auto">
          <h1 class="headbounce bo">Sample Products</h1>
      </div>
    </div>
  </header>


    <div class="container" style="background:;">
      <!-- Portfolio Section -->
      <ol class="breadcrumb breadbg" style="background:maroon; ">
        <li class="breadcrumb-item" >
          <a href="index.html" style="color:white;">Home</a>
        </li>
        <li class="breadcrumb-item active" style="color:white;">Miscelleanous</li>
      </ol>


      <section class="bg-light" id="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover shop">
                <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/6.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Picture Frame</h4>
              <p class="text-muted">See More</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover shop">
                <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/5.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Personalized WaterJug</h4>
              <p class="text-muted">See More</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover shop">
                <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/4.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Personalized Ecobag</h4>
              <p class="text-muted">See More</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover shop">
                <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/3.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Personalized Ballpen</h4>
              <p class="text-muted">See More</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover shop">
                <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/2.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Picture Frame</h4>
              <p class="text-muted">See More</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
              <div class="portfolio-hover shop">
                <div class="portfolio-hover-content">
                  <i class="fa fa-flag fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('img/1.jpg') }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Personalized Mug</h4>
              <p class="text-muted">See More</p>
            </div>
          </div>
        </div>
      </div>
    </section>

     </div>
      <!-- /.row -->
    
     
      <!-- /.row -->

      <hr>

      <header class="masthead top text-white text-center" style="background-image: url('{{ asset('img/blue-pattern.png') }}')">
      <div class="overlay"></div>
      <div class="container">
          <div class="col-xl-12 mx-auto">
            <h1 class="headbounce bo">Customer Feedback</h1>
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

    <!-- Footer -->
    <footer class="py-5" id="foot">
      <div class="container" style="background:; color:white;">
        <div class="row"> 
            <div class="col-lg-6"> 
            <div align="center" style="color:white; background:; line-height:5px;">
                            <h1 style="font-family: 'Roboto', sans-serif; margin-top:35px;">GRAPHI<span style="color:#9E0909;">CARD</span></h1>
                            <p class="lead" style="margin-top:-17px;">Digital printing and graphics design</p>
                            <h3 style="color:#07D9FF;">Services Offered</h3>
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
            <div class="col-lg-6"> 
            <div align="center">
                            <h1 style="color:#07D9FF;">Find Us</h1>
                            <p class="lead">Third Floor, Diamond Arcade, 873 Aurora Blvd. cor. St. Mary St. Cubao
                            Quezon City, Philippines</p>
                            <h1 style="color:#07D9FF;">Contact Us</h1>
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            (02)123-456/0911-123-4567
                        </div>
            </div>
        </div>
      </div>
      
      <!-- /.container -->
    </footer>
    <div class="container-fluid" style="background:#252525; height:30px;">
     <div align="center" style="margin-top:px;color:white;">
                        <small class="text-uppercase"><b>&copy; 2017, Graphi<span style="color:#9E0909;">card</span></b></small>
    </div>
    
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/megamenu.js') }}"></script>
    <script>  
    
      $(document).scroll(function () {
        $('.bo').addClass("animated rubberBand");
       });
    </script>
  </body>

</html>
