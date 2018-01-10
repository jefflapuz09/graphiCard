@extends('layouts.master')

@section('style')
<link href="{{ asset('css/bars-1to10.css') }}" rel="stylesheet"> 
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop


@section('contents')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
<!-- <style>
#formModal {
left:50%;
outline: none;
}
</style> -->

<div class="container" style="margin-top:80px;">
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="lineModalLabel"><i class="fa fa-smile-o" aria-hidden="true"></i> Give us a Feedback! </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12"> 
              <form action="{{ url('/FeedbackStore') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                  <center><img class="img-responsive" id="pic" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:300px; background-size: contain" /></center>
                  <b><label style="margin-top:20px;" for="exampleInputFile">Upload a photo</label></b>
                  <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                </div>
                <div class="form-group">
                    <label for="">Customer Name:</label><div class="pull-right"><button type="button" class="btn btn-success btn-sm mb-2 ml-2" data-toggle="modal" title="New Customer" data-dismiss="modal" data-target="#myModal2"><i class="fa fa-plus" aria-hidden="true"></i></button></div></br>
                    <select class="select2 form-control" required name="customerId" style="width: 100%">
                      @foreach($customer as $cust)
                        <option value="{{ $cust->id }}">{{$cust->firstName}} {{$cust->middleName}} {{$cust->lastName}}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for=""><b>Your comments</b></label>
                  <textarea class="form-control" rows="5" required placeholder="Description" name="description" id="desc"></textarea>
                </div>
                <div class="form-group">
                    <label for=""><b>Rating: (MIN:1|MAX:5)</b></label>
                    <select id="example" name="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                </div>
                
                <div class="pull-right">
                  <button type="submit" class="btn btn-link" style="font-size:13pt; color:black; text-decoration:none; border:1px solid black;">Submit</button>
                </div>
              </form>
            </div> 
          </div>
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


  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pull-left">
            @if(session('success'))
            <script type="text/javascript">
                toastr.success(' <?php echo session('success'); ?>', 'Success!')
            </script>
            @endif
            @if(session('error'))
                <script type="text/javascript">
                    toastr.error(" <?php echo session('error'); ?>", "There's something wrong!")
                </script>
            @endif
            @if($errors->any())
                <script type="text/javascript">
                  toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
              </script>   
            @endif

        </div>
        <div class="pull-right">
          <a href="" data-toggle="modal" data-target="#formModal"><button class="btn btn-link" style="font-size:15pt; color:black; text-decoration:none; border:1px solid black;"><i class="fa fa-heart-o" aria-hidden="true"></i> Give us a Feedback! > </button></a>
        </div>
      </div>   
    </div>
  </div>
  <br>
  <div class="row">
    @if(count($feed)!=0)
    @foreach($feed as $feedback)
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;"></h3>
          {{--  loob ng h3 header  --}}
          <img class="card-img-top rounded-circle" src="{{ asset($feedback->image) }}" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">{{$feedback->name}}</h4>
          <p class="card-text">{{$feedback->description}}</p>
          <span class="social-box">
            <?php $round = round($feedback->rating); ?>

              <select id="" class="starrating" disabled>
                <option value="1" @if($round == 1) selected = "selected" @else "" @endif>1</option>
                <option value="2" @if($round == 2) selected = "selected" @else "" @endif>2</option>
                <option value="3" @if($round == 3) selected = "selected" @else "" @endif>3</option>
                <option value="4" @if($round == 4) selected = "selected" @else "" @endif>4</option>
                <option value="5" @if($round == 5) selected = "selected" @else "" @endif>5</option>
              </select>             
          </span>
        </div>
      </div>


    </div>
    @endforeach
    @else 
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          {{--  loob ng h3 header  --}}
          <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          {{--  loob ng h3 header  --}}
          <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          {{--  loob ng h3 header  --}}
          <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

          </span>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          {{--  loob ng h3 header  --}}
          <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <select id="" class="starrating meron" disabled>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

          </span>
        </div>
      </div>
    </div>
    @endif


  </div>

</div>

@endsection

@section('script')
<script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
<script>
    $( document ).ready(function() {
      $('#example').barrating({
        theme: 'bars-1to10'
      });
      $('.starrating').barrating({
        
        theme: 'fontawesome-stars',
        readonly: true
      });

      $('.meron').barrating('set', 5);
  });
</script>  
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
              reader.onload = function (e) {
                  $('#pic')
                  .attr('src', e.target.result)
                  .width(300);
              };
          reader.readAsDataURL(input.files[0]);
      }
      }
</script>
@stop