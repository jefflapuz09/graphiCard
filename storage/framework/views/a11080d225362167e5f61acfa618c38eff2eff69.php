<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
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
<?php if(session('success')): ?>
<script type="text/javascript">
    toastr.success(' <?php echo session('success'); ?>', 'Success!')
</script>
<?php endif; ?>
<div class="container" style="margin-top:65px;">
        <div class="container">
                <ol class="breadcrumbs breadcrumb-arrow wow fadeInUp">
                  <li><a href=""><span style="color:white;">Login</span></a></li>
                </ol>
        </div>

        <div class="card-body">
            <div align="center">
                <form class="form-horizontal" method="POST" action="<?php echo e(url('/customer/login/post')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        <hr>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>