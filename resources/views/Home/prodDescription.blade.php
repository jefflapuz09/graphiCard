@extends('layouts.master')
@section('contents')
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/') }}">{{$post->ServiceCategory->name}}</a></li>
    <li class="active" style=""><span><b>{{$post->ServiceType->name}}</b></span></li>
  </ol>
  <div class="row" style="padding:10px;">
    <div class="col-md-7 form-line">
      <!-- <h1 class="mt-4 mb-3" style="text-align:center">{{ $post->ServiceType->name }}</h1> -->
      <img class="img-fluid" style="max-height:500px; max-width:800px;" src="<?php echo asset($post->image)?>" height="200px" width="100%" alt="No image available">
      <h2 class="mt-4 mb-3">Description</h2>
      <?php echo $post->details?>
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
@stop
