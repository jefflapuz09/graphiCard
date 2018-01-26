@extends('layouts.master')

@section('contents')

<div class="container">
        <ol class="breadcrumbs breadcrumb-arrow" style="margin-top:80px;">
          <li><a href="#">Packages</a></li>
          <li class="active" style=""><span>See More</span></li>
        </ol>
        <hr class="colorgraph">
        <div class="row">
            @foreach($post as $posts)
                <div class="col-sm-4">
                    <div class="card" style="width: 20rem; border-color:darkred;">
                        <div class="card-block"  style="background:darkred;">
                            <div class="container p-3 text-center">
                                <h4 class="card-title text-white">{{$posts->name}}</h4>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center" style="font-size:30pt;">₱{{$posts->price}}</li>
                            @foreach($posts->Inclusion as $inclusion)
                            <li class="list-group-item text-center">{{$inclusion->ItemPack->name}} ({{$inclusion->qty}}@if($inclusion->qty <= 1) pc. @else pcs. @endif)</li>
                            @endforeach
                        </ul>
                        <div class="card-block">
                            <div class="container p-3 text-center">
                                    <a href="" data-toggle="modal" data-target="#modal" class="mt-2 btn btn-primary text-white">Order now</a>
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