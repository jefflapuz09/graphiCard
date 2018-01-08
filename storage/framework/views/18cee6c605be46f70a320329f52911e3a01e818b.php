<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div class="container-fluid">
    <div>
        <h3>User</h3>
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
        

       

        <form action="<?php echo e(url('/UserUpdate',$user->id)); ?>" method="post">

        <?php echo e(csrf_field()); ?>

        
            <div class="form-group">
                <label for="sel1">Role:</label>
                <select class="select2 form-control" name="role" id="sel1">
                  <option value='1' <?php if($user->role == 1): ?> selected = "selected" <?php endif; ?>>Administrator</option>
                  <option value='2' <?php if($user->role == 2): ?> selected = "selected" <?php endif; ?>>Contributor</option>
                </select>
              </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Name" value="<?php echo e($user->name); ?>" class="form-control" name="name">
            </div>
            <div class="form-group">
            <label for="">Email:</label>
            <input type="email" placeholder="Email" value="<?php echo e($user->email); ?>" class="form-control" name="email">
            </div>
            <div class="form-group">
            <label for="">Password:</label>
            <input type="password" placeholder="Password" value="" class="form-control" name="password">
            </div>
            <div class="form-group">
            <label for="">Confirm Password:</label>
            <input type="password" placeholder="Confirm Password" value="" class="form-control" name="password_confirmation">
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