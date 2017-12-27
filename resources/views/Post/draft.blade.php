@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
            <div>
                <h3>Post</h3>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                  <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
            </div>
            @endif 
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif
    <div class="row">
    
    <div class="col-lg-6"> 
       
        <form action="{{ url('/PostUpdate', $post->id) }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="form-group">
                <div align="center" class="checkbox">
                <label>
                  @if($post->isFeatured == 0)
                  <input type="checkbox" checked name="isFeatured" value="0">
                  @elseif($post->isFeatured == 1)
                  <input type="checkbox" name="isFeatured" value="0">
                  @endif
                  <b>Featured Post</b>
                </label>
                </div>
            </div>
            <div class="form-group">
            <b><label for="sel2">Service Category</label></b>
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
            <b><label for="sel2">Item</label></b>
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
             <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px; padding-bottom: 20px;" >
                <center><img class="img-responsive" id="pic" src="<?php echo URL::asset( $post->image )?>" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <!-- small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
            </div>
            
    </div> 
    <div class="col-lg-6" style="margin-top:;">
            <div class="form-group">
            <b><label for="">Description</label></b>
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