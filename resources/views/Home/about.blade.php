@extends('layouts.master')

@section('style')
<link href="{{ asset('css/mdparts.css') }}" rel="stylesheet">
@stop

@section('contents')
<div class="container-fluid" style="margin-top:100px; background:; padding:20px; background-image: url('{{ asset('img/bg-pattern2.png') }}');">

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
    @if(count($comp)!=0)
    <div class="card-body rgba-grey-slight z-depth-2" >
    <div class="col-md-8" style="max-width:800px">
      <h3 class="my-3" style="font-family: 'Lato', sans-serif; font-weight:bold; color:black"><b>About Us</b></h3> 
      <?php echo $comp->about ?>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    </div>
    @else
    <div class="card-body rgba-grey-slight z-depth-2" >
    <div class="col-md-8" style="max-width:800px">
        <h3 class="my-3">About Us</h3> 
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <h3 class="my-3">Our History</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    @endif
    
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <div class="col-md-4" style=" padding-bottom:10px" >
      <div class="card-body red darken-4 z-depth-2" >
          <!-- Form contact -->
          <form method="post" action="{{ url('/InquirySend') }}">
              <h2 class="text-center py-4" style="font-family: 'Oleo Script'; color:white">Inquiry Form</h2>
              {{ csrf_field() }}
              <div class="md-form">
                  <i class="fa fa-user prefix white-text"></i>
                  <input type="text" id="form32" name="name" class="form-control">
                  <label for="form32" class="white-text">Your name</label>
              </div>
              <div class="md-form">
                  <i class="fa fa-envelope prefix white-text"></i>
                  <input type="text" class="white-text" id="form22" name="email" class="form-control">
                  <label for="form22"  class="white-text">Your email</label>
              </div>
              <div class="md-form">
                  <i class="fa fa-phone prefix white-text"></i>
                  <input type="text" class="white-text" id="form23" name="contact_number" class="form-control">
                  <label for="form23"  class="white-text">Your Mobile No.</label>
              </div>
              <div class="md-form">
                  <i class="fa fa-tag prefix white-text"></i>
                  <input type="text" class="white-text" id="form322" name="subject" class="form-control">
                  <label for="form342" class="white-text">Subject</label>
              </div>
              <div class="md-form">
                  <i class="fa fa-pencil prefix white-text"></i>
                  <textarea type="text" id="form82" name="message" class="md-textarea white-text" style="height: 100px"></textarea>
                  <label for="form82" class="white-text">Your message</label>
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-danger btn-lg">Send</button>
              </div>
          </form>
          <!-- Form contact -->
      </div>
    </div>
  </div>
</div>
</div>
@stop

@section('script')
<script src="{{ asset('js/mdb.min.js') }}"></script>

@stop