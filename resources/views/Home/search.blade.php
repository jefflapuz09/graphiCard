@extends('layouts.master')

@section('contents')

<div class="container" style="margin-top:100px;">
    <div class="col-sm-6 mx-auto">
        <div class="">
                    <div class="input-group col-sm-12" >
                        <input type="text" class="form-control"  id="inlineFormInputGroup" placeholder="Search">
                        <a href="" class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
        </div>
    </div>
    <div class="card mt-5">
        @if(session('none'))
        <div class="mx-auto">
            <p class="lead">You search for text and did not match anything.</p>
        </div>
        @endif
    </div>
</div>
    
@endsection