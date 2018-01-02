@extends('layouts.admin')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
@stop

@section('content')
    <div class="container-fluid">
            <div>
                <h3>Service Item</h3>
             </div>
             @if ($errors->any())
             <div class="alert alert-danger">
                   <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
             </div>
             @endif  
    <div class="row">
    
    <div class="col-lg-6"> 
        
       
        <form action="{{ url('/ItemUpdate', $post->id) }}" method="post">

        {{ csrf_field() }}
            
            <div class="form-group">
            <label for="sel2">Service Subcategory</label>
            <select class="sel2 form-control" required id="sel2" name="subcategoryId">
                <option value="0">Please Select Subcategory</option>
                @foreach($subcat as $posts)
                   
                    <option value="{{ $posts->id }}"
                        @if($posts->id == $post->subcategoryId)
                            selected = "selected"
                        @else
                            ""
                        @endif
                        >{{ $posts->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Service Item Name" value="{{ $post->name }}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc">{{ $post->description }}</textarea>
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