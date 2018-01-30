@extends('layouts.admin')

@section('content')
    <div class="container" style="margin-top:20px;">
        <div class="card bg-faded">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card bg-dark text-white text-center">
                        <h5 class="text-white pt-2 text-center">Customer Information</h5>
                        <p class="lead">Customer: <br> {{$post->Customer->firstName}} {{$post->Customer->middleName}} {{$post->Customer->lastName}}</p>
                        <p class="lead">Gender: </br> @if($post->Customer->gender == 1)Male @else Female @endif</p>
                        <p class="lead">Address: </br> {{$post->Customer->street}} {{$post->Customer->brgy}} {{$post->Customer->city}}</p>
                        <p class="lead">Contact Number: </br> {{$post->Customer->contactNumber}}</p>
                        <p class="lead">Email Address: </br> @foreach($post->Customer->User as $user) {{$user->email}} @endforeach</p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="p-1 m-3 border border-dark border-top-0 border-bottom-0 border-right-0">
                            <p class="lead m-0"> Order </p>
                    </div>
                    <div class="card mr-3">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection