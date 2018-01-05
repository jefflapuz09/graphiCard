@extends('layouts.master')

@section('style')

@stop

@section('contents')
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/ServiceItem', $post->ServiceCategory->id) }}">{{$post->ServiceCategory->name}}</a></li>
    <li class="" style=""><a href="{{ url('/ServiceItem', $post->ServiceCategory->id) }}">{{$post->ServiceType->name}}</a></li>
    <li class="active" style=""><span><b>{{$post->Item->name}}</b></span></li>
  </ol>
  <div class="row" style="padding:10px;">
    <div class="col-md-7 form-line" style="margin-top:50px;">
      <!-- <h1 class="mt-4 mb-3" style="text-align:center">{{ $post->ServiceType->name }}</h1> -->
      <div align="center"><img class="img-responsive" style="max-height:100%; max-width:100%;" src="<?php echo asset($post->image)?>" height="400px"  alt="No image available"></div>
      <div class="row" style="">
      <div class="col-md-6" style="margin-top:10px;">
        <div class="text-center">
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
      
      <div class="col-md-6" style="margin-top:10px;">
        <div class="text-center text-muted">
         <small> {{$post->User->name}} - 
          {{date('F j, Y - H:i:s',strtotime($post->updated_at))}} </small>
         </div>
      </div>
      </div>
      <h2 class="mt-1 mb-2">Description</h2>
      <div class=""><?php echo $post->details?></div>
      <div class="pull-right">
          <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-link" style="font-size:15pt; color:black; text-decoration:none; border:1px solid black;"><i class="fa fa-heart-o" aria-hidden="true"></i> Give us a Review! > </button></a>
      </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">

    <div class="col-md-5">
      @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
      <section id="contact" style="background:url('{{ asset('img/grey-pattern.png') }}'); width:100%; padding:10px; margin-bottom:20px; ">
        <div class="form-area" style="background-image: url('{{ asset('img/grey-pattern.jpg') }}');">  
          <form role="form" method="post" action="{{ url('/InquirySend') }}" id="inquiry-form">

            {{ csrf_field() }}
            <br style="clear:both">
            <h2 class="section-header" style="margin-bottom: 25px; text-align: center; font-family: 'Oleo Script', cursive; color:maroon">Inquire Now</h2>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
            </div>
            <div class="float-right">
              <button type="submit" class="btn btn-link submit" style="color:maroon; hover:text-underline:none;"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
            </div>
            <div style="clear:both ">
          </form>
        </div>
      </section>
    </div>

  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-smile-o" aria-hidden="true"></i> Give us a Review</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
             <form action="{{ url('/ReviewStore') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" name="itemId" value="{{$post->Item->id}}">
                <div class="form-group">
                  <label for=""><b>Your Name</b></label>
                  <input type="text" placeholder="Name" value="" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                  <label for=""><b>Your comments</b></label>
                  <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
                </div>
                <div class="form-group">
                  <div data-role="rangeslider">
                    <label for="price-max"><b>Rate us! ( 1-5 ) </b></label>
                    <input type="range"  name="rating" id="price-max" value="3" min="1" max="5">
                  </div>
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-link" style="font-size:13pt; color:black; text-decoration:none; border:1px solid black;">Submit</button>
                </div>
              </form>
        </div>
      </div>
  
    </div>
  </div>
@stop

@section('script')

<script>


  $(document).ready(function(){


      $('#example').barrating({
        
        theme: 'fontawesome-stars',
        readonly: true
      });
    });
  
 

  
</script>
@stop
