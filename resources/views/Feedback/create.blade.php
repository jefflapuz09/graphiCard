@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    <div>
        <h3>Customer Feedback</h3>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }}
    </div>                
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
     @endif
    <div class="row">
    
    <div class="col-lg-6"> 
        

       

        <form action="{{ url('/FeedbackStore') }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                <center><img class="img-responsive" id="pic" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Name" value="" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
            </div>
            <div class="form-group">
                    <div data-role="rangeslider">
                        <label for="price-max">Rating:</label>
                        <input type="range"  name="rating" id="price-max" value="3" min="1" max="5">
                   </div>
            </div>
            <div class="pull-left">
                    <div class="form-group">
                            <div align="center" class="checkbox">
                            <label>
                              <input type="checkbox" name="isSelected" value="0">
                              <b>Selected Post</b>
                            </label>
                            </div>
                        </div>
            </div>
            <div class="pull-right">
                <button type="reset" class="btn btn-success">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div> 
    </div>
    </div>

    <script>
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