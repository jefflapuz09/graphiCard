<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<style>
.btn-outline-secondary {
  color: #272626;
  background-color: transparent;
  background-image: none;
  border-color: #272626;
}

.btn-outline-secondary:hover {
  color: white;
  background-color: #f72028;
  border-color: black;
}

.btn-outline-secondary:focus, .btn-outline-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(134, 142, 150, 0.5);
}

.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
  color: #868e96;
  background-color: transparent;
}
</style>
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
    <div class="container" class="p-5">
        <div class="container" class="p-5">
            <div class="container" class="p-5">
                <div class="mt-5">
                    <h3>Login</h3>
                </div>
                <div class="container">  
                    <hr class="colorgraph"><br>  
                    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                    <form name="Login_Form" class="form-signin" method="POST" action="<?php echo e(url('/customer/login/post')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control-a" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control-a" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <div class="checkbox">
                                    <label class="col-form-label-sm pull-right">
                                        <input type="checkbox" class="form-control-sm" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-4 pull-right" >
                                <button type="submit" class="btn  btn-block btn-outline-secondary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>