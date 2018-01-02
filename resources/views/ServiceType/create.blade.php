@extends('layouts.admin')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
@stop


@section('content')

    <div class="container-fluid">
            <div>
                <h3>Service Subcategory</h3>
             </div>
             @if ($errors->any())
             <div class="alert alert-danger">
                   <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
             </div>
             @endif  
    <div class="row">
    
    <div class="col-lg-6"> 
        
       
        <form action="{{ url('/ServiceTypeStore') }}" method="post">

        {{ csrf_field() }}
            
            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select  class="form-control" required id="sel2" name="categoryId">
                    <option value="0" disabled>Please select service type</option>
                @foreach($post as $posts)
                   
                    <option value="{{ $posts->id }}">{{ $posts->category }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Service Category Name" value="" class="form-control" name="name" id="name">
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

@section('script')

        <script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
        <script>
        $( document ).ready(function() {
            $('#sel2').select2();
        });
        </script>
@stop