<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
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
            toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong")
        </script>              
    <?php endif; ?>  
    <?php if(session('error')): ?>
        <script type="text/javascript">
            toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
        </script>
    <?php endif; ?>
    <div class="row">
    
    <div class="col-lg-6"> 
        

       

        <form action="<?php echo e(url('/FeedbackEdit', $post->id)); ?>" method="post" enctype="multipart/form-data">

        <?php echo e(csrf_field()); ?>

                <div class="form-group">
                            <div align="center" class="checkbox">
                            <label>
                                <?php if($post->isSelected == 1): ?>
                              <input type="checkbox" name="isSelected" value="0">
                                <?php else: ?>
                              <input type="checkbox" checked name="isSelected" value="0">
                                <?php endif; ?>
                              <b>Selected Post</b>
                              <button type="button" class="ml-1 btn btn-outline-dark btn-sm" data-toggle="popover" title="Selected Post" data-html="true" data-content="Ticking the box will let the customer feedback be displayed on the landing page of the website. If not, it will be just displayed on the default page."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                            </label>
                            </div>
                        </div>
            <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                <center><img class="img-responsive" id="pic" src="<?php echo e(URL::asset($post->image)); ?>" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            <div class="form-group">
                  <label for="">Customer Name:</label></br>
                  <select class="select2 form-control" name="customerId" style="width: 100%">
                    <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cust->id); ?>" <?php if($cust->id == $post->customerId): ?>selected="selected"<?php else: ?>""<?php endif; ?>><?php echo e($cust->firstName); ?> <?php echo e($cust->middleName); ?> <?php echo e($cust->lastName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"><?php echo e($post->description); ?></textarea>
            </div>
            <div class="form-group">
                    <div data-role="rangeslider">
                        <label for="price-max">Rating:</label>
                        <input type="range"  name="rating" id="price-max" value="<?php echo e($post->rating); ?>" min="1" max="5">
                   </div>
            </div>
            <div class="pull-right">
                <button type="reset" class="btn btn-success">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div> 
    </div>
    </div>

 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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