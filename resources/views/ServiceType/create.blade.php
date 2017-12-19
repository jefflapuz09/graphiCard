@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Service Type</h3>
        </div>
        <form action="{{ url('/ServiceTypeStore') }}" method="post">

        {{ csrf_field() }}
            
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Service Category Name" value="" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select  class="form-control" id="sel2" name="categoryId">
                @foreach($post as $posts)
                   <option value="0">Please select service type</option>
                    <option value="{{ $posts->id }}">{{ $posts->category }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
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