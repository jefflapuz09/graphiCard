@extends('layouts.admin')

@section('content')
    <div class="container" style="margin-top:20px;">
        <div class=" bg-faded">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card  text-center">
                        <div class="card-block p-2 mb-3" style="background:#252525;">
                                <h5 class="text-white pt-2 text-center">Customer Information</h5>
                        </div>
                        
                        <p class="lead">Customer: <br> {{$post->Customer->firstName}} {{$post->Customer->middleName}} {{$post->Customer->lastName}}</p>
                        <p class="lead">Gender: </br> @if($post->Customer->gender == 1)Male @else Female @endif</p>
                        <p class="lead">Address: </br> {{$post->Customer->street}} {{$post->Customer->brgy}} {{$post->Customer->city}}</p>
                        <p class="lead">Contact Number: </br> {{$post->Customer->contactNumber}}</p>
                        <p class="lead">Email Address: </br> @foreach($post->Customer->User as $user) {{$user->email}} @endforeach</p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="p-1 m-3 border border-dark border-top-0 border-bottom-0 border-right-0">
                            <p class="lead m-0"> Order: <big><span style="color:red">0000000{{$post->id}}</span></big></p>
                    </div>
                    <div class="mr-3">
                        <div class="">
                            <div class="col-sm-12">
                                <div class="mt-3 pull-left">
                                    Status: 
                                    @if($post->status == 0)
                                    Pending
                                    @elseif($post->status == 1)
                                        Confirmed
                                    @elseif($post->status == 2)
                                        Finished
                                    @else 
                                        Released
                                    @endif
                                </div>
                                <div class="pull-right">
                                    @if($post->status == 0)
                                        <a href="" class="mr-0 btn btn-primary">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    @if($post->status <= 2)
                                        <a href="{{ url('/OrderUpdate/'.$post->id) }}" class="m-2 ml-0 btn btn-primary">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <table class="table mt-5">
                                <thead class="text-white" style="background:darkred;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection