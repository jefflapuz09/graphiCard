
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
