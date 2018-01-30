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
  <div class="mt-5">
    <h3>Dashboard</h3>
  </div>
  <hr class="colorgraph"><br>
  <div class="row">
    <div class="col-md-6" style="background-color: #ed008c">
      <h4>Customer Information</h4> 
      <br>
      <div class="card">
          <div class="card-block"  style="background:#de0c14;">
              <div class="container p-3 text-center" >
                  <h4 class="card-title text-white" style="font-size:25pt;"><img width="70%" height="50%" src="{{ asset('img/steve.jpg') }}"></h4>
              </div>
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
                  {{Auth::user()->Customer->firstName}} {{Auth::user()->Customer->middleName}} {{Auth::user()->Customer->lastName}}</b></li>
              <li class="list-group-item text-center" style="font-size:12pt;padding:3px"></li>
          </ul>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row" style="height:50px; background-color: #fef200">
        <h4>Order Information</h4>
      </div>
      <div class="row" style="height:50px; background-color: #000000">
        <h4>Order History</h4>
      </div>
      <div class="row" style="height:50px; background-color: #00adef">
        <h4>Reviews Posted</h4>
      </div>
    </div>
  </div>
</div>
@endsection