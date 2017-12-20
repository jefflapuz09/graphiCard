@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Post</h3>
        </div>
        <form action="{{ url('/PostUpdate', $post->id) }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select class="form-control" id="sel2" name="categoryId">
                    <option value="0">Please Select Service Category</option>
                @foreach($cat as $posts)   
                    <option value="{{ $posts->id }}" 
                    @if($post->categoryId == $posts->id)
                    selected = "selected"
                    @else
                    ""
                    @endif
                    >{{ $posts->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select class="form-control" id="sel2" name="typeId">
                    <option value="0">Please Select Service Type</option>
                @foreach($type as $types)   
                    <option value="{{ $types->id }}"
                    @if($post->typeId == $types->id)
                    selected = "selected"
                    @else 
                    ""
                    @endif
                    >{{ $types->name }}</option>
                @endforeach
            </select>
            </div>
             <div class="form-group" style="margin-top:30px;">
                <center><img class="img-responsive" id="pic" src="{{ URL::asset( $post->image )}}" style="max-width:300px; background-size: contain" /></center>
                <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            
            
           
        
    </div> 
    <div class="col-lg-6" style="margin-top:40px;">
            <div class="form-group">
            <label for="">Post Details:</label>
            <textarea class="form-control" rows="5" placeholder="details" name="details" id="details">{{$post->details}}</textarea>
            </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
    </div>
    </form>
    </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'details' );

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#pic')
                        .attr('src', e.target.result)
                        .width(300);
                    };
                reader.readAsDataURL(input.files[0]);
            }
            }
    </script>
@endsection