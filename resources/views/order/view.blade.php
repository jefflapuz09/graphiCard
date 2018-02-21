@extends('layouts.admin')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-4">
            <?php $orderID = str_pad($post->id, 7, '0', STR_PAD_LEFT); ?>
            <p class="lead m-0"> <b> ORD#<big><span style="color:red"><?php echo $orderID?></span></big></b></p>
        </div>
        <div class="col-md-4">
            <p class="lead m-0"> <b> STATUS : <big>
                @if($post->status == 0)
                <span style="color:red">PENDING</span>
                @elseif($post->status == 1)
                <span style="color:green">CONFIRMED</span>
                @elseif($post->status == 2)
                <span style="color:blue">FINISHED</span>
                @else 
                Released
                @endif
            </big></b></p>
        </div>
        <div class="col-md-4">
            <div class="pull-right">
                @if($post->status == 0)
                <a href="" class="mr-0 btn btn-primary">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Mail
                </a>
                @endif
                @if($post->status <= 2)
                <a href="{{ url('/OrderUpdate/'.$post->id) }}" class="m-2 ml-0 btn btn-primary">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                </a>
                @endif
            </div>
        </div>
    </div>
    <hr class="colorgraph"><br>  
        <div class="bg-faded col-md-12">

    <div class="row">
            <div class="col-md-5">
                <div class="card  text-center">
                    <div class="card-block p-2 mb-3" style="background:#f61919;">
                        <h5 class="text-white pt-2 text-center">Customer Information</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Name:   </b>{{$post->Customer->firstName}} {{$post->Customer->middleName}} {{$post->Customer->lastName}}</li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Gender:  </b>@if($post->Customer->gender == 1)Male @else Female @endif</li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Address: </b>{{$post->Customer->street}} {{$post->Customer->brgy}} {{$post->Customer->city}}</li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Contact Number: </b>{{$post->Customer->contactNumber}}</li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Email Address: </b>@foreach($post->Customer->User as $user) {{$user->email}} @endforeach</li>
                    </ul>
                </div>
                @if(count($post->request[0]->image))
                <div class="card mt-2 mb-4">
                    @foreach($post->request as $req)
                    <img class="img-responsive col-md-12" src="{{ asset($req->image) }}" width="200px">
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-sm-7">
                <div class="card  text-center">
                    <div class="card-block p-2 mb-3" style="background:#f61919;">
                        <h5 class="text-white pt-2 text-left">Order Inclusions</h5>
                    </div>
                    <table class="table">
                        <thead class="text-dark" style="color:black;">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post->Request as $request)
                            <tr>
                                <td>{{$request->itemName}}</td>
                                <td>{{$request->quantity}}</td>
                                <td>{{$request->orderDescription}}</td>
                                <td>{{$request->remarks}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card  text-center">
                    <div class="card-block p-2 mb-3" style="background:#f61919;">
                        <h5 class="text-white pt-2 text-left">Order Design</h5>
                    </div>
                    <table class="table">
                        <thead class="text-dark" style="background:;">
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post->Request as $request)
                            <tr>
                                <td>{{$request->itemName}}</td>
                                <td>{{$request->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--container-->
@endsection