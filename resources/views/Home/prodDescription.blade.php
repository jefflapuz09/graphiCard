@extends('layouts.master')
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
      <div class="pull-right" style="margin-right:35px; margin-top:10px;">
         <small> {{$post->User->name}} - 
          {{date('F j, Y - H:i:s',strtotime($post->updated_at))}} </small>
      </div>
      <h2 class="mt-4 mb-3">Description</h2>
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
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
@stop
