<?php $__env->startSection('style'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
            <div>
                <h3>Service Item</h3>
             </div>
             <?php if($errors->any()): ?>
             <div class="alert alert-danger">
                   <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
             </div>
             <?php endif; ?>  
    <div class="row">
    
    <div class="col-lg-6"> 
        
       
        <form action="<?php echo e(url('/ItemUpdate', $post->id)); ?>" method="post">

        <?php echo e(csrf_field()); ?>

            
            <div class="form-group">
            <label for="sel2">Service Subcategory</label>
            <select class="sel2 form-control" required id="sel2" name="subcategoryId">
                <option value="0">Please Select Subcategory</option>
                <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                    <option value="<?php echo e($posts->id); ?>"
                        <?php if($posts->id == $post->subcategoryId): ?>
                            selected = "selected"
                        <?php else: ?>
                            ""
                        <?php endif; ?>
                        ><?php echo e($posts->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Service Item Name" value="<?php echo e($post->name); ?>" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"><?php echo e($post->description); ?></textarea>
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

        <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
        <script>
        $( document ).ready(function() {
            $('#sel2').select2();
        });
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>