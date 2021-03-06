<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/info-box.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<div >
        <?php if(session('success')): ?>
        <script type="text/javascript">
            toastr.success(' <?php echo session('success'); ?>', 'Success!')
        </script>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
            </script>
        <?php endif; ?>  
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="info-box">
            <span class="info-box-icon"><a href="<?php echo e(url('/Post')); ?>"><i class="fa fa-paste"></i></a></span>
            <div class="info-box-content">
            <span class="info-box-text">No. of Drafts</span>
            <span class="info-box-number"><?php echo e(count($countPost)); ?></span>
            </div><!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-sm-4">
            <div class="info-box">
                <span class="info-box-icon"><a href="<?php echo e(url('/Feedback')); ?>"><i class="fa fa-handshake-o"></i></a></span>
                <div class="info-box-content">
                <span class="info-box-text">No. of Published Feedbacks</span>
                <span class="info-box-number"><?php echo e(count($countFeedback)); ?></span>

                </div><!-- /.info-box-content -->
            </div>
        </div>
         <div class="col-sm-4">
        <div class="info-box">
            <span class="info-box-icon"><a href="<?php echo e(url('/Review')); ?>"><i class="fa fa-comments"></i></a></span>
            <div class="info-box-content">
            <span class="info-box-text">No. of Item Reviews</span>
            <span class="info-box-number"><?php echo e(count($countRateItem)); ?></span>
            </div><!-- /.info-box-content -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card" style="border:1px solid black; margin:;">
        <!-- <div class="card-header" style="background:#f22e35; color:white;"> -->
        <div class="card-header" style="background:#a70000; color:white;">
            <b>New Orders</b>
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All customer inquiries are displayed here. By clicking the view icon you'll be able to view all inquiry information."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
        </div>
        <div class="card-block">
            <div class="container mt-3">
            <table class="display dtable">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Date Ordered</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($ord->Customer->firstName); ?> <?php echo e($ord->Customer->middleName); ?> <?php echo e($ord->Customer->lastName); ?></td>
                            <td><?php echo e(Carbon\Carbon::parse($ord->created_at)->diffForHumans()); ?></td>
                            <td>
                                <?php if($ord->status == 0): ?>
                                    Pending
                                <?php elseif($ord->status == 1): ?>
                                    Confirmed
                                <?php elseif($ord->status == 2): ?>
                                    Finished
                                <?php else: ?> 
                                    Released
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($ord->status <= 2): ?>
                                    <a href="#" class="btn btn-primary">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="form-group pull-right mr-3">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/InquiryRead')); ?>';" id="showDeactivated"> Show read inquiries</label>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div id="accordion">
          <div class="card" style="border-color:maroon;">
            <div class="card-header" id="headingOne" style="background:#a70000; color:white;">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color:white; text-decoration: none">
                  <b>Inquiries</b>
                </button>

            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All customer inquiries are displayed here. By clicking the view icon you'll be able to view all inquiry information."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                    <div class="container mt-3">
                    <table class="display dtable" cellspacing="0" style="" width="100%">
                    <thead>
                        <tr>
                            <th>Date Inquired</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Action</th>
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
                </div>
                <div class="form-group pull-right mr-3">
                    <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/InquiryRead')); ?>';" id="showDeactivated"> Show read inquiries</label>
                </div>
              </div>
            </div>
          </div>
          <div class="card" style="border-color:maroon;">
            <div class="card-header" id="headingTwo" style="background:#a70000; color:white;">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="color:white; text-decoration: none">
                  <b>Make an Advisory</b>
                </button>

            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="An advisory created here will be posted on the top part of the website. Make a short one here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <?php if(count($adv)!=0): ?>
                <form action="<?php echo e(url('/AdvisoryUpdate',$adv->id)); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input type="hidden" name="status" value="0">
                        <textarea class="form-control" rows="5"  name="advisory" id="advisory" style="border:1px solid black"><?php echo $adv->advisory ?></textarea>
                    </div>
                    <div class="pull-right mb-3">
                        <button type="reset" class="btn btn-success">Clear</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php else: ?>
                <form action="<?php echo e(url('/AdvisoryNew')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <input type="hidden" name="status" value="0">
                        <textarea class="form-control" rows="5"  name="advisory" id="advisory" style="border:1px solid black" placeholder="Your advisory here"></textarea>
                    </div>
                    <div class="pull-right mb-3">
                        <button type="reset" class="btn btn-success">Clear</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('vendor/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
<script>
    $(document).ready(function(){
            table= $('.dtable').DataTable( {
             "scrollX": true,
             responsive: true
            } );
    });

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
//     tinymce.init({
//       selector: 'textarea',
//       plugins: 'image code',
//       toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | undo redo | code',
//       image_title: true, 
//       automatic_uploads: true,
//       file_picker_types: 'image', 
//       file_picker_callback: function(cb, value, meta) {
//         var input = document.createElement('input');
//         input.setAttribute('type', 'file');
//         input.setAttribute('accept', 'image/*');
//         input.onchange = function() {
//           var file = this.files[0];

//           var reader = new FileReader();
//           reader.onload = function () {

//             var id = 'blobid' + (new Date()).getTime();
//             var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
//             var base64 = reader.result.split(',')[1];
//             var blobInfo = blobCache.create(id, file, base64);
//             blobCache.add(blobInfo);
//             cb(blobInfo.blobUri(), { title: file.name });
//         };
//         reader.readAsDataURL(file);
//     };
    
//     input.click();
// }
// });

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