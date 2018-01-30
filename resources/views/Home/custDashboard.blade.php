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
  toastr.error('<?php echo session('error'); ?>', "There's something wrong!")
</script>
@endif
@if(session('success'))
<script type="text/javascript">
  toastr.success('<?php echo session('success'); ?>', 'Success!')
</script>
@endif
<div class="container-fluid" style="margin-top:65px; padding:50px;padding-top: 0px">
  <div class="mt-5">
    <h3>Dashboard</h3>
  </div>
  <hr class="colorgraph"><br>
  <div class="row">
    <div class="col-md-6">
      <h4>Your Personal Information</h4>
      <div class="card">
        <div class="card-block"  style="background:#f72028;">
          <div class="row">
            <div class="col-md-12">
              <div class="container p-3 text-center" >
                <img width="30%" height="40%" src="{{ asset('img/steve.jpg') }}">
              </div>
            </div>
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
            {{Auth::user()->Customer->firstName}} {{Auth::user()->Customer->middleName}} {{Auth::user()->Customer->lastName}}</b></li>
            <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
              {{Auth::user()->Customer->street}} {{Auth::user()->Customer->brgy}} {{Auth::user()->Customer->city}}</b></li>
              <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
                {{Auth::user()->Customer->contactNumber}}</b></li>
                <li class="list-group-item text-center" style="font-size:12pt;padding:3px"></li>
              </ul>
              <div>
                <button type="submit" class="btn btn-default submit"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit Info</button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div>
              <h4>Your Orders</h4>
              <div class="card">
                <div class="card-header" style="background:maroon; color:white;font-weight: bold">
                  Recent Orders
                </div>
                <div class="card-block">
                  <div class="container mt-3 mb-3">
                  <table class="table" cellspacing="2" width="100%" height="100%">
                    <thead>
                      <tr>
                        <th>Items - Quantity</th>
                        <th>Date Ordered</th>
                        <th>Total Price</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($post)!=0)
                      @foreach ($post as $posts)
                      <tr>
                        <td>
                          @foreach($posts->Request as $request)
                          <li>{{$request->itemName}}({{$request->quantity}}pcs)</li>
                          @endforeach
                        </td>
                        <td>{{ Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</td>
                        <td>
                          @if($posts->price == 0)
                          Price not yet set.
                          @else 
                          {{$posts->price}}
                          @endif
                        </td>
                        <td>
                          @if($posts->status == 0)
                          Pending
                          @elseif($posts->status == 1)
                          Confirmed
                          @elseif($posts->status == 2)
                          Finished
                          @else 
                          Released
                          @endif
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <td colspan="4" style="background-color: black;color:white;text-align:center; font-size:15pt"> You have no orders. </td>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div><div class="card">
                <div class="card-header" style="background:maroon; color:white;font-weight: bold">
                  Past Orders
                </div>
                <div class="card-block"><div class="container mt-3 mb-3">
                  <table class="table" cellspacing="2" width="100%" height="100%">
                    <thead>
                      <tr>
                        <th>Items - Quantity</th>
                        <th>Date Ordered</th>
                        <th>Total Price</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($post1)!=0)
                      @foreach ($post1 as $posts)
                      <tr>
                        <td>
                          @foreach($posts->Request as $request)
                          <li>{{$request->itemName}}({{$request->quantity}}pcs)</li>
                          @endforeach
                        </td>
                        <td>{{ Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</td>
                        <td>
                          @if($posts->price == 0)
                          Price not yet set.
                          @else 
                          {{$posts->price}}
                          @endif
                        </td>
                        <td>
                          @if($posts->status == 0)
                          Pending
                          @elseif($posts->status == 1)
                          Confirmed
                          @elseif($posts->status == 2)
                          Finished
                          @else 
                          Released
                          @endif
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <td colspan="4" style="background-color: black;color:white;text-align:center; font-size:15pt"> You have no past orders. </td>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection