@extends('layouts.master')

@section('contents')
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">

  <!-- <div class="row">
    <div class="col-md-4">
      <div class="carousel-item active" style="background-image: url('{{ asset('img/banner1.jpg')}}')">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <div class="col-md-8">
    </div>
  </div> -->
  <div class="row">
    <div class="col-md-8">
      <h3 class="my-3">About Us</h3> 
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <h3 class="my-3">Our History</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="col-md-4" style="background-color:#b5b3b3; padding-bottom:10px" >
      <div class="form-area" >  
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
            <!-- <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                     -->
          </div>

          <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>
@stop
