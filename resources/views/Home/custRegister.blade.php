@extends('layouts.master')

@section('style')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('contents')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
@if ($errors->any())
<script type="text/javascript">
    toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
</script>            
@endif  
@if(session('error'))
<script type="text/javascript">
   toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
</script>
@endif
@if(session('success'))
<script type="text/javascript">
    toastr.success(' <?php echo session('success'); ?>', 'Success!')
</script>
@endif
<div class="container" style="margin-top:65px;">
        <div class="container">
                <ol class="breadcrumbs breadcrumb-arrow wow fadeInUp">
                  <li><a href=""><span style="color:white;">Register</span></a></li>
                </ol>
        </div>
    <div class="container" class="p-5">
        <div class="container" class="p-5">
        <div class="container" class="p-5">
        <div class="mt-5">
            <h5>Account Information</h3>
        </div>
        <hr class="mb-5">
        <form action="{{ url('/customer/register/post') }}" method="post">
            {{ csrf_field() }}
        <div class="form-group form-control-sm row mt-5">
                <div class="col-sm-5">
                  <input class="form-control" placeholder="First Name" name="firstName" type="text">
                </div>
                <div class="col-sm-3">
                  <input class="form-control" placeholder="Middle Name" name="middleName" type="text">
                </div>
                <div class="col-sm-4">
                  <input class="form-control" placeholder="Last Name" name="lastName" type="text">
                </div>
        </div>
        <div class="form-group form-control-sm row">
                <div class="col-sm-5">
                  <input class="form-control" placeholder="Street No./Bldg No.:" name="street" type="text">
                </div>
                <div class="col-sm-3">
                  <input class="form-control" id="ex2" placeholder="Brgy No./Subd.:" name="brgy" type="text">
                </div>
                <div class="col-sm-4">
                  <input class="form-control" placeholder="City:" name="city" type="text">
                </div>
        </div>
        <div class="form-group form-control-sm row">
                <div class="col-sm-6">
                        Gender: 
                        <label class="radio-inline mt-2">
                        <input type="radio" value="1" checked name="gender">Male
                        </label>
                        <label class="radio-inline">
                        <input type="radio" value="2" name="gender">Female
                        </label>
                </div>
                <div class="col-sm-6 pull-right">
                  <input class="form-control" name="contactNumber" placeholder="Contact Number" type="text">
                </div>
                
        </div>
        <div class="form-group row">
                <div class="col-sm-4">
                  <input class="form-control" name="email" placeholder="Email Address" type="email">
                </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-4">
                  <input class="form-control" name="password" placeholder="Password" type="password">
                </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-4">
                  <input class="form-control"  name="password_confirmation" placeholder="Password Confirmation" type="password">
                </div>
        </div>
        <div class="pull-right">
                <button type="reset" class="btn btn-success">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </div>
</form>
</div>
    
@endsection