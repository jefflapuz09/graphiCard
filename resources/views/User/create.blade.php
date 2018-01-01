@extends('layouts.admin')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
@stop

@section('content')

    <div class="container-fluid">
    <div>
        <h3>User</h3>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }}
    </div>                
    @endif
    <div class="row">
    
    <div class="col-lg-6"> 
        

       

        <form action="{{ url('/UserStore') }}" method="post">

        {{ csrf_field() }}
        
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Name" value="" class="form-control" name="name">
            </div>
            <div class="form-group">
            <label for="">Email:</label>
            <input type="email" placeholder="Email" value="" class="form-control" name="email">
            </div>
            <div class="form-group">
            <label for="">Password:</label>
            <input type="password" placeholder="Password" value="" class="form-control" name="password">
            </div>
            <div class="form-group">
            <label for="">Confirm Password:</label>
            <input type="password" placeholder="Confirm Password" value="" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="sel1">Role:</label>
                <select class="select2 form-control" name="role" id="sel1">
                  <option value='1'>Administrator</option>
                  <option value='2'>Contributor</option>
                </select>
              </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div> 
    </div>
    </div>
@endsection

@section('script')

        <script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
        <script>
        $( document ).ready(function() {
            $('.select2').select2();
        });
        </script>
@stop