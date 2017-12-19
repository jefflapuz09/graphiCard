@extends('layouts.admin')

@section('content')

   <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Service Category</h3>
        </div>
        <form action="" method="">

            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" disabled  value="{{ $post->name }}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" disabled rows="5" value="{{ $post->description }}"  name="description" id="desc"></textarea>
            </div>

        </form>
    </div> 
    </div>
    </div>
@endsection