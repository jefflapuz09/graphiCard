@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    @if(session('error'))
        <script type="text/javascript">
            toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
        </script>
    @endif
<div id="accordion" role="tablist">
    <div class="card" style="border-color:maroon;">
      <div class="card-header" style="background-color:maroon;" role="tab" id="headingOne">
          <h5 class="mb-0">
              <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne" style="color:white; text-decoration: none">
                  Company Information
              </a>
          </h5>
      </div>
      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
              </div>
              @endif 
              <div class="row">
                  @if(count($post)!=0)
                  <div class="col-lg-6"> 
                      <form action="{{ url('/UtilitiesUpdate', 1) }}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="form-group" style="margin-top:px; ">
                              <b><p class="lead">Company Logo</p></b>
                              <center><img class="img-responsive" id="pic" src="<?php echo $post->company_logo ?>" style="max-width:200px; background-size: contain" /></center>
                              <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                              <input type="file"  class="form-control-file" name="company_logo" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp"/>
                          </div>
                          <div class="form-group">
                              <label for="">Company Name:</label>
                              <input type="text" value="{{$post->company_name}}" class="form-control" name="company_name" id="name"/>
                          </div>
                          <div class="form-group">
                              <label for="">Street No./Bldg No.:</label>
                              <input type="text"  value="{{$post->street}}" class="form-control" name="street" id="name"/>
                          </div>
                          <div class="form-group">
                              <label for="">Brgy No./Subd.:</label>
                              <input type="text" value="{{$post->brgy}}" class="form-control" name="brgy" id="name"/>
                          </div>
                          <div class="form-group">
                              <label for="">City:</label>
                              <input type="text"  value="{{$post->city}}" class="form-control" name="city" id="name"/>
                          </div>
                          <div class="form-group">
                              <label for="">Contact Number:</label>
                              <input type="text" value="{{$post->contactNumber}}" class="form-control" name="contactNumber" id="name"/>
                          </div>
                          <div class="form-group">
                              <label for="">Email Address:</label>
                              <input type="text" value="{{$post->emailAddress}}" class="form-control" name="emailAddress" id="name"/>
                          </div>
                      </div> 
                      <div class="col-lg-6" style="margin-top:px;">
                          <div class="form-group">
                              <label for="">Company About:</label>
                              <textarea class="form-control" rows="5"  name="about" id="details"><?php echo $post->about?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="">Services Offered:</label>
                              <textarea class="form-control" rows="5"  name="services_offered" id="details"><?php echo $post->services_offered ?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="">Company Description:</label>
                              <textarea class="form-control" rows="5"  name="description" id="details"><?php echo $post->description ?></textarea>
                          </div>
                          <div class="pull-right">
                              <button type="reset" class="btn btn-success">Clear</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                  </form>
              </div>
              @else 
              <form action="{{ url('/UtilitiesUpdate', 1) }}" method="post" enctype="multipart/form-data">
                  <div class="col-lg-6"> 
                      {{ csrf_field() }}
                      <div class="form-group" style="margin-top:px;">
                          <p class="lead">Company Logo</p>
                          <center><img class="img-responsive" id="pic" src="
                              {{ URL::asset('img/steve.jpg')}}" style="max-width:200px; background-size: contain" /></center>
                              <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                              <input type="file" class="form-control-file" name="company_logo" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                          </div>
                          <div class="form-group">
                              <label for="">Company Name:</label>
                              <input type="text" value="Company Name" class="form-control" name="company_name" id="name">
                          </div>
                          <div class="form-group">
                              <label for="">Street No./Bldg No.:</label>
                              <input type="text"  value="Street No./Bldg No." class="form-control" name="street" id="name">
                          </div>
                          <div class="form-group">
                              <label for="">Brgy No./Subd.:</label>
                              <input type="text" value="Brgy." class="form-control" name="brgy" id="name">
                          </div>
                          <div class="form-group">
                              <label for="">City:</label>
                              <input type="text"  value="City" class="form-control" name="city" id="name">
                          </div>
                          <div class="form-group">
                              <label for="">Contact Number:</label>
                              <input type="text" value="Contact Number" class="form-control" name="contactNumber" id="name">
                          </div>
                          <div class="form-group">
                              <label for="">Email Address:</label>
                              <input type="text" value="Email Address" class="form-control" name="emailAddress" id="name">
                          </div>
                      </div> 
                      <div class="col-lg-6" style="margin-top:px;">
                          <div class="form-group">
                              <label for="">Company About:</label>
                              <textarea class="form-control" rows="5"  name="about" id="details"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="">Services Offered:</label>
                              <textarea class="form-control" rows="5"  name="services_offered" id="details"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="">Company Description:</label>
                              <textarea class="form-control" rows="5"  name="description" id="details"></textarea>
                          </div>
                          <div class="pull-right">
                              <button type="reset" class="btn btn-success">Clear</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                  </form>
                  @endif
              </div>
          </div>
      </div>
  </div>

  <div class="card" style="border-color:maroon; margin-top:10px">
    <div class="card-header" style="background-color:maroon;" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo" style="color:white; text-decoration:none">
          Banner
      </a>
  </h5>
