<?php $__env->startSection('content'); ?>
<div >
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col-md-6">
        <h4>Inquiries</h4>
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Date Inquired</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(\Carbon\Carbon::parse($posts->created_at)->format('F m,Y')); ?></td>
                    <td><?php echo e($posts->name); ?></td>
                    <td><?php echo e($posts->subject); ?></td>
                    <td> 
                        <a href="<?php echo e(url('/InquiryView',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View Inquiry">
                            <i class="fa fa-eye" aria-hidden="true"></i> View Inquiry
                        </a>
                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/InquiryRead')); ?>';" id="showDeactivated"> Show read inquiries</label>
        </div>
    </div>
    <div class="col-md-6">
     <form action="<?php echo e(url('/AdvisoryNew',$adv->id)); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <h4>Advisory (Make it short) </h4>
            <input type="hidden" name="status" value="0">
            <?php if(count($adv)!=0): ?>
            <textarea class="form-control" rows="5"  name="advisory" id="advisory"><?php echo $adv->advisory ?></textarea>
            <?php else: ?>
            <textarea class="form-control" rows="5"  name="advisory" id="advisory"></textarea>
            <?php endif; ?>
        </div>
        <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
<script>


    $(document).ready(function() {
      $('#example').DataTable( {
          "scrollX": true
      } );


  } );

</script>


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