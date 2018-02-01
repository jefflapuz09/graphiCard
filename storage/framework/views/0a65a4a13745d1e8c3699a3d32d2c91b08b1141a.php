<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div class="container-fluid">
    
    <div class="row">
    
    <div class="col-lg-6"> 
        <div>
        <h3>Service Subcategory </h3>
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
        <form action="<?php echo e(url('/ServiceTypeEdit', $cat->id)); ?>" method="post">

        <?php echo e(csrf_field()); ?>

            
            <div class="form-group">
            <label for="sel2">Service Category</label>

            <select class="select2 form-control" required id="sel" name="categoryId">
                <option value="" disabled>Select Service Type</option>
                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <option value="<?php echo e($posts->id); ?>"
                    <?php if($cat->categoryId == $posts->id): ?>
                        selected = "selected"
                    <?php else: ?>
                   ""
                   <?php endif; ?>
                    >
                    <?php echo e($posts->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder=""  value="<?php echo e($cat->name); ?>" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Price:</label>
            <input type="number" placeholder="Price" value="<?php echo e($cat->price); ?>" class="form-control" name="price" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
                <textarea class="form-control" rows="5" placeholder=""  name="description" id="desc"><?php echo e($cat->description); ?></textarea>
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>