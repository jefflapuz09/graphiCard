@extends('layouts.master')

@section('style')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
<style>
.btn-outline-secondary {
  color: #272626;
  background-color: transparent;
  background-image: none;
  border-color: #272626;
}

.btn-outline-secondary:hover {
  color: white;
  background-color: #f72028;
  border-color: black;
  font-weight: bold;
}

.btn-outline-secondary:focus, .btn-outline-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(134, 142, 150, 0.5);
}

.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
  color: #868e96;
  background-color: transparent;
}
</style>
@stop

@section('contents')

<div class="container">
    <div class="container" class="p-5" style="margin-top:80px;">
        <div class="mt-5">
            <h3> Packages</h3>
        </div>
    </div>
    <hr class="colorgraph">
    <div class="row">
        @foreach($post as $posts)
        <div class="col-sm-4">
            <div class="card" style="width: 20rem;">
                <div class="card-block"  style="background:#de0c14;">
                    <div class="container p-3 text-center" >
                        <h4 class="card-title text-white" style="font-size:25pt;">{{$posts->name}}</h4>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center" style="font-size:15pt;color:red;padding:5px"><b>₱ {{$posts->price}}</b></li>
                    @foreach($posts->Inclusion as $inclusion)
                    <li class="list-group-item text-center" style="font-size:12pt;padding:3px">{{$inclusion->ItemPack->name}} ({{$inclusion->qty}}@if($inclusion->qty <= 1) pc. @else pcs. @endif)</li>
                    @endforeach
                </ul>
                <div class="card-block" style="padding:3px">
                    <div class="container text-center"  style="padding-bottom:10px">
                        <a href="" data-toggle="modal" data-target="#modal" class="mt-2 btn btn-outline-secondary"> Order now </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


{{--  modal  --}}
<div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background:darkred;">
                <h5 class="modal-title">Package Information</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <hr class="colorgraph">
                <p class="lead">
                    @foreach($post as $posts)
                    Package Name: {{$posts->name}}<br><br>
                    Items: <br>
                    @foreach($posts->Inclusion as $inclusion)
                    {{$inclusion->ItemPack->name}} ({{$inclusion->qty}}@if($inclusion->qty <= 1) pc. @else pcs. @endif)<br>
                    @endforeach
                    <br>Price: ₱{{$posts->price}}
                    @endforeach
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection