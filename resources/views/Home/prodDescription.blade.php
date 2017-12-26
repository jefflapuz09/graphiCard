@extends('layouts.master')

@section('contents')
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">

  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <?php echo $post->ServiceType->name?>
  </h1>

  <ol class="breadcrumb" style="background:black;">
    <li class="breadcrumb-item">
      <a href="{{ url('/') }}" style="color:white;">Home</a>
    </li>
    <li class="breadcrumb-item active" style="color:white;"><?php echo $post->ServiceCategory->name?></li>
    <li class="breadcrumb-item active" style="color:white;"><?php echo $post->ServiceType->name?></li>
  </ol>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img src="<?php echo asset($post->image)?>" height="500px" width="100%" alt="">
        <h3 class="my-3">Description</h3> 
        <p><?php echo $post->details?></p>
        <h3 class="my-3">Others</h3> 
        <p><?php echo $post->details?></p>
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
