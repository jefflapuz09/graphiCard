@extends('layouts.master')

@section('style')
<style>
@import url('https://fonts.googleapis.com/css?family=Poiret+One');
</style>
@stop

@section('contents')



@foreach($mod as $post)
@if(count($post->Post)!=0)
<div class="container" style="background:; margin-top:100px;">
  <!-- Portfolio Section -->
<!-- <ol class="breadcrumbs breadcrumb-arrow" width="100%">
<li><a href="#">{{$post->name}}</a></li>
<li class="active" style=""><span>See More</span></li>
</ol> -->
<div class="mt-5">
  <h3>{{$post->name}}</h3>
</div>
<hr class="colorgraph"><br>
<div class="container">
  <section class="" id="portfolio"> 
    <div class="container">
      <div class="row">
        @foreach($post->post as $item)
        <div class="col-md-3 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="{{ url('/prodDescription/'.$item->id.'/'.$item->typeId.'/'.$item->itemId) }}">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <h5 style="font-family: 'Poiret One', cursive; color:white;">{{ $item->item->name }}</h4>
                </div>
              </div>
              <img class="img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="{{ asset($item->image) }}" alt="">
            </a>
            <div class="portfolio-caption">
              <?php $price = $post->price + $item->item->price; ?>
            P{{number_format($price,2)}}
              @if(count($item->item->RateItem)!=0)
              <?php
              $count = count($item->item->RateItem);
              $sum = 0;
              foreach($item->item->RateItem as $r)
              {
                $sum += $r->rating;
              }
              $ave = $sum/$count;
              ?>

              <?php $newave = round($ave);
              ?>
              <select id="example" disabled>
                <option value="1" @if(1 == $newave) selected = "selected" @else "" @endif>1</option>
                <option value="2" @if(2 == $newave) selected = "selected" @else "" @endif>2</option>
                <option value="3" @if(3 == $newave) selected = "selected" @else "" @endif>3</option>
                <option value="4" @if(4 == $newave) selected = "selected" @else "" @endif>4</option>
                <option value="5" @if(5 == $newave) selected = "selected" @else "" @endif>5</option>
              </select>
              <ul class="social-network2 social-circle2">
                @if(count($sns)!=0)
                <li><a target="_blank" href="{{ $sns->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="{{ $sns->twitter}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <!-- <li><a target="_blank" href="{{ $sns->messenger}}" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li> -->
                <li><a target="_blank" href="{{ $sns->messenger}}" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
                @else
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                @endif
              </ul>	
              <br>
              <a href="" class="mt-2 btn btn-danger text-white">Order now</a>
              @else
              <p class="text-muted">No ratings yet.</p>
              <ul class="social-network2 social-circle2">

                @if(count($sns)!=0)
                <li><a target="_blank" href="{{ $sns->facebook}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="{{ $sns->twitter}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="{{ $sns->messenger}}" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
                @else
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                @endif
              </ul>
              <br>
              <a href="{{ url('/cartPost/'.$item->typeId.'/'.$item->itemId) }}" class="mt-2 btn btn-danger text-white">Order now</a>
              @endif
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section>
  </div>


</div>
@else
<div class="container" style="background:; margin-top:100px;">
  <ol class="breadcrumbs breadcrumb-arrow">
    <li><a href="#">{{$post->name}}</a></li>
    <li class="active" style=""><span>See More</span></li>
  </ol>
</div>

<div class="container">
  <div class="jumbotron" style="background-color:darkorange; color:white;">
    <div class="col-lg-12" align="center">
      <h1>NO ITEM AVAILABLE!<h1>
      </div>
    </div>
  </div>
  @endif
  @endforeach




  @endsection

  @section('script')
  <script>
    $('#example').barrating({

      theme: 'fontawesome-stars',
      readonly: true
    });

  </script>
  @stop