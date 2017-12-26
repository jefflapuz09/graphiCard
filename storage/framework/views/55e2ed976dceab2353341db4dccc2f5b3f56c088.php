<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div>
                <h3>Post</h3>
            </div>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                  <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
            </div>
            <?php endif; ?> 
    <div class="row">
    
    <div class="col-lg-6"> 
        
        <form action="<?php echo e(url('/PostStore')); ?>" method="post" enctype="multipart/form-data">

        <?php echo e(csrf_field()); ?>

            <div class="form-group">
            <label for="sel2">Service Category</label>
            <select class="form-control" id="cat" onchange="changetype(this.value)" name="categoryId">
                    <option value="0">Please Select Service Category</option>
                <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($posts->id); ?>"><?php echo e($posts->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="form-group">
            <label for="sel2">Service Type</label>
            <select class="form-control" id="Type" name="typeId">
                    <option value="0">Please Select Service Type</option>
                
            </select>
            </div>
             <div class="form-group" style="margin-top:30px;">
                <center><img class="img-responsive" id="pic" src="<?php echo e(URL::asset('img/grey-pattern.png')); ?>" style="max-width:300px; background-size: contain" /></center>
                <label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            
            
           
        
    </div> 
    <div class="col-lg-6" style="margin-top:;">
            <div class="form-group">
            <label for="">Post Details:</label>
            <textarea class="form-control" rows="12" placeholder="details" name="details" id="details"></textarea>
            </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Save as Draft</button>
            </div>
    </div>
    </form>
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
                $("#Type").append('<option>Please Select Service Type</option>');
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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>