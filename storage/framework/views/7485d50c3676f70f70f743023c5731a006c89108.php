<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div class="container-fluid">
    <div>
        <h3>Service Category</h3>
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
    
    <div class="col-lg-6"> 
        

       

        <form action="<?php echo e(url('/CategoryStore')); ?>" method="post">

        <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <div align="center" class="checkbox">
                <label>
                  <input type="checkbox" name="isFeatured" value="0">
                  <b>Featured Navigation Menu</b>
                </label>
                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="popover" title="Featured Menu" data-html="true" data-content="Ticking the box will let the category be displayed on the navigation bar."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Service Category Name" value="" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>