@extends('layouts.master')

@section('contents')



@foreach($mod as $post)
@if(count($post->Post)!=0)
<div class="container" style="background:; margin-top:100px;">
  <!-- Portfolio Section -->

  <div class="container">
    <ol class="breadcrumbs breadcrumb-arrow">
      <li><a href="#">{{$post->name}}</a></li>
      <li class="active" style=""><span>See More</span></li>
    </ol>
  </div>

  <div class="container">
        <section class="" id="portfolio"> 
          <div class="container">
                <div class="row">
                        @foreach($post->post as $item)
                           
                                <div class="col-md-3 col-sm-6 portfolio-item">
                                <a class="portfolio-link"  href="{{ url('/prodDescription',$item->id) }}">
                                    <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-flag fa-3x"></i>
                                    </div>
                                    </div>
                                    <img class="img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="{{ asset($item->image) }}" alt="">
                                </a>
                                <div class="portfolio-caption">
                                    <h4>{{ $item->item->name }}</h4>
                                    <p class="text-muted">See More</p>
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