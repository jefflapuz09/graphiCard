<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Service Subcategory</h3>
        </div>
        <form action="" method="">

        {{ csrf_field() }}
            
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder=""  disabled value="{{ $cat->name }}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="sel2">Service Category</label>

            <select  disabled class="form-control" id="sel" name="categoryId">
                <option value="">Select Service Type</option>
                @foreach($post as $posts)
                    
                    <option value="{{ $posts->id }}"
                    @if ($cat->categoryId == $posts->id)
                        selected = "selected"
                    @else
                   ""
                   @endif
                    >
                    {{ $posts->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" disabled placeholder="" value="{{ $cat->description }}" name="description" id="desc"></textarea>
            </div>
            <div class="pull-right">

            </div>
        </form>
    </div> 
    </div>
    </div>



@endsection