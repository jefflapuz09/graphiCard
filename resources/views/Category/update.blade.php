@extends('layouts.admin')

@section('content')

   <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Service Category</h3>
        </div>
        <form action="{{ url('/CategoryEdit', $post->id) }}" method="post">

        {{ csrf_field() }}
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text"   value="{{ $post->name }}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control"  rows="5" name="description" id="desc">{{ $post->description }}</textarea>
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