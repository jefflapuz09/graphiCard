@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Post</h3>
        </div>
        <form action="{{ url('/PostStore') }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select class="form-control" id="sel2" name="categoryId">
                    <option value="0">Please Select Service Category</option>
                @foreach($cat as $posts)   
                    <option value="{{ $posts->id }}">{{ $posts->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select class="form-control" id="sel2" name="typeId">
                    <option value="0">Please Select Service Type</option>
                @foreach($type as $types)   
                    <option value="{{ $types->id }}">{{ $types->name }}</option>
                @endforeach
            </select>
            </div>
             <div class="form-group" style="margin-top:30px;">
                <center><img class="img-responsive" id="pic" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:300px; background-size: contain" /></center>
                <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            
            
           
        
    </div> 
    <div class="col-lg-6" style="margin-top:40px;">
            <div class="form-group">
            <label for="">Post Details:</label>
            <textarea class="form-control" rows="20" placeholder="details" name="details" id="details"></textarea>
            </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Save as Draft</button>
            </div>
    </div>
    </form>
    </div>
    </div>

    <script src="{{ url('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
       tinymce.init({
  selector: 'textarea',
  plugins: 'image code',
  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | undo redo | code',
  image_title: true, 
  automatic_uploads: true,
  file_picker_types: 'image', 
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.onchange = function() {
      var file = this.files[0];
      
      var reader = new FileReader();
      reader.onload = function () {

        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }
});

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