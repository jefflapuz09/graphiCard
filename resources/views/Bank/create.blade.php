@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    <div>
        <h3>Bank Account</h3>
    </div>
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
    <div class="row">
    
    <div class="col-lg-6"> 
        

       

        <form action="{{ url('/BankStore') }}" method="post">

        {{ csrf_field() }}

            <div class="form-group">
            <label for="">Bank:</label>
            <input type="text" placeholder="Bank Name" value="" class="form-control" name="bank" id="name">
            </div>
            <div class="form-group">
            <label for="">Account Name:</label>
            <input type="text" placeholder="Account Name" value="" class="form-control" name="accountName" id="name">
            </div>
            <div class="form-group">
            <label for="">Account Number:</label>
            <input type="text" placeholder="Account Number" value="" class="form-control" name="accountNumber" id="name">
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