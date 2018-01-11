<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/fontawesome-stars.css')); ?>" rel="stylesheet"> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<div class="container-fluid">
    <div>
        <h3>Customer Feedback</h3>
    </div>
    <?php if($errors->any()): ?>
    <script type="text/javascript">
        toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
    </script>              
    <?php endif; ?>  
    <?php if(session('error')): ?>
    <script type="text/javascript">
        toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
    </script>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6"> 
            <form action="<?php echo e(url('/FeedbackEdit', $post->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div align="center" class="checkbox">
                    <label>
                        <?php if($post->isSelected == 0): ?>
                        <input type="checkbox" name="isSelected" value="0">
                        <?php else: ?>
                        <input type="checkbox" checked name="isSelected" value="0">
                        <?php endif; ?>
                        <b>Selected Post</b>
                        <button type="button" class="ml-1 btn btn-outline-dark btn-sm" data-toggle="popover" title="Selected Post" data-html="true" data-content="Ticking the box will let the customer feedback be displayed on the landing page of the website. If not, it will be just displayed on the default page."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                    </label>
                </div>
                <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px; padding-right: 0px" >
                    <center><img class="img-fluid" id="pic" src="<?php echo e(URL::asset($post->image)); ?>" style="max-width:200px; background-size: contain" /></center>
                </div>
            </div> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="">Customer Name:</label></br>
                    <select class="select2 form-control" name="customerId" style="width: 100%" disabled="">
                        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cust->id); ?>" <?php if($cust->id == $post->customerId): ?>selected="selected"<?php else: ?>""<?php endif; ?>><?php echo e($cust->firstName); ?> <?php echo e($cust->middleName); ?> <?php echo e($cust->lastName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Description:</label>
                    <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc" disabled><?php echo e($post->description); ?></textarea>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <span class="social-box">
                            <label for="price-max">Rating:</label>
                            <?php $round = round($post->rating);?>
                            <select id="star" class="starrating" disabled>
                                <option value="1" <?php if($round == 1): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
                                <option value="2" <?php if($round == 2): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
                                <option value="3" <?php if($round == 3): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
                                <option value="4" <?php if($round == 4): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
                                <option value="5" <?php if($round == 5): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
                            </select>             
                        </span>
                    </div>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary"> Update </button>
                </div>
            </form>
        </div> 
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.barrating.min.js')); ?>"></script>
<script>
    $( document ).ready(function() {
        $('#star').barrating({
         theme: 'fontawesome-stars',
         readonly: true
     });

        $('.meron').barrating('set', 5);
    });
</script> 
<script>
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