@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Customer</h3>
        </div>
        @if ($errors->any())
            <script type="text/javascript">
                toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong")
            </script>         
        @endif
        @if(session('error'))
        <script type="text/javascript">
            toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
        </script>
         @endif
        <form action="{{ url('/CustomerEdit', $post->id) }}" method="post">
            
            {{ csrf_field() }}
     
            
            <div class="form-group">
            <label for="">First Name:</label>
            <input type="text"  placeholder="" value="{{ $post->firstName }}" class="form-control" name="firstName" id="name">
            </div>
            <div class="form-group">
            <label for="">Middle Name:</label>
            <input type="text"  placeholder="" value="{{ $post->middleName }}" class="form-control" name="middleName" id="name">
            </div>
            <div class="form-group">
            <label for="">Last Name:</label>
            <input type="text"  placeholder="" value="{{ $post->lastName }}" class="form-control" name="lastName" id="name">
            </div>
            <div class="form-group">
            Gender: 
            
            @if($post->gender == 1)
            <label class="radio-inline">
            <input type="radio"  value="1" checked name="gender">Male
            </label>
            <label class="radio-inline">
            <input type="radio"  value="2" name="gender">Female
            </label>
            @elseif($post->gender == 2)
            <label class="radio-inline">
            <input type="radio"  value="1" name="gender">Male
            </label>
            <label class="radio-inline">
            <input type="radio"  value="2" checked name="gender">Female
            </label>
            @endif
                
                
                
            </div>
            <div class="form-group">
            <label for="">Contact Number:</label>
            <input type="text"  placeholder=" " value="{{ $post->contactNumber }}" class="form-control" name="contactNumber" id="name">
            </div>
           
        
    </div> 
    <div class="col-lg-6" style="margin-top:40px;">
            <div class="form-group">
            <label for="">Email Address:</label>
            <input type="text"  placeholder=" " value="{{ $post->emailAddress }}" class="form-control" name="emailAddress" id="name">
            </div>
            <div class="form-group">
            <label for="">Street No./Bldg No.:</label>
            <input type="text"  placeholder="" value="{{ $post->street }}" class="form-control" name="street" id="name">
            </div>
            <div class="form-group">
            <label for="">Brgy No./Subd.:</label>
            <input type="text"  placeholder="" value="{{ $post->brgy }}" class="form-control" name="brgy" id="name">
            </div>
            <div class="form-group">
            <label for="">City:</label>
            <input type="text"  placeholder="" value="{{ $post->city }}" class="form-control" name="city" id="name">
            </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
    </form>
    </div>
    </div>
@endsection