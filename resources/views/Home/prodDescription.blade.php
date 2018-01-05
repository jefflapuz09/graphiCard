@extends('layouts.master')

@section('style')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('contents')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>

<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
    @if(session('success'))
    <script type="text/javascript">
        toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
    </script>
    @endif
    @if(session('error'))
        <script type="text/javascript">
            toastr.error(" <?php echo session('error'); ?>", "There's something wrong")
        </script>
    @endif
    @if($errors->any())
    <script type="text/javascript">
          toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong")
      </script>   
    @endif
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
      <div class="pull-right mt-5">
          <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-link" style="font-size:15pt; color:black; text-decoration:none; border:1px solid black;"><i class="fa fa-heart-o" aria-hidden="true"></i> Give us a Review! > </button></a>
      </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">

    <div class="col-md-5">
      <section id="contact" style="background:url('{{ asset('img/grey-pattern.png') }}'); width:100%; padding:10px; margin-top:20px;">
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
                  <label for="">Customer Name:</label><div class="pull-right"><button type="button" class="btn btn-success btn-sm mb-2 ml-2" data-toggle="modal" title="New Customer" data-dismiss="modal" data-target="#myModal2"><i class="fa fa-plus" aria-hidden="true"></i></button></div></br>
                  <select class="select2 form-control" name="customerId" style="width: 100%">
                    @foreach($customer as $cust)
                      <option value="{{ $cust->id }}">{{$cust->firstName}} {{$cust->middleName}} {{$cust->lastName}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Your comments</label>
                  <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
                </div>
                <div class="form-group">
                  <div data-role="rangeslider">
                    <label for="price-max">Rate us! ( 1-5 )</label>
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

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Customer Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
    
    <div class="col-lg-6"> 
        
                    
       
        <form action="{{ url('/CustomerWebStore') }}" method="post">

        {{ csrf_field() }}
            
            <div class="form-group">
            <label for="">First Name:</label>
            <input type="text" placeholder="First Name" value=""  class="form-control" name="firstName" id="name">
            </div>
            <div class="form-group">
            <label for="">Middle Name:</label>
            <input type="text" placeholder="Middle Name" value=""  class="form-control" name="middleName" id="name">
            </div>
            <div class="form-group">
            <label for="">Last Name:</label>
            <input type="text" placeholder="Last Name" value=""  class="form-control" name="lastName" id="name">
            </div>
            <div class="form-group">
            Gender: 
                <label class="radio-inline">
                <input type="radio" value="1" checked name="gender">Male
                </label>
                <label class="radio-inline">
                <input type="radio" value="2" name="gender">Female
                </label>
            </div>
            <div class="form-group">
            <label for="">Contact Number:</label>
            <input type="text" placeholder="Contact Number" value="" class="form-control" name="contactNumber" id="name">
            </div>
           
        
            </div> 
            <div class="col-lg-6" style="margin-top:0px;">
                    <div class="form-group">
                    <label for="">Email Address:</label>
                    <input type="text" placeholder="Email Address" value="" class="form-control" name="emailAddress" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Street No./Bldg No.:</label>
                    <input type="text" placeholder="Street No./Bldg No." value="" class="form-control" name="street" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Brgy No./Subd.:</label>
                    <input type="text" placeholder="Brgy No./Subd." value="" class="form-control" name="brgy" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">City:</label>
                    <input type="text" placeholder="City" value="" class="form-control" name="city" id="name">
                    </div>
                    <div class="pull-right">
                    <button type="reset" class="btn btn-success">Clear</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
            </div>
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