</div>
<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
  <div class="card-body">
    <form action="{{ url('/UtilityStore') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if(count($ban)!=0)
        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
            <center><img class="img-responsive" id="pic2" src="{{ URL::asset($ban->banner)}}" style="max-width:500px; max-height:100%; background-size: contain" /></center>
            <b><label style="margin-top:20px;" for="exampleInputFile">Banner 1</label></b>
            <input type="file" class="form-control-file" name="banner1" onChange="readURL2(this)" id="exampleInputFile" aria-describedby="fileHelp">
        </div>
        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
            <center><img class="img-responsive" id="pic3" src="{{ URL::asset($ban->banner2)}}" style="max-width:500px; background-size: contain" /></center>
            <b><label style="margin-top:20px;" for="exampleInputFile">Banner 2</label></b>
            <input type="file" class="form-control-file" name="banner2" onChange="readURL3(this)" id="exampleInputFile" aria-describedby="fileHelp">
            <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
        </div>

        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
            <center><img class="img-responsive" id="pic4" src="{{ URL::asset($ban->banner3)}}" style="max-width:500px; background-size: contain" /></center>
            <b><label style="margin-top:20px;" for="exampleInputFile">Banner 3</label></b>
            <input type="file" class="form-control-file" name="banner3" onChange="readURL4(this)" id="exampleInputFile" aria-describedby="fileHelp">
            <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
        </div>
        @else
        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
            <center><img class="img-responsive" id="pic2" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:500px; max-height:100%; background-size: contain" /></center>
            <b><label style="margin-top:20px;" for="exampleInputFile">Banner 1</label></b>
            <input type="file" class="form-control-file" name="banner1" onChange="readURL2(this)" id="exampleInputFile" aria-describedby="fileHelp">
            <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
        </div>

        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
            <center><img class="img-responsive" id="pic3" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:500px; background-size: contain" /></center>
            <b><label style="margin-top:20px;" for="exampleInputFile">Banner 2</label></b>
            <input type="file" class="form-control-file" name="banner2" onChange="readURL3(this)" id="exampleInputFile" aria-describedby="fileHelp">
            <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
        </div>

        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
            <center><img class="img-responsive" id="pic4" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:500px; background-size: contain" /></center>
            <b><label style="margin-top:20px;" for="exampleInputFile">Banner 3</label></b>
            <input type="file" class="form-control-file" name="banner3" onChange="readURL4(this)" id="exampleInputFile" aria-describedby="fileHelp">
            <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
        </div>
        @endif
        <div class="pull-right" style="margin-bottom: 15px;">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</div><!--END OF 2-->

</div><!--END OF ACCORDION-->

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
                $("#Type").append('<option>Please select service Type</option>');
                $.each(data,function(key, value)
                {

                    console.log(value.categoryId);
                    $("#Type").append('<option value=' + value.id + '>' + value.name + '</option>');
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
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pic2')
                .attr('src', e.target.result)
                .width(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pic3')
                .attr('src', e.target.result)
                .width(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pic4')
                .attr('src', e.target.result)
                .width(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection