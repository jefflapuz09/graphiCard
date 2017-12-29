<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Service Subcategory </h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
              <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
        </div>
        @endif  
        <form action="{{ url('/ServiceTypeEdit', $cat->id) }}" method="post">

        {{ csrf_field() }}
            
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder=""  value="{{ $cat->name }}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="sel2">Service Category</label>

            <select class="form-control" required id="sel" name="categoryId">
                <option value="" disabled>Select Service Type</option>
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
                <textarea class="form-control" rows="5" placeholder=""  name="description" id="desc">{{ $cat->description }}</textarea>
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