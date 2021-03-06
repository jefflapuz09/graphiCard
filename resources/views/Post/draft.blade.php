@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    
            <div>
                <h3>Post</h3>
            </div>
            @if ($errors->any())
                <script type="text/javascript">
                    toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
                </script>           
            @endif  
            @if(session('error'))
                <script type="text/javascript">
                    toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
                </script>
            @endif
    <div class="row">
    
    <div class="col-lg-6"> 
       
        <form action="{{ url('/PostUpdate', $post->id) }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <div class="form-group">
                    <div align="center" class="checkbox">
                    <label>
                      <input type="checkbox" name="isFeatured" value="0">
                      <b>Featured Post</b>
                      <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="popover" title="Featured Post" data-html="true" data-content="Ticking the box will let the post be displayed on the landing page of the website. If not, it will be just displayed on the default page."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                    </label>
                    </div>
                </div>
            <div class="form-group">
            <b><label for="sel2">Service Category</label></b>
            <select class="select2 form-control" id="cat" onchange="changetype(this.value)" name="categoryId">
                    <option value="0">Please Select Service Category</option>
                @foreach($cat as $posts)   
                    <option value="{{ $posts->id }}"
                        @if($posts->id == $post->categoryId)
                         selected = "selected"
                        @else 
                         ""
                        @endif
                        >{{ $posts->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <b><label for="sel2">Service Subcategory</label></b>
            <select class="select2 form-control" onchange="changesub(this.value)" id="Type" name="typeId">
                    <option value="0">Please Select Service Subcategory</option>
                    @foreach($type as $posts)   
                    <option value="{{ $posts->id }}"
                        @if($posts->id == $post->typeId)
                         selected = "selected"
                        @else 
                         ""
                        @endif
                        >{{ $posts->name }}</option>
                @endforeach
              
            </select>
            </div>
            <div class="form-group">
                    <b><label for="sel2">Service Item</label></b>
                    <select class="select2 form-control" id="item" name="itemId">
                            <option value="0">Please Select Service Item</option>
                            @foreach($item as $posts)   
                    <option value="{{ $posts->id }}"
                        @if($posts->id == $post->itemId)
                         selected = "selected"
                        @else 
                         ""
                        @endif
                        >{{ $posts->name }}</option>
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

@endsection

@section('script')

        <script src="{{ url('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script>
    
    
        

        function changetype(id)
        {
            $.ajax({
                type: "GET",
                url: '/PostType/'+id,
                dataType: "JSON",
                success:function(data){
    
                    $('#Type').empty();
                    $("#Type").append('<option>Please Select Service Subcategory</option>');
                    $.each(data,function(key, value)
                    {
                        
                        console.log(value.categoryId);
                        $("#Type").append('<option value=' + value.id + '>' + value.name + '</option>');

                     
                    });
                }
             });
        }

        function changesub(id)
        {
            $.ajax({
                type: "GET",
                url: '/PostSub/'+id,
                dataType: "JSON",
                success:function(data){
    
                    $('#item').empty();
                    $("#item").append('<option>Please Select Service Item</option>');
                    $.each(data,function(key, value)
                    {
                        
                        console.log(value.itemId);
                        $("#item").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
             });
        }
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
@stop