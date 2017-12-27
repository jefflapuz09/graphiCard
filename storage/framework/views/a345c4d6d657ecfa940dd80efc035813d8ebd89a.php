<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
    <div>
        <h3>Service Category</h3>
    </div>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php echo e(implode('', $errors->all(':message'))); ?>

    </div>                
    <?php endif; ?>
    <div class="row">
    
    <div class="col-lg-6"> 
        

       

        <form action="<?php echo e(url('/CategoryStore')); ?>" method="post">

        <?php echo e(csrf_field()); ?>

            
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