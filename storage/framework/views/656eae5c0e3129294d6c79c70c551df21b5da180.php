<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div class="container-fluid">
    <div>
        <h3>Order</h3>
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
        

       

        <form action="<?php echo e(url('/AttributeEdit/'.$post->id)); ?>" method="post">

        <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="sel2">Item</label>
                <select  class="select2 form-control" required id="sel2" name="itemId">
                        <option value="0" disabled>Please select item</option>
                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <option value="<?php echo e($posts->id); ?>" <?php if($post->itemId == $posts->id): ?> selected ="selected" <?php endif; ?>><?php echo e($posts->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                    <label for="sel2">Attribute Name</label>
                    <input type="text" class="form-control" value="<?php echo e($post->attributeName); ?>" name="attributeName" placeholder="Attribute Name">
            </div>
            <div class="form-group">
                    <label for="sel2">Choice Description</label>
                    <input type="text" class="form-control" value="<?php echo e($post->choiceDescription); ?>" name="choiceDescription" placeholder="Separated by comma" data-role="tagsinput">
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
    <Script>
        $(document).ready(function(){
            $(".s").tagsinput('items')
            
        });
            
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>