<?php $__env->startSection('content'); ?>

<div id="accordion">
        
          <div class="card" style="border-color:maroon;">
            <div class="card-header" style="background-color:maroon;">
              <a class="card-link" style="color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Company Information
              </a>
            </div>
            <div id="collapseOne" class="collapse ">
              <div class="card-body">
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                          <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
                    </div>
                    <?php endif; ?> 
                    <div class="row">
                        <?php if(count($post)!=0): ?>
                            <div class="col-lg-6"> 
                                
                                <form action="<?php echo e(url('/UtilitiesUpdate', 1)); ?>" method="post" enctype="multipart/form-data">
                        
                                <?php echo e(csrf_field()); ?>

                                    
                                     <div class="form-group" style="margin-top:px; ">
                                        <p class="lead">Company Logo</p>
                                        <center><img class="img-responsive" id="pic" src="
                                            <?php echo e(URL::asset($post->company_logo)); ?>" style="max-width:200px; background-size: contain" /></center>
                                        <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                                        <input type="file" class="form-control-file" name="company_logo" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                                        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Company Name:</label>
                                        <input type="text" value="<?php echo e($post->company_name); ?>" class="form-control" name="company_name" id="name">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Street No./Bldg No.:</label>
                                    <input type="text"  value="<?php echo e($post->street); ?>" class="form-control" name="street" id="name">
                                    </div>
                                            
                                    <div class="form-group">
                                    <label for="">Brgy No./Subd.:</label>
                                    <input type="text" value="<?php echo e($post->brgy); ?>" class="form-control" name="brgy" id="name">
                                    </div>

                                    <div class="form-group">
                                    <label for="">City:</label>
                                    <input type="text"  value="<?php echo e($post->city); ?>" class="form-control" name="city" id="name">
                                    </div>

                                    <div class="form-group">
                                    <label for="">Contact Number:</label>
                                    <input type="text" value="<?php echo e($post->contactNumber); ?>" class="form-control" name="contactNumber" id="name">
                                    </div>

                                    <div class="form-group">
                                    <label for="">Email Address:</label>
                                    <input type="text" value="<?php echo e($post->emailAddress); ?>" class="form-control" name="emailAddress" id="name">
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
                            <?php else: ?> 
                            <div class="col-lg-6"> 
                                    
                                    <form action="<?php echo e(url('/UtilitiesUpdate', 1)); ?>" method="post" enctype="multipart/form-data">
                            
                                    <?php echo e(csrf_field()); ?>

                                        
                                         <div class="form-group" style="margin-top:px;">
                                            <p class="lead">Company Logo</p>
                                            <center><img class="img-responsive" id="pic" src="
                                                <?php echo e(URL::asset('img/steve.jpg')); ?>" style="max-width:200px; background-size: contain" /></center>
                                            <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                                            <input type="file" class="form-control-file" name="company_logo" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
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
                            <?php endif; ?>
                        </div>
              </div>
            </div>
          </div>      
        
        </div>
        

        <div id="accordion2" style="margin-top:20px;">
                
                  <div class="card" style="border-color:maroon;">
                    <div class="card-header" style="background-color:maroon;">
                      <a class="card-link" style="color:white;" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Carousel
                      </a>
                    </div>
                    <div id="collapseTwo" class="collapse show">
                      <div class="card-body">
                            <form action="<?php echo e(url('/PostStore')); ?>" method="post" enctype="multipart/form-data">
                                
                                        <?php echo e(csrf_field()); ?>


                                        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                                                <center><img class="img-responsive" id="pic2" src="<?php echo e(URL::asset('img/grey-pattern.png')); ?>" style="max-width:500px; max-height:100%; background-size: contain" /></center>
                                                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                                                <input type="file" class="form-control-file" name="banner1" onChange="readURL2(this)" id="exampleInputFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                        </div>

                                        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                                                <center><img class="img-responsive" id="pic3" src="<?php echo e(URL::asset('img/grey-pattern.png')); ?>" style="max-width:500px; background-size: contain" /></center>
                                                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                                                <input type="file" class="form-control-file" name="banner2" onChange="readURL3(this)" id="exampleInputFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                        </div>

                                        <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                                                <center><img class="img-responsive" id="pic4" src="<?php echo e(URL::asset('img/grey-pattern.png')); ?>" style="max-width:500px; background-size: contain" /></center>
                                                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                                                <input type="file" class="form-control-file" name="banner3" onChange="readURL4(this)" id="exampleInputFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                        </div>
                            </form>
                      </div>
                    </div>
                  </div>      
                
            </div>

    <script src="<?php echo e(url('vendor/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>