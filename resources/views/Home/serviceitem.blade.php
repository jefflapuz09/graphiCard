@extends('layouts.master')

@section('style')
    
@stop

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
                                <a class="portfolio-link"  href="{{ url('/prodDescription/'.$item->id.'/'.$item->typeId) }}">
                                    <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-flag fa-3x"></i>
                                    </div>
                                    </div>
                                    <img class="img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="{{ asset($item->image) }}" alt="">
                                </a>
                                <div class="portfolio-caption">
                                    <h4>{{ $item->item->name }}</h4>
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
                                  @else
                                  <p class="text-muted">No ratings yet.</p>
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