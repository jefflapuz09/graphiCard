@extends('layouts.master')
@section('contents')
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
    <ol class="breadcrumbs breadcrumb-arrow" width="100%">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/') }}">{{$post->ServiceCategory->name}}</a></li>
      <li class="active" style=""><span>{{$post->ServiceType->name}}</span></li>
    </ol>
  <h1 class="mt-4 mb-3">
    {{ $post->type }}
  </h1>
  <div class="row">
    <div class="col-md-8">
      <img class="img-fluid" style="max-height:300px; max-width:500px;" src="<?php echo asset($post->image)?>" height="200px" width="" alt="" title="{{$post->type}}">
      <h1 class="mt-4 mb-3">Description</h1>
      <?php echo $post->details?>
    </div>
    <div class="col-md-4">
      <div class="form-area">  
        <form role="form">
          <br style="clear:both">
          <h3 style="margin-bottom: 25px; text-align: center; font-family: 'Oleo Script', cursive;">Inquire Now</h3>
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Contact Number" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
          </div>

          <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
        </form>
      </div>

    </div>

  </div>
</div>
@stop
